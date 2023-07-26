@extends('layouts.layout')
@section('title', 'Budget Report')
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
    </div>
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ __('home.Search_Area') }}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12">
              <form method="post" action="{{ route('budget-report-filter', $singledata->id) }}" autocomplete="off">
              @csrf
                <div class="form-inline">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control " type="date" name="start_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">From </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control" type="date" name="end_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">

                          <input type="hidden" name="project_id" value="{{$singledata->id}}">
                        </div>
                        <div class="field-placeholder">To </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input type="submit" value="Search" class="btn btn-info btn-md">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Budget Report</h3>
                
            <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12" id="printTable">
              <center><h5 style="margin: 0px">Project Information</h5></center>
              <div class="table-responsive">
                <table class="" style="width: 100%; font-size: 12px;" cellspacing="0" cellpadding="0">
                  <thead> 
                    <tr> 
                      <td style="border: 1px solid #ddd; padding: 3px 3px">Project Name</td>
                      
                      <td style="border: 1px solid #ddd; padding: 3px 3px">{{$singledata->name}}</td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px">Sector</td>
                      
                      <td style="border: 1px solid #ddd; padding: 3px 3px">{{$singledata->sector->name}}</td>
                    </tr>
                    <tr> 
                      <td style="border: 1px solid #ddd; padding: 3px 3px">Department/Ministry</td>
                      
                      <td style="border: 1px solid #ddd; padding: 3px 3px">{{$singledata->ministry->name}}</td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px">Implementing Agency</td>
                      
                      <td style="border: 1px solid #ddd; padding: 3px 3px">{{$singledata->agency->name}}</td>
                    </tr>
                  </thead>
                </table>
              </div>
              <br>
              <center><h5 style="margin: 0px">Financial Information</h5></center>
              <div class="table-responsive">
                @if(!empty($start_date) && !empty($end_date))
                <center><h6 style="margin: 0px">From : {{dateFormateForView($start_date)}} To : {{dateFormateForView($end_date)}}</h6></center>
                @else
                <center><h6 style="margin: 0px">Date : {{date('d-m-Y')}}</h6></center>
                @endif
                <table class="" style="width: 100%; font-size: 12px;" cellspacing="0" cellpadding="0">  
                  <thead> 
                    <tr style="background: #ccc; color: #000"> 
                      <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.SL') }}</th>
                      <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.date') }}</th>
                      <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.reason') }}</th>
                      <th style="border: 1px solid #ddd; padding: 3px 3px">Bill(BDT/USD)</th>
                      <th style="border: 1px solid #ddd; padding: 3px 3px">Payment(BDT)</th>
                      <th style="border: 1px solid #ddd; padding: 3px 3px">Recover(BDT)</th>
                      <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.Balance') }}(BDT)</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php                           
                      $number = 1;
                      $numElementsPerPage = 250; // How many elements per page
                      $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                      $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                      $rowCount = 0;

                      $sum = 0;
                      $bill = 0;
                      $payment = 0;
                      $recover = 0;
                    ?>
                    @foreach($alldata as $data)
                    <?php $rowCount++; ?>
                    <tr> 
                      <td style="border: 1px solid #ddd; padding: 3px 3px">{{$currentNumber++}}</td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php echo dateFormateForView($data->date); ?>
                      </td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px; width:50%">{{ucfirst($data->reason)}}</td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php
                        $reason = $data->reason;
                          if(preg_match("/Contract with/", $reason)) {
                              echo number_format($data->amount, 2).'('.$data->currency_type.')';
                              $bill = $data->amount;
                            }elseif (preg_match("/Extra Percent/", $reason)) {
                              echo number_format($data->amount, 2).'('.$data->currency_type.')';
                              $bill = $data->amount;
                            }
                        ?>
                      </td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php
                          if(preg_match("/Payment to/", $reason)) {
                              echo number_format($data->amount, 2);
                              $sum = $sum-$data->amount;
                              $payment = $payment+$data->amount;
                            }elseif (preg_match("/Expense for/", $reason)) {
                              echo number_format($data->amount, 2);
                              $sum = $sum-$data->amount;
                              $payment = $payment+$data->amount;
                            }
                        ?>
                      </td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php

                          if(preg_match("/Recover/", $reason)) {
                              echo number_format($data->amount, 2);
                              $sum = $sum+$data->amount;
                              $recover = $recover+$data->amount;
                            }
                        ?>
                      </td>
                      <td style="border: 1px solid #ddd; padding: 3px 3px">{{number_format($sum, 2)}}</td>
                    </tr>
                    @endforeach
                    @if($rowCount==0)
                    <tr>
                      <td colspan="6" align="center">
                        <h4 style="color: #ccc">No Data Found . . .</h4>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                  <tfoot> 
                    <tr> 
                      <td colspan="3" style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><center><b>{{ __('home.total') }}</b></center></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b></b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{number_format($payment, 2)}}</b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{number_format($recover, 2)}}</b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{number_format($sum, 2)}}</b></td>
                    </tr>
                  </tfoot>
                </table>
                <div class="col-md-12" align="right">
                {{ $alldata->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection 