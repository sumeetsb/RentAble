<?php
    require_once('../model/config.php');
    require_once('../model/usersClass.php');
    require_once('../model/propertiesClass.php');
    
    
    if(isset($_SESSION['user'])){
        
        
        
        
        include('dashboard.php');
    } else {
        header("Location: ../login");
    }

