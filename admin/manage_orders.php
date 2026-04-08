<?php
include("../includes/db.php");

$result = $conn->query("SELECT * FROM orders");
?>

<h2>Orders</h2>

<?php while($row = $result->fetch_assoc()) { ?>
    <p>
        Order #<?php echo $row['id']; ?> |
        Qty: <?php echo $row['quantity']; ?> |
        Status: <?php echo $row['status']; ?>
    </p>
<?php } ?>