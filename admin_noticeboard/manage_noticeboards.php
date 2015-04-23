<?php
$cssArray[] = 'noticesAdmin.css';
include '../view/header.php';
?>

<form>
    <select name="propList">
        <option></option>
        <?php
        $props = PropertiesClass::getAllProperties();
        foreach($props as $prop){
            $propId = $prop->getId();
            $propName = $prop->getName();
            
            echo '<option value="'.$propId.'">'.$propName.'</option>';
        }
        
        ?>
    </select>
</form>

<table id="manageNotices">
    <tr>
        <th>Property</th>
        <th>Name</th>
        <th>Time</th>
        <th>Subject</th>
        <th>Message</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    foreach($notices as $notice){
        $id = $notice->getId();
        $uid = $notice->getUId();
        $pid = $notice->getPId();
        $user = UsersClass::getUserById($uid);
        $prop = PropertiesClass::getPropertyById($pid);
        
        echo '<tr id="'.$pid.'"><td>'.$prop->getName().'</td><td>'.$user->getFullName().'</td><td>'.$notice->getDateCreated().'</td><td>'.$notice->getSubject().'</td><td>'.$notice->getNotice().'</td><td><a onclick="return confirm(\'Are you sure you want to delete this notice?\')" href="index.php?delete_id='. $id .'">Delete</a></td></tr>';
    }
    ?>
</table>




<?php


include '../view/footer.php';
