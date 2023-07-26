@extends('layouts.layout')
@section('title', 'Ticket')
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
            <div class="invoice-details">
                <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
            </div>
            <div class="col-md-12" id="printTable">
              <table class="reportTable" style="width: 40%; font-size: 12px;" cellspacing="0" cellpadding="0">
                <thead> 
                  <tr style="background: #ccc; color: #000">
                    <th style="width:50%; text-align:left">Baby Land Park,</th>
                    <td > </td>
                  </tr>
                  <tr style="background: #ccc; color: #000">
                    <th style="width:50%; text-align:left">1691 Oakdale Ave,</th>
                    <td ></td>
                  </tr>
                  <tr style="background: #ccc; color: #000">
                    <th style="width:50%; text-align:left"> San Francisco, California(CA), 94124</th>
                    <td ></td>
                  </tr>
                  <tr style="background: #ccc; color: #000">
                    <th style="width:50%; text-align:left">{{ __('home.Title') }}</th>
                    <td >{{$singlesell->package->name }}</td>
                  </tr>
                  <tr style="background: #ccc; color: #000">
                    <th style="width:50%; text-align:left">{{ __('home.amount') }}</th>
                    <td >{{ $singlesell->total }}</td>
                  </tr>
                  <tr style="background: #ccc; color: #000">
                    <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('home.image') }}</th>
                    <th style="border: 1px solid #ddd; padding: 3px 3px">{{ __('menu.Ticket') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pacagedetails as $data)
                  <tr> 
                    <td style="border: 1px solid #ddd; padding: 3px 3px; width:20%">
                    @if (!empty($data->ticket->image))
                    <center><img class="profile-user-img img-responsive " src="{{asset('upload/ticket/'.$data->ticket->image)}}" width=45px; alt="User profile picture"></center>
                    @else
                    <center><img class="profile-user-img img-responsive " src="{{asset('upload/ticket/no-image.jpg')}}" height="45px" alt="User profile picture"></center>
                    @endif
                    </td>
                    <td style="border: 1px solid #ddd; padding: 3px 3px">{{$data->ticket->name}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot> 
                </tfoot>
              </table>
            </div>
        </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection 