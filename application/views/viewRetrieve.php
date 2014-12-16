<!DOCTYPE html>
<html lang="en">
<head>
	<title>Retrieve Ticket</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>

</head>
<body>
<?php include('menu.php');?>

<center>

<div class="content"> 
<div class="container">
<h2><b>Ticket Information</b></h2><br/>
<h3>Name: <?php echo $passName;?></h3>
<?php

  if(isset($departSum) && !empty($departSum)){
    echo "<h4>Departure</h4>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th>Flight ID</th> <th>Flight Date</th><th>Departure Time</th><th>Arrival Time</th> <th>From</th>
          <th>To</th><th>Fee</th></tr>";
    echo "<tr><td style='width:15%'>".$departSum[0]->flightID."</td>";
    echo "<td style='width:15%'>".$departSum[0]->flightDate."</td>";
    echo "<td style='width:20%'>".$departSum[0]->departTime."</td>";
    echo "<td style='width:15%'>".$departSum[0]->arriveTime."</td>";
    echo "<td style='width:10%'>".$departSum[0]->from."</td>";
    echo "<td style='width:10%'>".$departSum[0]->to."</td>";
    echo "<td style='width:15%'>".$departSum[0]->fee."</td>";
    echo "</table>";
  }
  if(isset($returnSum) && !empty($returnSum)){
    echo "<h4>Return</h4>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th>Flight ID</th> <th>Flight Date</th><th>Departure Time</th><th>Arrival Time</th> <th>From</th>
          <th>To</th><th>Fee</th></tr>";
    echo "<tr><td style='width:15%'>".$returnSum[0]->flightID."</td>";
    echo "<td style='width:15%'>".$returnSum[0]->flightDate."</td>";
    echo "<td style='width:20%'>".$returnSum[0]->departTime."</td>";
    echo "<td style='width:15%'>".$returnSum[0]->arriveTime."</td>";
    echo "<td style='width:10%'>".$returnSum[0]->from."</td>";
    echo "<td style='width:10%'>".$returnSum[0]->to."</td>";
    echo "<td style='width:15%'>".$returnSum[0]->fee."</td>";
    echo "</table>";
  }
  if(isset($departAddFee) && !empty($departAddFee)){
    echo "<h4>Departure Add-on</h4>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th>Charge ID</th> <th>Title</th> <th>Description</th><th>Fee</th>
          </tr>";
    echo "<tr><td style='width: 20%'>".$departAddFee[0]->chargeID."</td>";
    echo "<td style='width:25%''>".$departAddFee[0]->title."</td>";
    echo "<td style='width:40%'>".$departAddFee[0]->description."</td>";
    echo "<td style='width:15%'>".$departAddFee[0]->fee."</td></tr>";
    echo "</table>";
  }
  if(isset($returnAddFee) && !empty($returnAddFee)){
    echo "<h4>Rerturn Add-on</h4>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th>Charge ID</th> <th>Title</th> <th>Description</th><th>Fee</th>
          </tr>";
    echo "<tr><td style='width: 20%'>".$returnAddFee[0]->chargeID."</td>";
    echo "<td style='width:25%''>".$returnAddFee[0]->title."</td>";
    echo "<td style='width:40%'>".$returnAddFee[0]->description."</td>";
    echo "<td style='width:15%'>".$returnAddFee[0]->fee."</td></tr>";
    echo "</table>";
  }
  ?>
<button class="btn btn-danger" type="button" onclick="cancelTicket(data)">Cancel Ticket</button><br/><br/>
</div>
</center>
<form name="data" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/cancel');?>">
<input type="hidden" id="bookingID" name="bookingID" value=<?php echo $bookingID;?>>
<input type="hidden" name="icPass" name="icPass" value="">
</form>
</div>
</body>
<?php include('js.php');?>
<script type="text/javascript">
function cancelTicket(form) {
    var icPass = prompt("Please enter your IC/Passport Number for cancelation");
    
    if (icPass != null) {
      form.icPass.value=icPass;
      form.submit();
    }
}
</script>
</html>
