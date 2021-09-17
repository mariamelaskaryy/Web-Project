<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif, sans-serif, sans-serif}
.myLink {display: none}
body {
    background-image: url("jj.jpg");
 background-color: #cccccc;
    
    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
  
}
#w3-content {
    width: 400px;
    margin: 0 auto;
background-color: #f6f6f6;
}
</style>
<?php
session_start(); ?>

<?php include "Menu.php";
include ('databaseConn.php');?>
<div id="w3-content">
<div class="w3-container">
 
<?php

$ID= $_GET['id'];
   
$sql= "Select * from Hikes WHERE ID=$ID";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
      
      echo '<img src="images/'.$row['Image'].'"  width="100%">';
      ?>
<div class="w3-container w3-white">
<h1>Hike Details</h1>

<?php
    echo "<hr>";
      echo "<tr><td>Name: ". $row["Name"]. "</td><br> <td>Location:" . $row["Location"].  "</td><br><td>Date: " . $row["Date"].  " </td><br><td>Time:" . $row["Time"].  " </td><br><td>Price:" . $row["Price"].  "EGP </td><br><td>Maximum Capacity of Hikers: " . $row["MaxCapacity"]. "</td><br></tr>";


      
      
} }
 ?>
  
  
      </div>
  
     </div>

   </div>
</table>
