<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('css.php');?>

</head>

<body>

<?php include('menu.php');?>

<div class="content"> 
 
<center>

 <img src="<?php echo IMG.'big.png';?>"style="text-align:right;">
 
 <div id="wrapper">
 
  <div class="row">
  <br />
    <div class="col-md-4">
    <h1><font color="white"><b>Online Reservation</b></h1>	

<div id="content">
    <div class="btn-group">
      <button type="button" class="btn btn-default" onclick="twoWays()">Return Trip</button>
      <button type="button" class="btn btn-default" onclick="oneWay()">One Way</button>
    </div><br /><br />
    <div class="input-group">
    <form name="search" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/searchFlight');?>">
        <table>

			<tr> 
			<td>
			<h2> Origin : </h2>
			</td>    
				<td>
                <input class="form-control" list="airport" placeholder="Origin" name="from"></input>
                <datalist id="airport">
                    <?php
                    foreach ($result as $index => $row){
                    echo "<option value='".$row->name."'>";}
                    ?>
                </datalist>
                </td> 
			<td><input class="form-control"  type="date" placeholder="Departure Date" name="departDate"></input></td>

			</tr>

			<tr>
			<td>
			<h2> Destination : </h2>
			</td>
			<td><input class="form-control" list="airport" type="text" placeholder="Destination" name="to"></input></td>
				
			<td><input class="form-control" type="date" placeholder="Arrival date" name="returnDate" id="returnDate"></input></td>
			</tr>
        </table>
        <br/>
    </form>
    </div>
	
        <br /><br />
    </div>
	<br/><br/>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="check(search)">Search</button>
	<br/><br/>
    </div>
	
   </div>  
</div>
</center>
<br/><br/><br/>
<p align = "center";> Jayasree Ravindaran,Rickie Wongso Chandra,Jay Jay Abdulsalam,Hwang Hoon Seub 
<br/> University of Nottingham Malaysia</p>
  
<br/><br/><br/>

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

        function oneWay(){
            document.getElementById("returnDate").disabled = true;
            document.getElementById("returnDate").value = null;
        }

        function twoWays(){
            document.getElementById("returnDate").disabled = false;
        }

</script>

</html>
