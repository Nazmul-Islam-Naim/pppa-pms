@extends('layouts.layout')
@section('title', 'Extra Percent Form')
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
            <div class="card-title">Extra Percent Form</div>
          </div>
          {!! Form::open(array('route' =>['add-extra-percent.store'],'method'=>'POST','files'=>true)) !!}
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
                        <input type="text" name="" autocomplete="off" class="form-control" value="{{$single_data->agency->name}}" readonly="">
                        <div class="field-placeholder">Implementing Agency</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="text" name="" id="contract_amount" autocomplete="off" class="form-control" value="{{$single_data->amount}}" readonly="">
                        <div class="field-placeholder">Contract Amount</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="number" name="extra_percent" id="extra_percent" step="any" class="form-control" value="" onkeyup="setTotal()" required=""autocomplete="off" >
                        <div class="field-placeholder">Add Extra(%)<span class="text-danger">*</span></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="text" name="extra_amount" id="extra_amount" autocomplete="off" class="form-control" value="" readonly="">
                        <div class="field-placeholder">Extra Amount</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <input type="text" name="total_amount" id="total_amount" autocomplete="off" class="form-control" value="" readonly="">
                        <div class="field-placeholder">Total Amount</div>
                      </div>
                    </div>
                    <div class="col-md-6">  
                      <div class="field-wrapper">
                        <input type="date" name="date" autocomplete="off" class="form-control" value="" required="">
                        <div class="field-placeholder">{{ __('home.date') }} <span class="text-danger">*</span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="card-footer text-end">
            <a href="{{route('add-extra-percent.index')}}" class="btn btn-warning">Cancle</a>
            <button type="submit" class="btn btn-primary">Add</button>
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
  function setTotal() {
    var amount = parseFloat(document.getElementById('contract_amount').value);
    var percent = parseFloat(document.getElementById('extra_percent').value);
    document.getElementById('extra_amount').value = Math.round(((amount * percent)/100));
    document.getElementById('total_amount').value = Math.round(amount + ((amount * percent)/100));
  }
  
</script>
@endsection 