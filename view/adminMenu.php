<?php if(isset($_SESSION['role'])){
    if($_SESSION['role'] == "admin"){?>

<nav class="adminNav">
    <ul>
        <li><a href="<?php echo ROOT; ?>admin_alert">Alert Admin</a></li>
        <li><a href="<?php echo ROOT; ?>admin_gallery">Gallery Admin</a></li>
        <li><a href="<?php echo ROOT; ?>admin_ratings">Ratings Admin</a></li>
        <li><a href="<?php echo ROOT; ?>Map/MapView/markersAdmin.php">Map Admin</a></li>
        <li><a href="<?php echo ROOT; ?>FAQ/adminFAQ.php">FAQ Admin</a></li>
        <li><a href="<?php echo ROOT; ?>admin_noticeboard">Noticeboard Admin</a></li>
    </ul>
</nav>
<?php }

    }