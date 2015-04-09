<?php
require_once('../model/config.php');


///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home

if($_SESSION['role'] == 'landlord'){
    $landlord_id = $_SESSION['id'];
    
    
    
    include('register_prop.php');
} else {
    header("Location: ../index.php");
}
