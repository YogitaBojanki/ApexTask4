<?php include("includes/header.php"); ?>

<div class="container mt-5 text-center">

    <h1 class="mb-3">🍔 Welcome to Food Ordering System</h1>
    <p class="mb-4">Order your favorite food quickly and easily!</p>

    <?php if(isset($_SESSION['user'])) { ?>
        <span>Welcome, <?php echo $_SESSION['name']; ?> 👋</span>
        <a href="user/menu.php" class="btn btn-success">Go to Menu 🍽️</a>
    <?php } else { ?>
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="register.php" class="btn btn-warning">Register</a>
    <?php } ?>

</div>

<?php include("includes/footer.php"); ?>