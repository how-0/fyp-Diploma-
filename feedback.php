<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
<title>Brain Burst Feedback Form </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    

     <link rel="stylesheet" href="styles.css">

<style>
.row {
margin:10px;
}
</style>
</head>

<body>



<!--Body-->

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

            <a href="setting.php">Settings</a>
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

<div class="row header">

<div class="col-md-4">



<?php
 include_once 'dbConnection.php';
 
  if((!isset($_SESSION['email']))){
echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal">&nbsp;Signin</a>&nbsp;';}
else
{
// echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3">&nbsp;Signout</a>&nbsp;'
;}
?>

</div></div>


<div class="bg1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel">
<h2 align="center">Feedback Form</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;">&bsp;'.@$_GET['q'].'</span>';
else
{echo ' 
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-mail:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your e-mail" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"><div class="row"><b>Write your problem here:</b><br><br>
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</div>
</form>';}?>
</div><!--col-md-6 end-->
<div class="col-md-3"></div></div>
</div></div>
</div><!--container end-->





</body>
</html>
