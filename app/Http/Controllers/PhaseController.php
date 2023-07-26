<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\PhaseDetail;
use App\Models\Phase;
use DataTables;
use Illuminate\Support\Facades\Gate;
use DataTable;
use Str;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.phase.index');
        $data['alldata']= Phase::all();
        return view('phase.phase', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.phase.create');

        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        $input['status'] = 1;
        $input['created_by'] = Auth::id();

        $validator = Validator::make($input, [
            'name' => 'required',
            'slug' => 'required | unique:phases',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        DB::beginTransaction();
        try{
            $bug=0;
            $insert= Phase::create($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Phase Successfully Added !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('app.phase.edit');
        $data['single_data']= Phase::find($id);
        $data['alldata']= Phase::orderBy('id', 'DESC')->paginate(15);
        return view('phase.phase', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('app.phase.edit');
        $data=Phase::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();
        try{
            $bug=0;
            $data->update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Phase Successfully Updated !');
            return redirect()->back()->with('status_color','warning');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('app.phase.destroy');
        $data = Phase::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Phase Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    
    
    //--------- phase document report -------------//
    public function phaseDocumentReport(Request $request){
        Gate::authorize('app.project.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view ('phase.phase-document-report');
    }
    
    //----------- project document report --------//
    public function projcetDocumentReport($id){
        $data['single_data'] = Project::where('id',$id)->first();
        $data['alldata'] = PhaseDetail::where('project_id',$id)->get();
        return view('phase.project-document-report',$data);
    }


}
