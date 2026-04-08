<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background: linear-gradient(to right, #36d1dc, #5b86e5);
}
.card{
    border-radius: 15px;
}
</style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width:400px;">

<h3 class="text-center mb-3">Login</h3>

<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $res->fetch_assoc();

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user'] = $user;

        if($user['role']=="admin"){
            header("Location: admin/dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid login</div>";
    }
}
?>

<form method="POST">

<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

<div class="input-group mb-2">
<input type="password" name="password" id="pass" class="form-control" placeholder="Password">
<button type="button" class="btn btn-secondary" onclick="togglePass()">👁</button>
</div>

<button class="btn btn-primary w-100" name="login">Login</button>

</form>

</div>
</div>

<script>
function togglePass(){
    let p = document.getElementById("pass");
    p.type = p.type === "password" ? "text" : "password";
}
</script>

</body>
</html>