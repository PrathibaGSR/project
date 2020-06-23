<?php
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
<h3>New User Registration</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$sql="insert into student(name,pass,mail,dep) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
	$db->query($sql);
	echo "<p class='success'>User Registration Success</p>";
}
?>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label><b>Name  :  </b></label>
<input type="text" name="name" required>
<label><b>Password  : </b></label>
<input type="password" name="pass" required>
<label><b>E-Mail ID  : </b></label>
<input type="email" name="mail" required>
<select name="dep" required>
<option value="">Select</option>
<option value="be">BE/BTECH</option>
<option value="bca">BCA</option>
<option value="bsc">B.SC</option>
<option value="mca">MCA</option>
<option value="msc">M.SC</option>
<option value="others">Others</option>
</select>
<button type="submit" name="submit">Register Now</button>
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
