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
    <h1><b>Success!!</b></h1>  

    <div id="content">
      <h3>Thank you</h3>
        <p><a href=<?php echo URL."index.php/controller/showTicket";?>>Click this to see your e-ticket, Ticket</a></p>


        <p><a href=<?php echo URL;?>>Click here to go back to home page.</a></p>
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

</html>
