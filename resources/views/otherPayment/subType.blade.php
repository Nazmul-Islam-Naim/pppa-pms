@extends('layouts.layout')
@section('title', 'Expense Title')
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
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        @if (!empty($single_data))
        {!! Form::open(array('route' =>['payment-title.update',$single_data->id],'method'=>'PUT')) !!}
        <?php $title = 'Update'?>
        @else
        {!! Form::open(array('route' =>['payment-title.store'],'method'=>'POST')) !!}
        <?php $title = 'Update'?>
        @endif
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{$title}} Expense Title</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control" type="text" name="name" value="{{!empty($single_data) ? $single_data->name : ''}}" required="" autocomplete="off">
              </div>
              <div class="field-placeholder">Title <span class="text-danger">*</span></div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <select class="form-control select2" name="payment_type_id" required="">
                  <option value="">--Select--</option>
                  @foreach($alltype as $type)
                  <option value="{{$type->id}}" {{(!empty($single_data) && ($single_data->id == $type->id)) ? 'selected' : ''}}>{{$type->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="field-placeholder">Code<span class="text-danger">*</span></div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
      
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Expense Title List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="basicExample" class="table custom-table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Expense Title</th>
                    <th>Expense Code</th>
                    <th>{{ __('home.status') }}</th>
                    <th>{{ __('home.action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                           
                    $number = 1;
                    $numElementsPerPage = 15; // How many elements per page
                    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                    $rowCount = 0;
                  ?>
                  @foreach($alldata as $data)
                  <?php $rowCount++; ?>
                  <tr>
                    <td>{{$currentNumber++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->paymentsubtype_type_object->name}}</td>
                    <td>
                      @if ($data->status == 1)
                      <span class="badge bg-primary">Active</span>
                      @elseif ($data->status == 0)
                      <span class="badge bg-warning">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <div class="actions" style="height: 25px">
                        <a href="{{route('payment-title.edit',$data->id)}}" style="padding: 1px 15px"><i class="icon-edit1 text-info"></i></a>
                        {{Form::open(array('route'=>['payment-title.destroy',$data->id],'method'=>'DELETE'))}}
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
          <!-- /.card-body -->
          <div class="card-footer">
            {{$alldata->render()}}
          </div>
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