<?php
$cssArray[] = "notices.css";
include '../view/header.php';
?>

<h1><?php echo $pname; ?> Notice Board</h1>


<?php
    foreach($notices as $v){
        $u_id = $v->getUId();
        
        $user = UsersClass::getUserById($u_id);
        $fname = $user->getFname();
        $lname = $user->getLname();
        $full_name = $fname . ' ' . $lname;
        
        $subject = $v->getSubject();
        $notice = $v->getNotice();
        $date_cre = $v->getDateCreated();
        $expiry = $v->getExpiry();
?>

<div class="notices">
    <div class="noticeHead">
        <h3><?php echo $subject; ?></h3>
        <p><?php echo "By " . $full_name . " at " . $date_cre; ?></p>
    </div>
    <div class="notice">
        <p><?php echo $notice; ?></p>
    </div>
</div>

<?php
    }
?>

<?php 

include '../view/footer.php';