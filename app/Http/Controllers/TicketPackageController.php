<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketPackage;
use App\Models\TicketPackageDetail;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class TicketPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allticket']= Ticket::orderBy('id', 'DESC')->get();
        $data['alldata']= TicketPackage::orderBy('id', 'DESC')->get();
        return view('ticket.ticket-package', $data);
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
            $insert= TicketPackage::create($input);
            foreach ($request->addmore as $value) {
                $insertdetails= TicketPackageDetail::create([
                    'ticket_id' => $value['ticket_id'],
                    'tok' => $input['tok'],
                    'status' => $input['status'],
                    'created_by' => $input['created_by'],
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Ticket Package Successfully Added !');
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
        $data['allticket']= Ticket::get();
        $data['single_data']= TicketPackage::find($id);
        $data['packagedetails']= TicketPackageDetail::where('tok',$data['single_data']->tok)->get();
        $data['alldata']= TicketPackage::orderBy('id', 'DESC')->paginate(15);
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('ticket.ticket-package', $data);
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
        $data=TicketPackage::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();
        $input['status'] = 1;
        $input['created_by'] = Auth::id();
        try{
            $bug=0;
            $data->update($input);
            //------------- delete package ---------------// 
            $details = TicketPackageDetail::where('tok',$data->tok)->delete();
            //------------- insert agian package ---------------// 
            foreach ($request->addmore as $value) {
                $insertdetails= TicketPackageDetail::create([
                    'ticket_id' => $value['ticket_id'],
                    'tok' => $data->tok,
                    'status' => $input['status'],
                    'created_by' => $input['created_by'],
                ]);
            }
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Ticket Package Successfully Updated !');
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
        $data = TicketPackage::findOrFail($id);
        $details = TicketPackageDetail::where('tok',$data->tok)->delete();
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Ticket Package Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
}
