<?php
require_once('../model/config.php');

function classloader($class) {
    include '../model/' . $class . '.php';
}

spl_autoload_register('classloader');

///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home

if($_SESSION['role'] == 'landlord'){
    $errors = array();
    $landlord_id = $_SESSION['id'];
    if(isset($_POST['register'])){
        $validator = new Validation();
        
    }
    
    $provinces = array('British Columbia', 'Alberta', 'Saskatchewan', 'Manitoba', 'Ontario', 'Quebec', 'New Brunswick', 'Prince Edward Isand', 'Nova Scotia', 'Newfoundland and Labrador');
    include('register_prop.php');
} else {
    header("Location: ../index.php");
}
