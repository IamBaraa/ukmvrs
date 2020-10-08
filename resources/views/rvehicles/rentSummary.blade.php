@extends('layouts.app')

@section('content')

<?php
    use UKMVRS\RentalRecord;
    $rentDateTime = RentalRecord::latest('id')->first('rent_datetime');
    $returnDateTime = RentalRecord::latest('id')->first('return_datetime');
    $rentDateTime = substr($rentDateTime, 18, -2);
    $returnDateTime = substr($returnDateTime, 20, -2);
    $rentDuration = abs(strtotime($returnDateTime) - strtotime($rentDateTime));

    $years = floor($rentDuration / (365*60*60*24));
    $months = floor(($rentDuration - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $hours = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
    $minutes = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
    $seconds = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
      if ($seconds > 30) {
        $minutes += 1;
        if ($minutes > 30) {
          $hours += 1;
        }
      }
      if ($years > 1){
            $months += $years * 12;
        }
        if ($months > 1) {
            $days += ($months * 30);
        }
    ?>

<div class="alert alert-success">
    <p>You have successfully booked a vehicle! The vehicle will be delivered to your palce on time (:</p>
</div>
<div class="container">
    <div class="jumbotron text-center" style="background-color: #343a40; color:white">
        <img src="/images/eminds.png" class="img-thumbnail" alt="E-Minds logo" style="width: 14vw; hight:14vh"><hr>
        <h3 style="font-family: 'Righteous', cursive;">Rental summary</h3><br>
        <h3><b>The details of the vehicle you booked are shown below:-</b></h4>
        <h4>Plate number: {{$vehicles->plate_no}}</h4>
        <h4>Manufacturer: {{$vehicles->manufacturer}}</h4>
        <h4>Model: {{$vehicles->model}} ({{$vehicles->production_year}})</h4>
        <h4>Type: {{$vehicles->type}}</h4>
        <h4>Rent Date & Time: <?php echo $rentDateTime; ?></h4>
        <h4>Return Date & Time: <?php echo $returnDateTime; ?></h4>
        <h4>Total Rent Duration : {{$days}} Days and {{$hours}} Hours</h4>
        <h4>Total Price: RM {{($days * $vehicles->price_per_day) + ($hours * $vehicles->price_per_hour)}} </h4>
        <p><a class="btn btn-secondary" href="/" role="button">Go to home page</a></p>
    </div>
</div>
@endsection
