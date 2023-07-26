@extends('layouts.layout')
@section('title', 'Project Report')
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
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Filtring By Date</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12">
                <div class="form-inline">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control " type="date" name="start_date" id="start_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">Start Date</div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control " type="date" name="end_date" id="end_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">End Date  </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input type="submit" value="Filter" class="btn btn-success btn-md" id="filter">
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
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">Project List</h3>
            </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="example" style="width:100%"> 
                    <thead> 
                      <tr> 
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Project Name</th>
                        <th>Sector</th>
                        <th>Ministry</th>
                        <th>Feasibility</th>
                        <th>Cost</th>
                        <th>Phase</th>
                        <th>Sub Phase</th>
                        <th>Agency</th>
                        <th>Others</th>
                        <th>Document</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
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
{!!Html::script('custom/yajraTableJs/jquery.js')!!}
<script>
   // ==================== date format ===========
   function dateFormat(data) { 
    let date, month, year;
    date = data.getDate();
    month = data.getMonth() + 1;
    year = data.getFullYear();

    date = date
        .toString()
        .padStart(2, '0');

    month = month
        .toString()
        .padStart(2, '0');

    return `${date}-${month}-${year}`;
  }

  
	$(document).ready(function() {
		'use strict';
    filter_view();
    function filter_view(start_date = '',end_date = '') { 
      var table = $('#example').DataTable({
			serverSide: true,
			processing: true,
      deferRender : true,
			ajax: {
        url: "{{route('project-report')}}",
        data: {start_date: start_date, end_date: end_date}
      },
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'Blfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,11]
                },
                messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
            },
            {
                extend: 'print',
                title:"",
                messageTop: function () {
                  var top = '<center><p class ="text-center"><img src="{{asset("upload/logo")}}/header_pppo.jpg" width="100%" /></p></center>';
                  // top += '<center><h3>PPPO</h3></center>';
                  
                  return top;
                },
                customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');
 
                $(win.document.body).find('table').css('font-size', 'inherit');
 
                $(win.document.body).find('table thead th').css('border','1px solid #ddd');  
                $(win.document.body).find('table tbody td').css('border','1px solid #ddd');
                $(win.document.body).css("height", "auto").css("min-height", "0");  
                },
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,11]
                },
                messageBottom: null
            }
        ],
			aaSorting: [[0, "asc"]],

			columns: [
        {
          data: 'DT_RowIndex',
        },
        {
          data: 'date',
          render: function(data, type, full, meta) {
						if (data != null) {
							return dateFormat(new Date(data)).toString();
						}
					}
        },
        {
          data: 'project.name',
          render: function(data, type, row) {
            var url = '{{route("project-profile",":id")}}'; 
            var url = url.replace(':id', row.project_id);
            return '<a href=' + url +'>'+ data +'</a>';
          }
        },
        {
          data: 'project.sector.name',
        },
        {
          data: 'project.ministry.name',
        },
				{
          data: 'feasibility.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '---';
            }
					}
        },
				{
          data: 'cost.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '---';
            }
					}
        },
				{
          data: 'phase.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '---';
            }
					}
        },
				{
          data: 'subphase.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '---';
            }
					}
        },
				{
          data: 'construction.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '---';
            }
					}
        },
				{
          data: 'document.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '---';
            }
					}
        },
				{
          data: 'doc',
          render: function(data, type, row) { 
            if (data != null) {
              if(row.feasibility_id){
              var url = '{{asset("upload/feasibility/".":doc")}}'; 
              var url = url.replace(':doc', data);
              return "<a href='"+ url +"' class='btn btn-sm btn-default btn-status-active' target='_blank' data-id='" + row.id + "'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a>";
              }
              if(row.phase_id){
              var url = '{{asset("upload/phase/".":doc")}}'; 
              var url = url.replace(':doc', data);
              return "<a href='"+ url +"' class='btn btn-sm btn-default btn-status-active' target='_blank' data-id='" + row.id + "'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a>";
              }
              if(row.cost_id){
              var url = '{{asset("upload/cost/".":doc")}}'; 
              var url = url.replace(':doc', data);
              return "<a href='"+ url +"' class='btn btn-sm btn-default btn-status-active' target='_blank' data-id='" + row.id + "'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a>";
              }
              if(row.construction_company_id){
              var url = '{{asset("upload/construction/".":doc")}}'; 
              var url = url.replace(':doc', data);
              return "<a href='"+ url +"' class='btn btn-sm btn-default btn-status-active' target='_blank' data-id='" + row.id + "'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a>";
              }
              if(row.document_type_id){
              var url = '{{asset("upload/others/".":doc")}}'; 
              var url = url.replace(':doc', data);
              return "<a href='"+ url +"' class='btn btn-sm btn-default btn-status-active' target='_blank' data-id='" + row.id + "'><i class='fa fa-file-pdf-o'  aria-hidden='true'></i></a>";
              }
            } else {
              return "<a href='#' class='btn btn-sm btn-default btn-status-active'>---</a>";
            }
					}
        },
			]
      });
    }

    $('#filter').click(function (e) { 
    e.preventDefault();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();

    if (start_date != '' && end_date != '') {
      $('#example').DataTable().destroy();
      filter_view(start_date, end_date);
    } 
  });
  //-------------- unused action--------------//
  $('#reset').click(function (e) { 
    e.preventDefault();
    $('#start_date').val('');
    $('#end_date').val('');
    $('#example').DataTable().destroy();
    filter_view();
  });
      
});
</script>
@endsection 