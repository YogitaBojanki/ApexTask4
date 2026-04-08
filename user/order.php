<?php include "../includes/db.php"; include "../includes/header.php"; ?>

<div class="container mt-4">
<h3>Your Cart 🛒</h3>

<table class="table table-bordered">
<tr>
<th>Food</th>
<th>Qty</th>
<th>Price</th>
</tr>

<?php
$total = 0;

foreach($_SESSION['cart'] as $item){
    $food = $conn->query("SELECT * FROM foods WHERE id=".$item['food_id'])->fetch_assoc();
    $price = $food['price'] * $item['qty'];
    $total += $price;
?>

<tr>
<td><?php echo $food['name']; ?></td>
<td><?php echo $item['qty']; ?></td>
<td><?php echo $price; ?></td>
</tr>

<?php } ?>

</table>

<h4>Total: ₹<?php echo $total; ?></h4>

<a href="place_order.php" class="btn btn-success">Place Order</a>

</div>

<?php include "../includes/footer.php"; ?>