<!DOCTYPE html>

<?php
/* 
 * Craig Veenstra
 * Sublet feature for tenants
 * Admin Side
 */

?>

<html>
<head>
<title></title>
<script src="../js/jquery-1.11.2.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.theme.min.css" />
<script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  </script>
</head>

<body>
    <h1>Post a Notice for Sublet</h1>
    <form>
        <p>Room Description</p>
        <textarea name="roomDescription" rows="10" cols="50"></textarea>
        <p>Rent Amount</p>
        <input type="text" name="rentAmount" />
        <p>Start Date</p>
        <input type="text" class="datepicker" />
        <p>End Date</p>
        <input type="text" class="datepicker" />
        <input type="submit" value="Post" />
        <input type="submit" value="Delete" />
        
    </form>
</body>

</html>