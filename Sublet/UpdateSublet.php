<?php

/* 
 * Update Sublet Post
 * Craig Veenstra
 */
require_once '../model/config.php';
include "../model/subletDB.php";

//This id needs to change into the session id
$id = 2;

//a variable holding the method to update the database, it is an array holding the colomn names
$usergeneric = subletDB::getSubletbyID($id);


//check if the form was posted
        if(isset($_POST['update'])){
            
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

 <h1>Update Sublet Information</h1>
    
    <form action="../user_dash/index.php?pid=<?php echo $property_id; ?>" method="post">
        <p>Room Description</p>
        <textarea name="roomDescription" rows="10" cols="50"><?php echo $usergeneric["info"] ?></textarea>
        <p>Rent Amount</p>
        <input type="text" name="rentAmount" value="<?php echo $usergeneric["rentAmount"] ?>" />
        <p>Start Date</p>
        <input type="text" class="datepicker" name="startDate" value="<?php echo $usergeneric["startDate"] ?>"/>
        <p>End Date</p>
        <input type="text" class="datepicker" name="endDate" value="<?php echo $usergeneric["endDate"] ?>"/>
        <input type="submit" value="Post" name="update" />
        <input type="submit" value="Delete" />
        
    </form>