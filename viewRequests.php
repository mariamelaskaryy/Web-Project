<?php
 session_start();
include ('databaseConn.php');
 include "menu.php";

echo"<table>";
$sql= "Select * from Requests";

$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($result);

echo "<th>Name</th>". "<th>Destination</th>"."<th>Image</th>";

 while ($row= mysqli_fetch_assoc($result)){
  echo "<br> ";  	
echo "<tr><td>".$row["Name"]."</td>";
echo "<td>".$row["Destination"]."</td>";
echo "<td>".'<img src="images/'.$row['Image'].'"  height ="100" width="150">'."</td></tr>";
}
echo"</table>";
?>
<style>
	body{
		background-color: #e7dfea;
	}
	table{
border: 1px solid #ccc;
 border-radius: 10px;
 width:60%;
 border-collapse: collapse;
 margin:auto;
font-family: Arial, Helvetica, sans-serif; 
 }
 table td, table th { 
	border: 1px solid #ccc;
    padding-bottom: 15px;
	padding-top: 15px;
	text-align: center;
	background-color: #f7fffc;
}
</style>