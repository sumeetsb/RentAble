<?php
    require_once('../model/config.php');
    require_once('../model/usersClass.php');
    require_once('../model/propertiesClass.php');
    
    ///IF a user is logged in, show dashboard
    ///ELSE go back to home page
    
    if(isset($_SESSION['user'])){
        
        
        
        
        include('dashboard.php');
    } else {
        header("Location: ../login");
    }

