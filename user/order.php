<?php
include "../includes/db.php";
include "../includes/header.php"; 
?>

<div class="container mt-5">

<h2 class="mb-4 text-center">🛒 Your Cart</h2>

<table class="table table-bordered text-center align-middle">
<tr class="table-dark">
<th>Food</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Action</th>
</tr>

<?php
$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

foreach($_SESSION['cart'] as $food_id => $qty){

    $food_id = (int)$food_id; // safety

    $food = $conn->query("SELECT * FROM foods WHERE id=$food_id")->fetch_assoc();

    if(!$food) continue;

    $price = $food['price'];
    $subTotal = $price * $qty;

    $total += $subTotal;
?>
<tr>
<td><?php echo $food['name']; ?></td>

<td>₹<?php echo $price; ?></td>

<td>
    <a href="update_cart.php?action=decrease&id=<?php echo $food_id; ?>" class="btn btn-sm btn-danger">-</a>
    <span class="mx-2"><?php echo $qty; ?></span>
    <a href="update_cart.php?action=increase&id=<?php echo $food_id; ?>" class="btn btn-sm btn-success">+</a>
</td>

<td>₹<?php echo $subTotal; ?></td>

<td>
    <a href="update_cart.php?action=remove&id=<?php echo $food_id; ?>" class="btn btn-sm btn-warning">Remove</a>
</td>
</tr>

<?php } } else { ?>
<tr>
<td colspan="5">Cart is Empty</td>
</tr>
<?php } ?>

</table>

<h4 class="text-end">Total Amount: ₹<?php echo $total; ?></h4>

<div class="d-flex justify-content-between mt-3">
    <a href="menu.php" class="btn btn-secondary">← Continue Shopping</a>
    <form action="place_order.php" method="POST">
        <button class="btn btn-success">Place Order ✅</button>
    </form>
</div>

</div>

<?php include "../includes/footer.php"; ?>