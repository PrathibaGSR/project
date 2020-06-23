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
<h3>Admin Login</h3>
<div id="center">
<?php
if(isset($_POST["sumbit"]))
{
 $sql="select*from admin where aname='{$_POST["aname"]}' and apass='{$_POST["apass"]}'";	
 $res=$db->query($sql);
 if($res->num_rows>0)
 {
	 $row=$res->fetch_assoc();
	 $_SESSION["aid"]=$row["aid"];
	 $_SESSION["aname"]=$row["aname"];
	 header("location:ahome.php");
 }
 else
 {
	 echo "<p class='error'>Invalid User Name</p>";
 }
 
}
?>
<form action="alogin.php" method="post">
<label><b>Name  : </b></label>
<input type="text" name="aname" required>
<label><b>Password  : </b></label>
<input type="password" name="apass" required>
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
