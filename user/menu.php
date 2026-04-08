<?php
include("../includes/db.php");
include("../includes/header.php");

$result = $conn->query("SELECT * FROM foods");
?>

<div class="card">
<h2>Menu</h2>

<?php while($row = $result->fetch_assoc()) { ?>
    <p><?php echo $row['name']; ?> - ₹<?php echo $row['price']; ?></p>

    <form action="cart.php" method="POST">
        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
        <input type="number" name="quantity" value="1">
        <button class="btn">Add</button>
    </form>
<?php } ?>

</div>

<?php include("../includes/footer.php"); ?>