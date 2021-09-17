<?php
session_start(); ?>
<style>

table{
border: 1px solid #ccc;
 border-radius: 10px;
 width:80%;
 border-collapse: collapse;
 margin:auto;
 }
table td { 
	border: 1px solid #ccc;
    padding-bottom: 10px;
	padding-top: 10px;
	text-align: center;
	background-color: #f3f9f6;
}
a{
	color:green;
	 text-decoration: none;
}
</style>
<?php

include ('databaseConn.php');
include ('Menu.php');
$nameError="";
$emailError="";
$emailError2="";
$passwordError="";
$conPasswordError="";    
$matchPasswordError="";

echo"<table>";
//echo"<tr><td>Name</td><td>Location</td><td>Date</td><td>Time</td><td>Price</td><td>Capacity</td><td>Preview</td></tr>";
    
$sql= "Select * FROM Hikes ";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){
    
    while($row=mysqli_fetch_assoc($result)){
	
    	echo "<tr><td>".'<img src="images/'.$row['Image'].'"  width="200">'."</td><br>";
       echo "<td> <b>" .$row["Name"]. "</b><br> Location:" . $row["Location"].  "<br> Date:" . $row["Date"].  " " . $row["Time"].  "<br> Price:" . $row["Price"].  "<br> Capacity:" . $row["MaxCapacity"]. "</td>";

   echo "<td> <a  href=\"selectTrip.php?id=$row[ID]\"> Select Trip</a> </td></tr>";

        
    }
}

echo"</table>";

?>

