<?php

$deploy = false;

if ($deploy){
    define('ROOT', 'http://rentable.sumeetb.com/');
} else {
    define('ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/RentAble/');
}

$cssArray = array();

session_start();