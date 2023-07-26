@extends('layouts.layout')
@section('title', 'Edit Phase')
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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Add Phase To Project</div>
          </div>
          {!! Form::open(array('route' =>['add-phase.update',$single_data->id],'method'=>'PUT','files'=>true)) !!}
          <div class="card-body">
            <div class="col-md-12">
              <div class="form-inline">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input type="text" class="form-control" value="{{$single_data->project->name}}" readonly="">
                        </div>
                        <div class="field-placeholder">Project <span class="text-danger">*</span> </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <select  name="phase_id"  class="form-control select-single js-states select2" data-live-search="true" required="">
                            <option value="">Select phase *</option>
                            @foreach($allphase as $phase)
                            <option value="{{$phase->id}}"{{($single_data->phase_id == $phase->id) ? 'selected' : ''}}>{{$phase->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="field-placeholder">Phase <span class="text-danger">*</span> </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <select  name="sub_phase_id"  class="form-control select-single js-states select2" data-live-search="true" required="">
                            <option value="">Select project *</option>
                            @foreach($allsubphase as $subphase)
                            <option value="{{$subphase->id}}"{{($single_data->phase_id == $subphase->id) ? 'selected' : ''}}>{{$subphase->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="field-placeholder">Sub Phase <span class="text-danger">*</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!--<table id="dataTable" class="table v-middle">-->
                <table id="myTableID" class="table ">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Date</th>
                      <th>Document Title</th>
                      <th>Document</th>
                      <th>Image Title</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody id="body">
                    <?php $count=0;?>
                    @foreach($alldata as $data)
                    <?php $count++;?>
                      <tr id="row_{{$count}}">
                        <td style="border: 1px solid #fff">
                          <span>{{$count}}</span>
                        </td>
                        <td style="border: 1px solid #fff">
                          <input class="form-control" type="date" name="addmore[{{$count}}][date]" value="{{$data->date}}" autocomplete="off" requried="">
                        </td>
                        <td style="border: 1px solid #fff">
                            <select  name="addmore[{{$count}}][des]" id="document_title_id_0"  class="form-control document_title_id" required="">
                              <option value=""></option>
                              @foreach($alldoctitle as $title)
                              <option value="{{$title->name}}"{{($title->name == $data->des)? 'selected':''}}>{{$title->name}}</option>
                              @endforeach
                           </select>
                        </td>
                        <td style="border: 1px solid #fff">
                          <input type="file" class="form-control" name="addmore[{{$count}}][doc]" value="" autocomplete="off">
                          <input type="hidden" class="form-control" name="addmore[{{$count}}][olddoc]" value="{{!empty($data->doc) ? $data->doc : ''}}" autocomplete="off">
                        </td>
                        <td style="border: 1px solid #fff">
                            <textarea name="addmore[{{$count}}][image_title]" style="height:40px" class="form-control">{{!empty($data->image_title) ? $data->image_title : ''}}</textarea>
                        </td>
                        <td style="border: 1px solid #fff">
                          <input type="file" class="form-control" name="addmore[{{$count}}][image]" value="" autocomplete="off">
                          <input type="hidden" class="form-control" name="addmore[{{$count}}][oldimage]" value="{{!empty($data->image) ? $data->image : ''}}" autocomplete="off">
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="text-align:right">
                  <button type="submit" class="form-control">submit</button>
                </div>
                {!! Form::close() !!}
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
  var i=0;
  var rowcount=1;
    $("#addone").on('click',function(){
        i++;
        rowcount++;
        var row = '<tr id="row_'+i+'">';
            row += '<td style="border: 1px solid #fff">';
            row += ' <span>'+rowcount+'</span>';
            row += '</td>';
            row += '<td style="border: 1px solid #fff">';
            row += ' <input class="form-control" type="date" name="addmore['+i+'][date]" value="<?php echo date('Y-m-d');?>" autocomplete="off" requried="">';
            row += '</td>';
            row += '<td style="border: 1px solid #fff">';
            row += ' <textarea name="addmore['+i+'][des]" style="height:40px" class="form-control"></textarea>';
            row += '</td>';
            row += '<td style="border: 1px solid #fff">';
            row += ' <input type="file" class="form-control" name="addmore[0][doc]" autocomplete="off">';
            row += '</td>';
            row += '<td style="border: 1px solid #fff">';
            row += ' <input type="button" class="form-control" value="x" id="remove" onclick="$(\'#row_'+i+'\').remove();subtotal()">';
            row += '</td>';
            row += '</tr>';
            $('#body').append(row);
    })
});

</script>
@endsection 