<?php
    require_once('../model/config.php');
    require_once('../model/FAQClass.php');
   
    
    ///IF a user is logged in, show dashboard
    ///ELSE go back to home page
    
    if(isset($_SESSION['user'])){
        
        
        
        
        include('adminFAQ.php');
    } else {
        header("Location: FAQ.php");
    }

