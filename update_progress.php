<?php
session_start();

// Include the database connection file
include_once 'dbConnection.php';

if (!(isset($_SESSION['email']))) {
    // Redirect the user if not logged in
    header("Location: index.php");
    exit;
} else {
    $email = $_SESSION['email'];

    // Query to get the count of completed quizzes for the user
    $query = "SELECT COUNT(*) as progress FROM history WHERE email = '$email' AND date = CURDATE()";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    // Return the progress count as JSON
    echo json_encode(array('progress' => $row['progress']));
}
?>
