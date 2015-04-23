<?php

include '../view/header.php';
?>

<table>
    <tr>
        <th>Property</th>
        <th>Name</th>
        <th>Time</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>
    <?php
    foreach($notices as $notice){
        $uid = $notice->getUId();
        $pid = $notice->getPId();
        $user = UsersClass::getUserById($uid);
        $prop = PropertiesClass::getPropertyById($pid);
        echo '<tr><td>'.$prop->getName().'</td><td>'.$user->getFullName().'</td><td>'.$notice->getDateCreated().'</td><td>'.$notice->getSubject().'</td><td>'.$notice->getNotice().'</td></tr>';
    }
    ?>
</table>




<?php


include '../view/footer.php';
