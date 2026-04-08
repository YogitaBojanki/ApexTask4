<?php
include('../config/constants.php');
include('login_check.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Orders</h1>

        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.No</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);

            $sn = 1;

            if(mysqli_num_rows($res) > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
            ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $row['food']; ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>₹<?php echo $row['total']; ?></td>

                <td>
                    <?php
                    $status = $row['status'];

                    if($status == "Ordered")
                        echo "<label>$status</label>";
                    elseif($status == "On Delivery")
                        echo "<label style='color:orange;'>$status</label>";
                    elseif($status == "Delivered")
                        echo "<label style='color:green;'>$status</label>";
                    elseif($status == "Cancelled")
                        echo "<label style='color:red;'>$status</label>";
                    ?>
                </td>

                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['customer_contact']; ?></td>
                <td><?php echo $row['customer_email']; ?></td>
                <td><?php echo $row['customer_address']; ?></td>

                <td>
                    <a href="update_order.php?id=<?php echo $row['id']; ?>" class="btn-secondary">Update</a>
                </td>
            </tr>

            <?php
                }
            }
            else
            {
                echo "<tr><td colspan='12'>No Orders Found</td></tr>";
            }
            ?>

        </table>

    </div>
</div>

</body>
</html>