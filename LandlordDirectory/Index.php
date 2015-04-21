<?php
//Craig Veenstra
//Landlord Diretory

require '../model/db_connect.php';
require_once('../model/config.php');
include '../view/header.php';
?>

<h1>Landlord Directory</h1>

<form>
    <span>Search</span>
    <input type="search" name="search" />
    <br />
    <!--<input type="submit" name="submit" />-->
    
</form>