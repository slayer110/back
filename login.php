<?php
session_start();

$login = $_GET["login"];

$pass = $_GET['password'];

if ($_SESSION['login'] == 'admin'){
    echo json_encode(array('status'=>true));
}


if ($login == "admin" && $pass == "admin"){
    $_SESSION['login'] = $login;
    
    echo json_encode(array('status'=>true));
}else{
    echo json_encode(array('status'=>false));
}