<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header('location:/ApexTask4/login.php');
    exit();
}
?>