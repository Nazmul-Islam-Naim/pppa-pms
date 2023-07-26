@extends('layouts.layout')
@section('title', 'Budget Payment')
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
        @include('common.commonFunction')
      </div>
  
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">Budget Payment</h3>
            </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="copy-print-csv" style="width:100%"> 
                    <thead> 
                      <tr> 
                        <th>SL</th>
                        <th>Project Name</th>
                        <th>Name of Firm</th>
                        <th>Sector</th>
                        <th>Ministy</th>
                        <th>Stage</th>
                        <th>Currency</th>
                        <th>Contract Amount</th>
                        <th>Payment</th>
                        <th>Recovery</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sl =0; ?>
                        @foreach($alldata as $data)
                        <?php $sl++; ?>
                        <tr>
                          <td>{{$sl}}</td>
                          <td>{{$data->project->name}}</td>
                          <td>{{$data->firm->name}}</td>
                          <td>{{$data->project->sector->name}}</td>
                          <td>{{$data->project->ministry->name}}</td>
                          <td>{{!empty($data->project->phase)? $data->project->phase->name:''}}</td>
                          <td>{{$data->currency_type}}</td>
                          <td>{{$data->contract_amount}}</td>
                          <td>{{$data->payment}}</td>
                          <td>{{$data->recovery}}</td>
                          <td>
                          <a href="{{route('payment-form',$data->id)}}"  class="badge bg-primary badge-sm" >Payment</a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <div class="card-footer"></div>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
<script>
function paymentCheck(due,pay) {
  var d = parseFloat(due);
  var p = parseFloat(pay);
  if(p>d){
    alert('Payment is greater then due');
    document.getElementById('pay_amount').value = 0;
  }
}

</script>
@endsection 