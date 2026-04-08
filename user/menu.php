<?php include "../includes/db.php"; include "../includes/header.php"; ?>

<div class="container mt-4">
<h2 class="mb-4">Food Menu 🍔</h2>

<div class="row">

<?php
$res = $conn->query("SELECT * FROM foods");

while($row = $res->fetch_assoc()){
?>

<div class="col-md-4">
<div class="card shadow p-3 mb-3">

<img src="../uploads/<?php echo $row['image']; ?>" height="150" class="mb-2">

<h5><?php echo $row['name']; ?></h5>
<p class="text-success">₹<?php echo $row['price']; ?></p>

<form action="cart.php" method="POST">
<input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
<input type="number" name="qty" value="1" class="form-control mb-2">
<button class="btn btn-primary w-100">Add to Cart</button>
</form>

</div>
</div>

<?php } ?>

</div>
</div>

<?php include "../includes/footer.php"; ?>