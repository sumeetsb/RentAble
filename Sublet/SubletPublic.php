<!DOCTYPE html>

<?php

/* 
 * Craig Veenstra
 * Sublet Feature
 * Public side
 */

require_once ('apply.php');
require_once ('insert.php');
require_once('../model/subletDB.php');
require_once('../model/config.php');
            
        //$_SESSION["u_id"] = 3;

        //check if the form was posted
        if(isset($_POST['apply'])){
            
            $message = $_POST["message"];
            $email = $_POST["email"];
            $u_id = $_SESSION['id'];
            
            $p_id = $_GET['pid'];
            
            $applyObject = new Apply($p_id, $u_id, $message, $email);
            
            $insertApplication = SubletDB::insertApplication($applyObject);        
            
            header("location: ../index.php");
            
        }
            $p_id = $_GET['pid'];

?>


<html>
<head>
<title>Apply For a Sublet</title>
</head>

<body>
    <h1>Apply for Sublet</h1>
    <form action="SubletPublic.php?pid=<?php echo $p_id; ?>" method="post">
        <p>Message</p>
        <textarea name="message" rows="10" cols="50"></textarea>
        <p>Your Email</p>
        <input type="text" name="email" />
        <input type="submit" value="Send" name="apply" />
    </form>
</body>

</html>



