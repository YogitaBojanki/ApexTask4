<?php
include('../config/constants.php');
include('login_check.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Food</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br>

        <!-- Add Button -->
        <a href="add_food.php" class="btn-primary">Add Food</a>

        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($conn, $sql);

            $sn = 1;

            if(mysqli_num_rows($res) > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
                <td>₹<?php echo $price; ?></td>

                <td>
                    <?php
                    if($image_name != "")
                    {
                        ?>
                        <img src="../images/food/<?php echo $image_name; ?>" width="100">
                        <?php
                    }
                    else
                    {
                        echo "No Image";
                    }
                    ?>
                </td>

                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>

                <td>
                    <a href="update_food.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                    <a href="delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                </td>
            </tr>

            <?php
                }
            }
            else
            {
                echo "<tr><td colspan='7'>No Food Added</td></tr>";
            }
            ?>

        </table>

    </div>
</div>

</body>
</html>