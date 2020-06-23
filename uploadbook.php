<?php
 session_start();
 include"database.php";
 
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
<h3>Upload Books</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$target_dir="upload/";
	$target_file=$target_dir.basename($_FILES["efile"]["name"]);
	if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
	{
		$sql="insert into book(btitle,keywords,file) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
		$db->query($sql);
		echo "<p class='success'>Book Upload success</p> ";
		
	}
	else
	{
		echo "<p class='error'>Error In Upload</p> ";
	}
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" >
<label><b>Book Title  : </b></label>
<input type="text" name="bname" required>
<label><b>Keyword : <b>  </label>
<textarea name="keys" required></textarea>
<label><b>Upload File  </b></label>
<input type="file" name="efile" required>
<button type="submit" name="submit">Upload book</button>
</form>
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
