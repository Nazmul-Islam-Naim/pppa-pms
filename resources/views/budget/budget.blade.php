@extends('layouts.layout')
@section('title', 'Budget List')
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
            <div class="card-title">Budget List</div>
            <a href="{{$baseUrl.'/'.config('app.budget').'/budget/create'}}" class="btn btn-sm btn-warning pull-right"><i class="icon-plus-circle"></i> <b>Add Budget</b></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table v-middle">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Project Name</th>
                    <th>Name of Firm</th>
                    <th>Sector</th>
                    <th>Ministy</th>
                    <th>Stage</th>
                    <th>Contract Amount</th>
                    <th>Currency Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <!-- <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">Total:</td>
                        <td></td>
                    </tr>
                </tfoot> -->
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
			ajax: "{{route('budget.index')}}",
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'Blfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8]
                },
                messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
            },
            {
                extend: 'print',
                footer: true,
                title:"",
                messageTop: function () {
                  var top = '<center><p class ="text-center"><img src="{{asset("logo")}}/logo.png" width="40px" height="40px"/></p></center>';
                  top += '<center><h3>PPPO</h3></center>';
                  
                  return top;
                },
                customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');
 
                $(win.document.body).find('table').css('font-size', 'inherit');
 
                $(win.document.body).find('table thead th').css('border','1px solid #ddd');  
                $(win.document.body).find('table tbody td').css('border','1px solid #ddd');
                $(win.document.body).find('table tfoot td').css('border','1px solid #ddd');
                $(win.document.body).css("height", "auto").css("min-height", "0");
                },
                exportOptions: {
                    columns: [  0, 1, 2, 3,4,5,6,7,8]
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
            const id = row.id;
            var url = '{{route("add-phase.show",":id")}}'; 
            var url = url.replace(':id', row.id);
            var url ="#";
            return '<a href=' + url +'>'+ data +'</a>';
          }
        },
				{
          data: 'firm.name',
        },
				{
          data: 'project.sector.name',
        },
				{
          data: 'project.ministry.name',
        },
				{
          data: 'project.phase.name',
          render: function(data, type, row) {
            if (data != null) {
              return data;
            } else {
              return '--';
            }
					}
        },
        {
          data: 'contract_amount',
        },
        {
          data: 'currency_type',
        },
				{
          data: 'action',
        },
			]
    });
    //-------- Delete single data with Ajax --------------//
    $("#example").on("click", ".button-delete", function(e) {
			e.preventDefault();

			var confirm = window.confirm('Are you sure want to delete data?');
			if (confirm != true) {
				return false;
			}
			var id = $(this).data('id');
			var url = '{{route("budget.destroy",":id")}}';
			var url = url.replace(':id', id);
			var token = '{{csrf_token()}}';
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					'_method': 'DELETE',
					'_token': token
				},
				success: function(data) {
					table.ajax.reload();
					console.log('success');
					successNotification(data.message);
				},

			});
    });
});
</script>
@endsection 