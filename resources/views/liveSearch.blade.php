@extends('layouts.app')
@section('content')

<br/>
<div class="container">
<div class="jumbotron text-center" style="background-color: #343a40; color:white">
    <div class="row">
        <div class="col-md-2">
        </div>
    <div class="col-md-8">
        <h3 style="text-align:center">Smart Search</h3><br/>
        <h5><b>Notice:</b> Available vehicles only are listed below</h5>
        <h5>You may search for vehicles using any category you want such as Manufacturer, Type, etc...</h5>
   <div class="panel panel-default">
    <div class="panel-heading">Search for Available Vehicles</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control col-md-12" placeholder="Search for a vehicle" />
     </div>
     <div class="table-responsive">
      <h3 style="color:black">Total Available Vehicles : <span id="total_records"></span></h3><br>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Manufacturer</th>
         <th>Model</th>
         <th>Type</th>
         <th>Production Year</th>
         <th>Price Per Day</th>
         <th>Price Per Hour</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
</div>

<script>
$(document).ready(function(){

 fetch_vehicles();

 function fetch_vehicles(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_vehicles(query);
 });
});

</script>


@endsection
