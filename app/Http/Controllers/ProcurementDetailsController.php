<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ProcurementDetails;
use Illuminate\Http\Request;
use App\Models\Project;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class ProcurementDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.phaseFollowUp.index');
        if ($request->ajax()) {
            $alldata= ProcurementDetails::with(['project'])
                            ->orderBy('id','desc')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('procurement-details.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('procurement.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['allproject']= Project::where('status',1)->get();
        $data['allcountry']= Country::all();
        return view('procurement.add-procurment-phase', $data);
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
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        $input = $request->all();
        $input['created_by'] = Auth::id();

        DB::beginTransaction();
        try{
            $bug=0;
           $available = ProcurementDetails::where('project_id',$input['project_id'])->count();
           if ($available == 1) {
            ProcurementDetails::where('project_id',$input['project_id'])->update([
                'project_id' => $input['project_id'],
                'g2g_basis' => $input['g2g_basis'],
                'country' => $input['country'],
                'procurement_type' => $input['procurement_type'],
                'procurement_method' => $input['procurement_method'],
                'stages' => $input['stages'],
                'envelope' => $input['envelope'],
                'negotiation' => $input['negotiation'],
                'swiss_challenge' => $input['swiss_challenge'],
            ]);
           } else {
            ProcurementDetails::create([
                'project_id' => $input['project_id'],
                'g2g_basis' => $input['g2g_basis'],
                'country' => $input['country'],
                'procurement_type' => $input['procurement_type'],
                'procurement_method' => $input['procurement_method'],
                'stages' => $input['stages'],
                'envelope' => $input['envelope'],
                'negotiation' => $input['negotiation'],
                'swiss_challenge' => $input['swiss_challenge'],
                'created_by' => $input['created_by'],
            ]);
           }
           
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Procurement Details Successfully Added To Project!');
            return redirect()->route('procurement-details.index')->with('status_color','success');
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
        $data['single_data'] = ProcurementDetails::findOrFail($id);
        $data['allproject']= Project::where('status',1)->get();
        $data['allcountry']= Country::all();
        return view('procurement.add-procurment-phase', $data);
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
            'project_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        $input = $request->all();

        DB::beginTransaction();
        try{
            $bug=0;
            ProcurementDetails::where('id',$id)->update([
                'project_id' => $input['project_id'],
                'g2g_basis' => $input['g2g_basis'],
                'country' => $input['country'],
                'procurement_type' => $input['procurement_type'],
                'procurement_method' => $input['procurement_method'],
                'stages' => $input['stages'],
                'envelope' => $input['envelope'],
                'negotiation' => $input['negotiation'],
                'swiss_challenge' => $input['swiss_challenge'],
            ]);
           
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Procurement Details Successfully Updated To Project!');
            return redirect()->route('procurement-details.index')->with('status_color','success');
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
        $data = ProcurementDetails::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Project Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

}
