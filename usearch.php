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
<h3>Search Book</h3>
<div id="center">


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<label><b>Enter Book Name Or Keywords : </b></label>
<input type ="text" name="name" required>
<button type="submit" name="submit">Search Now</button>
</form>
</div>
<?php

if(isset($_POST["submit"]))
{
   $sql="select*from book where btitle like'%{$_POST["name"]}' or keywords like'%{$_POST["name"]}' ";
   $res=$db->query($sql);
   if($res->num_rows>0)
   {
	   echo "<table>
	   <tr>
	   <th>SNO</th>
	   <th>BOOK</th>
	   <th>KEYWORDS</th>
	   <th>VIEW</th>
	   <th>COMMENT</th>
	   </tr>   
	   ";
	   $i=0;
	   while($row=$res->fetch_assoc())
	   {
		   $i++;
		   echo "<tr>";
		   echo "<td>{$i}</td>";
		   echo "<td>{$row["btitle"]}</td>";
		   echo "<td>{$row["keywords"]}</td>";
		   echo "<td><a href='{$row["file"]}' target='_blank'>View</a></td>";
		   echo "<td><a href='comment.php?id={$row["bid"]}'>Go</a></td>";
		   echo "</tr>";
	   }
		   echo "</table>";
   }
   else
   {
	   echo "<p class='error'>No Book Record Found</p>";
   }
   

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
