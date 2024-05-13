<?php
session_start();
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Brain Burst Admin</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="styles.css">

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<style>
        body {
            background-color: #f4f4f4;
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
		
		.feedback-list {
    display: flex;
    flex-direction: column;
}

.feedback-item {
    display: flex;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 18px;
}

.feedback-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.feedback-details {
    flex: 4;
}

.feedback-action {
    flex: 1;
    display: flex;
    align-items: center;
}

.feedback-number {
    font-size: 18px;
    font-weight: bold;
}

.feedback-date {
    color: #888;
}

.feedback-subject {
    margin-top: 0;
}

.feedback-user {
    color: #777;
    margin-bottom: 5px;
}

.feedback-text {
    margin-top: 0;
    color: #333;
}

.delete-feedback {
    color: #d9534f;
    text-decoration: none;
    cursor: pointer;
}

.delete-feedback:hover {
    text-decoration: underline;
}
		
		
			.ranking-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    text-align: center; /* Center-align the content */
}

.ranking-title {
    width: 100%; /* Ensure the title takes full width */
}

.ranking-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 10px;
    width: 200px;
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
    font-size: 20px;
    font-weight: bold;
}

.user-name {
    font-size: 16px;
    font-weight: bold;
}

.ranking-card-body {
    padding: 10px;
    text-align: center;
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
		
		
    </style>

</head>

<div class="header">
<div class="row">

<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
}?>

</div></div>
<!-- admin start-->

<!--Top nav-->

<header>
	<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php if(@$_GET['q']==0)?><a href="admincategory.php">Edit Categories</a>
            <?php if(@$_GET['q']==0)?><a href="dash.php?q=0">Quiz</a>
            <?php if(@$_GET['q']==1)?><a href="dash.php?q=1">User</a>
            <?php if(@$_GET['q']==2)?><a href="dash.php?q=2">Ranking</a>
			<?php if(@$_GET['q']==3)?><a href="dash.php?q=3">Feedback</a>
			<?php if(@$_GET['q']==4 || @$_GET['q']==5)?><a href="dash.php?q=4">Add Quiz</a>
			<?php if(@$_GET['q']==4 || @$_GET['q']==5)?><a href="dash.php?q=5">Remove Quiz</a>

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

        <div class="dropdown" style="float:right;">
            <img src="pictures/user.png" class="user-pic">
            <div class="dropdown-content">
                <a href="logout.php?q=quizpage.php">Log Out</a>
            </div>
        </div>
</header>
<!--Top nav end-->

<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "brainburst";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

?>




<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php
$key="";
if(isset($_POST['submit'])&& $_POST['submit']=="Search"){
	$key=$_POST['search'];
}
?>

<!--Main Page/Show Quiz Start-->

<?php if(@$_GET['q']==0) { ?>

<div class="panel">
    <h3 class="title1"><b>All Quizzes</b></h3>
    
    <!-- Search Form -->
   
	
    <form name="fSearch" id="fSearch" action="quizpage.php?q=1" method="POST">
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
                <a href="adminquizpage.php?q=quiz&step=2&e_id=<?php echo $e_id; ?>&n=1&t=<?php echo $total; ?>" class="btn btn-success">Check</a>
                <?php } else { ?>
                <a href="adminupdate.php?q=quizre&step=25&e_id=<?php echo $e_id; ?>&n=1&t=<?php echo $total; ?>" class="btn btn-success">Check</a>
                <?php } ?>
            </div>
        </div>

        <?php $c++; } ?>
    </div>
</div>

<?php } ?>
<!--Main Page/Show Quiz end-->

<!--Ranking Page--!>

<?php
if(@$_GET['q']== 2) {
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
        ?>
        <div class="ranking-card">
            <div class="ranking-card-header">
                <span class="rank"><?php echo $c; ?></span>
                <span class="user-name"><?php echo $name; ?></span>
            </div>
            <div class="ranking-card-body">
                <span class="score"><?php echo $s; ?></span>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php } ?>


<!--Ranking closed-->



<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');

echo  '<div class="panel"><div class="table-responsive"><table class="table title1">
<h3><b>User Info<b></h3>
<tr>
	<td><b>No</b></td>
	<td><b>Name</b></td>
	<td><b>Gender</b></td>
	<td><b>Email</b></td>
	<td>Action</td>
</tr>';

$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	//$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	//$college = $row['college'];

	echo '<tr>
			<td>'.$c++.'</td>
			<td>'.$name.'</td>
			<td>'.$gender.'</td>
			<td>'.$email.'</td>
			<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>
		</tr>';
}
$c=0;
echo '</table></div></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo '<div class="panel">
<h3><b>User Feedback<b></h3>

        <div class="feedback-list">
		';
$c=1;
while($row = mysqli_fetch_array($result)) {
    $date = date("d-m-Y", strtotime($row['date']));
    $subject = $row['subject'];
    $name = $row['name'];
    $email = $row['email'];
    $feedback = $row['feedback'];

    echo '<div class="feedback-item">
            <div class="feedback-info">
                <span class="feedback-number">'.$c++.'</span>
                <span class="feedback-date">'.$date.'</span>
            </div>
            <div class="feedback-details">
                <h4 class="feedback-subject">'.$subject.'</h4>
                <p class="feedback-user">User: '.$name.' &nbsp E-mail: '.$email.'</p>
                <p class="feedback-text">Details: '.$feedback.'</p>
            </div>
            <div class="feedback-action">
                <a href="update.php?fdid='.$row['id'].'" class="delete-feedback" title="Delete Feedback">Delete</a>
            </div>
          </div>';
}
echo '</div></div>';
}
?>
<!--feedback closed-->



<!--Add quiz step 1 start-->

<?php
if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "", "brainburst");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve existing categories from the database
    $query = "SELECT quiz_id, quiz_category FROM category";
    $result = mysqli_query($connection, $query);

    // Check if query execution was successful
    if (!$result) {
        die("Query execution failed: " . mysqli_error($connection));
    }

    // Check if categories exist
    if (mysqli_num_rows($result) > 0) {
        $category = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $category[] = $row;
        }
    } else {
        // Handle case when no categories are found
        $category = array();
    }

    // Close database connection
    mysqli_close($connection);
    ?>
	

<div class="panel">
    <div class="row">
        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                <fieldset> 
                    <!--Select category-->
                    <div class="form-group">
                        <label class="col-md-12" for="category">Select Category:</label>  
                        <div class="col-md-12">
                            <select id="category" name="category" class="form-control" placeholder="Select category">
						        
								<!-- Placeholder option -->	    
								<option value="" disabled selected>Select Quiz Category</option>

                                <?php foreach ($category as $cat) { ?>
                                    <?php
                                    // Check if this category is selected
                                    $selected = isset($_POST['category']) && $_POST['category'] == $cat['quiz_id'] ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $cat['quiz_id']; ?>" <?php echo $selected; ?>><?php echo $cat['quiz_category']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input for Quiz title -->
                    <div class="form-group">
                        <label class="col-md-12" for="name">Quiz Title:</label>  
                        <div class="col-md-12">
                            <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <!-- Text input for total number of questions -->
                    <div class="form-group">
                        <label class="col-md-12" for="total">Total Number of Questions:</label>  
                        <div class="col-md-12">
                            <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                        </div>
                    </div>

                    <!-- Text input for marks on right answer -->
                    <div class="form-group">
                        <label class="col-md-12" for="right">Marks on Right Answer:</label>  
                        <div class="col-md-12">
                            <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                        </div>
                    </div>

                    <!-- Text input for minus marks on wrong answer -->
                    <div class="form-group">
                        <label class="col-md-12" for="wrong">Minus Marks on Wrong Answer (without sign):</label>  
                        <div class="col-md-12">
                            <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for=""></label>
                        <div class="col-md-12"> 
                            <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<!--Add quiz step 1 end-->

<!--Add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="panel">
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div>
 <div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&e_id='.@$_GET['e_id'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b   style="font-size: 18px;">Question number&nbsp;'.$i.'&nbsp;:</><br/>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="quest'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="quest'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1" style="text-align:left;">Enter option A:</label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Option A" class="form-control input-md" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2" style="text-align:left;">Enter option B:</label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Option B" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3" style="text-align:left;">Enter option C:</label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Option C" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4" style="text-align:left;">Enter option D:</label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Option D" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">Option A</option>
  <option value="b">Option B</option>
  <option value="c">Option C</option>
  <option value="d">Option D</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
  </div>
</div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
	<tr>
		<td><b>No</b></td>
		<td><b>Quiz</b></td>
		<td><b>Total question</b></td>
		<td><b>Marks</b></td>
		<td><b>Action</b></td>
	</tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$correct = $row['correct'];
    $time = $row['time'];
	$e_id = $row['e_id'];
	echo '<tr>
			<td>'.$c++.'</td>
			<td>'.$title.'</td>
			<td>'.$total.'</td>
			<td>'.$correct*$total.'</td>
			<td><b><a href="update.php?q=rmquiz&e_id='.$e_id.'" class="btn sub1"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td>
		</tr>';
}
$c=0;
echo '</table></div></div>';

}
?>







</div><!--container closed-->
</div></div>
</body>
</html>
