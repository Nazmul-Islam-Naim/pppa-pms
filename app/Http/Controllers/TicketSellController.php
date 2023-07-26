<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketPackage;
use App\Models\TicketPackageDetail;
use App\Models\BankAccount;
use App\Models\TicketSell;
use App\Models\TransactionReport;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class TicketSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allbank']= BankAccount::get();
        $data['allpackage']= TicketPackage::orderBy('id', 'DESC')->get();
        return view('ticket.ticket-sell', $data);
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
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'bank_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');

        DB::beginTransaction();
        try{
            $bug=0;
            $insert= TicketSell::create($input);
            // updating bank balance
            $update=DB::table('bank_accounts')->where('id', $request->bank_id)->increment('balance', $request->total);

            $insertIntoReport = TransactionReport::create([
                'bank_id'=>$request->bank_id,
                'transaction_date'=>$request->date,
                'reason'=>'receive(sell ticket)',
                'amount'=>$request->total,
                'tok'=> $input['tok'],
                'status'=>'1',
                'created_by'=>Auth::id()
            ]);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        //---------------- find last sell id --------------------//
        $sellid = TicketSell::orderBy('id','desc')->first();

        if($bug==0){
            // Session::flash('flash_message','Ticket Package Successfully Added !');
            // return redirect()->back()->with('status_color','success');
            return redirect()->route('ticket-invoice',$sellid->id);
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

    //--------------- ticket sell report -----------------//
    public function ticketSellReport()
    {
        $data['allpackage']= TicketPackage::orderBy('id', 'DESC')->get();
        $data['alldata']= TicketSell::orderBy('id', 'DESC')->paginate(250);
        return view('ticket.ticket-sell-report', $data);
    }

    public function filterTicketSellReport(Request $request)
    {
        if(($request->start_date != '' && $request->end_date != '') && $request->package_id != ''){
            $data['allpackage']= TicketPackage::orderBy('id', 'DESC')->get();
            $data['alldata']= TicketSell::where('package_id',$request->package_id)
                                        ->whereBetween('date',[$request->start_date, $request->end_date])
                                        ->orderBy('id', 'DESC')
                                        ->paginate(250);
            return view('ticket.ticket-sell-report', $data);
        }elseif($request->start_date != '' && $request->end_date != ''){
            $data['allpackage']= TicketPackage::orderBy('id', 'DESC')->get();
            $data['alldata']= TicketSell::whereBetween('date',[$request->start_date, $request->end_date])
                                        ->orderBy('id', 'DESC')
                                        ->paginate(250);
            return view('ticket.ticket-sell-report', $data);
        }elseif($request->package_id != ''){
            $data['allpackage']= TicketPackage::orderBy('id', 'DESC')->get();
            $data['alldata']= TicketSell::where('package_id',$request->package_id)
                                        ->orderBy('id', 'DESC')
                                        ->paginate(250);
            return view('ticket.ticket-sell-report', $data);
        }else{
            $data['allpackage']= TicketPackage::orderBy('id', 'DESC')->get();
            $data['alldata']= TicketSell::orderBy('id', 'DESC')->paginate(250);
            return view('ticket.ticket-sell-report', $data);
        }    
    }

    //---------------------- ticket invoice ------------------------//
    public function ticketInvoice($id)
    {
        $data['singlesell']= TicketSell::where('id',$id)->first();
        $data['pacagedetails']= TicketPackageDetail::where('tok',$data['singlesell']->package_tok)->get();
        return view('ticket.ticket-invoice', $data);   
    }
}
