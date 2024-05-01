<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Brain Burst</title>

<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>  
<link rel="stylesheet" href="styles.css">

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<style>
.rowa {
margin:70px;
}
</style>
<?php if(@$_GET['w']) {echo'<script>alert("'.@$_GET['w'].'");</script>';} ?>

<script>
function validateForm() {
    var y = document.forms["form"]["name"].value;
    var letters = /^[A-Za-z]+$/;
    if (y == null || y == "") {
        alert("Name must be filled out.");
        return false;
    }
   
    var x = document.forms["form"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address.");
        return false;
    }
    var a = document.forms["form"]["password"].value;
    if(a == null || a == ""){
        alert("Password must be filled out");
        return false;
    }
    if(a.length<5 || a.length>25){
        alert("Passwords must be 5 to 25 characters long.");
        return false;
    }
    var b = document.forms["form"]["cpassword"].value;
    if (a != b){
        alert("Passwords must match.");
        return false;
    }
}
</script>


</head>

<body>

<!--Top nav-->
<header>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Categories</a>
        <a href="#">Daily Suggestion</a>
        <a href="#">Daily Goal</a>
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
            <a href="#" data-toggle="modal" data-target="#myModal">User Log in</a>
            <a href="#" data-toggle="modal" data-target="#login">Admin Log In</a>
        </div>
    </div>
</header>
<!--navi end-->

<!-- sign in form/modal start -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content title1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title title1">Log In</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="login.php?q=index.php" method="POST">
                    <fieldset>
                        <!-- Text input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email"></label>
                            <div class="col-md-6">
                                <input id="email" name="email" placeholder="Enter your E-mail" class="form-control input-md" type="email">
                            </div>
                        </div>
                        <!-- Password input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password"></label>
                            <div class="col-md-6">
                                <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
            </fieldset>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- sign in modal closed -->

<div class="bg1">
    <div class="rowa">
        <div class="col-md-4 col-md-offset-4 panel">
            <!-- sign up form begins -->
            <form class="form-horizontal" name="form" action="sign.php?q=quizpage.php" onSubmit="return validateForm()" method="POST">
                <fieldset>
				<h4><b>Sign up</b></h4>
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="name" style="text-align:left;">Enter your name:</label>
                        <div class="col-md-12">
                            <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">
                        </div>
                    </div>
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="gender" style="text-align:left;">Select your gender</label>
                        <div class="col-md-12">
                            <select id="gender" name="gender" placeholder="Select your gender" class="form-control input-md">
                                <option value="Male">Select Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                   
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-md-12 control-label title1" for="email" style="text-align:left;">Enter your E-mail:</label>
                        <div class="col-md-12">
                            <input id="email" name="email" placeholder="Enter your E-mail" class="form-control input-md" type="email">
                        </div>
                    </div>
                    <!-- Text input -->
                    
					
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="password" style="text-align:left;">Enter your Password:</label>
                        <div class="col-md-12">
                            <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="cpassword" style="text-align:left;">Confirm Password:</label>
                        <div class="col-md-12">
                            <input id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control input-md" type="password">
                        </div>
                    </div>
                    <?php if(@$_GET['q7']){ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for=""></label>
                        <div class="col-md-12"> 
                            <input type="submit" class="sub btn btn-primary" value="Sign Up"/>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div><!-- col-md-4 end -->
    </div><!-- row end -->
</div><!-- bg1 end -->

<!-- Modal for admin login -->
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Admin Log In</h4>
            </div>
            <div class="modal-body title1">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="post" action="admin.php?q=index.php">
                            <div class="form-group">
                                <input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" name="login" value="Login" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- footer end -->
</body>
</html>
