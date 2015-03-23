<?php
require_once('../model/config.php');


///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home

if($_SESSION['role'] == 'landlord'){
    include('register_prop.php');
} else {
    header("Location: ../index.php");
}
