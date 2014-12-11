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

<br /><br />

<div class="container">
  <div class="row">
  <br /><br /><br />
    <div class="col-md-4">
    <h3>Online Reservation</h3><br/>
    <div class="btn-group">
      <button type="button" class="btn btn-default" onclick="twoWays()">Return Trip</button>
      <button type="button" class="btn btn-default" onclick="oneWay()">One Way</button>
    </div><br /><br />
    <div class="input-group">
    <form name="search" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/searchFlight');?>">
        <table>
            <tr>
                <td><h5>From</h5></td>
                <td>
                <input class="form-control" list="airport" placeholder="From" name="from"></input>
                <datalist id="airport">
                    <?php
                    foreach ($result as $index => $row){
                    echo "<option value='".$row->name."'>";}
                    ?>
                </datalist>
                </td>
            </tr>
            <tr>
                <td><h5>To </h5></td>
                <td><input class="form-control" list="airport" type="text" placeholder="To" name="to"></input></td>
            </tr>
            <tr>
                <td><h5>Depart </h5></td>
                <td><input class="form-control"  type="date" placeholder="Departure" name="departDate"></input></td>
            </tr>
            <tr>     
                <td><h5>Return </h5></td>
                <td><input class="form-control" type="date" placeholder="Arrival" name="returnDate" id="returnDate"></input></td>
            </tr>
        </table>
        <br/>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="check(search)">Send</button>
    </form>
    </div>
        <br /><br />
    </div>

   	<div class="col-md-8">
      <div id="promo" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target = "#promo" data-slide-to="0" class="active"></li>
          <li data-target = "#promo" data-slide-to="1"></li>
         <li data-target = "#promo" data-slide-to="2"></li>
        </ol>
    
        <div class="carousel-inner">
    
          <div class="item active">
            <img src="<?php echo(IMG.'1.jpg');?>" class="img-responsive">
          </div>
        
          <div class="item">
            <img src="<?php echo(IMG.'2.jpg');?>" class="img-responsive">        
          </div>

          <div class="item">
            <img src="<?php echo(IMG.'3.jpg');?>" class="img-responsive">        
          </div>
        
          <a class="carousel-control left" href="#promo" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="carousel-control right" href="#promo" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>
      </div>
    </div>  
   </div>  
</div>
</center>

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
