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
    <title>Brain Burst</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="styles.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <style>
        body {
            background-color: #f4f4f4;
            font-size: 16px;
        }

        .panel-1 {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            width: 90%;
            text-align: justify;
        }

        .title1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.8;
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

<body>
<div class="panel-1">
    <?php
    $result = mysqli_query($con, "SELECT q.*, c.* FROM quiz q, category c WHERE c.quiz_id = q.quiz_id ORDER BY RAND() LIMIT 1") or die('Error111');
    ?>
    <h3 class="title1"><b>Daily Quiz Suggestion</b></h3>
    <?php
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $total = $row['total'];
        $correct = $row['correct'];
        $time = $row['time'];
        $e_id = $row['e_id'];
        $quiz_category = $row['quiz_category'];
        $q12 = mysqli_query($con, "SELECT score FROM history WHERE e_id='$e_id' AND email='$email'") or die('Error98');
        $rowcount = mysqli_num_rows($q12);
        if ($rowcount == 0) {
            echo '<div>
                    <p><b>Quiz:</b> '.$title.'</p>
                    <p><b>Category:</b> '.$quiz_category.'</p>
                    <p><b>Number of Questions:</b> '.$total.'</p>
                    <p><b>Total Marks:</b> '.$correct * $total.'</p>
                    <button onclick="window.location.reload();" class="btn btn-primary">Refresh</button>
                    <a href="quizpage.php?q=quiz&step=2&e_id='.$e_id.'&n=1&t='.$total.'" class="btn btn-primary">Start Now</a>
                 </div>';
        } else {
            echo '<div>
                    <p><b>Quiz:</b> '.$title.'&nbsp;<span title="This quiz is already solved by you"></span></p>
                    <p><b>Category:</b> '.$quiz_category.'</p>
                    <p><b>Number of Questions:</b> '.$total.'</p>
                    <p><b>Total Marks:</b> '.$correct * $total.'</p>
                    <button onclick="window.location.reload();" class="btn btn-primary">Refresh</button>
                    <a href="update.php?q=quizre&step=25&e_id='.$e_id.'&n=1&t='.$total.'" class="btn btn-primary">Do Again</a>
                 </div>';
        }
    }
    ?>
</div>
</body>
</html>
