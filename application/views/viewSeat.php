<!DOCTYPE html>
<html lang="en">
<head>
	<title>Select Seat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>

</head>
<body>
<ul class="nav nav-tabs">
  <li role="presentation"><a>Flight</a></li>
  <li role="presentation"><a>Passenger Profile</a></li>
  <li role="presentation" class="active"><a>Select Seat</a></li>
  <li role="presentation"><a>Payment</a></li>
</ul>

<center>

<br /><br />
<div class="container">
<form name="seat" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/payment');?>">

  <?php 
  if(!empty($departCapacity)){
    echo "<h3> Departure Seat Selection</h3>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th> A </th><th> B </th><th>   </th>
          <th> C </th><th> D </th></tr>";
	for ($i=1; $i<($departCapacity/4)+1; $i++){
	echo "<tr>";
	$seat = '0';
		for ($j=0; $j<count($departSelected); $j++){
		if($departSelected[$j]==$i.'A' || $departSelected[$j]==$i.'B'
		||$departSelected[$j]==$i.'C' || $departSelected[$j]==$i.'D'){
			$seat = $departSelected[$j];}	
		}
		if($seat == $i."A"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='departSeat' value='".$i."A'>".$i."A</td>";}
		if($seat == $i."B"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='departSeat' value='".$i."B'>".$i."B</td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='departSeat' value='".$i."C'>".$i."C</td>";}
		if($seat == $i."D"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='departSeat' value='".$i."D'>".$i."D</td>";}
	echo "</tr>";
	}
    echo "</table>";
}
  ?>

  
  <?php 
  if(!empty($returnCapacity)){
    echo "<h3> Return Seat Selection</h3>";
    echo "<table class='table table-hover table-color'>";
    echo "<tr><th> A </th><th> B </th><th>   </th>
          <th> C </th><th> D </th></tr>";
	for ($i=1; $i<($returnCapacity/4)+1; $i++){
	echo "<tr>";
	$seat = '0';
		for ($j=0; $j<count($returnSelected); $j++){
		if($returnSelected[$j]==$i.'A' || $returnSelected[$j]==$i.'B'
		||$returnSelected[$j]==$i.'C' || $returnSelected[$j]==$i.'D'){
			$seat = $returnSelected[$j];}	
		}
		if($seat == $i."A"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='returnSeat' value='".$i."A'>".$i."A</td>";}
		if($seat == $i."B"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='returnSeat' value='".$i."B'>".$i."B</td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='returnSeat' value='".$i."C'>".$i."C</td>";}
		if($seat == $i."D"){echo "<td>n/a</td>";}
		else{echo "<td><input type='radio' name='returnSeat' value='".$i."D'>".$i."D</td>";}
	echo "</tr>";
	}
    echo "</table>";
}
  ?>
<button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
</form>


</div>

</center>

</body>
<?php include('js.php');?>
</html>
