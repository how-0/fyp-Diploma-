<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brainburst";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user WHERE email='{$_SESSION['email']}'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { 
        $name = $row["name"];
        $gender = $row["gender"];
        $image = $row["image"];
        $summary = $row["summary"];
    } // Added a closing brace for the while loop
} else {
    echo "No records found";
}

mysqli_close($conn);
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
		
		.panel-1 {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px 100px;
			width:60%;	
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
	<form action="update_profileA.php" method="POST" enctype="multipart/form-data">
        <div class="center">
        <h1><?php echo $name; ?></h1>
        <h3>Edit Profile<br></h3><hr>
    </div>

    <label for="txtName">User Name:</label>
    <input type="text" size="30" id="txtName" name="txtName" maxlength="30" placeholder="eg. John" value="<?php echo $name; ?>"><br><br>

    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="M"<?php if ($gender == "M") { ?>selected<?php } ?>>Male</option>
        <option value="F"<?php if ($gender == "F") { ?>selected<?php } ?>>Female</option>
        <option value="-"<?php if ($gender == "-") { ?>selected<?php } ?>>Preferred not to say</option>
    </select><br><br>

    <label for="summary">Summary:</label>
    <textarea rows="10" cols="60" id="summary" name="summary"><?php echo $summary; ?></textarea><br><br>

    <!-- Input for uploading a new image -->
    <label for="fileToUpload">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

    <!-- Hidden input fields to pass email and image path -->
    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
    <input type="hidden" name="image" value="<?php echo $image; ?>">

    <input type="submit" value="Save" name="submit">
    <input type="reset" value="Clear" name="reset">
</form>
	
</div>
</div>
</body>
</html>