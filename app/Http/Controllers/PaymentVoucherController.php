<?php

namespace App\Http\Controllers;

use App\Models\BudgetDetail;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\OtherPaymentType;
use App\Models\OtherPaymentSubType;
use App\Models\BankAccount;
use App\Models\OtherPaymentVoucher;
use App\Models\Transaction;
use App\Models\TransactionReport;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Auth;
use DB;
include(app_path() . '/library/common.php');

use App\Exports\PaymentVoucherExport;
use Maatwebsite\Excel\Facades\Excel;

class PaymentVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.ppptafExpense.index');
        $data['allproject'] = Project::all();
        $data['alltype']= OtherPaymentType::where('status', '1')->get();
        $data['allbank']= BankAccount::where('status', '1')->get();
        return view('otherPayment.voucher', $data);
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
        Gate::authorize('app.ppptafExpense.create');
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'payment_type_id' => 'required',
            'payment_sub_type_id' => 'required',
            'amount' => 'required|numeric|gt:0',
            'payment_date' => 'required',
            'bank_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');
        $input['status'] = 1;
        $input['payment_date'] = dateFormateForDB($request->payment_date);

        DB::beginTransaction();
        try{
            $bug=0;
            //----------------------- get project detail ---------------------//
            $getProjectInfo = Project::select('id','name')->where('id',$request->project_id)->first();
            $insert= OtherPaymentVoucher::create($input);

            $update=DB::table('bank_accounts')->where('id', $request->bank_id)->decrement('balance', $request->amount);

            // get payment type name
            $paymentTypeName=DB::table('other_payment_types')->where('id', $request->payment_type_id)->first();

            if(!empty($request->payment_sub_type_id)){
                $paymentSubTypeName=DB::table('other_payment_sub_types')->where('id', $request->payment_sub_type_id)->first();
            }

             //-------------------- budget details table ------------------//
             $budgetdetail= BudgetDetail::create([
                'project_id' => $getProjectInfo->id, 
                'bank_id' => $request->bank_id,
                'amount' => $request->amount,
                'reason' => 'Expense for ' .$getProjectInfo->name. '('.$paymentTypeName->name.' - '.$paymentSubTypeName->name.')',
                'date' => $request->payment_date,
                'tok' => $input['tok'],
                'status' =>  $input['status'], 
                'created_by' => $input['created_by']
            ]);

            $insertIntoReportForReceive = TransactionReport::create([
                'bank_id'=>$request->bank_id,
                'transaction_date'=>dateFormateForDB($request->payment_date),
                'reason'=>'Expense(for '.$paymentTypeName->name.' - '.$paymentSubTypeName->name.')',
                'keyword'=>'Expense For '.$paymentSubTypeName->name,
                'amount'=>$request->amount,
                'note'=>$request->note,
                'tok'=>$input['tok'],
                'status'=>'1',
                'created_by'=>Auth::id()
            ]);

            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage());
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Payment Voucher Successfully Added !');
            return redirect()->route('payment-voucher-report')->with('status_color','success');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findPaymentSubTypeWithType(Request $request)
    {
        $subType = OtherPaymentSubType::where('payment_type_id',$request->id)->get();
        return Response::json($subType);
        die;
    }
    public function report(Request $request)
    {
        Gate::authorize('app.ppptafExpense.report');
        if ($request->ajax()) {
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $alldata = OtherPaymentVoucher::with(['project', 'otherpayment_bank_object', 'otherpayment_type_object', 'otherpayment_subtype_object'])
                    ->whereBetween('payment_date', [date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date))])
                    ->get();
                return DataTables::of($alldata)
                    ->addIndexColumn()->make(True);
            } else {
                $alldata = OtherPaymentVoucher::with(['project', 'otherpayment_bank_object', 'otherpayment_type_object', 'otherpayment_subtype_object'])
                    ->get();
                return DataTables::of($alldata)
                    ->addIndexColumn()->make(True);
            }
        }
        return view('otherPayment.voucherReport');
    }
}
