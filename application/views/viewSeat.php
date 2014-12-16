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
<h1><b> Flight Option </b></h1> 
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
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='departSeat' value='".$i."A'>".$i."</label></td>";}
		if($seat == $i."B"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='departSeat' value='".$i."B'>".$i."</label></td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='departSeat' value='".$i."C'>".$i."</label></td>";}
		if($seat == $i."D"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='departSeat' value='".$i."D'>".$i."</label></td>";}
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
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='returnSeat' value='".$i."A'>".$i."</label></td>";}
		if($seat == $i."B"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='returnSeat' value='".$i."B'>".$i."</label></td>";}
		echo "<td></td>";
		if($seat == $i."C"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='returnSeat' value='".$i."C'>".$i."</label></td>";}
		if($seat == $i."D"){echo "<td>n/a</td>";}
		else{echo "<td><label for='A".$i."'><input type='radio' id='A".$i."' name='returnSeat' value='".$i."D'>".$i."</label></td>";}
	echo "</tr>";
	}
    echo "</table>";
}
  ?>
  </div> 
  
  </div>
  
  
<button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
<br /><br /><br />
</form>


</div>
</div>
</center>

</body>
<?php include('js.php');?>
<script type="text/javascript"> 
$(function(){ 
   $('.check input').click(function(){// 클릭시 
      $('.check input').attr("checkide",false); //모든 input을 체크해제 
      $('.check input').parent().removeClass('on'); // 모든 on 클레스 없에기 
      $(this).attr("checkide",true); //현재 선택한 녀석을 체크 
      $(this).parent().addClass('on'); // 현재 선택한 녀석의 부모(label)에게 on클레스 
   }); 
   $('.check input').each(function(){//현재있는 모든 input 들 중 
      $('.check input[disabled]').parent().css("background",'blue'); //disabled 속성이 있는 녀석 의 부모만 파란색 배경 주기 
   }); 
}); 
//]]> 
</script>
</html>
