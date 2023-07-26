@extends('layouts.layout')
@section('title', 'Recovery List')
@section('content')
<!-- Content Header (Page header) -->
<style>
  .table th, .table td {
    white-space: unset;
}
</style>
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
              <h3 class="card-title">Recovery List</h3>
            </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="example" style="width:100%"> 
                    <thead> 
                      <tr> 
                        <th>SL</th>
                        <th>Project Name</th>
                        <th>Firm</th>
                        <th>Implementing Agency</th>
                        <th>Ministry</th>
                        <th>Stage</th>
                        <th>Contract Amount</th>
                        <th>Extra(%)</th>
                        <th>Recovery Amount</th>
                        <th>Due</th>
                        <th>Recover</th>
                        <th>Action</th>
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
			ajax: "{{route('recovery.index')}}",
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'Blfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10]
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
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10]
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
          data: 'project.name',
          render: function(data, type, row) {
            var url = '{{route("budget-report",":id")}}'; 
            var url = url.replace(':id', row.project_id);
            return '<a href=' + url +'>'+ data +'</a>';
          }
        },
        {
          data: 'firm.name',
        },
				{data: 'agency.name'},
				{data: 'project.ministry.name'},
				{
          data: 'project.phase',
          render:function(data, type, row){
            if (data != null) {
              return data.name;
            }else{
              return '';
            }
          }

        },
				{data: 'amount'},
				{data: 'extra_percent'},
        {
          data: 'amount',
          render:function(data, type, row){
            return (parseFloat(data) + parseFloat(((data * row.extra_percent)/100))).toFixed(2);
          }
        },
				{data: 'total_amount'},
				{data: 'recover_amount'},
				{data: 'action'},
			]
    });
});
</script>
@endsection 