<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\G2GDocument;
use Illuminate\Http\Request;
use App\Models\Project;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class G2GDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.phaseFollowUp.index');
        $data['allproject']= Project::where('status',1)->get();
        $data['allcountry']= Country::all();
        
        if ($request->ajax()) {
            $alldata= G2GDocument::with(['project','country'])
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('g2g-document.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

            <?php return ob_get_clean();
            })->make(True);
        }
        return view ('procurement.g2g-document',$data);
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
        Gate::authorize('app.phaseFollowUp.create');
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'country_id' => 'required',
            'document' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        $input = $request->all();

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/g2g/';
            $file->move($filePath, $filename);
            $input['document'] = $filename;
        }

        DB::beginTransaction();
        try{
            $bug=0;
          G2GDocument::create($input);
           
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','G2G Successfully Added To Project!');
            return redirect()->route('g2g-document.index')->with('status_color','success');
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
        Gate::authorize('app.phaseFollowUp.index');
        // take tok by the id
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('app.phaseFollowUp.index');
        $data['single_data'] = G2GDocument::findOrFail($id);
        $data['allproject']= Project::where('status',1)->get();
        $data['allcountry']= Country::all();
        return view('procurement.g2g-document', $data);
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
        Gate::authorize('app.phaseFollowUp.edit');
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        $input = $request->all();

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/g2g/';
            $file->move($filePath, $filename);
            $input['document'] = $filename;
        }

        DB::beginTransaction();
        try{
            $bug=0;
            $method = Arr::pull($input, '_method');
            $token = Arr::pull($input, '_token');
            G2GDocument::where('id',$id)->update($input);
           
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage());
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','G2G Successfully Updated To Project!');
            return redirect()->route('g2g-document.index')->with('status_color','success');
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
        Gate::authorize('app.phaseFollowUp.destroy');
        $data = G2GDocument::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Record Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

}
