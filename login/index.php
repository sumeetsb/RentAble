<?php
    require_once('../model/config.php');
    require_once('../model/usersClass.php');
    
    
    if(isset($_SESSION['user'])){
       header("Location: ../user_dash");
    } else {
        if(isset($_POST["login"])){
            $login = UsersClass::getUser($_POST["user"], $_POST["pass"]);
            if($login != null){
                
                $_SESSION['user'] = $login->getUname();
                $_SESSION['id'] = $login->getId();
                $_SESSION['email'] = $login->getEmail();
                $_SESSION['role'] = $login->getRole();
                $_SESSION['fname'] = $login->getFname();
                $_SESSION['lname'] = $login->getLname();
                $_SESSION['props'] = UsersClass::getPropertiesOfTenant($login->getId());
                header("Location: ../user_dash");
            } else {
                $error = "Invalid username or password provided.";
            }
        }
        
       include('login.php');
    }
    
    
    
    
