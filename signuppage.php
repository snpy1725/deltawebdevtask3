

<!DOCTYPE html>
<html>

<head>
	<title>Signup To CodeBin</title>
	
</head>
<body>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<style type="text/css">
	h1{
		text-align: center;
		font-family: cursive;
		font-size: 170%;
		border-radius: 5px;
		border:3px solid black;
		color: white;
		background-color: #8633FF;
	}
	p{
		text-align: center;
		font-size: 130%;
		font-family: cursive;
	}
	table{
		
		font-size: 160%;
		font-family: cursive;
	}
	#submitbutton
	{
		text-align: center;
	}
	div.captcha{
		align-items: center;
	}
</style>

<h1>SignUp To CodeBin</h1>
<p>Please enter all the following credentials before clicking on 'submit'</p>
<br>

<form action="signedup.php" method="POST">
<table align="center">
<tr>
<td>First Name:</td>
<td align="center"><input type="text" name="firstname">
</td>	
</tr>
<tr>
<td>Last Name:</td>
<td align="center"><input type="text" name="lastname"></td>
</tr>
<tr>
<td>Username:</td>
<td align="center"><input type="text" name="username" id="input-username"></td>

</tr>

<tr>
<td>Password:</td>
<td align="center"><input type="password" name="password"></td>
</tr>
</table>
<table align="center">
<tr>
<td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="captcha_code" name="captcha_code" type="text">
        <br>
        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
        </tr>
        <tr>
<td colspan="3"><input id="submitbutton" type="submit" value="Submit"> </td>
</tr>
</table>


</body>
</html>