<!DOCTYPE html>
<html>
<head>
	<title>Delete Snippet</title>
</head>
<body>
<style type="text/css">
	h1{
		text-align: center;
		font-family: cursive;
		font-size: 170%;
		border-radius: 5px;
		border:1px solid black;
		background-color: blue;
		color: white;
	}
	p{
		text-align: center;
		font-family: georgia;
		font-size: 130%;
	}
</style>
<h1>Delete Your Added Snippets</h1>
<p>Please enter the details of the snippet you want to delete</p>
<br>
<form action="" method="POST">
<table align="center">
<tr>
<td>Enter the title of the snippet to delete:</td>
<td align="center"><input type="text" name="titledelete">
</td>
</tr>
<tr>
<td>Enter your username again:</td>
<td align="center"><input type="text" name="usernamedelete">
</td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" name="submitbutton">
</td>
</tr>	
</table>
<br>
<a href="loginpage.html"><p>click here to login again to view the dashboard</p></a>
<?php
if(isset($_POST['submitbutton']))
{
$title=$_POST['titledelete'];
$usr=$_POST['usernamedelete'];
$con=mysqli_connect("localhost","root","","codebin");
if(!$con)
{
	echo "Error in connecting to the database";

}
if($title&&$usr)
{
$query="SELECT * FROM codesnippets WHERE Title='$title'";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);
if($numrows!=0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$dbusr=$row['Username'];
		if($usr==$dbusr)
		{
			$queryto="DELETE FROM codesnippets WHERE Title='$title'";
			$resulta=mysqli_query($con,$queryto);
			if($resulta)
			{
				echo "<script>alert('Successfully deleted the given snippet from the database');</script>";
				header("Refresh:0,url=deletesnippet.php");
			}
			else
			{
				echo "<script>alert('Error in deleting the given snippet');</script>";
				header("Refresh:0,url=deletesnippet.php");
			}
		}
	}
}
else
{
	echo "<script>alert('The snippet does not exist on the database. Add it from the link from the dashboard');</script>";
		header("Refresh:0,url=deletesnippet.php");
}
}
else
{
	echo "<script>alert('Please enter the required fields before submitting the form');</script>";
		header("Refresh:0,url=deletesnippet.php");
}
}
?>


</body>
</html>