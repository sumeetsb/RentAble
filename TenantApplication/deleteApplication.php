<?php
/* 
 * Craig Veenstra
 * Application feature
 * Delete Application
 */
require '../model/db_connect.php';
require '../model/applicationsDB.php';


if(isset($_POST['delete'])){
    $appid = $_POST['appid'];
    $delete = deleteApplicant::delete($appid);
    
    header("location: ../index.php");
}
?>




<h1>Delete Application</h1>
<h2>Are you sure you want to delete this application?</h2>
<table>
    <?php
    $appid = $_GET['appid'];
    $application = getTenantApplication::getApplication($appid);
    $user = getUserInfo::getInfo($application->getuser_id());
            echo "<tr><td>Username: </td><td>".$user->getUname()."</td></tr>";
            echo "<tr><td>Name: </td><td>".$user->getFname(). " " . $user->getLname()."</td></tr>";
            echo "<tr><td>Email: </td><td>".$user->getEmail()."</td></tr>";
            echo "<tr><td>Phone: </td><td>".$user->getPhone()."</td></tr>";
            echo "<tr><td>Age: </td><td>".$user->getAge()."</td></tr>";
            echo "<tr><td>Gender: </td><td>".$user->getGender()."</td></tr>";
            echo "<tr><td>Smoker: </td><td>".$user->getSstatus()."</td></tr>";
            echo "<tr><td>Employment Status: </td><td>".$user->getEmp()."</td></tr>";
            echo "<tr><td>Pets: </td><td>".$user->getPets()."</td></tr>";  
            echo "<tr><td><form action='deleteApplication.php' method='POST'><input type='hidden' name='appid' value='$appid' /><input type='submit' value='Delete' name='delete'></form></td></tr>";
     ?>
</table>

