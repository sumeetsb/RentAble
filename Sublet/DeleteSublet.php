<?php
//Craig Veenstra
//Sublet Function
//Delete Sublet


require '../model/db_connect.php';
require '../model/subletDB.php';


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
    //$application->getu_id();
    //$application = getTenantApplication::getApplication($appid);
    $user = getUserInfo::getInfo($application->getuser_id());
            echo '<th>Sublet Application</th>';
            echo '<tr><td>' . $application->getmessage().'</td></tr>'; 
            echo '<tr><td>' . $application->getemail().'</td></tr>'; 
            echo "<tr><td><form action='DeleteSublet.php' method='POST'><input type='hidden' name='appid' value='$appid' /><input type='submit' value='Delete' name='delete'></form></td></tr>";
    ?>
</table>




