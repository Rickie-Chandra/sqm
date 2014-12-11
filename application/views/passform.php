

<h3>Passenger Details</h3>
<br/>

<div class="btn-group">
                <button type="button" class="btn btn-default" onclick="twoWays()">Return Trip</button>
                <button type="button" class="btn btn-default" onclick="oneWay()">One Way</button>
</div>
<br/><br/>

<div class="input-group">
    <form name="nPass" class="form-signin" role="form"method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/newPass')?>">
        <table>
            <tr>
                <td><h5>Full Name</h5></td>
                <td><input class="form-control" type="text" placeholder="Full Name" name="iName"></input></td>
            </tr>
            <tr>
                <td><h5>Date of Birth </h5></td>
                <td><input class="form-control"  type="date" placeholder="MM/DD/YYYY" name="dob"></input></td>
            </tr>
            <tr>
                <td><h5>Nationality </h5></td>
                <td><input class="form-control" type="text" placeholder="Nationality" name="nation"></input></td>
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
</script>