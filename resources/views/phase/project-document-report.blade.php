@extends('layouts.layout')
@section('title', 'Phase Report')
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
              <h3 class="card-title">Project Wise Document Report</h3><a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
            </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12" id="printTable">
                <div class="table-responsive">
                  <table style="width:100%"> 
                    <tbody>
                        <tr > 
                        <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:center" colspan="8"><h3>{{$single_data->name}}</h3></td>
                      </tr>
                      <tr style="background: #ccc; color: #000"> 
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Sl</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Date</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Phase</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Sub Phase</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Description</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Document</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Image Title</th>
                        <th style="border: 1px solid #ddd; padding: 3px 3px">Image</th>
                      </tr>
                      <?php $i=0; ?>
                      @foreach($alldata as $data)
                      <?php $i=1; ?>
                      <tr>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{$i++}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{date('d-m-Y',strtotime($data->date))}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{$data->phase->name}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{$data->subphase->name}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{$data->des}}</td>
                        @if($data->doc != null)
                        <td style="border: 1px solid #ddd; padding: 3px 3px"><a href="{{asset('upload/phase/'.$data->doc)}}" class='btn btn-sm btn-default btn-status-active' target='_blank'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a></td>
                        @else
                        <td style="border: 1px solid #ddd; padding: 3px 3px"><a href='#' class='btn btn-sm btn-default btn-status-active'>---</a></td>
                        @endif
                        
                        <td style="border: 1px solid #ddd; padding: 3px 3px">{{$data->image_title}}</td>
                        <td style="border: 1px solid #ddd; padding: 3px 3px">
                        @if($data->image != null)
                        <a href="{{asset('upload/phase/'.$data->image)}}" target="_blank" class='btn btn-sm btn-default btn-status-active'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a>
                        @else
                        <span class="text-center">---</span>
                        @endif
                        </td>
                      </tr>
                      @endforeach
                      @if($i==0)
                      <tr>
                        <td colspan="8" align="center">
                          <h4 style="color: #ccc">No Data Found . . .</h4>
                        </td>
                      </tr>
                      @endif
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
</script>
@endsection 