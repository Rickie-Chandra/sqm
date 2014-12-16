<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>

</head>
<body>
<?php include('menu.php');?>

<center>




<ul class="nav nav-tabs">
  <li role="presentation"><a>Flight</a></li>
  <li role="presentation"><a>Passenger Profile</a></li>
  <li role="presentation"><a>Select Seat</a></li>
  <li role="presentation" class="active"><a>Payment</a></li>
</ul>

<center>

<div class="content"> 
<div class="container">
  <h1><b>Summary</b></h1><br/>
  <?php
  $sum=0;
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
    $sum += $departSum[0]->fee;
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
    $sum += $returnSum[0]->fee;
  }
  if(isset($additionalFee) && !empty($additionalFee)){
    echo "<h4>Additional Cost</h4>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th>Charge ID</th> <th>Title</th> <th>Description</th><th>Fee</th>
          </tr>";
    echo "<tr><td style='width: 20%'>".$additionalFee[0]->chargeID."</td>";
    echo "<td style='width:25%''>".$additionalFee[0]->title."</td>";
    echo "<td style='width:40%'>".$additionalFee[0]->description."</td>";
    echo "<td style='width:15%'>".$additionalFee[0]->fee."</td></tr>";
    echo "</table>";
    $sum += $additionalFee[0]->fee;
  }
  ?>
  <br /><br />
  <table class='table table-hover table-color'>
  <tr><th><center><b><i>Total amount you need to pay is: <?php echo($sum);?></i></b></center></th></table>
  <br />
</div>


<div class="container">
<form name="payment" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/ticket');?>">
<h1><b>Payment</b></h1>
<table class='table table-hover table-color'>
<tr><td>Card Type</td>
<td><input class="form-control" list="relation" placeholder="Click Here" name="cardType"></input></td></tr>
	<datalist id="relation">
		<option value='VISA'>
		<option value='Master'>
		<option value='Paypal'>
	</datalist>
<tr><td>Card Number</td>
<td><input class="form-control" type="text" placeholder="Card Number" name="cardNum"></input></td></tr>
<tr><td>Card Holder Name</td>
<td><input class="form-control" type="text" placeholder="Card Holder Name" name="cardHold"></input></td></tr>
<tr><td>Expiration Date</td>
<td><input class="form-control"  type="date" placeholder="Expiration Date" name="expDate"></input></td></tr>
<tr><td>CW/CID Number</td>
<td><input class="form-control" type="text" placeholder="CW/CID Number" name="cwcid"></input></td></tr>
<tr><td>Card Issuing Country</td>
<td><input class="form-control" type="text" placeholder="Card Issuing Country" name="cardCountry"></input></td></tr>
</table>
<br/><br/>
<button class="btn btn-lg btn-primary btn-block" type="button" onclick="check(payment)">Send</button>
<br/><br/><br/>
</form>


</div>
</div>
</center>

</body>
<?php include('js.php');?>
<script>
        function check(form) {
            if (form.cardType.value == "" || form.cardNum.value == "" || form.cardHold.value == "" 
			|| form.expDate.value == "" || form.cwcid.value == "" || form.cardCountry.value == "")
                {
                    alert("Please fill all information neeeded");
                }
                else {
                    form.submit();
                }
        }

</script>
</html>
