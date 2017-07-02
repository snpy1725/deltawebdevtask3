<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
echo "<script>alert('invalid captcha entered. Please try again registering')</script>";
header("Refresh:0; url=signuppage.php");
}
else
{
	$first=$_POST['firstname'];
	$last=$_POST['lastname'];
	$usr=$_POST['username'];
	$pass=$_POST['password'];
	$hash=md5($pass);
	if($first&&$last&&$usr&&$pass)
	{
		$con=mysqli_connect("localhost","root","","codebin");
		if(!$con)
		{
			echo "error in connecting with the database";
		}
		$query="INSERT INTO people VALUES('$first','$last','$usr','$hash')";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "<script>alert('successfully registered on CodeBin. Have fun posting code snippets');</script>";
			echo "<a href='loginpage.html'>Click here to login with your new credentials</a>";
		}
		else
		{
			echo "Error in inserting data to the database";

		}
	}
	else
	{
		echo "<script>alert('Please enter all the fields given for registering');</script>";
		header("Refresh:0; url=signuppage.php");

	}
}


?>
</body>
</html>