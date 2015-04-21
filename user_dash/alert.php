<?php
require ('../model/alerts_db.php');
require ('../model/alert.php');
$renter_id=$_SESSION['id'];
$alerts = AlertDB::getAlertbyId($renter_id);
?>
<?php
// checking the number of days left and creating a paragraph to show days left
foreach ($alerts as $alert){
    $days_current_month = cal_days_in_month(CAL_GREGORIAN, date("m"), date("y"));
    $current_day=date("d");
    $due_date=$alert[4];
    if ($days_current_month==30 && $due_date==31){
        $due_date=30;
    }
    if ($due_date<$current_day){
        $daysleft=$days_current_month-$current_day+$due_date;
    }
    if ($due_date>$current_day || $due_date==$current_day){
        $daysleft=$due_date-$current_day;
    }        
    if ($daysleft>0 && $daysleft<4 && !isset($_POST['action'])){
        echo "<p> Alert! Your rent for property".$alert[1]." is due in </p>";
        echo "<div id='alert'>".$daysleft." days </div>" ;        
    }
    if ($daysleft==0 && !isset($_POST['action'])){
        echo "<p> Alert! Your rent for property".$alert[1]." </p><div id='alert'>is due today </div>" ;
    }
    if ($daysleft>3 && $daysleft<32 && !isset($_POST['action'])){
       echo "<p> Alert! Your rent for property ".$alert[1]." is due in </p>";
        echo "<div id='alert'>".$daysleft." days </div>" ;        
    }
        
}
if (!isset($_POST['action'])&& isset($daysleft)){
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='action' value='set' />";
        echo "<input type='submit' value='Hide' /></form>";            
    }
