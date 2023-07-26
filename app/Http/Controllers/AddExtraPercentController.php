<?php

namespace App\Http\Controllers;

use App\Models\BudgetDetail;
use App\Models\BudgetRecovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DataTables;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class AddExtraPercentController extends Controller
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
                            ->where('status', '1')
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('add-extra-percent-form', $row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>">Add(%)</a>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('recovery.add-extra-percent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        
        Gate::authorize('app.fundRecovery.create');
            $validator = Validator::make($request->all(), [
                'extra_percent' => 'required | numeric',
                'date' => 'required',
            ]);
            if ($validator->fails()) {
                Session::flash('flash_message', $validator->errors());
                return redirect()->back()->with('status_color','warning');
            }


            $input = $request->all();
            $input['status'] = 1;
            $input['created_by'] = Auth::id();
            $input['date'] = $request->date;

            DB::beginTransaction();
            try{
                $bug=0;
                //------------------------- get previous info -----------------------//
                $prevInfo = BudgetRecovery::where('id',$request->recovery_id)->first();
                
                //------------------------- decrement and delete --------------------//
                $extraDec = BudgetRecovery::where('id', $prevInfo->id)->decrement('extra_percent', $prevInfo->extra_percent);
                $extraTot = BudgetRecovery::where('id', $prevInfo->id)->decrement('total_amount', (($prevInfo->amount * $prevInfo->extra_percent)/100));


                //-------------------------- increment and insert ---------------------//
                 BudgetRecovery::where('id', $prevInfo->id)->increment('extra_percent', $request->extra_percent);
                 BudgetRecovery::where('id', $prevInfo->id)->increment('total_amount', (($prevInfo->amount * $request->extra_percent)/100));
                 
                 $budgetDetails = BudgetDetail::where([['tok',$prevInfo->tok],['reason','like','%Extra Percent%']])->count();
                 $takeFirst = BudgetDetail::where([['tok',$prevInfo->tok],['reason','like','%Extra Percent%']])->first();
                 
                 if($budgetDetails > 0){
                    $takeFirst->update([
                        'project_id' => $prevInfo->project_id,
                        'firm_id' => $prevInfo->project_id,
                        'amount' => ($prevInfo->amount * $request->extra_percent) / 100,
                        'reason' => 'Extra Percent Amount to '.  $prevInfo->agency->name,
                        'date' => $request->date,
                        'tok' => $prevInfo->tok,
                        'currency_type' => 'BDT',
                        'status' => $input['status'],
                        'created_by' => $input['created_by']
                    ]);
                 }else{
                     BudgetDetail::create([
                        'project_id' => $prevInfo->project_id,
                        'firm_id' => $prevInfo->project_id,
                        'amount' => ($prevInfo->amount * $request->extra_percent) / 100,
                        'reason' => 'Extra Percent Amount to '.  $prevInfo->agency->name,
                        'date' => $request->date,
                        'tok' => $prevInfo->tok,
                        'currency_type' => 'BDT',
                        'status' => $input['status'],
                        'created_by' => $input['created_by']
                    ]);
                 }
                DB::commit();
            }catch(\Exception $e){
                dd($e->getMessage());
                $bug=$e->errorInfo[1];
                DB::rollback();
            }

            if($bug==0){
                Session::flash('flash_message','Extra Amount Successfully Added !');
                return redirect()->route('add-extra-percent.index')->with('status_color','success');
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
        // Gate::authorize('app.accounttype.edit');
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
        // Gate::authorize('app.accounttype.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Gate::authorize('app.accounttype.destroy');
        //
    }

    //------------------ extra percent form -----------------//
    
    public function extraPercentForm($id)
    {
        Gate::authorize('app.fundRecovery.index');
        $data['single_data'] = BudgetRecovery::where('id',$id)->first();
        return view ('recovery.extra-percent-add-update',$data);
    }
}
