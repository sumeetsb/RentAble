<?php
require_once('../model/config.php');

if($_SESSION['role'] == 'landlord'){
    include('register_prop.php');
} else {
    header("Location: ../index.php");
}
