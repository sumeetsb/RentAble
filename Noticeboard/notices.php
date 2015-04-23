<?php
$cssArray[] = "notices.css";
include '../view/header.php';
?>
<script type="text/javascript" src="../js/notices.js"></script>

<h1><?php echo $pname; ?> Notice Board</h1>

<div id="createNotice">
    <h3>Post to Notice Board</h3>
    <form id="noticeForm" action="index.php?propid=<?php echo $pid; ?>" method="post">
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
    <?php foreach($errors as $err){
        echo '<p class="error">' . $err . "</p>";
    } ?>
    
</div>
<div>
    <p>Filter Noticeboard:</p>
    <form>
        <select id="filterNotices" name="filterNotices">
            <option value="all">Show All Notices</option>
            <option value="mine">Show Only My Notices</option>
            <option value="tenant">Show Only Tenants</option>
            <option value="landlord">Show Landlord Notices</option>
        </select>
    </form>
</div>

<div class="notices">
    
    <h2>Current Notices</h2>
<?php
    foreach($notices as $v){
        $u_id = $v->getUId();
        $n_id = $v->getId();
        $user = UsersClass::getUserById($u_id);
        $fname = $user->getFname();
        $lname = $user->getLname();
        $full_name = $fname . ' ' . $lname;
        $idClass = "";
        $roleClass = "";
        if($u_id == $_SESSION['id']){
                $idClass = 'myNotice';
            }
        $role = $user->getRole();
        if($role == 'landlord'){
            $roleClass = 'noticeLandlord';
        } else if ($role == 'tenant') {
            $roleClass = 'noticeTenant';
            
        }
        
        $subject = $v->getSubject();
        $notice = $v->getNotice();
        $date_cre = $v->getDateCreated();
        $expiry = $v->getExpiry();
?>
<div class="notice <?php echo $roleClass; ?> <?php echo $idClass; ?>">
    <div class="noticeHead">
        <?php if($u_id == $_SESSION['id']){ ?> <p class="delLink"><a onclick="return confirm('Are you sure you want to delete this notice?')" href="index.php?propid=<?php echo $pid; ?>&delete_id=<?php echo $n_id; ?>">Delete</a></p>  <?php } ?>
        <h3><?php echo $subject; ?> <?php echo $roleClass == 'noticeLandlord' ? '- <span class="isLLord">Landlord</span>' : ''; ?></h3>
        <p class="author"><?php echo "By " . $full_name . "<span class='time'> at " . $date_cre . "</span>"; ?></p>
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