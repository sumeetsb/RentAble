<?php
/* 
 * Craig Veenstra
 * Tenant Application feature
 */

include ('../model/config.php');


?>

<!DOCTYPE html>
<html>
<head>
<title>Tenant Application</title>
</head>

<body>
    <h1>Apply to be a Tenant</h1>
    <h2>PLACEHOLDER FOR PROPERTY INFORMATION</h2>
    <h2>PLACEHOLDER FOR TENANT INFORMATION</h2>
    
    <?php
     //check if the form was posted
        if(isset($_POST['apply'])){
            
            //INLCLUDE THE PROPERTY VALUES AND USER VALUES
            $user_id = $_SESSION['id'];
            $property_id = $_GET['pid'];
            $message = $_POST["message"];
            
            //tenant object is a variable containing an object, which garuntees the required properties.
            $tenantObject = new Tenant($user_id, $property_id, $message);
            
            //variables being passed to properties as parameters, (insertApplcation) is the function inside the class - called a method
            //applicationDB is a class containing a static method 
            $insertTenant = applicationsDB::insertApplications($tenantObject);        
            
            header("location: ../index.php");   
        }
           
    ?>
    
    <!----------------------------------------------------
    ----------    The Tenant Application Form    --------
    ----------------------------------------------------->
 
    <form action="index.php?pid=<?php echo $property_id; ?>" method="post">
        <p>Message to the Landlord</p>
        <textarea name="message" rows="10" cols="50"></textarea>
        <input type="submit" value="Submit" name="apply" />
    </form>
</body>

</html>