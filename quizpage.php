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
$key="";
if(isset($_POST['submit'])&& $_POST['submit']=="Search"){
	$key=$_POST['search'];
}
?>

	
	
<!--Main Page-->
    <?php if(@$_GET['q']==1) { 
	
		?>

    <div class="panel">
        <table class="table title1">
		<h3><b>All Quizzes<b></h3>
		
		<form name="fSearch" id="fSearch" action="quizpage.php?q=1" method="POST">
			Search for quiz, category or code: <input type="text" name="search" value="<?php echo $key;?>">
					<input type="submit" name="submit" value="Search">
		</form></br></br>

            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Quiz</th>
				<th style="text-align: center;">Category</th>
                <th style="text-align: center;">Number of Question</th>
                <th style="text-align: center;">Total Marks</th>
                <th style="text-align: center;">Action</th>
            </tr>
            <!-- Loop through PHP data -->
            <?php
			
			if($key=="")

	$sql = "select q.*, c.* from quiz q, category c where c.quiz_id = q.quiz_id;";

else

	$sql="SELECT q.*, c.* 
			FROM quiz q, category c 
			WHERE c.quiz_id = q.quiz_id 
			AND (q.title LIKE '%$key%' OR q.quiz_category LIKE '%$key%' OR q.quiz_code LIKE '%$key%');";

				$result = mysqli_query($con, $sql) or die('Error111');

			
            $c=1;
            while($row = mysqli_fetch_array($result)) {
                $title = $row['title'];
                $total = $row['total'];
                $correct = $row['correct'];
                $time = $row['time'];
                $e_id = $row['e_id'];
				$quiz_category = $row['quiz_category'];
                $q12=mysqli_query($con,"SELECT score FROM history WHERE e_id='$e_id' AND email='$email'" )or die('Error98');
                $rowcount=mysqli_num_rows($q12);   
                if($rowcount == 0){
                    echo '<tr>
                            <td style="text-align: center;">'.$c++.'</td>
                            <td style="text-align: center;">'.$title.'</td>
							<td style="text-align: center;">'.$quiz_category.'</td>
                            <td style="text-align: center;">'.$total.'</td>
                            <td style="text-align: center;">'.$correct*$total.'</td>
                            <td style="text-align: center;">
                                <b>
                                    <a href="quizpage.php?q=quiz&step=2&e_id='.$e_id.'&n=1&t='.$total.'" class="btn sub1">
                                        <span class="title1" ><b>Start Now</b></span>
                                    </a>
                                </b>
                            </td>
                        </tr>';
                } else {
                    echo '<tr>
                            <td style="text-align: center;">'.$c++.'</td>
                            <td style="text-align: center;">'.$title.'&nbsp;<span title="This quiz is already solved by you"></span></td>
                            <td style="text-align: center;">'.$quiz_category.'</td>
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
    </div>

    <?php } ?>
    <!--Main Page End-->

<!--quiz start-->
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
    echo '<form action="update.php?q=quiz&step=2&e_id='.$e_id.'&n='.$sn.'&t='.$total.'&ques_id='.$ques_id.'" method="POST"  class="form-horizontal">

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




<!--Result page end-->

<!--quiz end-->


<?php
//history start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
<table class="table title1" >
<h3><b>Your Record<b></h3>

<tr>
	<td><b>No</b></td>
	<td><b>Quiz</b></td>
	<td><b>Question Solved</b></td>
	<td><b>Right</b></td>
	<td><b>Wrong<b></td>
	<td><b>Score</b></td>';
	
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e_id=$row['e_id'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['correct'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM quiz WHERE  e_id='$e_id' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr>
		<td>'.$c.'</td>
		<td>'.$title.'</td>
		<td>'.$qa.'</td>
		<td>'.$r.'</td>
		<td>'.$w.'</td>
		<td>'.$s.'</td>
	</tr>';
}
echo'</table></div>';
}

//Ranking Page
if(@$_GET['q']== 3) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table title1" >
<h3><b>Ranking<b></h3>

<tr>
	<td><b>Rank</b></td>
	<td><b>User</b></td>
	
	<td><b>Score</b></td>
</tr>';

$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
// $college=$row['college'];
}
$c++;
echo '<tr>
		<td><b>'.$c.'</b></td>
		<td>'.$name.'</td>
		<td>'.$s.'</td>';
}
echo '</table></div></div>';}
?>



</div>
</div>
</div>
</div>



</body>
</html>
