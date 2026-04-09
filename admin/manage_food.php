<?php
include('../includes/db.php');
include('login_check.php');
?>

<h2>Manage Food</h2>

<a href="add_food.php">Add Food</a>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM foods");

while($row = $res->fetch_assoc()){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td>₹<?php echo $row['price']; ?></td>
</tr>

<?php } ?>

</table>