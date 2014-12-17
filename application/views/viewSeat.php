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

<div class="content"> 
<ul class="nav nav-tabs">
  <li role="presentation"><a>Flight</a></li>
  <li role="presentation"><a>Passenger Profile</a></li>
  <li role="presentation" class="active"><a>Select Seat</a></li>
  <li role="presentation"><a>Payment</a></li>
</ul>

<center>

<br /><br />
<h1><b> Flight Option </b></h1> 
<div class="container">
<div id="wrap" >
			<div id="content2">
			<img src="<?php echo IMG.'logo.png';?>"style="text-align:right;"><br /><br /><br />
			<p><font size="5">Please select your seat by clicking on it. <br />Please select your sit for return, <br />if you have any return flight.
			</p>
			<br /><br />
			<img src="<?php echo IMG.'sit.jpg';?>"style="text-align:right;">
			</div>
<div id="sidebar">
<form name="seat" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/payment');?>">
<div class="check"> 
  <?php 
  if(!empty($departCapacity)){
    echo "<h2> Seat Map</h2>";
    echo "<h3> Flight from origin</h3>";
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
		if($seat == $i."A"){echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='departSeat' value='".$i."A'></label></td>";}
		if($seat == $i."B"){echo "<td><label for='B".$i."'><input type='radio' id='B".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='B".$i."'><input type='radio' id='B".$i."' name='departSeat' value='".$i."B'></label></td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td><label for='C".$i."'><input type='radio' id='C".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='C".$i."'><input type='radio' id='C".$i."' name='departSeat' value='".$i."C'></label></td>";}
		if($seat == $i."D"){echo "<td><label for='D".$i."'><input type='radio' id='D".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='D".$i."'><input type='radio' id='D".$i."' name='departSeat' value='".$i."D'></label></td>";}
	echo "</tr>";
	}
    echo "</table>";
}
  ?>
</div>
<div class="check2">   
  <?php 
  if(!empty($returnCapacity)){
    echo "<h3> Flight from destination</h3>";
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
		if($seat == $i."A"){echo "<td><label for='E".$i."'><input type='radio' id='E".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='E".$i."'><input type='radio' id='E".$i."' name='returnSeat' value='".$i."A'></label></td>";}
		if($seat == $i."B"){echo "<td><label for='F".$i."'><input type='radio' id='F".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='F".$i."'><input type='radio' id='F".$i."' name='returnSeat' value='".$i."B'></label></td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td><label for='G".$i."'><input type='radio' id='G".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='G".$i."'><input type='radio' id='G".$i."' name='returnSeat' value='".$i."C'></label></td>";}
		if($seat == $i."D"){echo "<td><label for='H".$i."'><input type='radio' id='H".$i."' name='returnSeat' value='".$i."A' disabled></label></td>";}
		else{echo "<td><label for='H".$i."'><input type='radio' id='H".$i."' name='returnSeat' value='".$i."D'></label></td>";}
	echo "</tr>";
	}
    echo "</table>";
}
  ?>
  </div> 
  
  </div>
  
  
<button class="btn btn-lg btn-primary btn-block" type="button" onClick="check(seat)">Send</button>
<br/><br/>
</form>

</div>
</div>
</div>
</center>
</body>
<?php include('js.php');?>

<script>
$(function(){ 
   $('.check input').attr("checkide",false); 
   $('.check input').click(function(){ 
      $('.check input').attr("checkide",false); 
      $('.check input').parent().removeClass('on'); 
      $(this).attr("checkide",true); 
      $(this).parent().addClass('on'); 
   }); 
   $('.check input').each(function(){ 
      $('.check input[disabled]').parent().css("background",'#0e3f9f'); 
   }); 

}); 
$(function(){ 
   $('.check2 input').attr("checkide",false); 
   $('.check2 input').click(function(){ 
      $('.check2 input').attr("checkide",false); 
      $('.check2 input').parent().removeClass('on'); 
      $(this).attr("checkide",true); 
      $(this).parent().addClass('on'); 
   }); 
   $('.check2 input').each(function(){ 
      $('.check2 input[disabled]').parent().css("background",'#0e3f9f'); 
   }); 

}); 
 

  function check(form) {
    if (form.departSeat.value.length<1<?php if (isset($return) || !empty($return)) {echo " || form.returnSeat.value.length<1";}?>){
      alert("Please choose your seat");
      }
      else {
      form.submit();
      }
    }

</script>

</html>
