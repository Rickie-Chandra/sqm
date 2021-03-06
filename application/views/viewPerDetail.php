<!DOCTYPE html>
<html lang="en">
<head>
	<title>Personal Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>
  <link rel="stylesheet" href ="<?php echo(CSS.'jquery-ui.css')?>">

</head>
<body>
<?php include('menu.php');?>

<center>



<div class="content"> 
<ul class="nav nav-tabs">
  <li role="presentation"><a>Flight</a></li>
  <li role="presentation" class="active"><a>Passenger Profile</a></li>
  <li role="presentation"><a>Select Seat</a></li>
  <li role="presentation"><a>Payment</a></li>
</ul>

<center>

<div class="container">
<form name="personal" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/selectSeat');?>">
<h1><b>Traveller Detail</b></h1>
<table class='table table-hover table-color'>
<tr><td>Name</td>
<td><input class="form-control" type="text" placeholder="e.g. Leonardo Thecaprio" name="name"></input></td></tr>
<tr><td>Date of Birth</td>
<td><input class="form-control" type="text" id="datepicker" placeholder="e.g 08/08/1988" name="DOB"></input></td></tr>
<tr><td>IC / Passport</td>
<td><input class="form-control" type="text" placeholder="e.g. A21321332" name="icPass"></input></td></tr>
<tr><td>Email</td>
<td><input class="form-control" type="email" placeholder="e.g. Email@domain.com" name="email"></input></td></tr>
<tr><td>Phone</td>
<td><input class="form-control" type="text" placeholder="e.g. +620113687265" name="phone"></input></td></tr>
<tr><td>Address</td>
<td><input class="form-control" type="text" placeholder="e.g. abcd street no 38, Kuala Lumpur, Indonesia" name="address"></input></td></tr>
</table>
<h1><b>Emergency</b></h1>
<table class='table table-hover table-color'>
<tr><td>Name</td>
<td><input class="form-control" type="text" placeholder="Full Name" name="emergencyName"></input></td></tr>
<tr><td>Relationship</td>
<td><input class="form-control" list="relation" placeholder="Click Here" name="emergencyRelation"></input></td></tr>
	<datalist id="relation">
		<option value='Parent'>
		<option value='Husband / Wife'>
		<option value='Brother / Sister'>
		<option value='Children'>
		<option value='Other'>
	</datalist>
<tr><td>Phone</td>
<td><input class="form-control" type="text" placeholder="e.g. +620113687265" name="emergencyPhone"></input></td></tr>
</table>
<?php
if(isset($departFlight) && !empty($departFlight)){
  echo "<h1><b>Depart Flight Add on</b></h1>";
  echo "<table class='table table-hover table-color'>";
  echo "<tr><th>Charge ID</th> <th>Title</th> <th>Description</th> <th>Cost</th></tr>";
  foreach ($result as $index => $row){
      echo "<tr><td>".$row->chargeID."</td>";
      echo "<td>".$row->title."</td>";
      echo "<td>".$row->description."</td>";
      echo "<td><input type='radio' name='departAddFee' value='".$row->chargeID."'> ".$row->fee."</td></tr>";
    }
  echo "</table>";
}if(isset($returnFlight) && !empty($returnFlight)){
  echo "<h1><b>Return Flight Add on</b></h1>";
  echo "<table class='table table-hover table-color'>";
  echo "<tr><th>Charge ID</th> <th>Title</th> <th>Description</th> <th>Cost</th></tr>";
  foreach ($result as $index => $row){
      echo "<tr><td>".$row->chargeID."</td>";
      echo "<td>".$row->title."</td>";
      echo "<td>".$row->description."</td>";
      echo "<td><input type='radio' name='returnAddFee' value='".$row->chargeID."'> ".$row->fee."</td></tr>";
    }
  echo "</table>";
}
//echo "<button class='btn btn-lg btn-primary btn-block' type='button' onclick='check(personal)'>Send</button>";
?>
</form>
<button class='btn btn-lg btn-primary btn-block' type='button' onclick='check(personal)'>Send</button>
<br/><br/><br/>
</div>

</center>
</div>
</body>
<?php include('js.php');?>
<script src="<?php echo(JS.'jquery-ui.js')?>"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
  });
</script>
<script>
        function check(form) {
            if (form.name.value == "" || form.DOB.value == "" || form.icPass.value == "" || form.email.value == "" 
			|| form.phone.value == "" || form.address.value == "" || form.emergencyName.value == ""
			|| form.emergencyRelation.value == "" || form.emergencyPhone.value == "")
                {
                    alert("Please fill all information neeeded");
                }
                else {
                    form.submit();
                }
        }

</script>
</html>
