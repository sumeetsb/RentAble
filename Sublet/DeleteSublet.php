<?php
//Craig Veenstra
//Sublet Function
//Delete Sublet


require '../model/db_connect.php';
require '../model/subletDB.php';

include '../view/header.php';

if(isset($_POST['delete'])){
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    
    SubletDB::deleteApplication($uid, $pid);
    
    header("location: ../index.php");
}
?>




<h1>Delete Application</h1>
<h2>Are you sure you want to delete this application?</h2>

    <?php
    $pid = $_GET['pid'];
    $uid = $_GET['uid'];
    $application = SubletDB::getApplication($pid, $uid);
            echo '<table>';
            echo '<th>Sublet Application</th>';
            echo '<tr><td>' . $application->getmessage().'</td></tr>'; 
            echo '<tr><td>' . $application->getemail().'</td></tr>'; 
            echo "<tr><td><form action='DeleteSublet.php' method='POST'><input type='hidden' name='pid' value='$pid' /><input type='hidden' name='uid' value='$uid' /><input type='submit' value='Delete' name='delete'></form></td></tr>";
            echo '</table>';
            ?>


<?php include '../view/footer.php' ?>

