<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brainburst";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Get form data
    $name = isset($_POST["txtName"]) ? $_POST["txtName"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $summary = isset($_POST["summary"]) ? $_POST["summary"] : "";
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

    // Update user profile information
    if (!empty($name) && !empty($gender) && !empty($summary) && !empty($email)) {
        // Upload image file
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Fix missing slashes in the file path
            $target_file = str_replace("\\", "/", $target_file);

            // Check if the uploaded file is an image
            $check = getimagesize($target_file);
            if ($check !== false) {
                // File is an image - update database with image path
                $sql = "UPDATE user SET name='$name', gender='$gender', summary='$summary', image='$target_file' WHERE email='$email'";

                if ($conn->query($sql) === TRUE) {
                    //echo "Record updated successfully";
                    header("location:success.php");
                    exit; // Always exit after header redirection
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "File is not an image.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Please fill in all the fields.";
    }
}

$conn->close();
?>
