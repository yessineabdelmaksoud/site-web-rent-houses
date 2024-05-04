<?php
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"basernet");
    
    $email=$_POST['email'];
    $mdp=$_POST['password'];
   
    
    $req="select 'email' 'password' from client  where 'email'='$email' and 'password'='$mdp' ";
    $q=mysqli_query($con,$req);
    $user = mysqli_fetch_assoc($q);
    if ($user) {
        echo "email or password is incorrect\n";
    }else
    {
        echo "bonjour <a href='../html/home.html'>Retour à la page principale</a>";
    }
    

?>