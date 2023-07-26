@extends('layouts.layout')
@section('title', 'User List')
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
            <div class="card-title">User List</div>
          </div>
          <div class="card-body">
            
            <div class="col-md-12">
              <form method="post" action="{{ route('transaction.filter') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-inline">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control datepicker" type="text" name="start_date" id="start_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">From </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control datepicker" type="text" name="end_date" id="end_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">To </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input type="submit" value="Search" id="Search" class="btn btn-info btn-md">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <!--<table id="dataTable" class="table v-middle">-->
              <table id="example" class="table custom-table basicExample">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
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
	$(document).ready(function() {
		'use strict';

		var buTable = $('#example').DataTable({
			ajax: "{{route('all-users')}}",
			serverSide: true,
			processing: true,
      "lengthMenu": [ 100, 150, 200, 250, 300 ],
			aaSorting: [
				[0, "asc"]
			],

			columns: [
        {data: 'DT_RowIndex'},
				{data: 'name'},
				{data: 'dob'},
				{data: 'gender'},
				{data: 'phone'},
				{data: 'address'},
				{data: 'company'},
        {
					data: 'status',
					render: function(data, type, row) {
						if (data == 1) {
							return "<a class='badge badge-xs bg-success' data-id='" + row.id + "'>Active</a>";
						} else {
							return "<a class='badge badge-xs bg-warning' data-id='" + row.id + "'>Deactive</a>";
						}

					}

				},
				{
          data: 'action',
          orderable:true,
          searchable:true
				}
			]
    });

	});
  //==================== Date wise filtering ============================
  $(document).ready(function () {
    $("#Search").click(function (e) { 
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    console.log(start_date);
      e.preventDefault();
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        type: "POST",
        url: "/date-filter/",
        // data: {start_date:start_date,end_date:end_date},
        success: function (response) {
          
        }
      });
    });
  });
</script>

@endsection 