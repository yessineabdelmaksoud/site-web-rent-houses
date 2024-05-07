<?php
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"basernet");
session_start();
if(isset($_POST["fullName"]) && isset($_POST["userName"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phoneNumber"]) && isset($_POST["ConfirmPassword"]) && isset($_POST["gender"])) 
{
$name=$_POST['fullName'];
$username=$_POST['userName'];
$email=$_POST['email'];
$phoneNumber=$_POST['phoneNumber'];
$password=$_POST['password'];
$ConfirmPassword=$_POST['ConfirmPassword'];
$gender=$_POST['gender'];
$email_check_query = "SELECT * FROM client WHERE email='$email'";
$result = mysqli_query($con, $email_check_query);
$user = mysqli_fetch_assoc($result);
if ($user) {
    echo "Cet e-mail est déjà utilisé. Veuillez en choisir un autre.";
} else { 
    $req="INSERT INTO client (nom, username, email, phone, password) VALUES ('$name', '$username', '$email', '$phoneNumber', '$password')";
    if (mysqli_query($con, $req)) {
header("Location:login.php");
    } else {
        echo "Erreur lors de l'insertion des données : " . mysqli_error($con);
    }
}
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="../css/stylesignup.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Registration</h1>
        <form action="signin.php" method="POST">
            <div class="main-user-info">
                <div class="user-input-box">
                    <input type="text" id="fullName" name="fullName" placeholder="Full Name">
                </div>
                <div class="user-input-box">
                    <input type="text" id="userName" name="userName" placeholder="Username">
                </div>
                <div class="user-input-box">
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                <div class="user-input-box">
                    <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Phone Number">
                </div>
                <div class="user-input-box">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <div class="user-input-box">
                    <input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password">
                </div>
            </div>
            <div class="gender-details-box">
                <span class="gender-title">Gender</span>
                <div class="gender-category">
                    
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male" > 
                    
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="female" > 
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="register">
            </div>
            <p><a href="./home.php">HOME</a></p>

        </form>
    </div>
</body>
</html> 
