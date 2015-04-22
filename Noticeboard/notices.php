<?php

include '../view/header.php';
?>

<h2><?php echo $pname; ?> Notice Board</h2>

<table class="notices">
<?php
    foreach($notices as $v){
        $subject = $v->getSubject();
        $notice = $v->getNotice();
        $date_cre = $v->getDateCreated();
        $expiry = $v->getExpiry();
?>
    

<?php
    }
?>
</table>

<?php 

include '../view/footer.php';