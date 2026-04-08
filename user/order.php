<?php
session_start();
include("../includes/db.php");

foreach ($_SESSION['cart'] as $item) {
    $conn->query("INSERT INTO orders(user_id,food_id,quantity) VALUES(
        '{$_SESSION['user_id']}',
        '{$item['food_id']}',
        '{$item['quantity']}'
    )");
}

unset($_SESSION['cart']);

echo "Order Placed!";
?>