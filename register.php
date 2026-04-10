<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background: linear-gradient(to right, #ead34e, #f3b25f);
}
.card{
    border-radius: 15px;
    height: 320px;
    width: 800px;
    padding: 30px;
}
.error{ color:red; }
.success{ color:green; }
</style>
</head>

<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width:400px;">

<h3 class="text-center mb-3">Register</h3>

<?php
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔐 Password validation
    if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{6,}$/', $password)){
        echo "<div class='alert alert-danger'>Weak Password</div>";
    } else {

        // ✅ CHECK EMAIL FIRST
        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if($check->num_rows > 0){
            echo "<div class='alert alert-warning'>Email already exists</div>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
            $stmt->bind_param("sss",$name,$email,$hash);

            if($stmt->execute()){
                echo "<div class='alert alert-success'>Registered Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error occurred</div>";
            }
        }
    }
}
?>

<form method="POST" onsubmit="return validateForm()">

<input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name">
<span id="nameError" class="error"></span>

<input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email">
<span id="emailError" class="error"></span>

<div class="input-group mb-2">
<input type="password" name="password" id="password" class="form-control" placeholder="Password">
<button type="button" class="btn btn-secondary" onclick="togglePassword()">👁</button>
</div>
<span id="passError" class="error"></span>

<button class="btn btn-primary w-100" name="register">Register</button><br>
<p class="text-center mt-2">
Already have an account? 
<a href="/ApexTask4/login.php">Login</a>
</p>
</form>

</div>
</div>

<script>
function togglePassword(){
    let p = document.getElementById("password");
    p.type = p.type === "password" ? "text" : "password";
}

function validateForm(){
    let valid = true;

    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let pass = document.getElementById("password").value;

    if(name === ""){
        document.getElementById("nameError").innerText = "Name required";
        valid = false;
    }

    if(email === "" || !email.includes("@")){
        document.getElementById("emailError").innerText = "Valid email required";
        valid = false;
    }

    if(pass.length < 6){
        document.getElementById("passError").innerText = "Min 6 chars required";
        valid = false;
    }

    return valid;
}
</script>

</body>
</html>