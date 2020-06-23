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
<h3>View Student Details</h3>
<?php
   $sql="select*from student";
   $res=$db->query($sql);
   if($res->num_rows>0)
   {
	   echo "<table>
	   <tr>
	   <th>SNO</th>
	   <th>NAME</th>
	   <th>EMAIL</th>
	   <th>DEPARTMENT</th>
	   </tr>   
	   ";
	   $i=0;
	   while($row=$res->fetch_assoc())
	   {
		   $i++;
		   echo "<tr>";
		   echo "<td>{$i}</td>";
		   echo "<td>{$row["name"]}</td>";
		   echo "<td>{$row["mail"]}</td>";
		   echo "<td>{$row["dep"]}</td>";
		   echo "</tr>";
	   }
		   echo "</table>";
   }
   else
   {
	   echo "<p class='error'>No Student Record Found</p>";
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
