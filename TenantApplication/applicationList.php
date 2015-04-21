<?php

/* 
 * Tenant Application List
 * Craig Veenstra
 */

require '../model/db_connect.php';
require '../model/applicationsDB.php';

include '../view/header.php';

?>

<h1>Tenant Applications</h1>

<?php

$p_id = $_GET['propid'];
$applicationArray = getTenantApplications::getTenantApps($p_id);


?>

    <?php  
        foreach($applicationArray as $app){
            $user = getUserInfo::getInfo($app->getuser_id());
            echo '<table>';
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
            echo "<tr><td>Message: </td><td>".$app->getmessage()."</td></tr>";
            echo "<tr><td><a href=".ROOT."TenantApplication/deleteApplication.php?appid=".$app->getid().">Delete Application</a></td></tr>";
        echo '</table>';
            
        }
    ?>
