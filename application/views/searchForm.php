

<h3>Online Reservation</h3>
<br/>

<div class="btn-group">
                <button type="button" class="btn btn-default" onclick="twoWays()">Return Trip</button>
                <button type="button" class="btn btn-default" onclick="oneWay()">One Way</button>
</div>
<br/><br/>

<div class="input-group">
    <form name="search" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/searchFlight')?>">
        <table>
            <tr>
                <td><h5>From </h5></td>
                <td>
                <input class="form-control" list="airport" placeholder="From" name="from"></input>
                <datalist id="airport">
                    <?php
                    foreach ($result as $index => $row){
                    echo "<option value='".$row->Name."'>";}
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