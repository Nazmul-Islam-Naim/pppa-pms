@extends('layouts.layout')
@section('title', 'Recovery Edit Form')
@section('content')
<!-- Content Header (Page header) -->
<?php
  $baseUrl = URL::to('/');
?>
<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

  <!-- Content wrapper start -->
  <div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @include('common.message')
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Recovery Edit Form</div>
          </div>
          {!! Form::open(array('route' =>['recovery.update',$single_data->id],'method'=>'PUT','files'=>true)) !!}
          <div class="card-body">
            <div class="col-md-12">
              <div class="form-inline">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="field-wrapper">
                        <input type="text" name="" autocomplete="off" class="form-control" value="{{$single_data->project->name}}" readonly="">
                        <input type="hidden" name="recovery_id" autocomplete="off" class="form-control" value="{{$single_data->id}}" readonly="">
                        <input type="hidden" name="tok" autocomplete="off" class="form-control" value="{{$single_data->tok}}" readonly="">
                        <div class="field-placeholder">Project</div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="field-wrapper">
                        <input type="text" name="" autocomplete="off" class="form-control" value="{{$single_data->firm->name}}" readonly="">
                        <div class="field-placeholder">Firm</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="text" name="" autocomplete="off" class="form-control" value="{{$single_data->project->agency->name}}" readonly="">
                        <div class="field-placeholder">Implementing Agency</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="text" name="" id="contract_amount" autocomplete="off" class="form-control" value="{{$single_data->recoveryAmount->amount}}" readonly="">
                        <div class="field-placeholder">Contract Amount</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="text" name="total_amount" id="total_amount" autocomplete="off" class="form-control" value="{{$single_data->recoveryAmount->total_amount}}" readonly="">
                        <div class="field-placeholder">Recovery Amount</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="number" name="recover_amount" id="recover_amount" step="any" class="form-control" value="{{$single_data->amount}}" onkeyup="setValue()" required=""autocomplete="off" >
                        <div class="field-placeholder">Amount<span class="text-danger">*</span></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <select name="bank_id" id="bank_id" class="form-control" required="">
                          <option value="">Select</option>
                          @foreach ($allbank as $bank)
                          <option value="{{$bank->id}}" {{($single_data->bank_id == $bank->id) ? 'selected' : ''}}>{{$bank->bank_name}}</option>
                          @endforeach
                        </select>
                        <div class="field-placeholder">Account</div>
                      </div>
                    </div>
                    <div class="col-md-6">  
                      <div class="field-wrapper">
                        <input type="date" name="date" autocomplete="off" class="form-control" value="{{$single_data->date}}" required="">
                        <div class="field-placeholder">{{ __('home.date') }} <span class="text-danger">*</span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="card-footer text-end">
            <a href="{{route('recovery.index')}}" class="btn btn-warning">Cancle</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->

<script>
  function setValue() {
    var recoverAmount = parseFloat(document.getElementById('recover_amount').value);
    var totalAmount = parseFloat(document.getElementById('total_amount').value);
    if (recoverAmount > totalAmount) {
      alert('Value is too long !');
      document.getElementById('recover_amount').value = 0;
    }
  }
  
</script>
@endsection 