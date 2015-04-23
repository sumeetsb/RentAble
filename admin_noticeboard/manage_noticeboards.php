<?php
$cssArray[] = 'noticesAdmin.css';
include '../view/header.php';
?>
<script type="text/javascript" src="../js/noticesAdmin.js"></script>

<p>Choose specific property to see its notices.</p>
<form>
    <select id="propList" name="propList">
        <option value="0">All</option>
        <?php
        $props = PropertiesClass::getAllProperties();
        foreach($props as $prop){
            $propId = $prop->getId();
            $propName = $prop->getName();
            
            echo '<option value="prop'.$propId.'">'.$propName.'</option>';
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
        
        echo '<tr class="prop'.$pid.'"><td>'.$prop->getName().'</td><td>'.$user->getFullName().'</td><td>'.$notice->getDateCreated().'</td><td>'.$notice->getSubject().'</td><td>'.$notice->getNotice().'</td><td><a onclick="return confirm(\'Are you sure you want to delete this notice?\')" href="index.php?delete_id='. $id .'">Delete</a></td></tr>';
    }
    ?>
</table>


<?php


include '../view/footer.php';
