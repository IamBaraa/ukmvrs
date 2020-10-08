@extends('layouts.swiper')

@section('content')

@if ($vehicles->availability != "Deleted")
    <?php
        $numOfCols = 2;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
    ?>
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
            <?php
            $imageName = substr($vehicles->images, 2, -2);
            $imageName = strtr($imageName, "\"", " ");
            $imageName = explode(' , ',trim($imageName));
            ?>
            @if (count($imageName) > 1)
                @foreach ($imageName as $i => $imageName)
        <div class="blog-slider__item swiper-slide">
        <div class="blog-slider__img">
            <img src="../images/{{$imageName}}" alt={{$vehicles->manufacturer.$vehicles->model}}>
        </div>
        <div class="blog-slider__content">
            <h4>Plate number: {{$vehicles->plate_no}}</h4>
            <h4>Manufacturer: {{$vehicles->manufacturer}}</h4>
            <h4>Model: {{$vehicles->model}} ({{$vehicles->production_year}})</h4>
            <h4>Type: {{$vehicles->type}}</h4>
            <h4>Price per day: RM{{$vehicles->price_per_day}}</h4>
            <h4>Price per hour: RM{{$vehicles->price_per_hour}}</h4>
        </div>
        </div>
        <div class="blog-slider__pagination"></div>
        @endforeach

        @else
            <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
            <img src="../images/{{$imageName[0]}}" alt={{$vehicles->manufacturer.$vehicles->model}}>
        @endif
        </div>
        <div class="blog-slider__content">
            <h4>Plate number: {{$vehicles->plate_no}}</h4>
            <h4>Manufacturer: {{$vehicles->manufacturer}}</h4>
            <h4>Model: {{$vehicles->model}} ({{$vehicles->production_year}})</h4>
            <h4>Type: {{$vehicles->type}}</h4>
            <h4>Price per day: RM{{$vehicles->price_per_day}}</h4>
            <h4>Price per hour: RM{{$vehicles->price_per_hour}}</h4>
        </div>
        </div>
    </div>
    </div>

        @if(Auth::user()->id == $vehicles->user_id)
        <div class="jumbotron" style="background-color:#CBCBCB; text-align:center;">
            <div class="row">
                <div class="col-md-4">
                    {!!Form::open(['action' => ['VehiclesController@updateStatus', $vehicles->id], 'method' => 'GET'])!!}
                    <div class="form-group"><br>
                    <h4>Vehicle's status: {{$vehicles->availability}}</h4>
                    <label class="radio-inline">
                    <input type="radio" id="smt-fld-1-2" name="status" value="Available">Available</label>
                    <label class="radio-inline">
                    <input type="radio" id="smt-fld-1-3" name="status" value="Unavailable">Unavailable</label>
                    </div>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                    {!!Form::close()!!}
                </div><br>
            <div class="col-md-4">
                <h4>Edit your vehicle's information</h4>
                <a href="/vehicle/{{$vehicles->id}}/edit" class="btn btn-primary">Edit</a>
            </div>
            <div class="col-md-4">
            {!!Form::open(['action' => ['VehiclesController@hide', $vehicles->id], 'method' => 'GET'])!!}
            {{Form::hidden('_method', 'PUT')}}
            <h4>Delete your vehicle</h4>
            <a href="/{{$vehicles->id}}/destroy" onclick="return confirm('Are you sure you want to delete this vehicle permanently?');"><button class=" btn btn-danger">Delete</button></a>
            {!!Form::close()!!}
            </div>
        </div>
        </div>

        @else
            @if($vehicles->availability == "Available")
                <div class="jumbotron" style="background-color:#CBCBCB; text-align:center;">
                    <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <form method="get" action="/vehicle/{{$vehicles->id}}/notifyOwner" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Rent Date &amp; Time</label>
                            <div class='input-group date' id='mindate1'>
                                <input type='text' name="rentTime" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Return Date &amp; Time</label>
                            <div class='input-group date' id='mindate2'>
                                <input type='text' name="returnTime" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="row" >
                    <div class="col-md-6">
                        {{Form::hidden('_method', 'POST')}}
                        <button type="submit" class="blog-slider__button" onclick="return confirm('Are you sure you want to rent this vehicle? If YES, make sure you enter correct Rent and Return times to prevent any suspensions!');">Book</button>
                    </div>
                    </div>
                </form>
                </div>
            @else
                <br><br>
                <h1 style="text-align: center">We apologize. This vehicle is not available at the moment.</h1>
            @endif
        @endif

        <script>
            $(function () {
                $('#mindate1').datetimepicker({
                format:'YYYY-MM-DD HH:mm:ss',
                minDate : new moment().format(),
                });
            });
        </script>

        <script>
            $(function () {
                $('#mindate2').datetimepicker({
                format:'YYYY-MM-DD HH:mm:ss',
                minDate : new moment().format(),
                });
            });
        </script>
@else

    <div class="jumbotron text-center" style="background-color: white; margin-top:0%; margin-bottom:0%">
        <img src="/images/eminds.png" class="img-thumbnail" alt="E-Minds logo" style="width: 20vw; hight:20vh"><hr>
        <h2>Unauthorized Page!</h2>
    </div>
@endif
@endsection
