@extends('layouts.layout')
@section('title', 'Project List')
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
              <h3 class="card-title">Development Phase Project List</h3>
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
                        <th>Name</th>
                        <th>Sector</th>
                        <th>Ministry</th>
                        <th>Agency</th>
                        <th>Location</th>
                        <th>Private Partner </th>
                        <th>Period</th>
                        <th>Feasibility</th>
                        <th>Construction Agency</th>
                        <th>Cost</th>
                        <th>Phase</th>
                        <th>Sub Phase</th>
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
      var table = $('#example').DataTable({
			serverSide: true,
			processing: true,
      deferRender : true,
			ajax: '{{route("development-phase-project")}}',
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'Blfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                },
                messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
            },
            {
                extend: 'print',
                title:"",
                messageTop: function () {
                  var top = '<center><p class ="text-center"><img src="{{asset("upload/logo")}}/header_pppo.jpg" width="100%" /></p></center>';
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
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                },
                messageBottom: null,

            }
        ],
			aaSorting: [[0, "asc"]],

			columns: [
        {
          data: 'DT_RowIndex',
        },
				{
          data: 'name',
        },
				{data: 'sector.name'},
				{data: 'ministry.name'},
				{data: 'agency.name'},
				{data: 'location.name'},
				{data: 'partner.name'},
				{data: 'implementation_period'},
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
			]
    });
});
</script>
@endsection 