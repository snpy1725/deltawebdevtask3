<!DOCTYPE html>
<html>
<head>
	<title>Selected Code Snippet</title>
</head>
<body>
<style type="text/css">
	h1{
		text-align: center;
		font-family: cursive;
		font-size: 170%;
		border:1px solid black;

	}
	table{
		font-size:160%;

	}
	
	.showtable{
		text-align: center;
	}

</style>
<h1>Here is the selected code segment</h1>
<br>
<table align="center" border="2" style= " color: black; margin: 0 auto;">
<thead>
	<th>Title</th>
	<th>Code</th>
	<th>Coding Language</th>
</thead>
<tbody>
<?php
parse_str($_SERVER["QUERY_STRING"]);
$titlegot=urldecode($title);
$con=mysqli_connect("localhost","root","","codebin");
if(!$con)
{
	echo "Error in connecting to the database";
}
$query="SELECT * FROM codesnippets WHERE Title='$titlegot'";
$result=mysqli_query($con,$query);
if($result)
{
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>
	      <td class='showtable'>{$row['Title']}</td>
	      <td id='codeview'>{$row['Code']}</td>
	      <td class='showtable'>{$row['CodingLanguage']}</td>";
}
?>
</tbody>
</table>
<?php
}
else
{
	echo "Error in finding the code in the database";
}

?>
</body>
</html>