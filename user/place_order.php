<?php
include "../includes/db.php";

/* 🔐 CHECK LOGIN */
if (!isset($_SESSION['user'])) {
    echo "<h3 style='text-align:center;color:red;margin-top:50px;'>⚠ Please login first</h3>";
    echo "<div style='text-align:center;'><a href='../login.php'>Go to Login</a></div>";
    exit();
}

$user_id = $_SESSION['user']['id'];

/* 🛒 CHECK CART */
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<h3 style='text-align:center;color:red;margin-top:50px;'>⚠ Cart is Empty</h3>";
    echo "<div style='text-align:center;'><a href='menu.php'>Go to Menu</a></div>";
    exit();
}

$total = 0;

/* 🧮 CALCULATE TOTAL */
foreach ($_SESSION['cart'] as $id => $qty) {

    $id = (int)$id;

    $result = mysqli_query($conn, "SELECT * FROM foods WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    if(!$row) continue;

    $subtotal = $row['price'] * $qty;
    $total += $subtotal;
}

/* 💾 INSERT ORDER (ONLY ORDERS TABLE) */
mysqli_query($conn, "INSERT INTO orders (user_id, total_amount) VALUES ('$user_id', '$total')");

$order_id = mysqli_insert_id($conn);

/* 🧹 CLEAR CART */
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Success</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(to right, #f8e660, #f3c85c);
}
.success-box{
    background: white;
    padding: 40px;
    border-radius: 15px;
    text-align: center;
}
.btn-pay{
    margin: 10px;
}
</style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="success-box shadow">

<h2 class="text-success">✅ Order Placed Successfully!</h2>

<p class="mt-3">🧾 Order ID: <b><?php echo $order_id; ?></b></p>
<p>Total Amount: <b>₹<?php echo $total; ?></b></p>

<hr>

<h4>Select Payment Method</h4>

<button class="btn btn-success btn-pay">💵 Cash on Delivery</button>
<button class="btn btn-primary btn-pay">📱 UPI</button>
<button class="btn btn-warning btn-pay">💳 Card Payment</button>

<br><br>

<div class="mt-3">
    <a href="menu.php" class="btn btn-dark">⬅ Back to Menu</a>
    <a href="../logout.php" class="btn btn-danger">🚪 Logout</a>
</div>

</div>
</div>

</body>
</html>