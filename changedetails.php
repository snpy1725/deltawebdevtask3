<!DOCTYPE html>
<html>
<head>
	<title>Change your account information</title>
</head>
<body>
<style type="text/css">
	h1{
		text-align: center;
		font-family: cursive;
		font-size: 170%;
		border-radius: 5px;
		border:3px solid black;

	}
	p{
		text-align: center;

	}
	form{
		font-size: 130%;
	}

</style>
<h1>Change your Account Information</h1>
<p>Please enter the new account details you want to have in the indicated fields and dont leave any field empty</p>
<br>
<form action="" method="POST">
<table align="center">
<tr>
<td>First Name:</td>
<td align="center"><input type="text" name="newfirstname"></td>
</tr>
<tr>
<td>Last Name:</td>
<td align="center"><input type="text" name="newlastname"></td>
</tr>
<tr>
<td>Username:</td>
<td align="center"><input type="text" name="newusername"></td>
</tr>
<tr>
<td>Password:</td>
<td align="center"><input type="password" name="newpass"></td>
</tr>
<tr>
<td colspan="3"><input type="submit" name="changedetails"></td>
</tr>
</table>
<br>
<a href="loginpage.html"><p>Click here to go back to login again with your new data </p></a>

<?php
if(isset($_POST['changedetails']))
{
$firstnew=$_POST['newfirstname'];
$lastnew=$_POST['newlastname'];
$usrnew=$_POST['newusername'];
$newpass=$_POST['newpass'];
$newhash=md5($newpass);
session_start();
$exisusr=$_SESSION['username'];
$con=mysqli_connect("localhost","root","","codebin");
if(!$con)
{
	echo "Error in connecting to the database";
}
$query="UPDATE people SET FirstName='$firstnew',LastName='$lastnew',Username='$usrnew',Password='$newhash' WHERE Username='$exisusr'";
$result=mysqli_query($con,$query);
if($result)
{
	$_SESSION['username']=$usrnew;
	$_SESSION['firstname']=$firstnew;
	$_SESSION['lastname']=$lastnew;
	echo "<script>alert('Successfully changed your account details.Please click the link below to go and login again with your new information');</script>";
	header("Refresh:0; url=changedetails.php");}

else
{
	echo "<script>alert('Error in trying to change your account info. Try again');</scipt>";
	header("Refresh:0; url=changedetails.php");
}
}

?>

</body>
</html>