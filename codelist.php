<!DOCTYPE html>
<html>
<head>
	<title>List Of Existing Code Snippets</title>
</head>
<body>
<?php
session_start();
?>
<style type="text/css">
	h1{
		text-align: center;
		font-family: cursive;
		font-size: 170%;
		border-radius: 5px;
		border:2px solid black;
		background-color: #3364FF;
		color: white;
	}
	p{
		text-align: center;
		font-size: 120%;
		font-family: cursive;
		font-weight: bold;
	}
	table{
		font-size: 180%
	}
	button{
		font-size: 105%;
	}
	
</style>
<script type="text/javascript">
	function setview()
	{
		<?php
                

		?>
	}
</script>
<h1>Existing Code Snippets Added Into the Database</h1>
<p>In this list, each code snippet is posted with a title and a programming language used in the snippet. Each snippet is a link, clicking on it will redirect you to a separate page showing that code Snippet to you.If you are logged in as a guest, you can only view these snippets but cannot add any of your own.</p>

<?php

if($_SESSION['loggedin'])
{
?>
<marquee direction="right" behavior="scroll" loop="100" scrolldelay="30" bgcolor="#8033FF">Logged in as <b><i><?php  echo $_SESSION['username']; ?></i></b></marquee>
<br>
<br>
<a href="addsnippets.php"><p>Click here to add snippets to the list</p></a>

<br>
<table align="center" border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;">
<thead>
	<th>Title</th>
	<th>Programming Language used</th>
	<th>View the code</th> 
</thead>
<tbody>
<?php
$con=mysqli_connect("localhost","root","","codebin");
if(!$con)
{
	echo "error in connecting to the database";
}
$query="SELECT Title,CodingLanguage FROM codesnippets";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);
if($numrows!=0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<tr>
		      <td>{$row['Title']}</td>
		      <td>{$row['CodingLanguage']}</td>
		      <td><a href='view/viewcode.php?title=".urlencode($row['Title'])."' target='_blank'><button>View</button></a></td>
		      <tr>\n";

	}

}
else
{
	echo "No data exists in the database as of now, check later.";
}

?></tbody>
</table>
<br>
<a href="deletesnippet.php"><p>click here to delete the snippets you added(you cannot delete snippets added by other users)</p></a>
<br>
<br>
<a href="loginpage.html"><p>Click here to go back and login again to access the dashboard</p></a>
<?php

$_SESSION['loggedin']=false;
}
else
{	
?>
<marquee direction="right" behavior="scroll" loop="100" scrolldelay="30" bgcolor="#8033FF">Welcome Guest. Please login to add a code snippet</marquee>
<br><br>
<table align="center" border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;">
<thead>
	<th>title</th>
	<th>programming Language used</th>
	<th>View the code</th> 
</thead>
<tbody>
<?php
$con=mysqli_connect("localhost","root","","codebin");
if(!$con)
{
	echo "error in connecting to the database";
}
$query="SELECT Title,CodingLanguage FROM codesnippets";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);
if($numrows!=0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<tr>
		      <td>{$row['Title']}</td>
		      <td>{$row['CodingLanguage']}</td>
		      <td><a href='view/viewcode.php?title=".urlencode($row['Title'])."' target='_blank'><button>View</button></a></td>
		      <tr>\n";

	}
}
else
{
	echo "No data exists in the database as of now, check later.";
}

?></tbody>
</table>
<a href="loginpage.html"><p>Click here to login to your account</p></a>
<?php

}
?>


</body>
</html>