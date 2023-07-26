@extends('layouts.layout')
@section('title', 'Document Title')
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
        @if(!empty($single_data))
          {!! Form::open(array('route' =>['document-title.update', $single_data->id],'method'=>'PUT','files'=>true)) !!}
          <?php $info ="Update";?>
        @else
        {!! Form::open(array('route' =>['document-title.store'],'method'=>'POST','files'=>true)) !!}
          <?php $info ="Add";?>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="card-title">{{$info}} Document Title</div>
          </div>
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!-----------------phase -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="phase_id" id="phase_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allphase as $phase)
                      <option value="{{$phase->id}}" {{(!empty($single_data) && $phase->id == $single_data->phase_id) ? 'selected':''}}>{{$phase->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Phase<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-----------------sub phase -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="sub_phase_id" id="sub_phase_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      @if(!empty($single_data))
                      <option value="">Select</option>
                      @foreach( $allsubphase as $subphase)
                      <option value="{{$subphase->id}}" {{(!empty($single_data) && $subphase->id == $single_data->sub_phase_id) ? 'selected':''}}>{{$subphase->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="field-placeholder">Sub Phase<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control" type="text" name="name" value="{{(!empty($single_data->name))?$single_data->name:''}}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Title Name<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="des">{{(!empty($single_data->des))?$single_data->des:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Description</div>
                </div>
                <!-- Field wrapper end -->
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
      
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Phase Document Title List</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <!--<table id="dataTable" class="table v-middle">-->
              <table id="basicExample" class="table custom-table">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Sub Phase</th>
                    <th>Phase</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl = 1;?>
                  @foreach($alldata as $data)
                  <tr>
                    <td>{{$sl++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->subphase->name}}</td>
                    <td>{{$data->phase->name}}</td>
                    <td>{{$data->des}}</td>
                    <td>
                      <div class="actions" style="height: 25px">
                        <a href="{{ route('document-title.edit', $data->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                          <i class="icon-edit1 text-info"></i>
                        </a>
                        {{Form::open(array('route'=>['document-title.destroy',$data->id],'method'=>'DELETE'))}}
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
<script>
// dependancy dropdown using ajax
$(document).ready(function() {
    $('#phase_id').on('change', function() {
      var phaseid = $(this).val();
      if(phaseid) {
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: "POST",
          url: "{{$baseUrl.'/'.config('app.phase').'/get-sub-phase'}}",
          data: {
            'id' : phaseid
          },
          dataType: "json",

          success:function(data) {
            //console.log(data);
            if(data){
              $('#sub_phase_id').empty();
              $('#sub_phase_id').focus;
              $('#sub_phase_id').append('<option value="">Select</option>'); 
              $.each(data, function(key, value){
                console.log(data);
                $('select[name="sub_phase_id"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
              });
            }else{
              $('#sub_phase_id').empty();
            }
          }
        });
      }else{
        $('#sub_phase_id').empty();
      }
    });
});

</script>
@endsection 