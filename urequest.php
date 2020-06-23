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
<h3>New Book Request</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$sql="insert into request (id,mes,logs) value('{$_SESSION["id"]}','{$_POST["mes"]}',now())";
	$db->query($sql);
    echo "<p class='success'>Request Send Admin</p>";
	}
	

?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<label><b>Message  : </b></label>
<textarea name="mes" required></textarea>
<button type="submit" name="submit">Message Send</button>
</form>
</div>
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
