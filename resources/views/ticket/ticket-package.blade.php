@extends('layouts.layout')
@section('title', 'Ticket Package')
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
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
        @if(!empty($single_data))
          {!! Form::open(array('route' =>['ticket-package-list.update', $single_data->id],'method'=>'PUT','files'=>true)) !!}
          <?php $info ="Update";?>
        @else
        {!! Form::open(array('route' =>['ticket-package-list.store'],'method'=>'POST','files'=>true)) !!}
          <?php $info ="Add";?>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="card-title">{{$info}} {{ __('menu.Ticket_Package') }}  </div>
          </div>
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control" type="text" name="name" value="{{(!empty($single_data->name))?$single_data->name:''}}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">{{ __('home.name') }} <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control" type="numeric" name="amount" value="{{(!empty($single_data->amount))?$single_data->amount:''}}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">{{ __('home.amount') }} <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="table-responsive">
                      <!--<table id="dataTable" class="table v-middle">-->
                      <table id="myTableID" class="table ">
                          <thead>
                              <tr>
                                  <th>Ticket</th>
                                  <th>action</th>
                              </tr>
                          </thead>
                          <tbody id="body">
                                @if(!empty($packagedetails))
                                <?php $i=0;?>
                                @foreach($packagedetails as $value)
                                <?php $i++;?>
                              <tr id="row_{{$i}}">
                                  <td style="border: 1px solid #fff; width:85%">
                                      <select name="addmore[{{$i}}][ticket_id]" id="item" class="form-control elect-single js-states select2" data-live-search="true" required="">
                                        <option value="">Select Ticket*</option>
                                        @foreach($allticket as $ticket)
                                        <option value="{{$ticket->id}}" {{($ticket->id == $value->ticket_id)?'selected':''}}>{{$ticket->name}}</option>
                                        @endforeach
                                      </select>
                                  </td>
                              </tr>
                                @endforeach
                                @else
                              <tr id="row_0">
                                  <td style="border: 1px solid #fff; width:85%">
                                      <select name="addmore[0][ticket_id]" id="item" class="form-control elect-single js-states select2" data-live-search="true" required="">
                                        <option value="">Select Ticket*</option>
                                        @foreach($allticket as $ticket)
                                        <option value="{{$ticket->id}}">{{$ticket->name}}</option>
                                        @endforeach
                                      </select>
                                  </td>
                                  <td style="border: 1px solid #fff; width:15%">
                                      <input type="button" class="form-control" value="+" id="addone">
                                  </td>
                              </tr>
                                @endif
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">{{$info}}</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
      
      <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">{{ __('menu.Ticket_Package') }}</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <!--<table id="dataTable" class="table v-middle">-->
              <table id="basicExample" class="table custom-table">
                <thead>
                  <tr>
                    <th>{{ __('home.SL') }}</th>
                    <th>{{ __('home.name') }}</th>
                    <th>{{ __('home.amount') }}</th>
                    <th>{{ __('home.status') }}</th>
                    <th>{{ __('home.action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl = 1;?>
                  @foreach($alldata as $data)
                  <tr>
                    <td>{{$sl++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->amount}}</td>
                    <td>
                      @if($data->status == 1)
                      <span class="badge bg-success">Active</span>
                      @elseif($data->status == 0)
                      <span class="badge bg-danger">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <div class="actions" style="height: 25px">
                        <a href="{{ route('ticket-package-list.edit', $data->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                          <i class="icon-edit1 text-info"></i>
                        </a>
                        {{Form::open(array('route'=>['ticket-package-list.destroy',$data->id],'method'=>'DELETE'))}}
                          <button type="submit" class="btn btn-default btn-xs confirmdelete" confirm="You want to delete this informations ?" title="Delete" style="width: 100%"><i class="icon-x-circle text-danger"></i></button>
                        {!! Form::close() !!}
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
{!!Html::script('custom/js/jquery.min.js')!!}
<script type="text/javascript">
$(document).ready(function() {
    var i = 0;
    $("#addone").on('click', function() {
        i++;
        var row = '<tr id="row_' + i + '">';
        row += '<td>';
        row += ' <select name="addmore['+i+'][ticket_id]" id="item" class="form-control select2" data-live-search="true" required="">';
        row += ' <option value="">Select Ticket*</option>';
        row += ' @foreach($allticket as $ticket)';
        row += ' <option value="{{$ticket->id}}">{{$ticket->name}}</option>';
        row += ' @endforeach';
        row += ' </select>';
        row += '</td>';
        row += '<td>';
        row += ' <input type="button" class="form-control" value="x" id="remove" onclick="$(\'#row_' + i + '\').remove()">';
        row += '</td>';
        row += '</tr>';
        $('#body').append(row);
        // $('.select2').select2();
    })
});
</script>
@endsection 