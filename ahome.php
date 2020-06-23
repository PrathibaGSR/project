 <?php
 session_start();
 include"database.php";
 function countRecord($sql,$db) 
 {
	 $res=$db->query($sql);
	 return $res->num_rows;
 }
 if(!isset($_SESSION["aid"]))
	 {
		header("location:alogin.php");
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
<h3>Welcome Admin</h3>
<div id="center">
<ul class="record">
<li>Total Student : <?php echo countRecord("select*from student",$db); ?></li>
<li>Total Books   : <?php echo countRecord("select*from book",$db); ?></li>
<li>Total Request : <?php echo countRecord("select*from request",$db); ?></li>
<li>Total Comment : <?php echo countRecord("select*from comment",$db); ?></li>
</ul>
</div>
</div>
<div id="navigator">
<?php
include"admin.php";
?>
</div>
<div id="footer">
<p>Copyright &copy;PRATHIBA G</p>
</div>
</div>
</body>
</html>
