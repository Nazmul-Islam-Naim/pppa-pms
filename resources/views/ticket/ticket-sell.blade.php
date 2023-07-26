@extends('layouts.layout')
@section('title', 'Ticket Sell')
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
      @if(!empty($allpackage))
      @foreach($allpackage as $package)
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <!-- Card start -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$package->name}}</h5>
            <p class="card-title">{{$package->amount}} tk</p>
            <a href="#editModal{{$package->id}}" data-bs-toggle="modal" class="btn btn-primary">Sell</a>
            <!-- Start Modal for edit cheque book -->
            <div class="modal fade" id="editModal{{$package->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Sell Ticket</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  {!! Form::open(array('route' =>['ticket-sell.store'],'method'=>'POST')) !!}
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <input class="form-control" type="text" name="name" value="{{$package->name}}" required="" readonly="" autocomplete="off">
                            <input class="form-control" type="hidden" name="package_id" value="{{$package->id}}"   autocomplete="off">
                            <input class="form-control" type="hidden" name="package_tok" value="{{$package->tok}}"   autocomplete="off">
                            <input class="form-control" type="hidden" name="amount" id="amount_{{$package->id}}" value="{{$package->amount}}"   autocomplete="off">
                          </div>
                          <div class="field-placeholder">Name </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <input class="form-control" type="number" name="quantity" id="quantity_{{$package->id}}" value="" onkeyup="totalCalculation({{$package->id}})" required="" autocomplete="off">
                          </div>
                          <div class="field-placeholder">Quantity <span class="text-danger">*</span></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <input class="form-control" type="number" name="total" id="total_{{$package->id}}" value="" required="" readonly="" autocomplete="off">
                          </div>
                          <div class="field-placeholder">Total <span class="text-danger">*</span></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <select name="bank_id" class="form-control select2" required> 
                              <option value="">Select</option>
                              @foreach($allbank as $bank)
                              <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="field-placeholder">Receive Method <span class="text-danger">*</span></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <input class="form-control datepicker" type="text" name="date" value="" required="" autocomplete="off">
                          </div>
                          <div class="field-placeholder">Date <span class="text-danger">*</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    {{Form::submit('Sell',array('class'=>'btn btn-success btn-sm', 'style'=>'width:15%'))}}
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
            <!-- End Modal for edit cheque book -->
          </div>
        </div>
        <!-- Card end -->
      </div>
      @endforeach
      @endif
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
<script>
  function totalCalculation(id) {
    var ticket = parseFloat(document.getElementById('quantity_'+id).value);
    var amount = parseFloat(document.getElementById('amount_'+id).value);
    
    document.getElementById('total_'+id).value = ticket * amount;
  }
</script>
@endsection 