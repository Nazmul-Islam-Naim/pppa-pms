@extends('layouts.frontend-app')
@section('content')
<style>
   table.dataTable th {
    background: #186b59;
}
</style>

<!--Activity Area Start-->
<div>
    <div class="container mt-5">
        <h5>PPP Ministry List</h5>
    <hr>
    </div>
</div>
<div class="container">
    
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered " id="example" style="width:100%"> 
            <thead> 
              <tr> 
                <th>Sl</th>
                <th>Ministry</th>
                <th>Contracting Authorities</th>
                <th>Number of Project</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
</div>
</div>
<!--End of Activity Area-->
{!!Html::script('custom/js/jquery.min.js')!!}
<script src="{{asset('custom/yajraTableJs/jquery.js')}}"></script>
<script>
	$(document).ready(function() {
		'use strict';
      var table = $('#example').DataTable({
			serverSide: true,
			processing: true,
      deferRender : true,
			ajax: "{{route('ministries')}}",
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'frtip',
			aaSorting: [[0, "asc"]],

			columns: [
        {
          data: 'DT_RowIndex',
        },
        {
          data: 'name',
          render:function(data, type, row){
            return data;
          }
        },
        {
          data: 'name',
          render:function(data, type, row){
            return row.agencies.length;
          }
        },
        {
          data: 'name',
          render:function(data, type, row){
            return row.ministry_projects.length;
          }
        },
        {
          data: 'Projects',
          render: function(data, type, row) {
            var url = '{{route("contracting-authority",":id")}}'; 
            var url = url.replace(':id', row.slug);
            return '<a href=' + url +'><u>'+ 'Contracting Authority' +'</u></a>';
          }
        }
			]
    });
});
</script>
@endsection