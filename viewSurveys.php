<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>

    .center {
 
  padding: 90px 0;
   align-self: center;
  text-align: center;
        border-radius: 5px;
         background-color: #ffffff;
         padding: 20px;
         width:50%;
         font-family: 'Montserrat', sans-serif;
         display: block;
        margin-left: auto;
        margin-right: auto;
}

body {
    background-image: url("pp.jpg");
 background-color: #cccccc;
}
</style>
<?php
session_start(); ?>


<?php include "Menu.php";
include ('databaseConn.php');
$ID= $_SESSION["ID"];

echo "<br>";

$sql="select S.Question1,S.Question2 , S.Question3, S.Question4,S.HikerID, H.Name
from Survey S 
inner join Hikers H on S.HikerID = H.ID";
$result=mysqli_query($conn,$sql);


?>
<div class="center">
<div class="w3-container">
<div class="w3-container w3-white">
<?php

if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
    
        echo "<hr>";
        echo "<tr><td><b> Hiker ID </b>- " .$row["HikerID"]."<br></b><td><td><b> Hiker Name </b>- " .$row["Name"]."<br></b><td><i> How often do you book your travels with us?</i><br> " .$row["Question1"]. "<br><i>How did you hear about us?</i><br> " . $row["Question2"].  "<br><i>How satisfied are you with our service?</i><br> " . $row["Question3"].  "<br><i>How can we improve?</i><br> " . $row["Question4"].  "<br> " . "</td></br>";

   
}}
 
?>
    </div>
    </div>
</div>
