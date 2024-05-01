<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale="1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<!--Top nav-->

    <header>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="categories.html">Categories</a>
            <a href="#">Daily Suggestion</a>
            <a href="#">Daily Goal</a>
			<a href="quizpage.php?q=1">Quiz</a>
			<a href="quizpage.php?q=2">Record</a>
			<a href="quizpage.php?q=3">Ranking</a>
			<a href="feedback.php">Feedback</a>
            <a href="#">Setting</a>
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

        <a href="#" class="logo">BRAIN BURST</a>

        <div class="dropdown" style="float:right;">
            <img src="pictures/user.png" class="user-pic">
            <div class="dropdown-content">
                <a href="#">User Info</a>
                <a href="#">Log Out</a>
            </div>
        </div>
        

    </header>
	
	<!--search bar
	
	<form>
		<div class="search">
			<input class="search-input" type="search" placeholder="search">
		</div>
	</form>
	
	-->

<!--Main Content-->

    <!--Categories-->
   
    <h1 class="title">Categories</h1>

    <div class="scroll-container">
        <div class="image-container">
            <a href="#">
            <img src="pictures/technology.png" width="200" height="200">
            <p><b>Technology</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/history.png" width="200" height="200">
            <p><b>History</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/geography.png" width="200" height="200">
            <p><b>Geography</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/science.png" width="200" height="200">
            <p><b>Science</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/sports.png" width="200" height="200">
            <p><b>Sports</b></p>
            </a>
        </div>
    </div>
    

    <!--Recommendation-->
    
    <h1 class="title">Recommendation</h1>

    <div class="scroll-container">
        <div class="image-container">
            <a href="#">
            <img src="pictures/apple.jpg" width="200" height="200">
            <p><b>Technology</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/history.png" width="200" height="200">
            <p><b>History</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/geography-map.png" width="200" height="200">
            <p><b>Geography</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/animal.png" width="200" height="200">
            <p><b>Science</b></p>
            </a>
        </div>
        <div class="image-container">
            <a href="#">
            <img src="pictures/sports.png" width="200" height="200">
            <p><b>Sports</b></p>
            </a>
        </div>
    </div>




</body>
</html>