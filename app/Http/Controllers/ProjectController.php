<?php

namespace App\Http\Controllers;

use App\Models\DeliveryModel;
use App\Models\ProcurementDetails;
use App\Models\ReveneueModel;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Ministry;
use App\Models\ImplementingAgency;
use App\Models\Location;
use App\Models\Approval;
use App\Models\ProjectDetail;
use App\Models\PrivatePartner;
use App\Models\Fisibility;
use App\Models\ConstructionAgency;
use App\Models\SinglePhaseDetail;
use App\Models\Phase;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use Str;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.project.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('project.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('project.project-list');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.project.create');
        $data['allsector']= Sector::where('status', 1)->get();
        $data['allministry']= Ministry::where('status', 1)->get();
        $data['allagency']= ImplementingAgency::where('status', 1)->get();
        $data['alllocation']= Location::where('status', 1)->get();
        $data['allapproval']= Approval::where('status', 1)->get();
        $data['allpartner']= PrivatePartner::where('status', 1)->get();
        $data['alldelivery']= DeliveryModel::all();
        $data['allrevenue']= ReveneueModel::all();
        $data['alldata']= Project::orderBy('id', 'DESC')->get();
        return view('project.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.project.create');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sector_id' => 'required',
            'ministry_id' => 'required',
            'implementing_agency_id' => 'required',
            'location_id' => 'required',
            'area' => 'nullable|max:255',
            'key_feature' => 'nullable|max:255',
            'economic_life' => 'nullable|max:255',
            'contract_term' => 'nullable|max:255',
            'construction_time' => 'nullable|max:255',
            'delivery_model' => 'nullable|max:255',
            'revenue_model' => 'nullable|max:255',
            'capital_cost' => 'nullable|max:255',
            'project_cost' => 'nullable|max:255',
            'leverage' => 'nullable|max:255',
            'vgf_amount_percent' => 'nullable|max:255',
            'grantor' => 'nullable|max:255',
            'shareholders' => 'nullable|max:255',
            'lenders' => 'nullable|max:255',
            'epc_contractors' => 'nullable|max:255',
            'o_m_contractors' => 'nullable|max:255',
            'independent_engineer' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        $slug = Str::slug($request->input('name'));
        $slug_count = Project::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = $slug."-".rand();
        }
        $input['slug'] = $slug;
        // project image
        if ($request->hasFile('image')) {
            $photo=$request->file('image');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            Image::make($photo)->resize(700,120)->save(public_path('upload/project/'.$fileName));
            $input['image']=$fileName;
        }

        DB::beginTransaction();
        try{
            $bug=0;
            $insert= Project::create($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Project Successfully Added !');
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
        Gate::authorize('app.project.index');
        $data['single_data'] = ProjectDetail::where('id',$id)->first();
        return view('project.show-document',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('app.project.edit');
        $data['single_data']= Project::find($id);
        $data['allsector']= Sector::where('status', 1)->get();
        $data['allministry']= Ministry::where('status', 1)->get();
        $data['allagency']= ImplementingAgency::where('status', 1)->get();
        $data['alllocation']= Location::where('status', 1)->get();
        $data['allapproval']= Approval::where('status', 1)->get();
        $data['allpartner']= PrivatePartner::where('status', 1)->get();
        $data['alldelivery']= DeliveryModel::all();
        $data['allrevenue']= ReveneueModel::all();
        return view('project.form', $data);
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
        Gate::authorize('app.project.edit');
        $data=Project::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sector_id' => 'required',
            'ministry_id' => 'required',
            'implementing_agency_id' => 'required',
            'location_id' => 'required',
            'area' => 'nullable|max:255',
            'key_feature' => 'nullable|max:255',
            'economic_life' => 'nullable|max:255',
            'contract_term' => 'nullable|max:255',
            'construction_time' => 'nullable|max:255',
            'delivery_model' => 'nullable|max:255',
            'revenue_model' => 'nullable|max:255',
            'capital_cost' => 'nullable|max:255',
            'project_cost' => 'nullable|max:255',
            'leverage' => 'nullable|max:255',
            'vgf_amount_percent' => 'nullable|max:255',
            'grantor' => 'nullable|max:255',
            'shareholders' => 'nullable|max:255',
            'lenders' => 'nullable|max:255',
            'epc_contractors' => 'nullable|max:255',
            'o_m_contractors' => 'nullable|max:255',
            'independent_engineer' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();
        // project image
        if ($request->hasFile('image')) {
            $photo=$request->file('image');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            Image::make($photo)->resize(700,120)->save(public_path('upload/project/'.$fileName));
            $input['image']=$fileName;
        }
        try{
            $bug=0;
            $data->update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Project Successfully Updated !');
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
        
        Gate::authorize('app.project.destroy');
        $data = Project::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Project Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    //------------------------ get implementing agency dropdown ------------------//
    public function getImplementingAgency(Request $request)
    {
        $implementingagency = ImplementingAgency::where('ministry_id',$request->id)->get();
        return Response::json($implementingagency);
        die;
    }

    //-------------------------- project status part ----------------//
    public function projectStatus(Request $request)
    {
        Gate::authorize('app.project.status');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view ('project.project-status');
    }

    //-------------------------- project report part ----------------//
    public function projectReport(Request $request)
    {
        Gate::authorize('app.project.report');
        if ($request->ajax()) {
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $alldata= ProjectDetail::with(['project.sector','project.ministry','feasibility','cost','phase','subphase','construction','document'])
                                    ->whereBetween('date',[date('Y-m-d',strtotime($request->start_date)),date('Y-m-d',strtotime($request->end_date))])
                                    ->orderBy('id','desc')
                                    ->get();
                return DataTables::of($alldata)
                                    ->addIndexColumn()
                                    ->make(True);
            } else {
                $alldata= ProjectDetail::with(['project.sector','project.ministry','feasibility','cost','phase','subphase','construction','document'])
                                    ->orderBy('id','desc')
                                    ->get();
                return DataTables::of($alldata)
                                    ->addIndexColumn()
                                    ->make(True);
            }
        }
        return view ('project.project-report');
    }

    //-------------------------- project porfile part ----------------//
    public function projectProfile(Request $request,$id)
    {
        Gate::authorize('app.project.index');
        Project::where('id',$id)->update([
            "updated_at" => date("Y-m-d h:i:s")
        ]);
        $data['single_data'] = Project::where('id',$id)->first();
        $data['alldata'] = SinglePhaseDetail::where('project_id',$id)->orderBy('phase_id','asc')->get();
        $data['allphase'] = Phase::orderBy('id','asc')->get();
        $data['procurementPhaseDetails'] = ProcurementDetails::where('project_id',$id)->first();
        return view ('project.project-profile',$data);
    }
}
