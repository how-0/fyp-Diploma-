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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Categories - Brain Burst</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="styles.css">
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<style>
    body {
        background-color: #f4f4f4;
        font-size: 16px;
    }

    .panel {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin: 20px auto;
        max-width: 800px;
    }

    h3 {
        font-size: 28px;
        margin-bottom: 30px;
        color: #333;
    }

    .category-textarea {
        width: 80%;
        height: 50px;
        margin-bottom: 10px;
    }

    .btn-save {
        margin-top: 10px;
    }
</style>
</head>
<body>
<!--Top nav-->

<header>
	<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="admincategory.php">Edit Categories</a>
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

        <a href="homepage.php" class="logo" style="">BRAIN BURST</a>

        <div class="dropdown" style="float:right;">
            <img src="pictures/user.png" class="user-pic">
            <div class="dropdown-content">
                <a href="logout.php?q=quizpage.php">Log Out</a>
            </div>
        </div>
</header>
<!--Top nav end-->

<div class="bg">
    <!-- Container start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
				
				<form action="addcategory.php" method="post">
    <h3><b>Add Quiz Category</b></h3>
    <input type="text" name="new_category" class="form-control" placeholder="Enter new category name" required></br>

    <button type="submit" class="btn btn-primary btn-add">Add Category</button>
</form>
                    <h3><b>Edit Categories</b></h3>
                    <form action="updatecategory.php" method="post">
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

                        // Fetch Categories from the Database
                        $query = "SELECT * FROM category";
                        $result = mysqli_query($connection, $query);

                        // Display Categories with edit option
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<textarea name='category[{$row['quiz_id']}]' class='category-textarea'>{$row['quiz_category']}</textarea>";
                        }
                        ?>
						</br>
                        <button type="submit" class="btn btn-primary btn-save">Save Changes</button>
                    </form>
                    <?php mysqli_close($connection); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Container end -->
</div>

<!-- Optional Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
