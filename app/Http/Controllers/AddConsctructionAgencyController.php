<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConstructionDetail;
use App\Models\ProjectDetail;
use App\Models\ConstructionCompnay;
use App\Models\Project;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class AddConsctructionAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.constructionAgency.index');
        $data['allproject'] = Project::where('status',1)->get();
        $data['allcompany'] = ConstructionCompnay::where('status',1)->get();
        if ($request->ajax()) {
            $alldata= ConstructionDetail::with(['project','construction'])
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('add-agency.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

            <?php return ob_get_clean();
            })->make(True);
        }
        return view('construction.add-construction-agency',$data);
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
        Gate::authorize('app.constructionAgency.create');
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'construction_company_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        //---------------- take project name ----------------//
        $projectname = Project::where([['id',$request->project_id],['status',1]])->first();
        $input = $request->all();
        $input['status'] = 1;
        $input['date'] = $request->date;
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');
        // project construction agency document
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/construction/';
            $file->move($filePath, $filename);
            $input['doc'] = $filename;
        }
        if (empty($request->doc)) {
            $doc = null;
        } else {
           $doc = $input['doc'];
        }
        

        DB::beginTransaction();
        try{
            $bug=0;
            //------------------ insert into construction details -----------------//
            $insert= ConstructionDetail::create($input);
            //------------------ insert into project details -----------------//
            $insertprojectdetail = ProjectDetail::create([
                'date' => $input['date'],
                'project_id' => $input['project_id'],
    	        'reason' => 'Construction Agency '.$projectname->name,
                'note' => $input['des'],
    	        'construction_company_id' => $input['construction_company_id'],
                'doc' => $doc,
                'tok' =>  $input['tok'],
                'status' =>  $input['status'],
                'created_by' => $input['created_by']
            ]);
            //------------------ update project talbe cost id -----------------//
            $insert= Project::where([['id',$input['project_id']],['status',1]])
                            ->update(['construction_company_id' =>  $input['construction_company_id']]);
            DB::commit();
        }catch(\Exception $e){
            // $bug=$e->errorInfo[1];
            echo $e->getMessage();
            die;
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Construction Agency Successfully Added To Project!');
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
        return 'view coming soon...........';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('app.constructionAgency.edit');
        $data['single_data']= ConstructionDetail::find($id);
        $data['allproject'] = Project::where('status',1)->get();
        $data['allcompany'] = ConstructionCompnay::where('status',1)->get();
        return view('construction.add-construction-agency', $data);
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
        Gate::authorize('app.constructionAgency.edit');
        $constructiondetail=ConstructionDetail::findOrFail($id);
        $projectdetail = ProjectDetail::where([['project_id',$constructiondetail->project_id],['tok',$constructiondetail->tok]])->first();
        $project = Project::where('id',$constructiondetail->project_id)->first();


        $validator = Validator::make($request->all(), [
            'construction_company_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();
        $input['date'] = $request->date;
        // project capital cost document
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/construction/';
            $file->move($filePath, $filename);
            $input['doc'] = $filename;
        }
        if (empty($request->doc)) {
            $doc = $projectdetail->doc;
        } else {
           $doc = $input['doc'];
        }
        try{
            $bug=0;
            //--------------------- update cost detail ---------------//
            $updateconstructiondetail = $constructiondetail->update([
                'date' => $input['date'],
                'des' => $input['des'],
    	        'construction_company_id' => $input['construction_company_id'],
                'doc' => $doc,
            ]);
            //--------------------- update project detail ---------------//
            $updateprojectdetail = $projectdetail->update([
                'date' => $input['date'],
                'note' => $input['des'],
    	        'construction_company_id' => $input['construction_company_id'],
                'doc' => $doc,
            ]);
            //--------------------- update project ---------------//
            $updateproject = $project->update([
    	        'construction_company_id' => $input['construction_company_id'],
            ]);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Construction Agency Successfully Updated !');
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
        Gate::authorize('app.constructionAgency.destroy');
        $constructiondetail = ConstructionDetail::findOrFail($id);
        $projectdetail = ProjectDetail::where([['project_id',$constructiondetail->project_id],['tok',$constructiondetail->tok]])->first();
        $project = Project::where('id',$constructiondetail->project_id)->first();
        //------------------------- find last value cost of this project -----------------------//
        $lastcost = ConstructionDetail::where('project_id', $constructiondetail->project_id)->orderBy('id','desc')->first();

        //-------------------- delete and updat action -------------------//
        $actioncd = $constructiondetail->delete();
        $actionpd = $projectdetail->delete();
        $actionp = $project->update([
            'construction_company_id' =>  $lastcost->construction_company_id,
        ]);

        if($actionp){
            Session::flash('flash_message','Construction Agency Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

   //------------------------ construction agency report ------------------//
   public function constructionAgencyReport(Request $request)
   {
    Gate::authorize('app.constructionAgency.report');
       if ($request->ajax()) {
           $alldata= ConstructionDetail::with(['project.sector','project.ministry','construction'])
                           ->where('status', '1')
                           ->orderBy('id', 'desc')
                           ->get();
           return DataTables::of($alldata)
           ->addIndexColumn()->make(True);
       }
       return view ('construction.construction-agency-report');
   }

   //------------------------ construction company wise report ------------------//
   public function constructionCompanyWiseReport(Request $request,$id)
   {
    Gate::authorize('app.constructionAgency.report');
        $companyid = $id;
        $constructioncompany = ConstructionCompnay::where('id',$id)->first();
       if ($request->ajax()) {
           $alldata= ConstructionDetail::where('construction_company_id',$id)
                                    ->with(['project.sector','project.ministry','construction'])
                                    ->where('status', '1')
                                    ->orderBy('id', 'desc')
                                    ->get();
           return DataTables::of($alldata)
           ->addIndexColumn()->make(True);
       }
       return view ('construction.construction-company-wise-report',compact('companyid','constructioncompany'));
   }


}
