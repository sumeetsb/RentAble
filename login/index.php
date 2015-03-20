<?php
    include('../model/config.php');
    include('../model/usersClass.php');
    
    
    if(isset($_SESSION['user'])){
       header("Location: ../user_dash");
    } else {
       include('login.php');
    }
    
    if(isset($_POST["login"])){
        $login = UsersClass::getUser($_POST["user"], $_POST["pass"]);
        if($login != null){
            config::$username = $login->getUname();
            config::$id = $login->getId();
            $_SESSION['user'] = config::$username;
            header("Location: ../user_dash");
        }
    }
