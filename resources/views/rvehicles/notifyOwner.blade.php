<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

form {
  border: 3px solid #f1f1f1;
  font-family: Arial;
}

.container {
  padding: 20px;
  background-color: #f1f1f1;
}

input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=checkbox] {
  margin-top: 16px;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  border: none;
}

input[type=submit]:hover {
  opacity: 0.8;
}
</style>
<body>

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
    <h2>UKM VRS</h2>
    <h3>Dear Sir/Madam</h3>
    <h3>We are happy to inform you that your vehicle has been rented by <?php echo Auth()->user()->name?>.</h3>
    <h3><?php echo Auth()->user()->name?> will be waiting for you to recieve the vehicle at <?php echo Auth()->user()->address?>.</h3><br>

    <h3>Your customer's information are shown below:-</h3>
    <div class="container">
    <div class="d-md-flex flex-md-equal w-100 my-md-6 pl-md-6" id="cars">
        <div class="bg-dark mr-md-6 pt-6 px-6 pt-md-8 px-md-8 text-white overflow-hidden" style="padding-left:20px" id="cars">
            <h3>Phone number: <?php echo Auth()->user()->phone_no?></h3>
            <h3>Rent date & time: <?php echo $rentDateTime; ?></h3>
            <h3>Return date & time: <?php echo $returnDateTime; ?></h3>
            <h3>Total Rent Duration : {{$days}} Days and {{$hours}} Hours</h3>
            <h3>Total Price: RM {{($days * $data1["price_per_day"]) + ($hours * $data1["price_per_hour"])}} </h3>
        </div>
    </div>
    </div>
    <br>
    <h3>The details of your rented vehicle are shown below:-</h3>
    <div class="container">
        <div class="d-md-flex flex-md-equal w-100 my-md-6 pl-md-6" id="cars">
            <div class="bg-dark mr-md-6 pt-6 px-6 pt-md-8 px-md-8 text-white overflow-hidden" style="padding-left:20px" id="cars">
                <h3>Plate number: {{ $data1["plate_no"] }}</h3>
                <h3>Manufacturer: {{ $data1["manufacturer"] }}</h3>
                <h3>Model: {{ $data1["model"] }} ({{ $data1["production_year"] }})</h3>
                <h3>Type: {{ $data1["type"] }}</h3>
                <h3>Price per day: RM {{ $data1["price_per_day"] }}</h3>
                <h3>Price per hour: RM {{ $data1["price_per_hour"] }}</h3>
            </div>
        </div>
    </div>
    <br>
    <h3>For our services, you shall pay us 10% of your total profit which is: RM  {{(($days * $data1["price_per_day"]) + ($hours * $data1["price_per_hour"])) * 0.1}} </h3>
    <h3>In order to lease your vehicle one more time after it is brought back by <?php echo Auth()->user()->name?>, you may change its status to Available.</h3>
    <br>
    <h2>Thank you for using UKM VRS (:</h2>
</body>
</html>
