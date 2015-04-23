<?php
$cssArray[] = "notices.css";
include '../view/header.php';
?>

<h1><?php echo $pname; ?> Notice Board</h1>

<div id="createNotice">
    <h3>Post to Notice Board</h3>
    <form id="noticeForm" action="index.php" method="post">
        <table>
            <tr>
                <td>Subject: </td>
                <td><input type="text" name="subject" value="" /></td>
            </tr>
            <tr>
                <td>Notice: </td>
                <td><textarea maxlength="500" rows="8" name="notice"></textarea></td>
            </tr>
        </table>
        <input type="submit" name="postNotice" value="Post Notice" />
    </form>
</div>
<div class="notices">
    <h2>Current Notices</h2>
<?php
    foreach($notices as $v){
        $u_id = $v->getUId();
        
        $user = UsersClass::getUserById($u_id);
        $fname = $user->getFname();
        $lname = $user->getLname();
        $full_name = $fname . ' ' . $lname;
        $role = $user->getRole();
        if($role == 'landlord'){
            $roleClass = 'noticeLandlord';
        } else {
            $roleClass = 'noticeTenant';
            if($u_id == $_SESSION['id']){
                $idClass = 'myNotice';
            }
        }
        
        
        
        $subject = $v->getSubject();
        $notice = $v->getNotice();
        $date_cre = $v->getDateCreated();
        $expiry = $v->getExpiry();
?>
<div class="notice">
    <div class="noticeHead <?php echo $roleClass; ?><?php echo isset($idClass) ? " ".$idClass : "";?>">
        <h3><?php echo $subject; ?></h3>
        <p><?php echo "By " . $full_name . "<span class='time'> at " . $date_cre . "</span>"; ?></p>
    </div>
    <div class="noticeMessage">
        <p><?php echo $notice; ?></p>
    </div>
</div>

<?php
    }
?>
</div>
<?php 

include '../view/footer.php';