@extends('layouts.layout')
@section('title', 'Add Feasibility')
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
            <div class="card-title">Add Feasibility Report To Project</div>
          </div>
          {!! Form::open(array('route' =>['add-feasibility.store'],'method'=>'POST','files'=>true)) !!}
          <div class="card-body">
            <div class="col-md-12">
              <div class="form-inline">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <select  name="project_id"  class="form-control select-single js-states select2" data-live-search="true" required="">
                            <option value="">Select project</option>
                            @foreach($allproject as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="field-placeholder">Project <span class="text-danger">*</span> </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <select  name="feasibility_id"  class="form-control select-single js-states select2" data-live-search="true" required="">
                            <option value="">Select *</option>
                            @foreach($allfeasibility as $feasibility)
                            <option value="{{$feasibility->id}}">{{$feasibility->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="field-placeholder">Feasibility Company<span class="text-danger">*</span> </div>
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
                      <th>Description</th>
                      <th>Document</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody id="body">
                      <tr id="row_0">
                        <td style="border: 1px solid #fff">
                          <span>1</span>
                        </td>
                        <td style="border: 1px solid #fff">
                          <input class="form-control" type="date" name="addmore[0][date]" value="<?php echo date('Y-m-d');?>" autocomplete="off" requried="">
                        </td>
                        <td style="border: 1px solid #fff">
                            <textarea name="addmore[0][des]" style="height:40px" class="form-control"></textarea>
                        </td>
                        <td style="border: 1px solid #fff">
                          <input type="file" class="form-control" name="addmore[0][doc]" autocomplete="off">
                        </td>
                        <td style="border: 1px solid #fff">
                            <textarea name="addmore[0][image_title]" style="height:40px" class="form-control"></textarea>
                        </td>
                        <td style="border: 1px solid #fff">
                          <input type="file" class="form-control" name="addmore[0][image]" autocomplete="off">
                        </td>
                        <td >
                          <input type="button" class="form-control" value="+" id="addone" >
                        </td>
                      </tr>
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
            row += ' <input type="file" class="form-control" name="addmore['+i+'][doc]" autocomplete="off">';
            row += '</td>';
            row += '<td style="border: 1px solid #fff">';
            row += ' <textarea name="addmore['+i+'][image_title]" style="height:40px" class="form-control"></textarea>';
            row += '</td>';
            row += '<td style="border: 1px solid #fff">';
            row += ' <input type="file" class="form-control" name="addmore['+i+'][image]" autocomplete="off">';
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