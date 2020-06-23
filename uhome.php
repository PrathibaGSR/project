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
<h3>Welcome <?php echo  $_SESSION["name"];?></h3>
<p>Use the Library Search on the home page to find books and media. You can also search the UIC Library catalog.<br>
<b>Find a book in your library  : </b><br>
1. Enter keywords, title, author or ISBN in the Library Search on the home page.<br>
2. Go to “More Books & Media” to see additional results.
</p>
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
