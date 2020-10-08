@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="page-header">
                    <h1>Add a vehicle</h1>
                </div>
    {!! Form::open(['action' => 'VehiclesController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data'])!!}
    {{csrf_field()}}
        <div class="row">
            <div class="form-group col-md-6">
                {{Form::label('plate_no', 'Plate Number')}}
                {{Form::text('plate_no', '', ['class' => 'form-control', 'placeholder' => 'Plate Number'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('manufacturer', 'Manufacturer')}}
                {{Form::text('manufacturer', '', ['class' => 'form-control', 'placeholder' => 'Manufacturer'])}}
            </div>
        </div>
        <div class="row">
                <div class="form-group col-md-4">
                    {{Form::label('model', 'Model')}}
                    {{Form::text('model', '', ['class' => 'form-control', 'placeholder' => 'Model name'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('production_year', 'Production Year')}}
                    {{Form::text('production_year', '', ['class' => 'form-control', 'placeholder' => 'e.g. 2016'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('type', 'Type')}}
                    {{Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'Car, Van or Motorbike'])}}
                </div>
            </div>
            <div class="row">
                    <div class="form-group col-md-6">
                        {{Form::label('price_per_day', 'Price per day')}}
                        {{Form::text('price_per_day', '', ['class' => 'form-control', 'placeholder' => 'Price per day'])}}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('price_per_hour', 'Price per hour')}}
                        {{Form::text('price_per_hour', '', ['class' => 'form-control', 'placeholder' => 'Price per hour'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        {{Form::label('images', 'Vehicle images')}}
                    <div class="input-group control-group increment" >
                        <input type="file" name="images[]" class="form-control" id="image" onchange="preview_image();" multiple>
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus" id="addbutton"></i> Add</button>
                            </div>
                    </div>
                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="images[]" class="form-control" id="image" onchange="preview_image();" multiple>
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                        </div>
                    </div>
                        </div>
                    </div><br>
                    <div id="image_preview"></div>
            {{Form::submit('Submit' , ['class' => 'btn btn-dark'])}}
    {!! Form::close() !!}


        </div>
    </div>
</div><br><br>
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>
<script>
    function preview_image()
{
 var total_file=document.getElementById("image").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
 }
}
</script>

@endsection
