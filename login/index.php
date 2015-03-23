<?php
    require_once('../model/config.php');
    require_once('../model/usersClass.php');
    
    ///IF user is already logged in, redirect to user dashboard
    ///ELSE show login form
    
    if(isset($_SESSION['user'])){
       header("Location: ../user_dash");
    } else {
        if(isset($_POST["login"])){
            
            ///IF login button hit, grab user from users table and store details in session
            // and redirect to user dashboard
            ///ELSE reload login page with error message
            
            
            $login = UsersClass::getUser($_POST["user"], $_POST["pass"]);
            if($login != null){
                
                $_SESSION['user'] = $login->getUname();
                $_SESSION['id'] = $login->getId();
                $_SESSION['email'] = $login->getEmail();
                $_SESSION['role'] = $login->getRole();
                $_SESSION['fname'] = $login->getFname();
                $_SESSION['lname'] = $login->getLname();
                if($login->getRole() == 'tenant'){
                    $_SESSION['props'] = UsersClass::getPropertiesOfTenant($login->getId());
                } else {
                    $_SESSION['props'] = UsersClass::getPropertiesofLandlord($login->getId());
                }
                header("Location: ../user_dash");
            } else {
                $error = "Invalid username or password provided.";
            }
        }
        
       include('login.php');
    }
    
    
    
    
