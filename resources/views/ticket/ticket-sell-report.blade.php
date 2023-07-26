@extends('layouts.layout')
@section('title', 'Ticket Sell Report')
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
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ __('home.Search_Area') }}</h3>
                
            <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
          </div>
          <!-- /.box-header -->
          
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form method="post" action="{{ route('ticket-sell-report-filter') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-inline">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <input class="form-control datepicker2" type="text" name="start_date" value="" autocomplete="off">
                          </div>
                          <div class="field-placeholder">From </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <input class="form-control datepicker2" type="text" name="end_date" value="" autocomplete="off">
                          </div>
                          <div class="field-placeholder">To </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="field-wrapper">
                          <div class="input-group">
                            <select name="package_id" id="package_id" class="form-control">
                              <option value="">select</option>
                              @foreach($allpackage as $package)
                              <option value="{{$package->id}}">{{$package->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="field-placeholder">Name </div>
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

              <div class="col-md-12" id="printTable">
                <center><h5 style="margin: 0px">{{ __('menu.Ticket_Sell_Report') }}</h5></center>
                <div class="table-responsive">
                  @if(isset($_POST['start_date']) && isset($_POST['end_date']))
                    <center><h6 style="margin: 0px">From : {{dateFormateForView($_POST['start_date'])}} To : {{dateFormateForView($_POST['end_date'])}}</h6></center>
                  @else
                    <center><h6 style="margin: 0px">Date : {{date('d-m-Y')}}</h6></center>
                  @endif
                  <table class="reportTable" style="width: 100%; font-size: 12px;" cellspacing="0" cellpadding="0">
                    <thead> 
                      <tr style="background: #ccc; color: #000">
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.SL') }}</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.Number') }}</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.date') }}</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.name') }}</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.amount') }}</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.quantity') }}</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.total') }}</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php
                        $totalQuantity = 0;
                        $totalAmount = 0;
                        $currentNumber =0;
                      ?>
                      @foreach($alldata as $data)
                      <?php $currentNumber++;?>
                      <tr> 
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{$currentNumber}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px"><a href="{{route('ticket-invoice',$data->id)}}">Ticket#{{$data->id}}</a></td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{date('d-m-Y', strtotime($data->date))}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px"> {{$data->package->name}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px"> {{$data->amount}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px"> {{$data->quantity}}<?php $totalQuantity += $data->quantity;?></td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px"> {{$data->total}}<?php $totalAmount += $data->total;?></td>
                      </tr>
                      @endforeach
                      @if($currentNumber==0)
                      <tr>
                        <td colspan="7" align="center">
                          <h4 style="color: #ccc">No Data Found . . .</h4>
                        </td>
                      </tr>
                      @endif
                    </tbody>
                    <tfoot> 
                      <tr> 
                        <td colspan="5" style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><center><b>{{ __('home.total') }}</b></center></td>
                        <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b><?php echo number_format($totalQuantity, 2);?></b></td>
                        <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b><?php echo number_format($totalAmount, 2);?></b></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="col-md-12" align="right"></div>
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
@endsection 