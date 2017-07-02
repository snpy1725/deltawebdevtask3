<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
$usr=$_POST['username'];
$pass=$_POST['password'];
$hash=md5($pass);
$con=mysqli_connect("localhost","root","","codebin");
if(!$con)
{
	echo "Error in connecting with the database";

}
$query="SELECT * FROM people";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);

if($numrows!=0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$dbusr=$row['Username'];
		$dbpass=$row['Password'];
		if((strcmp($usr,$dbusr)==0)&&(strcmp($dbpass,$hash)==0))
		{
			$_SESSION['loggedin']=true;
			$_SESSION['username']=$usr;
			$_SESSION['firstname']=$row['FirstName'];
			$_SESSION['lastname']=$row['LastName'];
			include("accountdashboard.php");
         
		}
		else 
		{
			echo "<script>alert('Invalid Username or password. Please try again');</script>";
			header("Refresh:0; url=loginpage.html");
		}

	}

}
else
{
	echo "<script>alert('No such user found on the database. Please sign up to login');</script>";
	header("Refresh:0; url=loginpage.html");

}


?>
</body>
</html>