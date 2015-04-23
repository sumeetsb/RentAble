<?php
//Craig Veenstra
//Landlord Directory

require '../model/db_connect.php';
require_once('../model/config.php');
require '../model/LandlordDirectory.php';
include '../view/header.php';
?>

<h1>Landlord Directory</h1>

<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];

    $result = LandlordDirectory::searchLandlord($search);
    
}
?>

<form action="Index.php" method="POST" class="styledform">
    <span>Search</span>
    <input type="search" name="search" placeholder="Search Landlords"/>
    <br />
    <input type="submit" name="submit" />
    
</form>

<?php
if(isset($result)){
    foreach($result as $row){
        echo '<table>';
        echo '<tr><td>'.$row->getFname(). ' ' . $row->getLname(). '</td></tr>';
        echo '<tr><td>User Name: '.$row->getUname().'</td></tr>';
        echo '<tr><td>Email: '.$row->getEmail().'</td></tr>';
        echo '<tr><td>Phone Number: '.$row->getPhone().'</td></tr>';
    }
}
?>