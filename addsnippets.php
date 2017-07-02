<!DOCTYPE html>
<html>
<head>
	<title>Add A Code Snippet</title>
</head>
<body>
<style type="text/css">
	h1{
		text-align: center;
		font-family: cursive;
		font-size: 170%;
		border:1px solid black;
		background-color: #0A5F06;
		color: #A6A917;

	}
	p{
		text-align: center;
		font-size: 130%;
		font-weight: bold;
	}
</style>
<h1>Add A Code Snippet Here</h1>
<p> Please fill in the following fields for uploading the code snippet of any programming language</p>
<form action="" method="POST">
<table align="center">
<tr>
<td>Enter a Title For the Snippet:</td>
<td align="center"><input type="text" name="title"></td>
</tr>
<tr>
<td>Enter the code snippet:</td>
<td align="center"><input type="text" name="code"></td>
</tr>
<tr>
<td>Enter the coding language used:</td>
<td align="center"><input type="text" name="codelang"></td>
</tr>
<tr>
<td>Enter your username again for security purposes:</td>
<td align="center"><input type="text" name="addusername"></td>
</tr>
<tr>
<td colspan="3"><input type="submit" name="addsubmitcode"></td>
</tr>
</table>
<br>
<a href="loginpage.html"><p>Click here to go back and login again to view your code snippet</p></a>
<br>

<?php
session_start();
if(isset($_POST['addsubmitcode']))
{
	$title=$_POST['title'];
	$code=$_POST['code'];
	$lang=$_POST['codelang'];
	$addusr=$_POST['addusername'];
	echo $_SESSION['username'];
	if($addusr!=$_SESSION['username'])
	{
		echo "<script>alert('Your username does not match. Please try again');</script>";
        
	}
	else
	{
		$con=mysqli_connect("localhost","root","","codebin");
		if(!$con)
		{
			echo "Error in connecting to the database";
		}
		$query="INSERT INTO codesnippets VALUES('$title','$code','$lang','$addusr')";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "<script>alert('Successfully added to the database. go back to the list to view your code snippet');</script>";
			header("Refresh:0; url=addsnippets.php");
		}
		else
		{
			echo "<script>alert('Error in adding the snippet to the database,please try again');</script>";
			header("Refresh:0; url=addsnippets.php");
		}
	}
}


?>
</body>
</html>