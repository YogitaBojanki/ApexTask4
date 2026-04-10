<?php
session_start();

if(!isset($_GET['action']) || !isset($_GET['id'])){
    header("Location: order.php");
    exit();
}

$id = $_GET['id'];
$action = $_GET['action'];

if(isset($_SESSION['cart'][$id])){

    if($action == "increase"){
        $_SESSION['cart'][$id]++;
    }

    if($action == "decrease"){
        $_SESSION['cart'][$id]--;

        if($_SESSION['cart'][$id] <= 0){
            unset($_SESSION['cart'][$id]);
        }
    }

    if($action == "remove"){
        unset($_SESSION['cart'][$id]);
    }
}

header("Location: order.php");
exit();
?>