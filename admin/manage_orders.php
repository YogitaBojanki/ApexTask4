<?php
include('../includes/db.php');
include('login_check.php');
?>

<h2>Manage Orders</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Order ID</th>
    <th>User ID</th>
    <th>Food ID</th>
    <th>Quantity</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM orders ORDER BY id DESC");

while($row = $res->fetch_assoc()){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['user_id']; ?></td>
    <td><?php echo $row['food_id']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
</tr>

<?php } ?>

</table>