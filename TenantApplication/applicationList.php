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
$p_id = 1;
$applicationArray = getTenantApplications::getTenantApps($p_id);
?>

<table>
    <?php
        foreach($applicationArray as $app){
            echo "<th>Tenant Application</th>";
            echo "<tr><td>".$app->getmessage()."</td></tr>";
        }
    ?>
</table>