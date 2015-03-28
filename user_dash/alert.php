<?php
require ('../model/alerts_db.php');
require ('../model/alert.php');
$renter_id="7";
$alerts = AlertDB::getAlertbyId($renter_id);
?>
<?php 
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
        echo "<p> Alert, your rent for property".$alert[1]." is due in </p>";
        echo "<div style='color:red; width:5%; float:left'>".$daysleft." days </div>" ;        
    }
    if ($daysleft==0 && !isset($_POST['action'])){
        echo "<p> Alert, your rent for property".$alert[1]." is due today </p>" ;
    }
    if ($daysleft>3 && $daysleft<32 && !isset($_POST['action'])){
        echo "<p> Take note, your rent for property".$alert[1]." is due in ".$daysleft." days </p>" ;
    }
        
}
if (!isset($_POST['action'])){
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='action' value='set' />";
        echo "<input type='submit' value='Hide' /></form>";            
    }
