<?php
session_start();
if (isset($_SESSION["email"])) {
    $username = $_SESSION["email"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>m&yhouses</title>
    <link rel="shortcut icon" href="../image/icon3.png" type="image/png">
</head>

<body>
    <header class="site-header">
        <img src="../image/Y&m2.png" alt="logo">
        <h1>اكري و بات متهني</h1>
        <a href="add.php"><b>add yours</b></a>
    </header>
    <div>
        <div class="entet">
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="forrent.php">for rent</a></li>
                <li><a href="forsale.php">for sale</a></li>
                <li><a href="holiday.php">holiday rentals</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
            <?php if (isset($username)) : ?>
                <ul>
                    <li><a href="signin.php"><?php echo "$username" ?></a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            <?php else : ?>
                <ul>
                    <li><a href="signin.php">sign in</a></li>
                    <li><a href="login.php">log in</a></li>
                </ul>
            <?php endif; ?>

        </div>
        <div class="corp">
            <img src="../image/happy1.jpg" alt class="img1">
            <div class="desc1">
                <h1>Looking to rent or sell your property?</h1><br><br>
                <h2>Look no further!</h2><br><br>
                <h2>Our platform offers a seamless experience for homeowners
                    and property managers alike</h2><br>
            </div>
            <img src="../image/house3.webp" alt class="img2">
            <div class="desc2">
                <h2>With intuitive search and filtering features, finding
                    your next home has never been easier. Renting with us
                    means enjoying a transparent process, dedicated customer
                    support, and a hassle-free experience.</h2><br>
                <h2> Don't delay, explore our site today and discover your
                    dream rental with just a few clicks!"</h2>
            </div>
            <div class="img3">
                <img src="../image/etudiant1.jpg" alt>
                <img src="../image/etudiant2.png" alt>
                <img src="../image/vacance.webp" alt>
                <img src="../image/house4.webp" alt>
            </div>
            <div class="desc3">
                <h2>we have something for everyone from
                    affordable student accommodations close to universities
                    to spacious family homes in serene neighborhoods. For
                    couples, we offer charming apartments and cozy bungalows
                    perfect for creating lasting memories together.
                    Additionally, our holiday rentals feature stunning
                    villas, beachfront cottages</h2>
            </div>
            <div class="home">
                <h1> Your New Home</h1>
            </div>
            <div class="secrch">
                <h1>Plan your next step with us</h1>
                <form action="/action_page.php">
                    <input type="text" name="search" placeholder="describe your home..">
                    <select id="state" name="states">
                        <option value="tunis">tunis</option>
                        <option value="sfax">sfax</option>
                        <option value="mahdia">mahdia</option>
                        <option value="sousse">sousse</option>
                        <option value="kairouan">kairouan</option>
                        <option value="gabes">gabes</option>
                        <option value="monastir">monastir</option>
                        <option value="bizerte">bizerte</option>
                    </select>
                    <br>
                    <label class="main">for rent
                        <input type="checkbox">
                        <span class="check"></span>
                    </label>
                    <label class="main">for sale
                        <input type="checkbox" checked="checked">
                        <span class="check"></span>
                    </label>
                    <label class="main">holiday rentals
                        <input type="checkbox">
                        <span class="check"></span>
                    </label>
                    <input type="submit" value="search">
                </form>
            </div>

            <div class="tn">
                <center>
                    <h1>Discover your state more</h1>
                </center>
                <div class="i1">
                    <a href> <img src="../image1/sfax.png" class="sfax"></a>
                </div>
                <div class="i2">
                    <a href> <img src="../image1/bizerte.png" class="bizerte"></a>
                    <a href> <img src="../image1/gabes.png" class="gabes"></a>
                    <a href> <img src="../image1/kairouan.png" class="kairouan"></a>
                    <a href> <img src="../image1/mahdia.png" class="mahdia"></a>
                </div>
                <div class="i3">
                    <a href> <img src="../image1/sousse.png" class="sousse"></a>
                    <a href><img src="../image1/monastir.png" class="monastir"></a>
                </div>
                <div class="i4">
                    <a href><img src="../image1/tunis.png" class="tunis"></a>
                </div>
            </div>
            <footer>
                <div class="footer-content" id="contact">
                    <div class="footer-logo">
                        <img src="../image/Y&m2.png" alt="Logo">
                    </div>
                    <div class="footer-description">
                        <p>Take your next move with us. Made by DALOUL & MAKSOUD.</p>
                    </div>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="footer-contact">
                    <a href="#" class="footer-help">Need help?</a>
                </div>
            </footer>
        </div>
</body>

</html>