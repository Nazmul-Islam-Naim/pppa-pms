<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\FAQ;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gate::authorize('app.FAQ.index');
        $data['alldata']= FAQ::orderBy('id', 'DESC')->get();
        return view('utility.faq', $data);
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
        // Gate::authorize('app.FAQ.create');
        
        $input = $request->all();
        $input['slug'] = Str::slug($input['question']);
        
        $validator = Validator::make($input, [
            'question' => 'required|max:255',
            'slug' => 'required | unique:f_a_q_s,slug',
            'answer' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        DB::beginTransaction();
        try{
            $bug=0;
            $insert= FAQ::create($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','FAQ Successfully Added !');
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
        // Gate::authorize('app.FAQ.edit');
        $data['single_data']= FAQ::find($id);
        $data['alldata']= FAQ::orderBy('id', 'DESC')->paginate(15);
        return view('utility.faq', $data);
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
        // Gate::authorize('app.FAQ.edit');
        $data=FAQ::findOrFail($id);

        $input = $request->all();
        $input['slug'] = Str::slug($input['question']);

        $validator = Validator::make($input, [
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        try{
            $bug=0;
            $data->update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','FAQ Successfully Updated !');
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
        // Gate::authorize('app.FAQ.destroy');
        $data = FAQ::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','FAQ Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
}
