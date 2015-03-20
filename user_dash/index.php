<?php
    include('../model/config.php');
    include('../model/usersClass.php');
    
    
    if(isset($_SESSION['user'])){
        
        
        
        
        include('dashboard.php');
    } else {
        header("Location: ../login");
    }

