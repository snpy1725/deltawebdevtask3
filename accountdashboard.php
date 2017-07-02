<!DOCTYPE html>
<html>
<head>
	<title>Welcome to your Dashboard</title>
</head>

<body >
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<style type="text/css">
	h1{
		text-align: center;
		font-size: 170%;
		font-family: cursive;
		border-radius: 5px;
		border:3px solid black;

	}
	a{
		font-size: 130%;
		font-weight: bold;
		font-family: cursive;
		color: #3390FF;
	}
	p{
		font-weight: bold;
		font-family: cursive;
		font-size: 130%;
		border-radius: 5px;
		border:1px solid black;
		background-color: blue;
		color: white;
		text-align: center;
	}
	div.list{
		
		font-size: 130%;
		font-family: Georgia;
	}
</style>

<marquee direction="right" behavior="scroll" loop="100" scrolldelay="30" bgcolor="#8033FF">Logged in as <?php  echo $_SESSION['username']; ?></marquee>
<h1>Welcome to your account dashboard</h1>
<p>Your account info:</p>
<div class="list">
<ol>
<li><i><b>First Name:  </b></i><?php echo $_SESSION['firstname'];?></li>
<li><i><b>Last Name: </b></i><?php echo $_SESSION['lastname'];?></li>
<li><i><b>Username: </b></i><?php echo $_SESSION['username'];?></li>
</ol>
</div>
<br>
<a href="changedetails.php">Click here to change any items in your account information</a>
<br><br>
<?php
$_SESSION['loggedin']=true;
?>
<a href="codelist.php">Click here to add and view the existing list of code snippets already added to the database</a>

<br>
<br>
<br>


<a href="loginpage.html"><button>Logout</button></a>
</body>
</html>