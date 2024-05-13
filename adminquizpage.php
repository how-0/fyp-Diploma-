<?php
session_start();
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
			overflow-x:hidden;
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
		
		.result-container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        max-width: 600px;
        padding: 30px;
    }

    .result-container .title {
        font-size: 25px;
        margin-bottom: 20px;
        text-align: center;
    }

    .result-info {
        text-align: left;
    }

    .result-info p {
        font-size: 18px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }

    .result-info p span {
        font-weight: bold;
    }

    .result-info p:last-child {
        margin-bottom: 0;
    }

.ranking-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    text-align: center;
}

.ranking-title {
    width: 100%;
}

.ranking-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 10px;
    width: 200px;
}

.ranking-card-top {
    width: 850px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.ranking-card-header {
    background-color: #007bff;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.rank {
    display: inline-block;
    position: relative;
}

.rank-num {
    margin-right: 5px; /* Adjust the margin as needed */
}

.rank img {
    width: 30px; /* Adjust the size as needed */
    height: auto;
    position: absolute;
    top: -25px; /* Adjust the position to align with the text */
    left: -45px; /* Adjust the position to align with the text */
}

.ranking-card-body {
    padding: 10px;
    text-align: center;
}


.ranking-card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

.ranking-card-top:nth-child(2) {
    background-color: #E8C675;
}

.ranking-card-top:nth-child(3) {
    background-color: #A6A6A6;
}

.ranking-card-top:nth-child(4) {
    background-color: #BF8970;
}

.score {
    font-size: 24px;
    font-weight: bold;
    color: #007bff;
}

.title1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.search-form {
    margin-bottom: 20px;
}

.search-form input[type="text"] {
    padding: 10px;
    width: calc(70% - 10px);
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-right: 10px;
}

.search-form button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.quiz-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 20px;
}

.quiz-item {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
}

.quiz-title {
    margin-top: 0;
    margin-bottom: 10px;
    font-size: 20px;
}

.quiz-details {
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

.btn-success {
    background-color: #28a745;
    color: #fff;
}

.btn-info {
    background-color: #17a2b8;
    color: #fff;
}

.btn:hover {
    opacity: 0.8;
}

.panel-title {
    margin-top: 20px;
    padding: 20px;
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 8px;
}

.card {
    border: 1px solid #ddd; /* Lighter border color */
    border-radius: 8px;
    margin-bottom: 20px;
    background-color: #fff; /* White background */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-text {
    margin-bottom: 0.5rem;
    font-size: 16px;
}

@media (min-width: 576px) {
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (min-width: 768px) {
    .col-md-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
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

        <a href="dash.php?q=0" class="logo" style="">BRAIN BURST</a>
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
$key="";
if(isset($_POST['submit'])&& $_POST['submit']=="Search"){
	$key=$_POST['search'];
}
?>

	
	
<!--Main/Quiz Page Start-->
<?php if(@$_GET['q']==1) { ?>

<div class="panel">
    <h3 class="title1"><b>All Quizzes</b></h3>
    
    <!-- Search Form -->
   
	
    <form name="fSearch" id="fSearch" action="adminquizpage.php?q=1" method="POST">
			Search for quiz, category or code: <input type="text" name="search" value="<?php echo $key;?>">
					<input type="submit" name="submit" value="Search">
		</form></br></br>

	
	
    <!-- Quiz List -->
    <div class="quiz-list">
        <?php
        if($key == "") {
            $sql = "SELECT q.*, c.* FROM quiz q, category c WHERE c.quiz_id = q.quiz_id;";
        } else {
            $sql = "SELECT q.*, c.* 
			FROM quiz q, category c 
			WHERE c.quiz_id = q.quiz_id 
			AND (q.title LIKE '%$key%' OR q.quiz_category LIKE '%$key%' OR q.quiz_code LIKE '%$key%');";
        }

        $result = mysqli_query($con, $sql) or die('Error111');
        $c = 1;

        while($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $correct = $row['correct'];
            $e_id = $row['e_id'];
            $quiz_category = $row['quiz_category'];

            $q12 = mysqli_query($con,"SELECT score FROM history WHERE e_id='$e_id' AND email='$email'") or die('Error98');
            $rowcount = mysqli_num_rows($q12);   
        ?>

        <div class="quiz-item">
            <div class="quiz-info">
                <h4 class="quiz-title"><b><?php echo $title; ?></b></h4>
                <p>Category: <?php echo $quiz_category; ?></p>
                <p>Number of Questions: <?php echo $total; ?></p>
                <p>Total Marks: <?php echo $correct * $total; ?></p>
            </div>

            <div class="quiz-action">
                <?php if($rowcount == 0) { ?>
                <a href="adminquizpage.php?q=quiz&step=2&e_id=<?php echo $e_id; ?>&n=1&t=<?php echo $total; ?>" class="btn btn-success">Start Now</a>
                <?php } else { ?>
                <a href="adminupdate.php?q=quizre&step=25&e_id=<?php echo $e_id; ?>&n=1&t=<?php echo $total; ?>" class="btn btn-info">Do Again</a>
                <?php } ?>
            </div>
        </div>

        <?php $c++; } ?>
    </div>
</div>

<?php } ?>
<!--Main/Quiz Page End-->

<!--Quiz Start-->
<?php
if(@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
    $e_id = @$_GET['e_id'];
    $sn = @$_GET['n'];
    $total = @$_GET['t'];
    $q = mysqli_query($con, "SELECT * FROM questions WHERE e_id='$e_id' AND sn='$sn'");
    echo '<div class="panel">';
	
    while($row = mysqli_fetch_array($q)) {
        $quest = $row['quest'];
        $ques_id = $row['ques_id'];
        echo '<b style="font-size: 25px;">' . $sn . '.&nbsp;' . $quest . '</b><br />';
    }
    $q = mysqli_query($con, "SELECT * FROM options WHERE ques_id='$ques_id'");
    echo '<form action="adminupdate.php?q=quiz&step=2&e_id='.$e_id.'&n='.$sn.'&t='.$total.'&ques_id='.$ques_id.'" method="POST"  class="form-horizontal">

	<br/>';
    while($row = mysqli_fetch_array($q)) {
        $option = $row['option'];
        $option_id = $row['option_id'];
        echo '<label><input type="radio" name="ans" value="' . $option_id . '"> ' . $option . '</label>';
    }
    echo '<br/><button type="submit">Submit</button></form></div>';
} ?>

<?php
// Result page
if(@$_GET['q'] == 'result' && @$_GET['e_id']) {
    $e_id = @$_GET['e_id'];
    $q = mysqli_query($con, "SELECT * FROM history WHERE e_id='$e_id' AND email='$email'") or die('Error100');
    while($row = mysqli_fetch_array($q)) {
        $s = $row['score'];
        $w = $row['wrong'];
        $r = $row['correct'];
        $qa = $row['level'];
        // Calculate the percentage of correct questions
        $percentage_correct = ($r / $qa) * 100;
        echo '<div class="result-container">';
        echo '<h1 style="text-align: center; margin-bottom: 20px;"><b>Result</b></h1>';
        echo '<div class="result-info">';
        echo '<p>Total Questions: <span>'.$qa.'</span></p>';
        echo '<p>Correct: <span>'.$r.'</span></p>';
        echo '<p>Wrong: <span>'.$w.'</span></p>';
        echo '<p>Your Score: <span>'.$s.'</span></p>';
        // Display custom message with percentage
        echo '<h3><b>You have corrected ' . round($percentage_correct, 2) . '% of this quiz.</b></h3>';
        echo '</div>'; // .result-info
        // Display the calculated percentage
        echo '</div>'; // .result-container
    }
    echo '</div>'; // .panel
}
?>
<!--Result Page End-->
<!--Quiz End-->

<!--Record/History Start-->
<?php
// Function to calculate the percentage
function calculatePercentage($correct, $total) {
    if ($total == 0) {
        return 0; // Avoid division by zero error
    }
    return round(($correct / $total) * 100, 2); // Calculate and round the percentage
}

// History start
if(@$_GET['q'] == 2) {
    $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC") or die('Error197');
?>
<div class="panel-title">
    <h3>Your Records</h3>
    <div class="row">
        <?php
        $c = 0;
        while($row = mysqli_fetch_array($q)) {
            $e_id = $row['e_id'];
            $s = $row['score'];
            $w = $row['wrong'];
            $r = $row['correct'];
            $qa = $row['level'];
            $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE e_id='$e_id'") or die('Error208');
            while($row2 = mysqli_fetch_array($q23)) {
                $title = $row2['title'];
            }
            $c++;
            $percentage = calculatePercentage($r, $qa); // Calculate the percentage

            // Check if date is not null before formatting
            $dateCompleted = !empty($row['date']) ? date('Y-m-d H:i:s', strtotime($row['date'])) : 'Unknown';
        ?>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title" style="font-size:20px;"><?php echo $title; ?></h4>
                    <p class="card-text">Questions Solved: <?php echo $qa; ?></p>
                    <p class="card-text">Correct Answers: <?php echo $r; ?></p>
                    <p class="card-text">Wrong Answers: <?php echo $w; ?></p>
                    <p class="card-text">Score: <?php echo $s; ?></p>
                    <p class="card-text">Percentage Correct: <?php echo $percentage; ?>%</p><br>
                    <p class="card-text">	<?php echo $dateCompleted; ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<?php } ?>
<!--Record/History Page End-->


<!--Ranking Page-->
<?php
if(isset($_GET['q']) && $_GET['q'] == 3) {
    $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC") or die('Error223');
?>

<div class="panel title">
    <div class="ranking-container">
        <h3 class="ranking-title"><b>Ranking</b></h3>
        <?php
        $c = 0;
        while($row = mysqli_fetch_array($q)) {
            $e = $row['email'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e'") or die('Error231');
            while($row = mysqli_fetch_array($q12)) {
                $name = $row['name'];
                $gender = $row['gender'];
            }
            $c++;
            // Add a class to the ranking-card based on the position
            $class = ($c <= 3) ? 'ranking-card-top' : 'ranking-card';
            // Output the ranking card
            echo '<div class="' . $class . '">';
            echo '<div class="ranking-card-header">';
            echo '<div class="rank">';
            if ($c == 1) {
                echo '<img src="pictures/gold.png" alt="Gold" class="medal">';
            } elseif ($c == 2) {
                echo '<img src="pictures/silver.png" alt="Silver" class="medal">';
            } elseif ($c == 3) {
                echo '<img src="pictures/bronze.png" alt="Bronze" class="medal">';
            } else {
                echo '<span class="rank-num">' . $c . '. </span>';
            }
            echo '</div>';
            echo '<span class="user-name">' . $name . '</span>';
            echo '</div>';
            echo '<div class="ranking-card-body">';
            echo '<span class="score">' . $s . '</span>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php } ?>









</div>
</div>
</div>
</div>



</body>
</html>
