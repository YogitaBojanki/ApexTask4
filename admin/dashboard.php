<?php 
include("login_check.php");
include("../includes/header.php");
session_start();
?>

<div class="card">
<h2>Admin Dashboard</h2>

<a href="add_food.php">Add Food</a><br>
<a href="manage_food.php">Manage Food</a><br>
<a href="manage_orders.php">View Orders</a>

</div>

<?php include("../includes/footer.php"); ?>