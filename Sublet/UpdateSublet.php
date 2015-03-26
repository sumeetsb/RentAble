<?php

/* 
 * Update Sublet Post
 * Craig Veenstra
 */
require_once '../model/subletDB.php';

$id = $_SESSION['id'];

//a variable holding the method to update the database, it is an array holding the colomn names
$usergeneric = subletDB::getSubletbyID($id);


//check if the form was posted
        if(isset($_POST['update'])){
            
            $description = $_POST["roomDescription"];
            $rentAmount = $_POST["rentAmount"];
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $user_id = $_SESSION['id'];
            $property_id = $_GET['pid'];
            $subletObject = new Sublet($user_id, $property_id, $description, $rentAmount, $startDate, $endDate);
            //variables being passed to properties as parameters, (insertSublets) is the function inside the class - called a method
            //SubletDB is a class containing a static method 
            SubletDB::updateSublet($subletObject);        
            
            header("location: ../index.php");
            
        }

        if(isset($_POST['Delete'])){
            
            $description = $_POST["roomDescription"];
            $rentAmount = $_POST["rentAmount"];
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $user_id = $_SESSION['id'];
            $property_id = $_GET['pid'];
            $subletObject = new Sublet($user_id, $property_id, $description, $rentAmount, $startDate, $endDate);
            //variables being passed to properties as parameters, (insertSublets) is the function inside the class - called a method
            //SubletDB is a class containing a static method 
            SubletDB::deleteSublet($subletObject);        
            
            header("location: ../index.php");
            
        }
?>

 <h1>Update Sublet Information</h1>
    
 <form action="UpdateSublet.php?pid=<?php echo $_GET['pid'] ; ?>" method="post">
        <p>Room Description</p>
        <textarea name="roomDescription" rows="10" cols="50"><?php echo $usergeneric["info"] ?></textarea>
        <p>Rent Amount</p>
        <input type="text" name="rentAmount" value="<?php echo $usergeneric["rentAmount"] ?>" />
        <p>Start Date</p>
        <input type="text" class="datepicker" name="startDate" value="<?php echo $usergeneric["startDate"] ?>"/>
        <p>End Date</p>
        <input type="text" class="datepicker" name="endDate" value="<?php echo $usergeneric["endDate"] ?>"/>
        <input type="submit" value="Post" name="update" />
        <input type="submit" value="Delete" name="Delete"/>
        
    </form>