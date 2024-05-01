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
		
		.panel-1 {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
			width:80%;
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
		
		#progress-bar {
			width: 0%;
			height: 30px;
			background-color: transparent;
			border: 1px solid #000; /* Add a border for visibility */
			text-align: center;
			line-height: 30px;
			color: #000; /* Set text color to black */
		}
		
		p { 
            font-size: 20px; 
        } 
  
        .container-1{ 
            background-color: rgb(192, 192, 192); 
            width: 80%; 
            border-radius: 15px; 
        } 
  
        .skill { 
            background-color: rgb(116, 194, 92); 
            color: white; 
            padding: 1%; 
            text-align: right; 
            font-size: 20px; 
            border-radius: 15px; 
        }
  
        .php { 
            width: 60%; 
        } 
    </style>

</head>


<!--Top nav-->

<header>
	<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="category.php">Categories</a>
            <a href="quiz_rec.php">Daily Suggestion</a>
            <a href="daily_goal.php">Daily Goal</a>
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

        <a href="homepage.php" class="logo" style="">BRAIN BURST</a>

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
</head>
<body>

<?php // Start the session to access session variables

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brainburst";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['goal'])) {
    $goal = $_POST['goal'];
    // Update the user's goal in the database
    $updateSql = "UPDATE user SET daily_goal = $goal WHERE email = '" . $_SESSION['email'] . "'";
    if (mysqli_query($conn, $updateSql)) {
        echo '<div class="alert alert-success" role="alert">Goal updated successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating goal: ' . mysqli_error($conn) . '</div>';
    }
}

$sql = "SELECT daily_goal FROM user WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $goal = $row['daily_goal'];
} else {
    echo '<div class="alert alert-danger" role="alert">Error retrieving goal: ' . mysqli_error($conn) . '</div>';
    $goal = 0;
}

echo '<div class="panel-1">';
echo '<h1>Daily Goal Tracker</h1>';
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
echo '<label for="goal">Set your daily goal:</label>';
echo '<input type="number" id="goal" name="goal" value="' . $goal . '" min="0" max="10" required>';
echo '<button type="submit" class="btn btn-primary">Set Goal</button>';
echo '</form>';

$sql = "SELECT COUNT(*) AS count FROM history WHERE email = '" . $_SESSION['email'] . "' AND DATE(date) = CURDATE()";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
} else {
    echo '<div class="alert alert-danger" role="alert">Error retrieving count: ' . mysqli_error($conn) . '</div>';
    $count = 0;
}

if ($count >= $goal) {
    echo '<p>Congratulations! You have completed your daily goal.</p>';
} else {
    echo '<p>' . $count . '/' . $goal . ' quizzes completed</p>';
}
echo '<p>Current Progress</p>';
echo '<div class="container-1">';
if ($goal > 0) {
    $percentage = ($count / $goal) * 100;
} else {
    $percentage = 0;
}
echo '<div class="skill php" style="width: ' . $percentage . '%;">' . round($percentage) . '%</div>';
echo '</div>'; // Close container-1
echo '</div>'; // Close panel-1

mysqli_close($conn); // Close the database connection
?>





</body>
</html>	