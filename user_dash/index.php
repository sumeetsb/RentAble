<?php
    require_once('../model/config.php');
    
    function classloader($class) {
        $classStr = '../model/' . strtolower($class) . '.php';
        require_once $classStr;
    }

    spl_autoload_register('classloader');
    
    ///IF a user is logged in, show dashboard
    ///ELSE go back to home page
    
    if(isset($_SESSION['user'])){
        
        
        
        
        include('dashboard.php');
    } else {
        header("Location: ../login");
    }

