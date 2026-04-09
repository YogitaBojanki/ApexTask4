<?php 
include "../includes/db.php"; 
include "../includes/header.php"; 

// Check if cart exists
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
    echo "<div class='card'><h3>Your Cart is Empty 🛒</h3></div>";
    include "../includes/footer.php";
    exit();
}
?>

<div class="container mt-4">
<h3>Your Cart 🛒</h3>

<table class="table table-bordered">
<tr>
    <th>Food</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>

<?php
$total = 0;

foreach($_SESSION['cart'] as $item){

    // Get food details safely
    $stmt = $conn->prepare("SELECT * FROM foods WHERE id=?");
    $stmt->bind_param("i", $item['food_id']);
    $stmt->execute();
    $res = $stmt->get_result();
    $food = $res->fetch_assoc();

    if(!$food) continue; // skip if food not found

    $price = $food['price'];
    $qty = $item['qty'];
    $subtotal = $price * $qty;

    $total += $subtotal;
?>

<tr>
    <td><?php echo $food['name']; ?></td>
    <td>₹<?php echo $price; ?></td>
    <td><?php echo $qty; ?></td>
    <td>₹<?php echo $subtotal; ?></td>
</tr>

<?php } ?>

</table>

<h4>Total Amount: ₹<?php echo $total; ?></h4>

<div class="mt-3">
    <a href="menu.php" class="btn btn-secondary">← Continue Shopping</a>
    <a href="place_order.php" class="btn btn-success">Place Order ✅</a>
</div>

</div>

<?php include "../includes/footer.php"; ?>