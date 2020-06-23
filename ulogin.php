<?php
session_start();
include"database.php";
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
<h3>User Login</h3>
<div id="center">
<?php
if(isset($_POST["sumbit"]))
{
 $sql="select*from student where name='{$_POST["name"]}' and pass='{$_POST["pass"]}'";	
 $res=$db->query($sql);
 if($res->num_rows>0)
 {
	 $row=$res->fetch_assoc();
	 $_SESSION["id"]=$row["id"];
	 $_SESSION["name"]=$row["name"];
	 header("location:uhome.php");
 }
 else
 {
	 echo "<p class='error'>Invalid User Name</p>";
 }
 
}
?>
<form action="ulogin.php" method="post">
<label>Name</label>
<input type="text" name="name" required>
<label>Password</label>
<input type="password" name="pass" required>
<button type="sumbit" name="sumbit">Login</button>
</form>
</div>
</div>
<div id="navigator">
<?php
include"sidebar.php";
?>
</div>
<div id="footer">
<p>Copyright &copy;PRATHIBA G</p>
</div>
</div>
</body>
</html>
