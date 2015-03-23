
<nav>
    <ul>
<?php
if($_SESSION['role'] == 'landlord'){
    echo '<li><a href="'.ROOT.'register_property">Register a Property</a></li>';
} else {
    echo '<li>Not a landlord eh?</li>';
}

?>
    </ul>
</nav>