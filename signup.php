
<!DOCTYPE html>
<html>

<head>
    <title>Sanaa Art Shop |Sign Up</title>
    <link rel="icon" href="img/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/signup.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->

</head>

<body>
<!-- main -->
<div class="main-w3layouts wrapper">
    <h1>SignUp Form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="index.php" method="post">
                <input type="text" class="form-control"  name="firstname" placeholder="First name" required="">
                <input type="text" class="form-control"  name="lastname" placeholder="Last name" required="">
                <input type="text" class="form-control" type="text" name="name" placeholder="Username" required="">
                <input type="email" class="form-control"  name="email" placeholder="Email" required="">
                <input class="form-control" type="password" name="password" placeholder="Password" required="">
                <input class="form control" type="password" name="password" placeholder="Confirm Password" required="">
                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="SIGNUP">
            </form>
            <p>Already have an Account? <a href="login.php"> Login Now!</a></p>
        </div>
    </div>
</div>
<!-- //main -->
</body>
</html>
<?php

function user_signup($data){

$firstname = mysqli_real_escape_string($GLOBALS['db'],$data['firstname']);
$lastname = mysqli_real_escape_string($GLOBALS['db'],$data['lastname']);
$username = mysqli_real_escape_string($GLOBALS['db'],$data['username']);
$email = mysqli_real_escape_string($GLOBALS['db'],$data['email']);
$pass = mysqli_real_escape_string($GLOBALS['db'],md5($data['password']));
$qry=mysqli_query($GLOBALS['db'],"select * from users where (email='$email' || phone='$phone') ");

if($qry->num_rows >0)
{
echo "<script>alert('Email Id or Phone Number already exists.')</script>";
}

else
{
$sql="INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$pass')";
$query=mysqli_query($GLOBALS['db'],$sql) or die("Error 2".mysqli_error($GLOBALS['db']));
if($query)
{
echo '<script type="text/javascript" location.href="index.php" /script>';
}
}
}
?>

