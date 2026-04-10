<?php
session_start();


if (!isset($_GET['id'])) {
    header("Location: menu.php");
    exit();
}

$id = $_GET['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = 1;
} else {
    $_SESSION['cart'][$id]++;
}

/* ✅ SUCCESS MESSAGE */
$_SESSION['msg'] = "Item added to cart";

header("Location: menu.php");
exit();
?>