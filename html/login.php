<?php
session_start();
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"basernet");

    if (isset($_POST["email"] ) && isset( $_POST["password"]) )
    {
        $email=$_POST['email']; 
    $mdp=$_POST['password'];
   
    
    $req="select 'email' 'password' from client  where 'email'='$email' and 'password'='$mdp' ";
    $q=mysqli_query($con,$req);
    $user = mysqli_fetch_assoc($q);
    if ($user) {
        echo "email or password is incorrect\n";
    }else
    {
        $_SESSION['email'] = $email;
        header('location:../html/home.php');
    }
    }
     
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/stylelog_in.css">
</head>
<body>
    <div class="glass-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="email" id="email" name="email" required placeholder="email">
                <input type="password" id="password" name="password" required placeholder="Password">

                <div class="options">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit">Login</button>
                <p><a href="./home.php">HOME</a></p>
                <p>Don't have an account? <a href="signin.php" id="register">Register</a></p>

            </form>
        </div>
    </div>
</body>
</html>