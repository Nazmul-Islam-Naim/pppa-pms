@extends('layouts.layout')
@section('title', 'Payment Form')
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
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        
        {!! Form::open(array('route' =>['budget-payment.store'],'method'=>'POST','files'=>true,'enctype'=>'multipart/form-data')) !!}
        <div class="card">
          <div class="card-header">
            <div class="card-title">Payment</div>
          </div>
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!----------------- project -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="text" class="form-control" value="{{$single_data->project->name}}" readonly="">
                    <input type="hidden" value="{{$single_data->project_id}}" name="project_id">
                    <input type="hidden" value="{{$single_data->id}}" name="budget_id">
                    <input type="hidden" value="{{$single_data->tok}}" name="tok">
                  </div>
                  <div class="field-placeholder">Project Name</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!----------------- firm -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="text" class="form-control" value="{{$single_data->firm->name}}" readonly="">
                    <input type="hidden" value="{{$single_data->firm_id}}" name="firm_id">
                  </div>
                  <div class="field-placeholder">Firm Name</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!----------------- contract amount -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="number" class="form-control" value="{{$single_data->contract_amount}}" readonly="">
                  </div>
                  <div class="field-placeholder">Contract Amount</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!----------------- due amount -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="number" class="form-control" value="{{$single_data->contract_amount - $single_data->payment}}" onkeyup="paymentCheck(this.value, pay_amount.value)" id="due_amount" readonly="">
                  </div>
                  <div class="field-placeholder">Due Amount</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!----------------- currency type -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="text" class="form-control" value="{{$single_data->currency_type}}" readonly="">
                    <input type="hidden" value="{{$single_data->currency_type}}" name="currency_type" id="currency_type">
                  </div>
                  <div class="field-placeholder">Currency</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!----------------- pay amount -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="number" step="any" name="pay_amount" id="pay_amount" onkeyup="paymentCheck(due_amount.value ,this.value);currencyConvertion(dollar_rate.value,this.value)" class="form-control" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Pay Amount<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- dolar Rate -------------------------->
              @if($single_data->currency_type == "USD")
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="number" name="dollar_rate" id="dollar_rate" onkeyup="currencyConvertion(this.value ,pay_amount.value)" class="form-control" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Dollar Rate<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="number" name="bdt_amount" id="bdt_amount"  class="form-control" readonly="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">BDT Amount</div>
                </div>
                <!-- Field wrapper end -->
              </div>
               @endif
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-----------------date -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d');?>" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Date<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-----------------payment method -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="bank_id" class="form-control" autocomplete="off" required="">
                      <option value="">Select</option>
                      @foreach($allbank as $bank)
                      <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Payment Method<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
            </div>
            <!-- Row end -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button class="btn btn-primary" type="submit" >Submit</button>
           <a href="{{route('budget-payment.index')}}" class="btn btn-warning">Back</a>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
<script>
function paymentCheck(due,pay) {
  var d = parseFloat(due);
  var p = parseFloat(pay);
  if(p>d){
    alert('Payment is greater then due');
    document.getElementById('pay_amount').value = 0;
  }
}

function currencyConvertion(pay,rate) {
  var p = parseFloat(pay);
  var r = parseFloat(rate);
  if(isNaN(p) || isNaN(r)){
    document.getElementById('bdt_amount').value = 0;
  }else{
    document.getElementById('bdt_amount').value = (p*r).toFixed(2);
  }
}

</script>
@endsection 