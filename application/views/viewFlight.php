<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>

</head>
<body>
<?php include('menu.php');?>

<center>

<div class="content"> 
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Flight</a></li>
  <li role="presentation"><a href="#">Passenger Profile</a></li>
  <li role="presentation"><a href="#">Select Seat</a></li>
  <li role="presentation"><a href="#">Payment</a></li>
</ul>

<center>
<br /><br />
<h1><b>Departure</b></h1>
<div class="container">
<form name="flight" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/personalDetails');?>">

  <?php 
  if(isset($result) && !empty($result)){
    echo "<h4>".$result[0]->flightDate."<br/><br/>".$result[0]->from." -> ".$result[0]->to."</h4>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr> <th>Flight ID</th> <th>Aircraft ID</th> <th>Departure Time</th>
          <th>Arrival Time</th> <th>Price</th> </tr>";
    foreach ($result as $index => $row){
      echo "<tr><td>".$row->flightID."</td>";
      echo "<td>".$row->craftID."</td>";
      echo "<td>".$row->departTime."</td>";
      echo "<td>".$row->arriveTime."</td>";
      echo "<td><input type='radio' id='departFlight' name='departFlight' value='".$row->flightID."'> RM ".$row->fee."</td></tr>";
    }
    echo "</table>";
  } else{
    echo "Sorry, No flight";
    echo "<input type='hidden' id='departFlight' name='returnFlight' value='FALSE'>";
  }
  ?>

  
  <?php 
  if (isset($return) || !empty($return)) {
    if(!is_array($return)){
      echo "<h1><b>Return</b></h1>";
      echo "Sorry, No Flight";
      echo "<input type='hidden' id='returnFlight' name='returnFlight' value='FALSE'>";
    } elseif(!empty($return)){
      echo "<h1><b>Return</b></h1>";
      echo "<h4>".$return[0]->flightDate."<br/><br/>".$return[0]->from." -> ".$return[0]->to."</h4>";
      echo "<table class='table table-hover table-color'>";
      echo "<tr> <th>Flight ID</th> <th>Aircraft ID</th> <th>Departure Time</th>
          <th>Arrival Time</th> <th>Price</th> </tr>";
    foreach ($return as $index => $row){
      echo "<tr><td>".$row->flightID."</td>";
      echo "<td>".$row->craftID."</td>";
      echo "<td>".$row->departTime."</td>";
      echo "<td>".$row->arriveTime."</td>";
      echo "<td><input type='radio' id='returnFlight' name='returnFlight' value='".$row->flightID."'>RM ".$row->fee."</td></tr>";
    }
    echo "</table>";
  }
} 
  ?>
 <button class="btn btn-lg btn-primary btn-block" type="button" onClick="check(flight)">Send</button>
 <br/><br/><br/>
</form>


</div>

</center>
</div>
</body>
<?php include('js.php');?>
<script type="text/javascript">
  function check(form) {
      if (form.departFlight.value == "" || form.returnFlight.value == "")
          { 
            alert("Please fill all information neeeded");
          }
          else {
            form.submit();
          }
        }
</script>
</html>
