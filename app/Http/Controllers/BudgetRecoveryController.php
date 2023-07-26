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

class BudgetRecoveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('app.fundRecovery.index');
        if ($request->ajax()) {
            $alldata= BudgetRecovery::with(['project','firm','agency','project.ministry','project.phase'])
                            ->whereColumn('total_amount','!=', 'recover_amount')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('recovery-form', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>">Recover</a>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('recovery.recovery-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.fundRecovery.create');
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
        Gate::authorize('app.fundRecovery.create');
        $validator = Validator::make($request->all(), [
            'recover_amount' => 'required',
            'bank_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color', 'warning');
        }

        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');

        DB::beginTransaction();
        try{
            $bug=0;
            //--------------------- budget recovery table ----------//
            $getBudgetInfo = BudgetRecovery::where('id', $request->recovery_id)->first();

            BudgetRecovery::where('id', $request->recovery_id)->increment('recover_amount',$request->recover_amount);
            BudgetRecovery::where('id', $request->recovery_id)->decrement('total_amount',$request->recover_amount);

            //-------------------- budget details table ------------------//
            $budgetdetail= BudgetDetail::create([
                'project_id' => $getBudgetInfo->project_id, 
                'firm_id' =>  $getBudgetInfo->firm_id,
                'bank_id' => $request->bank_id,
                'amount' => $request->recover_amount,
                'reason' => 'Recover From ' .$getBudgetInfo->project->agency->name,
                'date' => $request->date,
                'tok' =>  $input['tok'],
                'status' =>  $input['status'], 
                'created_by' => $input['created_by']
            ]);
            $transaction = TransactionReport::create([
                'bank_id' => $request->bank_id, 
                'transaction_date' => $request->date, 
                'amount' => $request->recover_amount, 
                'keyword' => $budgetdetail->id, 
                'reason' => 'Recover From ' .$getBudgetInfo->project->agency->name, 
                'note' => 'recover', 
                'tok' =>  $input['tok'],
                'status' =>  $input['status'], 
                'created_by' =>$input['created_by']
            ]);
            $incrementBank = BankAccount::where('id',$request->bank_id)->increment('balance', $request->recover_amount);
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage());
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Payment Successfully Recovered !');
            return redirect()->route('recovery.index')->with('status_color','success');
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
        Gate::authorize('app.fundRecovery.edit');
        $data['allbank'] = BankAccount::all();
        $data['single_data'] = BudgetDetail::where('id',$id)->first();
       return view ('recovery.recovery-form-edit',$data);
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
        Gate::authorize('app.fundRecovery.edit');
        $validator = Validator::make($request->all(), [
            'recover_amount' => 'required',
            'bank_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color', 'warning');
        }

        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();

        DB::beginTransaction();
        try{
            $bug=0;
            //---------------------- get detail ----------------//
            $detailId = BudgetDetail::where('id', $id)->first();

            //--------------------- previous budget recovery table ----------//

            BudgetRecovery::where('project_id', $detailId->project_id)->decrement('recover_amount',$detailId->amount);
            BudgetRecovery::where('project_id', $detailId->project_id)->increment('total_amount',$detailId->amount);

            //--------------------- new budget recovery table ----------//

            BudgetRecovery::where('tok', $detailId->tok)->increment('recover_amount',$request->recover_amount);
            BudgetRecovery::where('tok', $detailId->tok)->decrement('total_amount',$request->recover_amount);

            //--------------------- bank account----------//
            
            BankAccount::where('id',$detailId->bank_id)->decrement('balance', $detailId->amount); // pre
            BankAccount::where('id',$request->bank_id)->increment('balance', $request->recover_amount); // new

            //---------------------- transaction update ----------------------//

            TransactionReport::where('keyword',$detailId->id)->update([
                'bank_id' => $request->bank_id, 
                'transaction_date' => $request->date, 
                'amount' => $request->recover_amount,  
            ]);
            //-------------------- budget details table ------------------//
            $detailId->update([
                'bank_id' => $request->bank_id,
                'amount' => $request->recover_amount,
                'date' => $request->date,
            ]);
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage());
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Payment Successfully Recovered !');
            return redirect()->route('recovery-amendment')->with('status_color','success');
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
        Gate::authorize('app.fundRecovery.destroy');

        //---------------------- get detail ----------------//
        $detailId = BudgetDetail::where('id', $id)->first();

        //--------------------- previous budget recovery table ----------//

        BudgetRecovery::where('project_id', $detailId->project_id)->decrement('recover_amount',$detailId->amount);
        BudgetRecovery::where('project_id', $detailId->project_id)->increment('total_amount',$detailId->amount);

        //--------------------- bank account----------//
        
        BankAccount::where('id',$detailId->bank_id)->decrement('balance', $detailId->amount); // pre

        //---------------------- transaction update ----------------------//

        TransactionReport::where('keyword', $detailId->id)->delete();
        //-------------------- budget details table ------------------//
        $detailId->delete();

        if($detailId){
            Session::flash('flash_message','Recovered Successfully Deleted !');
            return redirect()->route('recovery-amendment')->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

   //------------------ recovery form -----------------//
    
   public function recoveryForm($id)
   {
    Gate::authorize('app.fundRecovery.create');
       $data['allbank'] = BankAccount::all();
       $data['single_data'] = BudgetRecovery::where('id',$id)->first();
       return view ('recovery.recovery-form',$data);
   }

    //--------------------------- recovery report -------------------//
    public function recoveryReport(Request $request)
    {
        Gate::authorize('app.fundRecovery.report');
        if ($request->ajax()) {
            $alldata= BudgetRecovery::with(['project','firm','agency','project.ministry','project.phase'])
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view ('recovery.recovery-report');
    }

    //--------------------------- recovery amendment -------------------//
    public function recoveryAmendment(Request $request)
    {
        Gate::authorize('app.fundRecovery.amendment');
        if ($request->ajax()) {
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $alldata= BudgetDetail::with(['project','firm','project.agency','project.ministry','project.phase'])
                                ->where('reason','like','%Recover from%')
                                ->whereBetween('date',[date('Y-m-d',strtotime($request->start_date)),date('Y-m-d',strtotime($request->end_date))])
                                ->orderBy('id', 'desc')
                                ->get();
                return DataTables::of($alldata)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    ob_start() ?>
    
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="<?php echo route('recovery.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                        </li>
                    </ul>
    
        <?php return ob_get_clean();
                })->make(True);
            }else{
                $alldata= BudgetDetail::with(['project','firm','project.agency','project.ministry','project.phase'])
                                ->where('reason','like','%Recover from%')
                                ->orderBy('id', 'desc')
                                ->get();
                return DataTables::of($alldata)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    ob_start() ?>
    
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="<?php echo route('recovery.edit', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>"><i class="icon-edit-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <button data-id="<?php echo $row->id; ?>" class="badge bg-danger badge-sm button-delete"><i class="icon-delete"></i></button>
                        </li>
                    </ul>
    
        <?php return ob_get_clean();
                })->make(True);
            }
        }
        return view ('recovery.recovery-amendment');
    }
}
