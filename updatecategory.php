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

    // Process each category update
    foreach ($_POST['category'] as $quiz_id => $category_name) {
        $quiz_id = mysqli_real_escape_string($connection, $quiz_id);
        $category_name = mysqli_real_escape_string($connection, $category_name);

        // Update 'quiz' table
        $sql_update_quiz = "UPDATE quiz SET quiz_category='$category_name' WHERE quiz_id='$quiz_id'";
        mysqli_query($connection, $sql_update_quiz);

        // Update 'category' table
        $sql_update_category = "UPDATE category SET quiz_category='$category_name' WHERE quiz_id='$quiz_id'";
        mysqli_query($connection, $sql_update_category);
    }

    // Close the database connection
    mysqli_close($connection);

    // Redirect to the editcategory.php page after updating
    header("Location: editcategory.php");
    exit;
} else {
    // If accessed directly without POST method, redirect to index.php
    header("Location: index.php");
    exit;
}
?>
