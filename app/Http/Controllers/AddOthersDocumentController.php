<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OthersDocument;
use App\Models\ProjectDetail;
use App\Models\DocumentType;
use App\Models\Project;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class AddOthersDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.othersDocument.index');
        $data['allproject'] = Project::where('status',1)->get();
        $data['alltype'] = DocumentType::where('status',1)->get();
        if ($request->ajax()) {
            $alldata= OthersDocument::with(['project','document'])
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('add-others-document.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

            <?php return ob_get_clean();
            })->make(True);
        }
        return view('othersdocument.add-others-document',$data);
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
        Gate::authorize('app.othersDocument.create');
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'document_type_id' => 'required',
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
        // project Others Document document
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/others/';
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
            //------------------ insert into Others Document details -----------------//
            $insert= OthersDocument::create($input);
            //------------------ insert into project details -----------------//
            $insertprojectdetail = ProjectDetail::create([
                'date' => $input['date'],
                'project_id' => $input['project_id'],
    	        'reason' => 'Others Document '.$projectname->name,
                'note' => $input['des'],
    	        'document_type_id' => $input['document_type_id'],
                'doc' => $doc,
                'tok' =>  $input['tok'],
                'status' =>  $input['status'],
                'created_by' => $input['created_by']
            ]);
            //------------------ update project talbe others document id -----------------//
            $insertProject = Project::where([['id',$input['project_id']],['status',1]])
                            ->update(['document_type_id' =>  $input['document_type_id']]);
            DB::commit();
        }catch(\Exception $e){
            // $bug=$e->errorInfo[1];
            // echo $e->getMessage();
            // die;
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Others Document Successfully Added To Project!');
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
        Gate::authorize('app.othersDocument.edit');
        $data['single_data']= OthersDocument::find($id);
        $data['allproject'] = Project::where('status',1)->get();
        $data['alltype'] = DocumentType::where('status',1)->get();
        return view('othersdocument.add-others-document', $data);
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
        Gate::authorize('app.othersDocument.edit');
        $othersdocument = OthersDocument ::findOrFail($id);
        $projectdetail = ProjectDetail::where([['project_id',$othersdocument->project_id],['tok',$othersdocument->tok]])->first();
        $project = Project::where('id',$othersdocument->project_id)->first();


        $validator = Validator::make($request->all(), [
            'document_type_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();
        $input['date'] = $request->date;
        // project Others Document 
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = date('d-m-Y') . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path() . '/upload/others/';
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
            //--------------------- update others document detail ---------------//
            $updateothersdoc = $othersdocument->update([
                'date' => $input['date'],
                'des' => $input['des'],
    	        'document_type_id' => $input['document_type_id'],
                'doc' => $doc,
            ]);
            
            //--------------------- update project detail ---------------//
            $updateprojectdetail = $projectdetail->update([
                'date' => $input['date'],
                'note' => $input['des'],
    	        'document_type_id' => $input['document_type_id'],
                'doc' => $doc,
            ]);
            //--------------------- update project ---------------//
            $updateproject = $project->update([
    	        'document_type_id' => $input['document_type_id'],
            ]);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Others Document Successfully Updated !');
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
        Gate::authorize('app.othersDocument.destroy');
        $othersdocument = OthersDocument::findOrFail($id);
        $projectdetail = ProjectDetail::where([['project_id',$othersdocument->project_id],['tok',$othersdocument->tok]])->first();
        $project = Project::where('id',$othersdocument->project_id)->first();
        //------------------------- find last value others doc of this project -----------------------//
        $lasdoc = OthersDocument::where('project_id', $othersdocument->project_id)->orderBy('id','desc')->first();

        //-------------------- delete and updat action -------------------//
        $actioncd = $othersdocument->delete();
        $actionpd = $projectdetail->delete();
        $actionp = $project->update([
            'document_type_id' =>  $lasdoc->document_type_id,
        ]);

        if($actionp){
            Session::flash('flash_message','Others Document Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

       //------------------------ Others Document report ------------------//
   public function othersDocumentReport(Request $request)
   {
    Gate::authorize('app.othersDocument.report');
       if ($request->ajax()) {
           $alldata= OthersDocument::with(['project.sector','project.ministry','document'])
                           ->where('status', '1')
                           ->orderBy('id', 'desc')
                           ->get();
           return DataTables::of($alldata)
           ->addIndexColumn()->make(True);
       }
       return view ('othersdocument.others-document-report');
   }

}
