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
    <link rel="stylesheet" href="../css/forrent.css">
    <title>for rent</title>
    <link rel="shortcut icon" href="../image/icon3.png" type="image/png">
</head>

<body>
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
    <div class="container">
        <form class="search-form">
            <label for="location">Location:</label>
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

            <label for="rooms">number of rooms</label>
            <select id="rooms" name="rooms">
                <option value="">room</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5+</option>
            </select>
            <label for="type">type of rooms</label>
            <select id="type" name="type">
                <option value="rent">Apartments </option>
                <option value="sale">Villas </option>
                <option value="holiday">Duplexes</option>
                <option value="student">Traditional Houses</option>
                <option value="student">studio</option>
            </select>

            <label for="price-range">Price Range:</label>
            <input type="range" id="price-range" name="price-range" min="10000" max="1000000" step="10000">
            <output for="price-range" id="price-output">$100,000</output>
            <script>
                var priceRange = document.getElementById("price-range");


                var priceOutput = document.getElementById("price-output");


                priceRange.addEventListener("input", function() {
                    priceOutput.innerHTML = "$" + numberWithCommas(this.value);
                });

                function numberWithCommas(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            </script>
            <br>
            <br>
            <br>
            <label>Features:</label>
            <div class="features">
                <input type="checkbox" id="elevator" name="features" value="elevator">
                <label for="elevator">#Ascenseur</label>

                <input type="checkbox" id="storage-room" name="features" value="storage-room">
                <label for="storage-room">#Chambre rangement</label>

                <input type="checkbox" id="central-heating" name="features" value="central-heating">
                <label for="central-heating">#Chauffage central</label>

                <input type="checkbox" id="air-conditioning" name="features" value="air-conditioning">
                <label for="air-conditioning">#Climatisation</label>

                <input type="checkbox" id="equipped-kitchen" name="features" value="equipped-kitchen">
                <label for="equipped-kitchen">#Cuisine équipée</label>

                <input type="checkbox" id="double-glazing" name="features" value="double-glazing">
                <label for="double-glazing">#Double vitrage</label>

                <input type="checkbox" id="garage" name="features" value="garage">
                <label for="garage">#Garage</label>

                <input type="checkbox" id="armored-door" name="features" value="armored-door">
                <label for="armored-door">#Porte blindée</label>

                <input type="checkbox" id="security" name="features" value="security">
                <label for="security">#Sécurité</label>
            </div>


            <div class="surface-container">
                <div class="surface-field">
                    <label for="min-surface">Minimum Surface:</label>
                    <select id="min-surface" name="min-surface">
                        <option value="">Any</option>
                        <option value="50">50 sqm</option>
                        <option value="100">100 sqm</option>
                        <option value="150">150 sqm</option>
                        <option value="200">200 sqm</option>
                    </select>
                </div>
                <div class="surface-field">
                    <label for="max-surface">Maximum Surface:</label>
                    <select id="max-surface" name="max-surface">
                        <option value="">Any</option>
                        <option value="100">100 sqm</option>
                        <option value="150">150 sqm</option>
                        <option value="200">200 sqm</option>
                        <option value="250">250 sqm</option>
                    </select>
                </div>
            </div>



            <input type="submit" value="Search">
        </form>
    </div>
    <div class="blog-container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "basernet";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $sql = "SELECT * FROM home where for_='rent';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='blog-box'>";
                echo "<div class='blog-img'>";
                echo "<img src='" . $row['main_image'] . "' height='300' alt='Event Image'>";
                echo "</div>";
                echo "<div class='blog-text'>";
                echo "<p> number of room: " . $row['nbroom'] . "</p>";
                echo "<p>in: ".$row['localisation']. "</p>";
                echo "<p>price is " . $row['price'] . "</p>";
                echo "<p>" . $row['describe_'] . "</p>";
                echo "<p> designed to : " . $row['type'] . "</p>";
                echo "<p> publier le  : " . $row['created_at'] . "</p>";
                echo "<div class='button_container'>";
                echo " <div class='contacter'><a href='contacter.php'>contacter</a></div>";
                echo " <div class='view_img'><a href='view_img.php'>view  images</a></div>";
                echo " <div class='view_map'><a href='view_map.php'>view on map  </a></div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No home found.";
        }

        mysqli_close($conn);
        ?>
    </div>

</body>

</html>