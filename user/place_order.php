<?php
include "../includes/db.php";

if(!isset($_SESSION['cart'])){
    header("Location: menu.php");
    exit();
}

foreach($_SESSION['cart'] as $item){

    $stmt = $conn->prepare("INSERT INTO orders(user_id, food_id, quantity) VALUES(?,?,?)");
    $stmt->bind_param("iii", $_SESSION['user']['id'], $item['food_id'], $item['qty']);
    $stmt->execute();
}

unset($_SESSION['cart']);

header("Location: menu.php");
?>