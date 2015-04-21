<?php

/* Craig Veenstra
 * Sublet Feature
 * Listing all sublet applications
 */

require_once ('../model/subletDB.php');
require_once('../model/config.php');
require_once('apply.php');

include '../view/header.php';

    $pid = $_GET['pid'];

    //unpacking the applications for the property
    $applications = subletDB::getApplications($pid);    

    
?>


    <?php
    foreach($applications as $application){  
        echo '<table>';
        echo '<th>Sublet Application</th>';
        echo '<tr><td>' . $application->getmessage().'</td></tr>'; 
        echo '<tr><td>' . $application->getemail().'</td></tr>';
        echo "<tr><td><a href=".ROOT."Sublet/DeleteSublet.php?pid=".$pid."&uid=".$application->getu_id().">Delete Application</a></td></tr>";
        echo '</table>';
        }
    ?>


<?php include '../view/footer.php'; ?>