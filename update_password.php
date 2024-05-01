<?php
session_start();

// Include the database connection
include_once 'dbConnection.php';

// Get form data
$email = $_SESSION['email'];
$current_password = isset($_POST['currentPass']) ? $_POST['currentPass'] : "";
$new_password = isset($_POST['newPass']) ? $_POST['newPass'] : "";
$confirm_password = isset($_POST['cPass']) ? $_POST['cPass'] : "";

// Check if the new password matches the confirmed password
if($new_password != $confirm_password) {
    header("location:profile.php?msg=Passwords do not match");
    exit();
}

// Validate old password
$current_password = stripslashes($current_password);
$current_password = addslashes($current_password);
$current_password = md5($current_password);

// Check if the old password matches the one in the database
$query = "SELECT * FROM user WHERE email='$email' AND password='$current_password'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 1) {
    // Update the password in the database
    $new_password = md5($new_password);
    $update_result = mysqli_query($con, "UPDATE user SET password = '$new_password' WHERE email = '$email'");

    if ($update_result) {
        header("location:success_1.php?msg=Password updated successfully");
    } else {
        header("location:profile.php?msg=Failed to update password");
    }
}
?>
