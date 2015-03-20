<?php
    include('../model/config.php');
    include('../model/usersClass.php');
    
    if(isset($_GET["logout"])){
            if($_GET["logout"] == "true"){
                session_destroy();
                header("Location: ../index.php");
            }
        }
    
    if(isset($_SESSION['user'])){
       header("Location: ../user_dash");
    } else {
        if(isset($_POST["login"])){
            $login = UsersClass::getUser($_POST["user"], $_POST["pass"]);
            if($login != null){
                config::$username = $login->getUname();
                config::$id = $login->getId();
                $_SESSION['user'] = config::$username;
                header("Location: ../user_dash");
            } else {
                $error = "Invalid username or password provided.";
            }
        }
        
       include('login.php');
    }
    
    
    
    
