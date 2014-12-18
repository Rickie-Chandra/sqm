<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href ="<?php echo(CSS.'jquery-ui.css')?>">
  <script src="<?php echo(JS.'jquery-1.11.0.min.js')?>"></script>
  <script src="<?php echo(JS.'jquery-ui.js')?>"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
$(function() {
    $( "#datepicker2" ).datepicker();
  });

  </script>
</head>
<body>
 
<p>Date1: <input type="text" id="datepicker"></p>
<p>Date2: <input type="text" id="datepicker2"></p>
 
 
</body>
</html>