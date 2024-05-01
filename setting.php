<?php
session_start();
?>

<?php
include_once 'dbConnection.php';

if(!(isset($_SESSION['email']))){
   // Redirect the user to index.php if not logged in
    header("Location: index.php");
    exit; // Stop further execution of PHP code
} else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    // No need to include dbConnection.php again, as it's already included
}
?>

<?php
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
?>


<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Brain Burst </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>  
<link rel="stylesheet" href="styles.css">

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <style>
        body {
            background-color: #f4f4f4;
			font-size:16px;
        }

        .panel {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
			width:100%;
			text-align:justify;
        }

        table {
            width: 100%;
            border: 2px solid #ddd;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

       
        a {
            color: #007bff;
            text-decoration: none;
        }

       
		
		form {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 18px;
            color: #555;
        }

       

        input[type="radio"] + label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            line-height: 1.6;
        }

        input[type="radio"] + label::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #007bff;
            background-color: #fff;
        }

        input[type="radio"]:checked + label::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #007bff;
        }
		
		.col-md-1 {
			width: 100%;
		}
		
		.container-1{
			margin-left:30px;
		}
		
		hr {
			border: none;
			height: 1px;
			/* Set the hr color */
			color: #333;  /* old IE */
			background-color: #333;  /* Modern Browsers */
		}
    </style>

</head>


<!--Top nav-->

<header>
	<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="category.php">Categories</a>
            <a href="#">Daily Suggestion</a>
            <a href="#">Daily Goal</a>
			<a href="quizpage.php?q=1">Quiz</a>
			<a href="quizpage.php?q=2">Record</a>
			<a href="quizpage.php?q=3">Ranking</a>
			<a href="feedback.php">Feedback</a>

            <a href="setting.php">Setting</a>
            <a href="about.php">About Us</a>

          </div>
          
          <span style="font-size:30px;cursor:pointer;padding:10px;" onclick="openNav()">&#9776;</span>
          
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }
          
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }

            function hideSidebar() {
                document.getElementById('openSideMenu').checked = false;
            }
        </script>

        <a href="#" class="logo" style="">BRAIN BURST</a>

        
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "brainburst";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT * FROM user WHERE email = '" . $_SESSION['email'] . "'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo '<div class="dropdown" style="float:right;">';
					$image = $row["image"];
                    if (!empty($image)) {
						echo '<img src="/brainburst/uploads/' . basename($image) . '" alt="Profile Picture" class="user-pic"><br><br>';
				} else {
						// Display default profile picture if profile picture is not set
						echo '<img src="pictures/user.png" alt="Default Profile Picture" class="user-pic"><br><br>';
				}
				}
			}
?>
            <div class="dropdown-content">
                <a href="setting.php">User Info</a>
                <a href="logout.php?q=quizpage.php">Log Out</a>
            </div>
        </div>
</header>
<!--Top nav end-->

		
<div class="bg">



<!-- container start -->
<div class="container">
    <div class="row">
            <!-- Profile settings -->
            <div class="panel">
				<h3><b>Profile</b> <a href="update_profile.php" class="btn btn-primary	" style="float:right;margin-right:30px;">Edit Profile</a></h3>
				<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "brainburst";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT * FROM user WHERE email = '" . $_SESSION['email'] . "'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class = "container-1">';
					$image = $row["image"];
                    if (!empty($image)) {
						echo '<img src="/brainburst/uploads/' . basename($image) . '" alt="Profile Picture" class="user-pic-1"><br><br>';
				} else {
						// Display default profile picture if profile picture is not set
						echo '<img src="/pictures/user.png" alt="Default Profile Picture" class="user-pic-1"><br><br>';
				}
				
			

				echo '<p><b>Username:</b><br>' . (isset($row["name"]) ? $row["name"] : '') . '</p>';
				echo '<p><b>Gender:</b><br>' . (isset($row["gender"]) ? $row["gender"] : '') . '</p>';
				echo '<p><b>Email Address:</b><br>' . (isset($row["email"]) ? $row["email"] : '') . '</p>';
				echo '<p><b>Summary:</b><br>' . (isset($row["summary"]) ? $row["summary"] : '') . '</p><hr>';
				echo '</div>';

				}
			}
?>
                
				<h3><b>Account Settings</b></h3>
                <br>
				<div class = "container-1">
				<a href="#" data-toggle="modal" data-target="#updatePass">Update Password</a><br><br>
                <a href="delete_account.php">Delete Account</a><br><br>
                <a href="logout.php?q=setting.php">Logout</a>
				</div>
            </div>
    </div>
</div>

<!-- sign in form/modal start -->
<div class="modal fade" id="updatePass">
    <div class="modal-dialog">
        <div class="modal-content title1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title title1">Update Password</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="update_password.php" method="POST">
                    <fieldset>
                        <!-- Text input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="currentPass"></label>
                            <div class="col-md-6">
                                <input id="currentPass" name="currentPass" placeholder="Enter current password" class="form-control input-md" type="password">
                            </div>
                        </div>
                        <!-- Password input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="newPass"></label>
                            <div class="col-md-6">
                                <input id="newPass" name="newPass" placeholder="Enter new password" class="form-control input-md" type="password">
                            </div>
                        </div>
						<!-- Confirm Password input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="cPass"></label>
                            <div class="col-md-6">
                                <input id="cPass" name="cPass" placeholder="Re-enter new password" class="form-control input-md" type="password">
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </fieldset>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- sign in modal closed -->

<!-- container end -->

<script>
function validateUpdatePasswordForm() {
    var currentPass = document.forms["updatePassForm"]["currentPass"].value;
    var newPass = document.forms["updatePassForm"]["newPass"].value;
    var confirmPass = document.forms["updatePassForm"]["cPass"].value;

    if (currentPass == null || currentPass == "") {
        alert("Please enter your current password.");
        return false;
    }

    if (newPass == null || newPass == "") {
        alert("Please enter a new password.");
        return false;
    }

    if (newPass.length < 5 || newPass.length > 25) {
        alert("Passwords must be 5 to 25 characters long.");
        return false;
    }

    if (confirmPass == null || confirmPass == "") {
        alert("Please re-enter your new password.");
        return false;
    }

    if (newPass !== confirmPass) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}
</script>





</body>
</html>