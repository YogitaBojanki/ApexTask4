<?php
include("../includes/db.php");

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $conn->query("INSERT INTO foods(name,price) VALUES('$name','$price')");
}
?>

<form method="POST">
    <input name="name" placeholder="Food Name">
    <input name="price" placeholder="Price">
    <button name="add">Add</button>
</form>