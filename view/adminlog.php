<ul><li><a href="<?php echo ROOT;?>admin">Admin</a></li>
    <?php if(isset($_SESSION['admin'])){ ?>
    <li><a href="<?php echo ROOT;?>admin?logout=true">Logout</a></li>
    <?php } ?>
</ul>