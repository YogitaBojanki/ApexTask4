<?php
include "../includes/db.php";

foreach($_SESSION['cart'] as $item){

    $conn->query("INSERT INTO orders(user_id, food_id, quantity)
    VALUES(
        '{$_SESSION['user']['id']}',
        '{$item['food_id']}',
        '{$item['qty']}'
    )");

}

unset($_SESSION['cart']);

header("Location: menu.php");
?>