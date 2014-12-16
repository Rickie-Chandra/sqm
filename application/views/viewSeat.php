<!DOCTYPE html>
<html lang="en">
<head>
	<title>Select Seat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>

</head>
<body>

<?php include('menu.php');?>

<center>

<ul class="nav nav-tabs">
  <li role="presentation"><a>Flight</a></li>
  <li role="presentation"><a>Passenger Profile</a></li>
  <li role="presentation" class="active"><a>Select Seat</a></li>
  <li role="presentation"><a>Payment</a></li>
</ul>

<center>

<div class="content"> 
<br /><br />

<div class="container">

<div id="sidebar">
<form name="seat" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/payment');?>">
<div class="check"> 
  <?php 
  if(!empty($departCapacity)){
    echo "<h3> Seat Map</h3>";
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
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='departSeat' value='".$i."A'></label></td>";}
		if($seat == $i."B"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='departSeat' value='".$i."B'></label></td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='departSeat' value='".$i."C'></label></td>";}
		if($seat == $i."D"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='departSeat' value='".$i."D'></label></td>";}
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
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='returnSeat' value='".$i."A'></label></td>";}
		if($seat == $i."B"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='returnSeat' value='".$i."B'></label></td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='returnSeat' value='".$i."C'></label></td>";}
		if($seat == $i."D"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A1'><input type='radio' id='A1' name='returnSeat' value='".$i."D'></label></td>";}
	echo "</tr>";
	}
    echo "</table>";
}
  ?>
  </div> 
  
  </div>
  
  <br /><br /><br />
<button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
<br /><br /><br />
</form>


</div>
</div>
</center>

</body>
<?php include('js.php');?>

<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript"> 
//<![CDATA[ 
$(function(){ 
   $('.check input').attr("checkide",false);
   $('.check input').click(function(){ //when click
      var test = $(this).attr("checkide"); //whether it is checked or not 
      if(test == "false"){ //if its not checked
         $(this).attr("checkide",true); //add
         $(this).parent().addClass('on'); 
      } 
      if(test == "true"){ //if its checked 
         $(this).attr("checkide",false); 
         $(this).parent().removeClass('on'); 
      } 
   }); 
}); 
//]]> 
</script>
</html>
