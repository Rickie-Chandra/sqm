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

<div class="input-group">
    <form name="search" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/searchFlight')?>">
        <table>
            <tr>
                <td><h5>From </h5></td>
                <td>
                <input class="form-control" list="airport" placeholder="AirPort" name="port"></input>
                <datalist id="airport">
                    <?php
                    foreach ($port as $index => $row){
                    echo "<option value='".$row->Name."'>";}
                    ?>
                </datalist>
                </td>
            </tr>
            <tr>
                <td><h5>To </h5></td>
                <td><input class="form-control" list="aircraft" type="text" placeholder="AircraftID" name="craft"></input></td>
            </tr>
            <tr>
                <td><h5>Depart </h5></td>
                <td><input class="form-control"  type="date" placeholder="Departure" name="dDate"></input></td>
            </tr>
            <tr>     
                <td><h5>Return </h5></td>
                <td><input class="form-control" type="date" placeholder="Arrival" name="rDate" id="rDate"></input></td>
            </tr>
        </table>
        <br/>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="check(search)">Send</button>
    </form>
</div>


</div>
</center>

</body>
<?php include('js.php');?>


<script>
        function check(form) {
            if ((form.to.value == "" || form.from.value == "" || form.dDate.value == ""))
                {
                    alert("Please fill all information neeeded");
                }
                else {
                    form.submit();
                }
        }

        function oneWay(){
            document.getElementById("rDate").disabled = true;
            document.getElementById("rDate").value = null;
        }

        function twoWays(){
            document.getElementById("rDate").disabled = false;
        }

</script>


</html>
