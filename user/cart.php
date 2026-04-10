<?php
include "../includes/db.php";
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_POST['food_id'])){

    $found = false;

    foreach($_SESSION['cart'] as &$item){
        if($item['food_id'] == $_POST['food_id']){
            $item['qty'] += $_POST['qty']; // increase qty
            $found = true;
            break;
        }
    }

    if(!$found){
        $_SESSION['cart'][] = [
            "food_id" => $_POST['food_id'],
            "qty" => $_POST['qty']
        ];
    }
}

/* 🔥 REDIRECT TO CART PAGE */
header("Location: /ApexTask4/user/order.php");
exit();
?>