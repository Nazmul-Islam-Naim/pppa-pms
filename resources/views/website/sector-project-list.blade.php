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
        <h5>PPP Sector Wise Project List</h5>
    <hr>
    </div>
</div>
<div class="container">
    <input type="hidden" name="slug" id="slug" value="{{$slug}}">
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered " id="example" style="width:100%"> 
            <thead> 
              <tr> 
                <th>Sl</th>
                <th>Sector</th>
                <th>Project Name</th>
                <th>Current Status</th>
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
    var slug = $('#slug').val();
    var sectorRoute = '{{route("sector-porject-list",":id")}}'; 
    var sectorRoute = sectorRoute.replace(':id', slug);
      var table = $('#example').DataTable({
			serverSide: true,
			processing: true,
      deferRender : true,
			ajax: sectorRoute,
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
      dom: 'frtip',
			aaSorting: [[0, "asc"]],

			columns: [
        {
          data: 'DT_RowIndex',
        },
        {
          data: 'sector.name',
        },
				{
          data: 'name',
        },
				{
          data: 'subphase.name',
          render: function(data, type, row) {
            if (data != null) {
                var pTag = '<p style="font-size:12px; margin:0px; padding:0px">' + data + '</p>' + '<p style="font-size:12px; margin:0px; padding:0px">( ' + row.phase.name + ' )</p>';
              return pTag;
            } else {
              return '';
            }
					}
        },
        {
          data: 'Profile',
          render: function(data, type, row) {
            var url = '{{route("project-profiles",":id")}}'; 
            var url = url.replace(':id', row.slug);
            return '<a href=' + url +'><u>'+ 'Profile' +'</u></a>';
          }
        }
			]
    });
});
</script>
@endsection