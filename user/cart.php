<?php
include "../includes/db.php";

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_POST['food_id'])){
    $_SESSION['cart'][] = [
        "food_id" => $_POST['food_id'],
        "qty" => $_POST['qty']
    ];
}

header("Location: menu.php");
?>