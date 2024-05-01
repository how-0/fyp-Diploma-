<?php
session_start();
include_once 'dbConnection.php';

if(!(isset($_SESSION['email']))){
   // Redirect the user to index.php if not logged in
    header("Location: index.php");
    exit; // Stop further execution of PHP code
} else {
    $email = $_SESSION['email'];
}

// Delete the user account from the database
$deleteQuery = "DELETE FROM user WHERE email = '$email'";
if(mysqli_query($con, $deleteQuery)){
    // Account deleted successfully, redirect to logout
    header("Location: index.php");
	echo "Account deleted successfully";
    exit;
} else {
    // Failed to delete account, redirect to profile with error message
    header("Location: profile.php?msg=Failed to delete account");
    exit;
}

mysqli_close($con);
?>
