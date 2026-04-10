<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="/APEXTASK4/assets/css/style.css">
</head>
<body>

<nav>
    <h2>🍔 FoodApp</h2>
    <a href="/ApexTask4/index.php">Home</a>
    <a href="/ApexTask4/user/menu.php">Menu</a>
    <a href="/ApexTask4/login.php">Login</a>
    <a href="/ApexTask4/register.php">Register</a>
   <?php
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
   ?>
    <a href="/ApexTask4/user/order.php">Cart (<?php echo $count; ?>)</a>
</a>
</nav>