<?php
session_start();

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
include_once 'dbConnection.php';


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

        button {
            display: block;
            width: 100%;
            padding: 10px 20px;
            margin-top: 30px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
		
		
    </style>

</head>


<body>
<div class="row">
<div class="col-lg-6">
<span class="logo"></span></div>
<div class="col-md-4 col-md-offset-2">

</div>
</div></div>

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

		
<div class="bg">



<!--container start-->
<div class="container">
<div class="row">
<div class="col-md-12">


<?php
// Check if a category is selected
if(isset($_GET['category'])) {
    $categoryId = $_GET['category'];

    // Fetch the category name
    $categoryQuery = "SELECT quiz_category FROM category WHERE quiz_id = $categoryId";
    $categoryResult = mysqli_query($connection, $categoryQuery);
    $categoryData = mysqli_fetch_assoc($categoryResult);
    $categoryName = $categoryData['quiz_category'];

  

    // Query to fetch quizzes for the selected category
    $quizQuery = "SELECT c.*, q.* FROM category c JOIN quiz q ON c.quiz_id = q.quiz_id WHERE c.quiz_id = $categoryId";
    $quizResult = mysqli_query($connection, $quizQuery);
    echo '
	<div class="panel">
    <table class="table title1">
	   <h3><b>Quizzes for '.$categoryName.'</b></h3>

        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Quiz</th>
            <th style="text-align: center;">Number of Questions</th>
            <th style="text-align: center;">Total Marks</th>
            <th style="text-align: center;">Action</th>
        </tr>'; ?>
        <!-- Loop through PHP data -->
        <?php
        $c=1;
        while($row = mysqli_fetch_array($quizResult)) {
            // Your code to display quizzes
            $title = $row['title'];
            $total = $row['total'];
            $correct = $row['correct'];
            $time = $row['time'];
            $e_id = $row['e_id'];
            $q12="SELECT score FROM history WHERE e_id='$e_id' AND email='$email'";
            $q12result=mysqli_query($connection, $q12);   
            if($q12result->num_rows == 0) { // Check if the user has not attempted the quiz yet
                echo '<tr> 
                        <td style="text-align: center;">'.$c++.'</td>
                        <td style="text-align: center;">'.$title.'</td>
                        <td style="text-align: center;">'.$total.'</td>
                        <td style="text-align: center;">'.$correct*$total.'</td>
                        <td style="text-align: center;">
                            <b>
                                <a href="quizpage.php?q=quiz&step=2&e_id='.$e_id.'&n=1&t='.$total.'" class="btn sub1">
                                    <span class="title1"><b>Start Now</b></span>
                                </a>
                            </b>
                        </td>
                    </tr>';
            } else { // User has attempted the quiz before
                echo '<tr>
                        <td style="text-align: center;">'.$c++.'</td>
                        <td style="text-align: center;">'.$title.'&nbsp;<span title="This quiz is already solved by you"></span></td>
                        <td style="text-align: center;">'.$total.'</td>
                        <td style="text-align: center;">'.$correct*$total.'</td>
                        <td style="text-align: center;">
                            <b>
                                <a href="update.php?q=quizre&step=25&e_id='.$e_id.'&n=1&t='.$total.'" class="btn sub1">
                                    <span class="title1"><b>Do Again</b></span>
                                </a>
                        </td>
                    </tr>';
            }
        }
        ?>
    </table>
    <?php
    // HTML ends here
    
}

// Close the database connection
mysqli_close($connection);
?>
</div></div></div></div>



</body>
</html>
