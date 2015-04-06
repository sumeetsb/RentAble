
<?php
require ('../model/alerts_db.php');
require ('../model/alert.php');
require ('../model/db_connect.php');?>
<?php
include('../view/header.php');

?>
<?php
if (isset($_POST['action'])){
        if ($_POST['action']=='delete_alert'){
            $alert_id=$_POST['alert_id'];
            AlertDB::deleteAlert($alert_id);
            }
        if ($_POST['action']=='insert'&& !empty($_POST["rent_due"])){
            $prop_id = $_POST['property_id'];
            $renter_id = $_POST['renter_id'];
            $rent_due = $_POST['rent_due'];
            $day_due = $_POST['day_due'];
            $newalert = new alert($prop_id, $renter_id, $rent_due, $day_due);
            AlertDB::addAlert($newalert);
            $errorcomment=" ";
            }
        if ($_POST['action']=='insert'&& empty($_POST["rent_due"])){
            $errorcomment="Need to enter rent due";
            }
        if ($_POST['action']=='udpate_alert'&& !empty($_POST["rent_due"])){
            $alert_id=$_POST['alert_id'];
            $prop_id = $_POST['property_id'];
            $renter_id = $_POST['renter_id'];
            $rent_due = $_POST['rent_due'];
            $day_due = $_POST['day_due'];
            $newalert = new alert($prop_id, $renter_id, $rent_due, $day_due);
            AlertDB::updateAlert($newalert,$alert_id);
            $errorcomment2=" ";
            }
        if ($_POST['action']=='udpate_alert'&& empty($_POST["rent_due"])){
            $errorcomment2="Need to enter rent due";
            }
        }        
$alerts = AlertDB::getAlertsALL();
$prop_idlist=AlertDB::getPropIds();
$rent_idlist=AlertDB::getRenterIds();
for ($x = 1; $x <= 31; $x++) {
    $dayslist[$x]=$x;
} 

?>
<link rel="stylesheet" type="text/css" href="../css/alert.css" />

<table id='a_admin'>
    <tr>
        <td>Property ID</td>
        <td>Renter ID</td>
        <td>Rent Due ($)</td>
        <td>DayOfMonth rent due</td>
        <td>Option 1</td>
        <td>Option 2</td>
    </tr>
    <form action='index.php' method='post'>
    <tr>
        <td>
            <input type='hidden' name='action' value='insert'/>
            <select name="property_id">
            <?php foreach ($prop_idlist as $pid) {
                echo "<option value=".$pid[0]." >".$pid[0]."</option>";
            } ?>
            </select>
        </td>
        <td>
            <select name="renter_id">
            <?php foreach ($rent_idlist as $rid) {
                echo "<option value=".$rid[0]." >".$rid[0]."</option>";
            } ?>
            </select>
        </td>                
        <td>
            <input type='text' name='rent_due'/>
        </td>
        <td>
            <select name="day_due">
            <?php foreach ($dayslist as $day) {
                echo "<option value=".$day." >".$day."</option>";
            } ?>
            </select>
        </td>
        <td colspan="2">
            <input type='submit' name='submit' value='Create' />
        <p id='valid_error'><?php echo $errorcomment ?></p>
        </td>
    </tr>
    </form>
    <?php foreach ($alerts as $al): ?>
        <tr>
            <form action='index.php' method='post'>
                <td>
                    <select name="property_id">
                    <?php 
                    $prop_idlist=AlertDB::getPropIds();
                    foreach($prop_idlist as $pid) {
                        if ($pid[0]==$al[1]){
                            echo "<option value='".$pid[0]."' selected >".$pid[0]."</option>";}
                        else { echo "<option value='".$pid[0]."'  >".$pid[0]."</option>";}
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <select name="renter_id">
                    <?php 
                    $rent_idlist=AlertDB::getRenterIds();
                    foreach($rent_idlist as $rid) {
                        if ($rid[0]==$al[2]){
                            echo "<option value='".$rid[0]."' selected >".$rid[0]."</option>";}
                        else { echo "<option value='".$rid[0]."'  >".$rid[0]."</option>";}
                        }
                    ?>
                    </select>
                </td>
                <td><input type="text" name="rent_due" value="<?php echo $al[3]?>"></td>
                <td>
                    <select name="day_due">
                    <?php 
                    $rent_idlist=AlertDB::getRenterIds();
                    foreach ($dayslist as $day) {
                        if ($day==$al[4]){
                            echo "<option value='".$day."' selected >".$day."</option>";}
                        else { echo "<option value='".$day."'  >".$day."</option>";}
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <input type='submit' value='Update' />
                    <input type='hidden' name='action' value='udpate_alert' />
                    <input type='hidden' name='alert_id' value='<?php echo $al[0]?>'>
                </td>
            </form>
            <form action='index.php' method='post'>
                <td>    
                    <input type='hidden' name='action' value='delete_alert' />
                    <input type='hidden' name='alert_id' value='<?php echo $al[0]?>'>
                    <input type='submit' value='Delete' />
                </td>                
            </form>
        </tr>
    <?php endforeach; ?>
</table>
<p id='valid_error'><?php echo $errorcomment2 ?></p>

