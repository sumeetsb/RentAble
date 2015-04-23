<?php
    require_once('../model/config.php');
    
    function classloader($class) {
        $classStr = '../model/' . strtolower($class) . '.php';
        require_once $classStr;
    }

    spl_autoload_register('classloader');
    
    ///IF a user is logged in, show dashboard
    ///ELSE go back to home page
    $errors = array();
    $fname = "";
    $lname = "";
    $email = "";
    $uname = "";
    $day = "";
    $month = "";
    $year = "";
    $pass = "";
    $age = "";
    $role = "";
    $phone = "";
    $months = array('January', 'February', 'March', 'April','May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    if(isset($_SESSION['user'])){
        if(isset($_GET['manage_user'])){
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $email = $_SESSION['email'];
            $uname = $_SESSION['user'];
            $pass = $_SESSION['pass'];
            $role = $_SESSION['role'];
            $phone = $_SESSION['phone'];
            include('manage_user.php');
            exit();
        }
        if(isset($_POST['update'])){
            $validator = new Validation();
            $validator->todoVal("First Name", $_POST['fname'], "required");
            $validator->todoVal("Last Name", $_POST['lname'], "required");
            $validator->todoVal("Email", $_POST['email'], "required");
            $validator->todoVal("Email", $_POST['email'], "email");
            $validator->todoVal("User Name", $_POST['uname'], "required");
            $validator->todoVal("Password", $_POST['pass'],"required" );
            $validator->todoVal("Password", array($_POST['pass'], $_POST['pass2']), "passwords");
            $validator->todoVal("Phone Number", $_POST['phone'], "required");
            $validator->todoVal("Phone Number", $_POST['phone'], "phone");
            $validator->validate();
            $errors = $validator->errors;
            
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $fdate = new DateTime($_POST['year']. "-" . $_POST['month']."-" . $_POST['day']);
            $sdate = new DateTime();
            $age = $sdate->diff($fdate)->y;
            if(isset($_POST['role'])){
                $role = $_POST['role'];
            } else {
                $role = 'tenant';
            }
            $phone = $_POST['phone'];
            if(empty($errors)){
                $user = new User($fname, $lname, $uname, $pass, $email, $phone, $role, $age);
                UsersClass::updateUser($user);
                header("Location: index.php");
                exit();
            } else {
                include('manage_user.php');
            }
        }
        include('dashboard.php');
    } else {
        header("Location: ../login");
    }

