<?php
session_start();
include_once 'dbConnection.php';
$email=$_SESSION['email'];

//Admin delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
header("location:dash.php?q=3");
}
}

//Admin delete user
if(isset($_SESSION['key'])){
if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
$demail=@$_GET['demail'];
$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
$result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
header("location:dash.php?q=1");
}
}
//Admin remove quiz
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='sunny7785068889') {
$e_id=@$_GET['e_id'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE e_id='$e_id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$ques_id = $row['ques_id'];
$r1 = mysqli_query($con,"DELETE FROM options WHERE ques_id='$ques_id'") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM answer WHERE ques_id='$ques_id' ") or die('Error');
}
$r3 = mysqli_query($con,"DELETE FROM questions WHERE e_id='$e_id' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM quiz WHERE e_id='$e_id' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM history WHERE e_id='$e_id' ") or die('Error');

header("location:dash.php?q=5");
}
}

//Admin add quiz

if(isset($_SESSION['key'])) {
    if(@$_GET['q'] == 'addquiz' && $_SESSION['key'] == 'sunny7785068889') {
        // Validate form data
        if(empty($_POST['name']) || empty($_POST['total']) || empty($_POST['right']) || empty($_POST['wrong']) || empty($_POST['category'])) {
            die("Error: All fields are required.");
        }

        // Sanitize input
        $name = mysqli_real_escape_string($con, ucwords(strtolower($_POST['name'])));
        $total = intval($_POST['total']);
        $correct = intval($_POST['right']);
        $wrong = intval($_POST['wrong']);
        
        // Get the selected quiz category and ID
        $quiz_id = ""; // Initialize variable
        $quiz_category = ""; // Initialize variable
        if (!empty($_POST['category'])) {
            $selectedCategory = $_POST['category'];
            if (!is_array($selectedCategory)) {
                // If category is not an array, handle it accordingly
                $selectedCategory = array($selectedCategory);
            }
            
            foreach ($selectedCategory as $cat_id) {
                $cat_id = mysqli_real_escape_string($con, $cat_id);
                $query_category = mysqli_query($con, "SELECT quiz_category FROM category WHERE quiz_id = '$cat_id'");
                
                if(mysqli_num_rows($query_category) > 0) {
                    $row = mysqli_fetch_assoc($query_category);
                    $quiz_category = $row['quiz_category'];
                    $quiz_id = $cat_id;
                    break; // Assuming only one category can be selected
                }
            }
        } else {
            die("Error: No category selected.");
        }

        if(empty($quiz_id) || empty($quiz_category)) {
            die("Error: Invalid category selection.");
        }
        
        $time = isset($_POST['time']) ? intval($_POST['time']) : null;
        $id = uniqid();

        // Insert quiz into database
        $q3 = mysqli_query($con, "INSERT INTO quiz VALUES ('$id', NULL ,'$name', '$quiz_id', '$quiz_category', '$correct', '$wrong', '$total', '$time', NOW())");

        if($q3) {
            // Redirect to dashboard with step 2
            header("location:dash.php?q=4&step=2&e_id=$id&n=$total");
            exit(); // Terminate script execution after redirect
        } else {
            die("Error: Failed to insert quiz into database. " . mysqli_error($con));
        }
    }
}






//Admin add question
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addqns' && $_SESSION['key']=='sunny7785068889') {
$n=@$_GET['n'];
$e_id=@$_GET['e_id'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $ques_id=uniqid();
 $quest=$_POST['quest'.$i];
$q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$e_id','$ques_id','$quest' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$ques_id','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$ques_id','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$ques_id','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$ques_id','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ans_id=$oaid;
break;
case 'b':
$ans_id=$obid;
break;
case 'c':
$ans_id=$ocid;
break;
case 'd':
$ans_id=$odid;
break;
default:
$ans_id=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES ('$ques_id','$ans_id')");

 }
header("location:dash.php?q=0");
}
}

//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$e_id=@$_GET['e_id'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$ques_id=@$_GET['ques_id'];
$q=mysqli_query($con,"SELECT * FROM answer WHERE ques_id='$ques_id' " );
while($row=mysqli_fetch_array($q) )
{
$ans_id=$row['ans_id'];
}
if($ans == $ans_id)
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE e_id='$e_id' " );
while($row=mysqli_fetch_array($q) )
{
$correct=$row['correct'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$e_id' ,'0','0','0','0',NOW(), '$email' )")or die('Error555');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE e_id='$e_id' AND email='$email' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['correct'];
}
$r++;
$s=$s+$correct;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  email = '$email' AND e_id = '$e_id'")or die('Error124');

} 
else
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE e_id='$e_id' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrong'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$e_id' ,'0','0','0','0',NOW(), null )")or die('Error137');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE e_id='$e_id' AND email='$email' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND e_id = '$e_id'")or die('Error147');
}
if($sn != $total)
{
$sn++;
header("location:adminquizpage.php?q=quiz&step=2&e_id=$e_id&n=$sn&t=$total")or die('Error152');
}
else if( $_SESSION['key']!='sunny7785068889')
{
$q=mysqli_query($con,"SELECT score FROM history WHERE e_id='$e_id' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
}
else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$s+$sun;
$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
}
header("location:adminquizpage.php?q=result&e_id=$e_id");
}
else
{
header("location:adminquizpage.php?q=result&e_id=$e_id");
}
}

//restart quiz
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
$e_id=@$_GET['e_id'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$q=mysqli_query($con,"SELECT score FROM history WHERE e_id='$e_id' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"DELETE FROM `history` WHERE e_id='$e_id' AND email='$email' " )or die('Error184');
$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$sun-$s;
$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
header("location:quizpage.php?q=quiz&step=2&e_id=$e_id&n=1&t=$t");
}

?>



