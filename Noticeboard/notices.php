<?php

include '../view/header.php';
?>

<h2><?php echo $pname; ?> Notice Board</h2>

<table class="notices">
<?php
    foreach($notices as $notice){
        
?>
    

<?php
    }
?>
</table>

<?php 

include '../view/footer.php';