@extends('layouts.app')

@section('content')


@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<?php $hasVehicle = "No"; ?>
@if (count($vehicles) > 0)
    @foreach ($vehicles as $vehicle)
        @if ($vehicle->availability != "Deleted")
            <?php $hasVehicle = "Yes"; break;?>
        @endif
    @endforeach
@endif

@if ($hasVehicle == "Yes")

<br><p class="container-fluid text-center" id="rcorners">My Vehicles</p>

<?php
    $numOfCols = 2;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
?>

<div class="container">

    <div class="row">

        @foreach ($vehicles as $vehicle)
        @if ($vehicle->availability != "Deleted")

            <div class="col-md-<?php echo $bootstrapColWidth; ?>">

                <div class="d-md-flex flex-md-equal w-100 my-md-6 pl-md-6">
                    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-8 px-md-8 text-center text-white overflow-hidden" id="cars">

                        <h3>{{$vehicle->manufacturer}} {{$vehicle->model}} ({{$vehicle->production_year}})</h3>
                        <h5>RM{{$vehicle->price_per_day}} per day</h5>

                        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                        <?php
                            $imageName = substr($vehicle->images, 2, -2);
                            $imageName = strtr($imageName, "\"", " ");
                            $imageName = explode(' , ',trim($imageName));
                        ?>
                        <a href="/vehicle/{{$vehicle->id}}"><img src="images/{{$imageName[0]}}" alt={{$vehicle->manufacturer.$vehicle->model}} style="width:100%; border-radius:21px 21px 0 0; padding:8px;"></a>
                        </div>

                    </div>
                </div>
            </div>

            <?php
            $rowCount++;
            if($rowCount % $numOfCols == 0) echo '</div><br> <div class="row">';
            ?>
            @endif
        @endforeach

    </div>

    <div class="jumbotron" style="background-color:#CBCBCB">
        <div class="row">

          <div class="col-md-5">
            <a href="/vehicle/create" class="btn btn-dark">Add vehicle</a>
          </div>

      </div>
      </div>

</div>
</div>

@else
    <div class="jumbotron text-center" style="background-color: white">
        <img src="images/eminds.png" class="img-thumbnail" alt="E-Minds logo" style="width: 20vw; hight:20vh"><hr>
        <h2>You have no vehicle...</h2>
        <h3>Add a vehicle to make some extra bucks!</h3>
        <div class="jumbotron" style="background-color:#fff">
            <a href="/vehicle/create"><button class=" btn btn-dark">Add vehicle</button></a>
        </div>
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

@endsection
