<link href="search.css" rel="stylesheet"/>

<?php
 session_start();
include ('databaseConn.php');
 include "menu.php";
 
// Survey Button 
 echo "<br>";
 echo "<div class='SurveyBtn'>";
if ($_SESSION["Role"]=="Admin"){
echo "<a href='viewSurveys.php'> View Surveys </a>";
}
else {
 	echo "<a href='survey.php'> Take Our Survey </a>";

 }
echo "</div>";
// Review Table
echo"<table>";
$sql= "Select * from Reviews";

$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($result);

echo "<th>Message</th>". "<th>Rating</th>";

 while ($row= mysqli_fetch_assoc($result)){
  echo "<br> ";  	
echo "<tr><td>".$row["Review"]."</td>";
echo "<td>".$row["Rating"]."</td></tr>";
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
.SurveyBtn a{
background-color: white;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  float:right;
  border-radius:5px;
}
</style>