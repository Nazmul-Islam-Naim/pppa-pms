<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phase;
use App\Models\SubPhase;
use App\Models\Project;
use App\Models\PhaseDetail;
use App\Models\ProjectDetail;
use App\Models\SinglePhaseDetail;
use App\Models\DocumentTitle;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class AddPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.phase.index');
        $data['allproject']= Project::where('status',1)->get();
        $data['allphase']= Phase::where('status',1)->get();
        $data['allsubphase']= SubPhase::where('status',1)->get();
        $data['alldata']= Phase::orderBy('id', 'DESC')->get();
        return view('phase.add-phase', $data);
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
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'phase_id' => 'required',
            'sub_phase_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        //---------------- take project name ----------------//
        $projectname = Project::where([['id',$request->project_id],['status',1]])->first();
        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');
        $input['date'] = date('Y-m-d');

        DB::beginTransaction();
        try{
            $bug=0;
            //------------------ insert into capital  phase and sub phase details -----------------//
            $insert= SinglePhaseDetail::create($input);
            foreach ($request->addmore as $value) {
                if (!empty($value['doc'])) {
                    $doc = $value['doc'];
                } else {
                    $doc = null;
                }
                if (!empty($value['image'])) {
                    $img = $value['image'];
                } else {
                    $img = null;
                }
                // project phase document
                if ($doc) {
                    $file = $doc;
                    $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
                    $filePath = public_path() . '/upload/phase/';
                    $file->move($filePath, $filename);
                    $idoc = $filename;
                }
                // project phase image
                if ($img) {
                    $photo1=$img;
                    $fileType1=$photo1->getClientOriginalExtension();
                    $fileName1=rand(1,1000).date('dmyhis').".".$fileType1;
                    Image::make($photo1)->resize(250,250)->save(public_path('upload/phase/'.$fileName1));
                    $iimg = $fileName1;
                }
                // document
                if (!empty($idoc)) {
                    $input['doc'] = $idoc;
                    $idoc = null;
                } else {
                    $input['doc'] = null;
                }
                // image
                if (!empty($iimg)) {
                    $input['image'] = $iimg;
                    $iimg = null;
                } else {
                    $input['image'] = null;
                }
                $input['date'] = $value['date'];
                $input['des'] = $value['des'];
                $input['image_title'] = $value['image_title'];
                //------------------ insert into capital cost details -----------------//
                $insert= PhaseDetail::create($input);
                //------------------ insert into project details -----------------//
                $insertprojectdetail = ProjectDetail::create([
                    'date' => $input['date'],
                    'project_id' => $input['project_id'],
                    'reason' => 'Phase '.$projectname->name,
                    'note' => $input['des'],
                    'phase_id' => $input['phase_id'],
                    'sub_phase_id' => $input['sub_phase_id'],
                    'doc' =>  $input['doc'],
                    'tok' =>  $input['tok'],
                    'status' =>  $input['status'],
                    'created_by' => $input['created_by']
                ]);
            }
            //------------------ update project talbe  phase and sub phase id -----------------//
            $insert= Project::where([['id',$input['project_id']],['status',1]])
                            ->update([
                                'phase_id' =>  $input['phase_id'],
                                'sub_phase_id' =>  $input['sub_phase_id'],
                            ]);
           
            DB::commit();
        }catch(\Exception $e){
            // $bug=$e->errorInfo[1];
            echo $e->getMessage();
            die;
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Phase Successfully Added To Project!');
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
        Gate::authorize('app.phase.index');
        // take tok by the id
        $data['single_data'] = SinglePhaseDetail::where('id',$id)->first();
        $data['alldata'] = PhaseDetail::where('tok',$data['single_data']->tok)->get();
        return view ('phase.phase-report-detail',$data);
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
        $data['single_data']= SinglePhaseDetail::find($id);
        $data['allproject']= Project::where('status',1)->get();
        $data['allphase']= Phase::where('status',1)->get();
        $data['allsubphase']= SubPhase::where('status',1)->get();
        $data['alldoctitle']= DocumentTitle::where('status',1)->get();
        $data['alldata']= PhaseDetail::where('tok',$data['single_data']->tok)->get();
        return view('phase.edit-phase', $data);
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
        $validator = Validator::make($request->all(), [
            'phase_id' => 'required',
            'sub_phase_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        //---------------- take project id form singele phase detail table ----------------//
        $singelphaseobject = SinglePhaseDetail::where([['id',$id],['status',1]])->first();
        //---------------- take project name ----------------//
        $projectname = Project::where([['id',$singelphaseobject->project_id],['status',1]])->first();
       
        //----------------delete phase detail table item ----------------//
        $deletephasedetail = PhaseDetail::where([['tok',$singelphaseobject->tok],['status',1]])->delete();
        //----------------delete project detail table item ----------------//
        $deleteprojectdetail = ProjectDetail::where([['tok',$singelphaseobject->tok],['status',1]])->delete();

        $input = $request->all();
        $input['date'] = date('Y-m-d');
        $input['project_id'] = $projectname->id;
        $input['tok'] = $singelphaseobject->tok;
        $input['status'] = 1;
        $input['created_by'] = Auth::id();

        DB::beginTransaction();
        try{
            $bug=0;
            //------------------ insert into capital cost details -----------------//
            $insert= $singelphaseobject->update($input);
            
            foreach ($request->addmore as $value) {
                if (!empty($value['doc'])) {
                    $doc = $value['doc'];
                } else {
                    $doc = null;
                }
                if (!empty($value['image'])) {
                    $img = $value['image'];
                } else {
                    $img = null;
                }
                // project phase document
                if ($doc) {
                    $file = $doc;
                    $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
                    $filePath = public_path() . '/upload/phase/';
                    $file->move($filePath, $filename);
                    $input['doc'] = $filename;
                    $idoc = $filename;
                }
                // phase image
                if ($img) {
                    $photo1=$img;
                    $fileType1=$photo1->getClientOriginalExtension();
                    $fileName1=rand(1,1000).date('dmyhis').".".$fileType1;
                    Image::make($photo1)->resize(250,250)->save(public_path('upload/phase/'.$fileName1));
                    $iimg = $fileName1;
                }
                // document
                if (!empty($idoc)) {
                    $input['doc'] = $idoc;
                    $idoc = null;
                } else {
                    if (!empty($value['olddoc'])) {
                        $input['doc'] = $value['olddoc'];
                    } else {
                        $input['doc'] = null;
                    }
                    
                }
                // image
                if (!empty($iimg)) {
                    $input['image'] = $iimg;
                    $iimg = null;
                } else {
                    if (!empty($value['oldimage'])) {
                        $input['image'] = $value['oldimage'];
                    } else {
                        $input['image'] = null;
                    }
                }
                $input['date'] = $value['date'];
                $input['des'] = $value['des'];
                $input['image_title'] = $value['image_title'];
                //------------------ insert into capital cost details -----------------//
                $insert= PhaseDetail::create($input);
                //------------------ insert into project details -----------------//
                $insertprojectdetail = ProjectDetail::create([
                    'date' => $input['date'],
                    'project_id' => $input['project_id'],
                    'reason' => 'Phase '.$projectname->name,
                    'note' => $input['des'],
                    'phase_id' => $input['phase_id'],
                    'sub_phase_id' => $input['sub_phase_id'],
                    'doc' =>  $input['doc'],
                    'tok' =>  $input['tok'],
                    'status' =>  $input['status'],
                    'created_by' => $input['created_by']
                ]);
            }
            //------------------ update project talbe phase and sub phase id -----------------//
            $insert= Project::where([['id',$input['project_id']],['status',1]])
                            ->update([
                                'phase_id' =>  $input['phase_id'],
                                'sub_phase_id' =>  $input['sub_phase_id'],
                            ]);
           
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            // echo $e->getMessage();
            // die;
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Phase Successfully Updated To Project!');
            return redirect()->back()->with('status_color','success');
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
        $data = SinglePhaseDetail::findOrFail($id);
        //--------------------- delete phase delete ------------------//
        $deletephasedetail = PhaseDetail::where('tok',$data->tok)->delete();
        $deleteprojectdetail = ProjectDetail::where('tok',$data->tok)->delete();
        //------------------------ last pahse of this project --------------//
        $lastphase = SinglePhaseDetail::where('project_id',$data->project_id)->orderBy('id','desc')->first();
        $updateproject = Project::where('id',$lastphase->project_id)
                                ->update([
                                    'phase_id' =>  $lastphase->phase_id,
                                    'sub_phase_id' =>  $lastphase->sub_phase_id,
                                ]);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Phase Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    //------------------------ get sub phase dropdown ------------------//
    public function getSubPhase(Request $request)
    {
        $subphase = SubPhase::where('phase_id',$request->id)->get();
        return Response::json($subphase);
        die;
    }

    //------------------------ get document title phase dropdown ------------------//
    public function getDocumentTitle(Request $request)
    {
        $documenttitle = DocumentTitle::where('sub_phase_id',$request->id)->get();
        return Response::json($documenttitle);
        die;
    }

    //------------------------ phase amendment ------------------//
    public function phaseAmendment(Request $request)
    {
        Gate::authorize('app.phase.amendment');
        if ($request->ajax()) {
            $alldata= SinglePhaseDetail::with(['project','phase','subphase'])
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('add-phase.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('phase.phase-amendment');
    }

    //------------------------ phase report ------------------//
    public function phaseReport(Request $request)
    {
        Gate::authorize('app.phase.report');
        if ($request->ajax()) {
            $alldata= SinglePhaseDetail::with(['project.sector','project.ministry','phase','subphase'])
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view ('phase.phase-report');
    }

}
