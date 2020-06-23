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
<h3>View Comment Details</h3>
<?php
   $sql="SELECT book.btitle,student.name,comment.comm,comment.logs FROM comment INNER JOIN book ON book.bid=comment.bid INNER JOIN student ON comment.sid=student.id";
   $res=$db->query($sql);
   if($res->num_rows>0)
   {
	   echo "<table>
	   <tr>
	   <th>SNO</th>
	   <th>BOOK</th>
	   <th> NAME</th>
	   <th>COMMENT</th>
	   <th>LOGS</th>
	   </tr>   
	   ";
	   $i=0;
	   while($row=$res->fetch_assoc())
	   {
		   $i++;
		   echo "<tr>";
		   echo "<td>{$i}</td>";
		   echo "<td>{$row["btitle"]}</td>";
		   echo "<td>{$row["name"]}</td>";
		   echo "<td>{$row["comm"]}</td>";
		   echo "<td>{$row["logs"]}</td>";
		   echo "</tr>";
	   }
		   echo "</table>";
   }
   else
   {
	   echo "<p class='error'>No Comment Found</p>";
   }
   



?>

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
