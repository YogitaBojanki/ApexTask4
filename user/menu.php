<?php include "../includes/db.php"; include "../includes/header.php"; 
?>
<style>
.menu-title{
    font-size: 32px;
    font-weight: bold;
    color: #ff6b00;
    text-align: center;
}

/* CARD DESIGN */
.food-card{
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
}

.food-card:hover{
    transform: scale(1.05);
}

/* FIX IMAGE SIZE */
.food-img{
    width: 100%;
    height: 180px;
    object-fit: cover;
}

/* BUTTON STYLE */
.btn-warning{
    background-color: #ff6b00;
    border: none;
}
<?php
if(isset($_SESSION['msg'])){
    echo "<div class='alert alert-success text-center'>".$_SESSION['msg']."</div>";
    unset($_SESSION['msg']);
}
if(!isset($_SESSION['user_id'])) {
    echo "⚠ Please login first<br>";
    echo "<a href='../login.php'>Go to Login</a>";
    exit();
}
?>
</style>
<div class="container mt-3 d-flex justify-content-end">
    <a href="order.php" class="btn btn-dark">🛒 Go to Cart</a>
</div>
<div class="container mt-4">

<h1 class="menu-title mb-4">Food Menu</h1>
<div class="row">

<?php
$res = $conn->query("SELECT * FROM foods");

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
?>

<div class="col-md-4 col-sm-6 mb-4">
    <div class="card shadow food-card">

        <!-- IMAGE -->
        <?php if(!empty($row['image'])){ ?>
            <img src="../uploads/<?php echo $row['image']; ?>" class="food-img">
        <?php } else { ?>
            <img src="https://via.placeholder.com/300x180" class="food-img">
        <?php } ?>

        <div class="card-body text-center">
            <h5><?php echo $row['name']; ?></h5>
            <p class="text-success fw-bold">₹<?php echo $row['price']; ?></p>

            <form action="cart.php" method="POST">
                <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">

                <input type="number" name="qty" value="1" min="1" class="form-control mb-2">

                <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" 
                   onclick="return showMsg()" 
                   class="btn btn-warning w-100">
                   Add to Cart
                </a>
                
            </form>
        
        </div>

    </div>
</div>
<?php 
    }
}else{
    echo "<h4 class='text-center'>No Food Available</h4>";
}
?>

</div>
</div>
<script>
function showMsg(){
    alert("✅ Item added to cart!");
    return true;
}
</script>

<?php include "../includes/footer.php"; ?>