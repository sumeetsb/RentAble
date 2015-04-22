
<nav>
    <ul>
<?php
if($_SESSION['role'] == 'landlord'){
    echo '<li><a href="'.ROOT.'Payment/PaymentView/CreateInvoice.php">Create Invoice for tenant</a></li>';
    echo '<li><a href="'.ROOT.'register_property">Register a Property</a></li>';
} else {
    echo '<li><a href="'.ROOT.'Payment/PaymentView/MyInvoices.php">Pay Rent</a></li>';
    echo '<li><a href="#">Search for Rents</a></li>';
}
    echo '<li><a href="'.ROOT.'postratings">Look at ratings</a></li>';
    
    echo '<li><a href="'.ROOT.'find_a_friend/editprofile.php">Edit Profile</a></li>';
?>
    </ul>
</nav>