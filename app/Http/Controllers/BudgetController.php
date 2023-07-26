<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\AccountType;
use App\Models\Budget;
use App\Models\Project;
use App\Models\FeasibilityCompany;
use App\Models\BudgetDetail;
use DataTables;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.ppptafFund.index');
        if ($request->ajax()) {
            $alldata= Budget::with(['project','project.phase','project.sector','project.ministry','firm'])
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('budget.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('budget.budget');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.ppptafFund.create');
        $data['allproject'] = Project::where('status',1)->get();
        $data['allfirm'] = FeasibilityCompany::where('status',1)->get();
        return view ('budget.budget-form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.ppptafFund.create');
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'firm_id' => 'required',
            'contract_amount' => 'required|numeric',
            'currency_type' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        //--------------------- contract firm -----------------//
        $firm = FeasibilityCompany::where('id', $request->firm_id)->first();
        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');
        $input['amount'] = $request->contract_amount;
        $input['reason'] = 'Contract with '.  $firm->name;

        DB::beginTransaction();
        try{
            $bug=0;
            // $existingBudget = Budget::where([['project_id',$request->project_id],['firm_id',$request->firm_id],['currency_type',$request->currency_type]])->count();
            // if ( $existingBudget == 1) {
            //     $incrementBudget = Budget::where([['project_id',$request->project_id],['firm_id',$request->firm_id],['currency_type',$request->currency_type]])
            //                                 ->increment('contract_amount', $input['amount']);
            // }else{
            //     $budget= Budget::create($input);
            // }
            $budget= Budget::create($input);
            $budgetdetail= BudgetDetail::create($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Budget Successfully Added !');
            return redirect()->route('budget.index')->with('status_color','success');
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
        Gate::authorize('app.ppptafFund.edit');
        $data['single_data']= Budget::find($id);
        $data['allproject'] = Project::where('status',1)->get();
        $data['allfirm'] = FeasibilityCompany::where('status',1)->get();
        return view ('budget.budget-form',$data);
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
        Gate::authorize('app.ppptafFund.edit');
        $data=Budget::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'firm_id' => 'required',
            'contract_amount' => 'required|numeric',
            'currency_type' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        //--------------------- contract firm -----------------//
        $firm = FeasibilityCompany::where('id', $request->firm_id)->first();
        $input = $request->all();
        try{
            $bug=0;
            
            $budgetdetail= BudgetDetail::where('tok',$data->tok)->update([
                'project_id' => $request->project_id,
                'firm_id' => $request->firm_id,
                'amount' => $request->contract_amount,
                'currency_type' => $request->currency_type,
                'reason' => 'Contract with '.  $firm->name,
                'date' =>  $request->date,
            ]);
            $data->update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Budget Successfully Updated !');
            return redirect()->route('budget.index')->with('status_color','warning');
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
        Gate::authorize('app.ppptafFund.destroy');
        $data = Budget::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Budget Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
}
