@extends('layouts.app')

@section('content')
<?php
$vehicles = UKMVRS\Vehicle::all();
?>
<div class="overflow-hidden text-center bg-light" style="justify-content: center;"><br>
  <div class="container">
    <h1 class="display-4 font-weight-normal" class="mainp" style="font-family: 'El Messiri', sans-serif;">UKM VRS!</h1><br><hr>
    <p class="lead mainp" ><b>Welcome to the one and only web-based system for vehicle rental services in UKM. Either you have a vehicle to be leased, or you are looking forward to renting one, you have come to the right place.</b></p><br><br>
    <a class="btn btn-secondary btn-home" href="/vehicle">Rent a vehicle</a>
    <a class="btn btn-secondary btn-home" href="#cars">Recommended</a>
    <a class="btn btn-secondary btn-home" href="/myvehicles">My vehicles</a>
  </div><br><br>
</div>

<?php
      $numOfCols = 2;
      $rowCount = 0;
      $bootstrapColWidth = 12 / $numOfCols;
    ?>

    @foreach ($vehicles as $vehicle)
        @if($vehicle->ads == "Yes")
        @if($vehicle->availability == "Available")
            <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3" id="cars">
                    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" id="cars">
                        <div class="my-3 py-3">
                            <h3>{{$vehicle->manufacturer}} {{$vehicle->model}} ({{$vehicle->production_year}})</h3>
                            <h5>RM{{$vehicle->price_per_day}} per day</h5>
                        </div>
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
            @endif
          @endforeach

      </div>

{{-- <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white  overflow-hidden" id="cars">
    <div class="my-3 p-3">
      <h2 class="display-5">Toyota Fortuner</h2>
      <p class="lead">RM 250 per day</p>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
            <img src="images/Toyota.png" alt="Toyota Fortuner" style="width:100%; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" id="cars">
    <div class="my-3 py-3">
      <h2 class="display-5">Mercedes AMG 63</h2>
      <p class="lead">RM 500 per day</p>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
            <img src="images/MercedesAMG.jpg" alt="Mercedes AMG" style="width:100%; border-radius: 21px 21px 0 0;"></div>
  </div>
</div> --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
@endsection
