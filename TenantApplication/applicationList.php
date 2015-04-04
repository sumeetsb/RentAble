<?php

/* 
 * Tenant Application List
 * Craig Veenstra
 */

require '../model/db_connect.php';
require '../model/applicationsDB.php';

?>

<h1>Tenant Applications</h1>

<?php

//THIS NEEDS TO BE THE SESSION
$p_id = 2;
$applicationArray = getTenantApplications::getTenantApps($p_id);
$UserInfo = getUserInfo::getInfo($p_id);
?>

<table>
    <?php  
        foreach($UserInfo as $user){
        echo "<th>Tenant Application</th>";
        echo "<tr><td>Username: </td><td>".$user->getUname()."</td></tr>";
        echo "<tr><td>Name: </td><td>".$user->getFname(). " " . $user->getLname()."</td></tr>";
        echo "<tr><td>Email: </td><td>".$user->getEmail()."</td></tr>";
        echo "<tr><td>Phone: </td><td>".$user->getPhone()."</td></tr>";
        echo "<tr><td>Age: </td><td>".$user->getAge()."</td></tr>";
        echo "<tr><td>Gender: </td><td>".$user->getGender()."</td></tr>";
        echo "<tr><td>Smoker: </td><td>".$user->getSstatus()."</td></tr>";
        echo "<tr><td>Employment Status: </td><td>".$user->getEmp()."</td></tr>";
        echo "<tr><td>Pets: </td><td>".$user->getPets()."</td></tr>";
        }
        foreach($applicationArray as $app){
            echo "<tr><td>Message: </td><td>".$app->getmessage()."</td></tr>";
        }
    ?>
</table>