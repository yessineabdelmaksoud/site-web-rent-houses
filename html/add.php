<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "basernet";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $for = mysqli_real_escape_string($conn, $_POST['for']);
    $nbroom = mysqli_real_escape_string($conn, $_POST['nbroom']);
    $localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $describe = mysqli_real_escape_string($conn, $_POST['describe']);

    // File upload handling for main image
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png");

        if (in_array($file_ext, $allowed_extensions)) {
            $uploadsDir = 'uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }
            $file_path = $uploadsDir . $file_name;
            $absolute_path = $_SERVER['DOCUMENT_ROOT'] . '/ME AND DALDOUL/html/' . $file_path;

            if (move_uploaded_file($file_tmp, $absolute_path)) {
                // Main image uploaded successfully
            } else {
                echo "Failed to upload main file.";
                exit(); // Exit script if main image upload fails
            }
        } else {
            echo "Invalid file format. Please upload a JPG, JPEG, or PNG file for main image.";
            exit(); // Exit script if main image format is invalid
        }
    } else {
        echo "Error uploading main file.";
        exit(); // Exit script if main image is not uploaded
    }

    // File upload handling for other images
    $other_images_paths = array();
    if (!empty($_FILES['files']['name'][0])) {
        $uploads = 'uploads/multiple/';
        if (!is_dir($uploads)) {
            mkdir($uploads, 0755, true);
        }
        foreach ($_FILES['files']['name'] as $key => $file_name) {
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if (in_array($file_ext, $allowed_extensions)) {
                $target_file = $uploads . $file_name;
                $absolute_path = $_SERVER['DOCUMENT_ROOT'] . '/ME AND DALDOUL/html/' . $target_file;

                if (move_uploaded_file($file_tmp, $absolute_path)) {
                    $other_images_paths[] = $target_file;
                } else {
                    echo "Failed to upload other images.";
                }
            } else {
                echo "Invalid other image format. Please upload JPG, JPEG, or PNG files only.";
            }
        }
    }

    // Construct comma-separated string of other images paths
    $other_images_string = implode(",", $other_images_paths);

    // SQL query to insert data into the table
    $sql = "INSERT INTO home (for_, nbroom, localisation, price, type, describe_, main_image, other_images) 
            VALUES ('$for', '$nbroom', '$localisation', '$price', '$type', '$describe', '$file_path', '$other_images_string')";

    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add yours </title>
    <link rel="stylesheet" href="../css/add.css">
</head>

<body>
    <div class="glass-container">
        <div class="add-box">
            <h2>add you home</h2>
            <form action="add.php" method="POST" enctype="multipart/form-data">
                <select id="for" name="for">
                    <option value="rent">for rent</option>
                    <option value="sale">for sale</option>
                    <option value="holiday">for holiday</option>
                    <option value="student">for student</option>
                </select>
                <input type="text" id="nbroom" name="nbroom" required placeholder="number of room..">
                <select id="localisation" name="localisation">
                    <option value="tunis">tunis</option>
                    <option value="sfax">sfax</option>
                    <option value="mahdia">mahdia</option>
                    <option value="sousse">sousse</option>
                    <option value="kairouan">kairouan</option>
                    <option value="gabes">gabes</option>
                    <option value="monastir">monastir</option>
                    <option value="bizerte">bizerte</option>
                </select>
                <input type="text" id="price" name="price" required placeholder="price of your house">
                <select id="type" name="type">
                    <option value="rent">Apartments </option>
                    <option value="sale">Villas </option>
                    <option value="holiday">Duplexes</option>
                    <option value="student">Traditional Houses</option>
                    <option value="student">studio</option>
                </select>
                <input type="text" id="describe" name="describe" required placeholder="describe your house">
                <p>choose photo couverture de votre poste</p>
                <input type="file" name="file">
                <p>choose les autre images of your room</p>
                <input type="file" name="files[]" multiple>
                <br>
                <button type="submit">add you home</button>
                <p><a href="home.php">HOME</a></p>
            </form>
        </div>
    </div>
</body>
</html>