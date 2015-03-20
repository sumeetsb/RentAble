<?php
include('../model/config.php');
include('../model/usersClass.php');


if(isset($_SESSION['user'])){
    header("Location ../index.php");
} else {
    include('register.php');
}