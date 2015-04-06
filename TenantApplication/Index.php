<?php
/* 
 * Craig Veenstra
 * Tenant Application feature
 */

require_once ('insert.php');
require_once ('../model/applicationsDB.php');
//require ('../model/db_connect.php');
require_once ('../model/propertiesClass.php');

//----------------------------------------------------
//----------    The Tenant Application Logic    ------
//----------------------------------------------------

 /////////////  the application form logic   //////////////    
    //check if the form was posted
        if(isset($_POST['apply'])){
            
            
            $user_id = $_SESSION['id'];
            $property_id = $_GET['pid'];
            
            $message = $_POST["message"];
            
            //tenant object is a variable containing an object, which garuntees the required properties.
            $tenantObject = new Tenant($user_id, $property_id, $message);
            
            //variables being passed to properties as parameters, (insertApplcation) is the function inside the class - called a method
            //applicationDB is a class containing a static method 
            $insertTenant = ApplicationDB::insertApplications($tenantObject);        
            
            header("location: ../index.php");   
        }
?>

<!DOCTYPE html>
<html>
<head>
<title>Tenant Application</title>
</head>

<body>
    <h1>Apply to be a Tenant</h1>
   
    
    <!--/////////////  getting the property information   ///////-->
    <table>
    <?php
    
    //$user_id = $_SESSION['id'];
    
    $p_id = $_GET['propid'];
    $property = PropertiesClass::getPropertyById($p_id); 
        echo '<th>Property Information</th>';
        echo '<tr><td>' . $property->getName().'</td></tr>'; 
        echo '<tr><td>' . $property->getStreet().'</td></tr>';
        echo '<tr><td>' . $property->getPostal().'</td></tr>';
        echo '<tr><td>' . $property->getCity().'</td></tr>';
        echo '<tr><td>' . $property->getProvince().'</td></tr>';
        echo '<tr><td>' . $property->getType().'</td></tr>';
    ?>
    </table>
    
    
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