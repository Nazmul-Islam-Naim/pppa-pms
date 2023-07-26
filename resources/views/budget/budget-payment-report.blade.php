@extends('layouts.layout')
@section('title', 'Budget Payment Report')
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
        <div class="card">
          <div class="card-header">
            <div class="card-title">Budget Payment Report</div>
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
                    <th>Payment Amount</th>
                    <th>Currency Type</th>
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
    filter_view();

    function filter_view(start_date = '',end_date = '') { 

      var table = $('#example').DataTable({
			serverSide: true,
			processing: true,
      deferRender : true,
			ajax: {
        url: "{{route('budget-payment-report')}}",
        data: {start_date: start_date, end_date: end_date}
      },
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'Blfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
                },
                messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
            },
            {
                extend: 'print',
                footer: true,
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
                $(win.document.body).find('table tfoot td').css('border','1px solid #ddd');
                $(win.document.body).css("height", "auto").css("min-height", "0");
                },
                exportOptions: {
                    columns: [  0, 1, 2, 3,4,5,6,7,8,9]
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
            var url = '{{route("budget-report",":id")}}'; 
            var url = url.replace(':id', row.project_id);
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
          data: 'budget.contract_amount',
        },
        {
          data: 'amount',
          render:function(data, type, row){
              if(row.currency_type == 'USD'){
                  return row.amount/row.dollar_rate
              }else{
                  return row.amount;
              }
          }
        },
        {
          data: 'currency_type',
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