<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CapitalCostDetail;
use App\Models\ProjectDetail;
use App\Models\CapitalCost;
use App\Models\Project;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class AddCapitalCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.costCapital.index');
        $data['allproject'] = Project::where('status',1)->get();
        $data['allcost'] = CapitalCost::where('status',1)->get();
        if ($request->ajax()) {
            $alldata= CapitalCostDetail::with(['project','cost'])
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('add-capital-cost.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

            <?php return ob_get_clean();
            })->make(True);
        }
        return view('cost.add-capital-cost',$data);
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
        Gate::authorize('app.costCapital.create');
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'cost_id' => 'required',
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
        // project capital cost document
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/cost/';
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
            //------------------ insert into capital cost details -----------------//
            $insert= CapitalCostDetail::create($input);
            //------------------ insert into project details -----------------//
            $insertprojectdetail = ProjectDetail::create([
                'date' => $input['date'],
                'project_id' => $input['project_id'],
    	        'reason' => 'Capital Cost '.$projectname->name,
                'note' => $input['des'],
    	        'cost_id' => $input['cost_id'],
                'doc' => $doc,
                'tok' =>  $input['tok'],
                'status' =>  $input['status'],
                'created_by' => $input['created_by']
            ]);
            //------------------ update project talbe cost id -----------------//
            $insert= Project::where([['id',$input['project_id']],['status',1]])
                            ->update(['cost_id' =>  $input['cost_id']]);
            DB::commit();
        }catch(\Exception $e){
            // $bug=$e->errorInfo[1];
            echo $e->getMessage();
            die;
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Capital Cost Successfully Added To Project!');
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
        Gate::authorize('app.costCapital.edit');
        $data['single_data']= CapitalCostDetail::find($id);
        $data['allproject'] = Project::where('status',1)->get();
        $data['allcost'] = CapitalCost::where('status',1)->get();
        return view('cost.add-capital-cost', $data);
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
        Gate::authorize('app.costCapital.edit');
        $capitalcostdetail=CapitalCostDetail::findOrFail($id);
        $projectdetail = ProjectDetail::where([['project_id',$capitalcostdetail->project_id],['tok',$capitalcostdetail->tok]])->first();
        $project = Project::where('id',$capitalcostdetail->project_id)->first();


        $validator = Validator::make($request->all(), [
            'cost_id' => 'required',
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
            $filePath = public_path() . '/upload/cost/';
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
            $updatecostdetal = $capitalcostdetail->update([
                'date' => $input['date'],
                'des' => $input['des'],
    	        'cost_id' => $input['cost_id'],
                'doc' => $doc,
            ]);
            //--------------------- update project detail ---------------//
            $updateprojectdetail = $projectdetail->update([
                'date' => $input['date'],
                'note' => $input['des'],
    	        'cost_id' => $input['cost_id'],
                'doc' => $doc,
            ]);
            //--------------------- update project ---------------//
            $updateproject = $project->update([
    	        'cost_id' => $input['cost_id'],
            ]);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Capital Cost Successfully Updated !');
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
        Gate::authorize('app.costCapital.destroy');
        $capitalcostdetail = CapitalCostDetail::findOrFail($id);
        $projectdetail = ProjectDetail::where([['project_id',$capitalcostdetail->project_id],['tok',$capitalcostdetail->tok]])->first();
        $project = Project::where('id',$capitalcostdetail->project_id)->first();
        //------------------------- find last value cost of this project -----------------------//
        $lastcost = CapitalCostDetail::where('project_id', $capitalcostdetail->project_id)->orderBy('id','desc')->first();

        //-------------------- delete and updat action -------------------//
        $actioncd = $capitalcostdetail->delete();
        $actionpd = $projectdetail->delete();
        $actionp = $project->update([
            'cost_id' =>  $lastcost->cost_id,
        ]);

        if($actionp){
            Session::flash('flash_message','Capital Cost Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

       //------------------------ capital cost report ------------------//
   public function capitalCostReport(Request $request)
   {
    Gate::authorize('app.costCapital.report');
       if ($request->ajax()) {
           $alldata= CapitalCostDetail::with(['project.sector','project.ministry','cost'])
                           ->where('status', '1')
                           ->orderBy('id', 'desc')
                           ->get();
           return DataTables::of($alldata)
           ->addIndexColumn()->make(True);
       }
       return view ('cost.capital-cost-report');
   }

}
