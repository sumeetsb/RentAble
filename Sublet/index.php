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
  
  <?php
    require '../model/subletDB.php';
    require 'insert.php';
  ?>
  
</head>


<body>
    
    <!-----------------------------------------------------
    ----------    The Sublet Creation Form    -------------
    ------------------------------------------------------>
    
    <?php
    
        //The variables responsible for the empty forms presubmission    
            $description = "";
            $rentAmount = "";
            $startDate = "";
            $endDate = "";
            
            
        //check if the form was posted
        if(isset($_POST['insert'])){
            
            $description = $_POST["roomDescription"];
            $rentAmount = $_POST["rentAmount"];
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            
            //sublet object is a variable containing an object, which garuntees the required properties.
            $user_id = $_SESSION['id'];
            $property_id = $_GET['pid'];
            $subletObject = new Sublet($user_id, $property_id, $description, $rentAmount, $startDate, $endDate);
            
            //variables being passed to properties as parameters, (insertSublets) is the function inside the class - called a method
            //SubletDB is a class containing a static method 
            $insertSublet = SubletDB::insertSublets($subletObject);        
            
            header("location: ../index.php");
            
        }
            $property_id = $_GET['pid'];

    ?>
    
    <h1>Post a Notice for Sublet</h1>
    
    <form action="../user_dash/index.php?pid=<?php echo $property_id; ?>" method="post">
        <p>Room Description</p>
        <textarea name="roomDescription" rows="10" cols="50"><?php echo $description; ?></textarea>
        <p>Rent Amount</p>
        <input type="text" name="rentAmount" value="<?php echo $rentAmount; ?>" />
        <p>Start Date</p>
        <input type="text" class="datepicker" name="startDate" value="<?php echo $startDate; ?>" />
        <p>End Date</p>
        <input type="text" class="datepicker" name="endDate" value="<?php echo $endDate; ?>" />
        <input type="submit" value="Post" name="insert" />
        
    </form>
    
   
</body>
</html>