<?php
 session_start();
 include"database.php";
 
 if(!isset($_SESSION["id"]))
	 {
		header("location:ulogin.php");
	 }
	
	 ?>


<!DOCTYPE HTML>
<html>
<head>
<title>E-Library</title>
<link rel="stylesheet" type="text/css" href="css/style">
</head>
<body>
<div id="container">
<div id="header">
<h1 id="heading">E-Library Management System</h1>
</div>
<div id="wrapper">
<h3>Send Your Comments</h3>
<?php
if(isset($_POST["submit"]))
{
	$sql="insert into comment(bid,sid,comm,logs) values({$_GET["id"]},{$_SESSION["id"]},'{$_POST["mes"]}',now())";
	$db->query($sql);
}
$sql="select*from book where bid=".$_GET["id"];
$res=$db->query($sql);
if($res->num_rows>0)
{
	echo"<table>";
	$row=$res->fetch_assoc();
	echo "
	<tr>
	<th>Book Name</th>
	<td>{$row["btitle"]}</td>
	</tr>
	<tr>
	<th>Keywords</th>
	<td>{$row["keywords"]}</td>
	</tr>
	";
	echo"</table>";
}

else
{
	echo "<p class='error'>No Book Found</p>";
}




?>
<div id="center">
<form action="<?php echo $_SERVER["REQUEST_URI"];?>"method="post">
<label>Your Comments</label>
<textarea name="mes" required></textarea>
<button type="submit" name="submit">Post Now</button>
</form>
</div>
<?php 
$sql="SELECT student.name, comment.comm, comment.logs FROM comment INNER JOIN student ON comment.sid=student.id WHERE comment.bid={$_GET["id"]} ORDER BY comment.cid DESC";
$res=$db->query($sql);
if($res->num_rows>0)
{
	while($row=$res->fetch_assoc())
	{
		echo"<P>
		<strong>{$row["name"]}  :  </strong>
		{$row["comm"]}
		<i>{$row["logs"]}</i>
		</p>";
	}
}
	else
	{
		echo "<p class='error'>No Comment Yet</p>";
	}



?>


</div>
<div id="navigator">
<?php
include"user.php";
?>
</div>
<div id="footer">
<p>Copyright &copy;PRATHIBA G</p>
</div>
</div>
</body>
</html>
