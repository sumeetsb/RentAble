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
        if ($_POST['action']=='insert'){
            $prop_id = $_POST['property_id'];
            $renter_id = $_POST['renter_id'];
            $rent_due = $_POST['rent_due'];
            $day_due = $_POST['day_due'];
            $newalert = new alert($prop_id, $renter_id, $rent_due, $day_due);
            AlertDB::addAlert($newalert);
            $errorcomment=" ";
            }
        if ($_POST['action']=='udpate_alert'){
            $alert_id=$_POST['alert_id'];
            $prop_id = $_POST['property_id'];
            $renter_id = $_POST['renter_id'];
            $rent_due = $_POST['rent_due'];
            $day_due = $_POST['day_due'];
            $newalert = new alert($prop_id, $renter_id, $rent_due, $day_due);
            AlertDB::updateAlert($newalert,$alert_id);
            $errorcomment=" ";
            }
        }        
$alerts = AlertDB::getAlertsALL();
?>
<table>
    <tr>
        <td>Property ID</td>
        <td>Renter ID</td>
        <td>Rent Due ($)</td>
        <td>DayOfMonth rent due</td>
    </tr>
    <form action='index.php' method='post'>
    <tr>
        <td>
            <input type='hidden' name='action' value='insert'/>
            <input type='text' name='property_id'/>
        </td>
        <td>
            <input type='text' name='renter_id'/>
        </td>                
        <td>
            <input type='text' name='rent_due'/>
        </td>
        <td>
            <input type='text' name='day_due'/>
        </td>
        <td>
            <input type='submit' name='submit' value='Create' /></td>
    </tr>
    </form>
    <?php foreach ($alerts as $al): ?>
        <tr>
            <form action='index.php' method='post'>
                <td><input type="text" name="property_id" value="<?php echo $al[1]?>"></td>
                <td><input type="text" name="renter_id" value="<?php echo $al[2]?>"></td>
                <td><input type="text" name="rent_due" value="<?php echo $al[3]?>"></td>
                <td><input type="text" name="day_due" value="<?php echo $al[4]?>"></td>
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
<p><?php $errorcomment ?></p>
<?php
    $to = "orlova.nika@gmail.com"; // this is your Email address
    $from = "orlova.nika@gmail.com"; // this is the sender's Email address
    $subject = "Form submission";
    $message = "yay";

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    echo "sent";
include('../view/footer.php');
?>