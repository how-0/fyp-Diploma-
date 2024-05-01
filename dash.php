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
		
		
		
    </style>

</head>

<div class="header">
<div class="row">

<?php
 include_once 'dbConnection.php';
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
            <?php if(@$_GET['q']==0)?><a href="dash.php?q=0">Home</a>
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

        <a href="homepage.php" class="logo" style="">BRAIN BURST</a>

        <div class="dropdown" style="float:right;">
            <img src="pictures/user.png" class="user-pic">
            <div class="dropdown-content">
                <a href="logout.php?q=quizpage.php">Log Out</a>
            </div>
        </div>
</header>
<!--Top nav end-->






<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"select q.*, c.* from quiz q, category c where c.quiz_id = q.quiz_id") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table title1">
<h3><b>Quiz<b></h3>

<tr>
	<td><b>No</b></td>
	<td><b>Quiz</b></td>
	<td><b>Category</b></td>
	<td><b>Total question</b></td>
	<td><b>Marks</b></td>
	<td style="text-align: center;"><b>Action</b></td>
</tr>';

$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$correct = $row['correct'];
    //$time = $row['time'];
	$e_id = $row['e_id'];
	$quiz_category = $row['quiz_category'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE e_id='$e_id' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr>
			<td>'.$c++.'</td>
			<td>'.$title.'</td>
			<td>'.$quiz_category.'</td>			
			<td>'.$total.'</td>
			<td>'.$correct*$total.'</td>
			<td style="text-align: center;"><b><a href="quizpage.php?q=quiz&step=2&e_id='.$e_id.'&n=1&t='.$total.'" class="btn sub1" >&nbsp;<span class="title1"><b>Start</b></span></a></b></td>
		</tr>';
}
else
{
echo '<tr>
		<td>'.$c++.'</td>
		<td>'.$title.'&nbsp;<span title="This quiz is already solve by you"></span></td>
		<td>'.$quiz_category.'</td>					
		<td>'.$total.'</td>
		<td>'.$correct*$total.'</td>
		<td style="text-align: center;"><b><a href="update.php?q=quizre&step=25&e_id='.$e_id.'&n=1&t='.$total.'" class="btn sub1" >&nbsp;<span class="title1"><b>Restart</b></span></a></b></td>
	</tr>';
}
}
$c=0;
echo '</table></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title">
<table class="table title1" >
<h3><b>User Ranking<b></h3>

<tr>
	<td><b>Rank</b></td>
	<td><b>Name</b></td>
	<td><b>Gender</b></td>
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
		<td>'.$gender.'</td>
		<td>'.$s.'</td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->
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
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<h3><b>User Feedback<b></h3>

<tr>
	<td><b>No</b></td>
	<td><b>Subject</b></td>
	<td><b>Email</b></td>
	<td><b>Date</b></td>
	<td><b>Time</b></td>
	<td><b>By</b></td>
	<td></td>
	<td></td>
</tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->


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

<!--add quiz step2 start-->
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
		<td><b>Time limit</b></td>
		<td><b>Action</b></td>
	</tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$correct = $row['correct'];
    $time = $row['time'];
	$e_id = $row['e_id'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$correct*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&e_id='.$e_id.'" class="btn sub1"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>




<!--Update Category--!>



</div><!--container closed-->
</div></div>
</body>
</html>
