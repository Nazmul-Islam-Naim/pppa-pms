@extends('layouts.layout')
@section('title', 'Expense Report')
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
              <h3 class="card-title">Expense Report</h3>
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
                        <th>Date</th>
                        <th>Project Name</th>
                        <th>Expense Code</th>
                        <th>Expense Title</th>
                        <th>Issue By</th>
                        <th>Note</th>
                        <th>Amount</th>
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
       url: "{{route('payment-voucher-report')}}",
       data: {start_date: start_date, end_date: end_date}
      },
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
          data: 'payment_date',
          render:function(data, type, row){
              return dateFormat(new Date(data)).toString();
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
          data: 'otherpayment_type_object.name',
        },
				{data: 'otherpayment_subtype_object.name'},
				{data: 'issue_by'},
				{data: 'note'},
				{data: 'amount'},
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
    var url = '{{route("recovery.destroy",":id")}}';
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
        // successNotification(data.message);
      },

    });
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