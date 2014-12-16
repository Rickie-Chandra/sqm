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
<h1><b>Ticket Information</b></h1><br/>
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
    echo "<h4>Additional Cost</h4>";
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
    echo "<h4>Additional Cost</h4>";
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
</div>
</center>
</div>
</body>
<?php include('js.php');?>
<?php //include("footer.php");?>

<script>
        function check(form) {
            if ((form.to.value == "" || form.from.value == "" || form.departDate.value == ""))
                {
                    alert("Please fill all information neeeded");
                }
                else {
                    form.submit();
                }
        }
</script>
</html>
