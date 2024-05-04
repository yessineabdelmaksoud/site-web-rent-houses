<?php
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"basernet");

$name=$_POST['fullName'];
$username=$_POST['userName'];
$email=$_POST['email'];
$phoneNumber=$_POST['phoneNumber'];
$password=$_POST['password'];
$ConfirmPassword=$_POST['ConfirmPassword'];
$gender=$_POST['gender'];


$email_check_query = "SELECT * FROM client WHERE email='$email' LIMIT 1";
$result = mysqli_query($con, $email_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    echo "Cet e-mail est déjà utilisé. Veuillez en choisir un autre.";
} else { 
    $req="INSERT INTO client (nom, username, email, phone, password) VALUES ('$name', '$username', '$email', '$phoneNumber', '$password')";
    if (mysqli_query($con, $req)) {
        echo "Le compte a été ajouté avec succès. <a href='../html/home.html'>Retour à la page principale</a>";
    } else {
        echo "Erreur lors de l'insertion des données : " . mysqli_error($con);
    }
}
mysqli_close($con);
?>
