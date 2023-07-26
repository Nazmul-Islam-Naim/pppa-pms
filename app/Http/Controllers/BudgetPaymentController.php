<?php

namespace App\Http\Controllers;

use App\Models\BudgetRecovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\AccountType;
use App\Models\Budget;
use App\Models\Project;
use App\Models\FeasibilityCompany;
use App\Models\BudgetDetail;
use App\Models\BankAccount;
use App\Models\TransactionReport;
use DataTables;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class BudgetPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.ppptafFund.index');
        $data['allbank'] = BankAccount::all();
        $data['alldata'] = Budget::whereColumn('contract_amount','!=','payment')->get();
        return view ('budget.budget-payment',$data);
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
            'pay_amount' => 'required',
            'bank_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        //--------------------- contract firm -----------------//
        $firm = FeasibilityCompany::where('id', $request->firm_id)->first();

        $totalAmount = 0;
        $totalPay = 0;
        $dollarRate = 0;
        $bdt = 0;
        if ($request->currency_type == "USD") {
            $totalPay = $request->pay_amount;
            $dollarRate = $request->dollar_rate;
            $totalAmount = $totalPay;
            $bdt = $totalPay * $dollarRate;
        }else{
            $totalAmount = $request->pay_amount;
            $bdt = $request->pay_amount;
        }

        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        $input['tok'] = $request->tok;
        $input['date'] = $request->date;
        $input['amount'] = $totalAmount;
        $input['currency_type'] = $request->currency_type;
        $input['dollar_rate'] = $dollarRate;
        $input['reason'] = 'Payment to '.  $firm->name;

        DB::beginTransaction();
        try{
            $bug=0;
            $budget= Budget::where('id',$request->budget_id)->increment('payment',$input['amount']);
            $budgetdetail= BudgetDetail::create([
                'project_id' => $input['project_id'],
                'firm_id' => $input['firm_id'],
                'bank_id' => $input['bank_id'],
                'amount' => $bdt,
                'dollar_rate' => $input['dollar_rate'],
                'currency_type' => $input['currency_type'],
                'reason' => $input['reason'],
                'date' => $input['date'],
                'tok' => $input['tok'],
                'status' => $input['status'],
                'created_by' => $input['created_by'],
                ]);
            $transaction = TransactionReport::create([
                'bank_id' => $input['bank_id'], 
                'transaction_date' => $input['date'], 
                'amount' => $bdt, 
                'keyword' => $budgetdetail->id, 
                'reason' => $input['reason'], 
                'note' => 'payment', 
                'tok' =>  $input['tok'], 
                'status' =>  $input['status'], 
                'created_by' =>$input['created_by']
            ]);
            //--------- check project --------------//
            $getProject = Budget::select('project_id','firm_id')->where('id',$request->budget_id)->first();
            $project = BudgetRecovery::where('project_id',$getProject->project_id)->count();
            if ($project == 1) {
                BudgetRecovery::where('project_id', $getProject->project_id)->increment('amount', $bdt);
                BudgetRecovery::where('project_id', $getProject->project_id)->increment('total_amount', $bdt);
            } else {
                $recovery = BudgetRecovery::create([
                    'project_id' => $getProject->project_id, 
                    'firm_id' => $getProject->firm_id, 
                    'implementing_agency_id' => $getProject->project->implementing_agency_id,
                    'amount' => $bdt,  
                    'total_amount' => $bdt,  
                    'date' => $input['date'], 
                    'tok' =>  $input['tok'], 
                    'status' =>  $input['status'], 
                    'created_by' =>$input['created_by']
                ]);
            }
            $decrementBank = BankAccount::where('id',$request->bank_id)->decrement('balance',$bdt);
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage());
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Payment Successfully Added !');
            return redirect()->route('budget-payment.index')->with('status_color','success');
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
        $data['single_data']= BudgetDetail::find($id);
        $data['allbank'] = BankAccount::all();
        return view ('budget.payment-edit-form',$data);
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
        $data=BudgetDetail::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'pay_amount' => 'required',
            'bank_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();

        $totalAmount = 0;
        $totalPay = 0;
        $dollarRate = 0;
        $bdt = 0;
        if ($request->currency_type == "USD") {
            $totalPay = $request->pay_amount;
            $dollarRate = $request->dollar_rate;
            $totalAmount = $totalPay;
            $bdt = $totalPay * $dollarRate;
        }else{
            $totalAmount = $request->pay_amount;
            $bdt = $request->pay_amount;
        }
        try{
            $bug=0;

            //----------------------------------- budget table dec/inc ------------------------//
             if ($data->currency_type == "USD") {
                $budgetDec = Budget::where('tok',$data->tok)->decrement('payment',($data->amount / $data->dollar_rate));
                $budgetInc = Budget::where('tok',$data->tok)->increment('payment',$request->pay_amount);
                
                BudgetRecovery::where('project_id',$data->project_id)->decrement('amount',$data->amount);
                BudgetRecovery::where('project_id',$data->project_id)->decrement('total_amount',$data->amount);
                  
                BudgetRecovery::where('project_id',$data->project_id)->increment('amount',$bdt);
                BudgetRecovery::where('project_id',$data->project_id)->increment('total_amount',$bdt);
            } else {
                $budgetDec = Budget::where('tok',$data->tok)->decrement('payment',$data->amount);
                $budgetInc = Budget::where('tok',$data->tok)->increment('payment',$request->pay_amount); 
                
                BudgetRecovery::where('project_id',$data->project_id)->decrement('amount',$data->amount);
                BudgetRecovery::where('project_id',$data->project_id)->decrement('total_amount',$data->amount);
                  
                BudgetRecovery::where('project_id',$data->project_id)->increment('amount',$bdt);
                BudgetRecovery::where('project_id',$data->project_id)->increment('total_amount',$bdt);
            }

            //----------------------------------- bank table dec/inc ------------------------//
            $bankDec = BankAccount::where('id',$data->bank_id)->increment('balance',$data->amount);
            $bankInc = BankAccount::where('id',$request->bank_id)->decrement('balance',$bdt);

            //----------------------------------- transaction table update ------------------------//
            $transaction = TransactionReport::where([['tok',$data->tok],['keyword',$data->id]])->update([
                'bank_id' =>  $request->bank_id,
                'amount' => $bdt,
                'transaction_date' =>  $request->date,
            ]);

            //----------------------------------- budget details table update ------------------------//
            $data->update([
                'bank_id' =>  $request->bank_id,
                'amount' => $bdt,
                'dollar_rate' => $dollarRate,
                'date' =>  $request->date,
            ]);
        }catch(\Exception $e){
            dd($e->getMessage());
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Payment Successfully Updated !');
            return redirect()->route('budget-payment-amendment')->with('status_color','warning');
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
        $data = BudgetDetail::findOrFail($id);

          //----------------------------------- budget table dec ------------------------//
          if ($data->currency_type == 'USD'){
              $budgetDec = Budget::where('tok',$data->tok)->decrement('payment',($data->amount / $data->dollar_rate));
              
              BudgetRecovery::where('project_id',$data->project_id)->decrement('amount',$data->amount);
              BudgetRecovery::where('project_id',$data->project_id)->decrement('total_amount',$data->amount);
              
          }else{
              $budgetDec = Budget::where('tok',$data->tok)->decrement('payment',$data->amount);
              
              BudgetRecovery::where('project_id',$data->project_id)->decrement('amount',$data->amount);
              BudgetRecovery::where('project_id',$data->project_id)->decrement('total_amount',$data->amount);
          }

          //----------------------------------- bank table inc ------------------------//
          $bankDec = BankAccount::where('id',$data->bank_id)->increment('balance',$data->amount);

          //----------------------------------- transaction table delete ------------------------//
          $transaction = TransactionReport::where([['tok',$data->tok],['keyword',$data->id]])->delete();

          //----------------------------------- budget details table delete ------------------------//
          $action = $data->delete();

        if($action){
            Session::flash('flash_message','Payment Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    //--------------------------- payment form -------------------//
    public function paymentForm($id)
    {
        Gate::authorize('app.ppptafFund.index');
        $data['allbank'] = BankAccount::all();
        $data['single_data'] = Budget::where('id',$id)->first();
        return view ('budget.payment-form',$data);
    }

    //--------------------------- payment report -------------------//
    public function budgetPaymentReport(Request $request)
    {
        Gate::authorize('app.ppptafFund.report');
        if ($request->ajax()) {
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $alldata= BudgetDetail::with(['project','project.phase','project.sector','project.ministry','firm','budget'])
                                ->where('reason','like','%Payment to%')
                                ->whereBetween('date',[date('Y-m-d',strtotime($request->start_date)),date('Y-m-d',strtotime($request->end_date))])
                                ->orderBy('id', 'desc')
                                ->get();
                return DataTables::of($alldata)
                ->addIndexColumn()->make(True);
            }else{
                $alldata= BudgetDetail::with(['project','project.phase','project.sector','project.ministry','firm','budget'])
                                ->where('reason','like','%Payment to%')
                                ->orderBy('id', 'desc')
                                ->get();
                return DataTables::of($alldata)
                ->addIndexColumn()->make(True);
            }
        }
        return view ('budget.budget-payment-report');
    }

    //--------------------------- payment amendment -------------------//
    public function budgetPaymentAmendment(Request $request)
    {
        Gate::authorize('app.ppptafFund.amendment');
        if ($request->ajax()) {
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $alldata= BudgetDetail::with(['project','project.phase','project.sector','project.ministry','firm','budget'])
                                ->where('reason','like','%Payment to%')
                                ->whereBetween('date',[date('Y-m-d',strtotime($request->start_date)),date('Y-m-d',strtotime($request->end_date))])
                                ->orderBy('id', 'desc')
                                ->get();
                return DataTables::of($alldata)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    ob_start() ?>
    
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="<?php echo route('budget-payment.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                        </li>
                    </ul>
    
        <?php return ob_get_clean();
                })->make(True);
            }else{
                $alldata= BudgetDetail::with(['project','project.phase','project.sector','project.ministry','firm','budget'])
                                ->where('reason','like','%Payment to%')
                                ->orderBy('id', 'desc')
                                ->get();
                return DataTables::of($alldata)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    ob_start() ?>
    
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="<?php echo route('budget-payment.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                        </li>
                    </ul>
    
        <?php return ob_get_clean();
                })->make(True);
            }
        }
        return view ('budget.budget-payment-amendment');
    }
}
