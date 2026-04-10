<?php
include("../includes/db.php");
include("login_check.php");
session_start();

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO foods(name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);
    $stmt->execute();

    echo "Food Added Successfully!";
}
?>

<form method="POST">
    <input name="name" placeholder="Food Name" required>
    <input name="price" placeholder="Price" required>
    <button name="add">Add</button>
</form>