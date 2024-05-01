<?php
session_start();
include_once 'dbConnection.php';

if (!(isset($_SESSION['email']))) {
    // Redirect the user to index.php if not logged in
    header("Location: index.php");
    exit; // Stop further execution of PHP code
} else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    // No need to include dbConnection.php again, as it's already included
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file or code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "brainburst";

    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process new category addition
    if (isset($_POST['new_category'])) {
        $new_category = mysqli_real_escape_string($connection, $_POST['new_category']);

        // Insert into 'category' table
        $sql_insert_category = "INSERT INTO category (quiz_category) VALUES ('$new_category')";
        mysqli_query($connection, $sql_insert_category);
    }

    // Close the database connection
    mysqli_close($connection);

    // Redirect to the editcategory.php page after updating
    header("Location: admincategory.php");
    exit;
} else {
    // If accessed directly without POST method, redirect to index.php
    header("Location: index.php");
    exit;
}
?>
