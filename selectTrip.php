<?php
 include "Menu.php";
session_start(); ?>

<html>
<head>
<?php
include ('databaseConn.php');?>

</head>


<?php

$nameError="";
$locationError="";
$dateError="";
$timeError="";
$priceError="";
$maxCapacityError="";    
$nameError2="";

 $msg = "";
 $count=0;



$id= $_GET['id'];


if($_SESSION["ID"]==NULL){ //login page
header("location:Login.php");
}

else {
$HikerID=$_SESSION["ID"];
header("location:selectedTrips.php");


$result=mysqli_query($conn,"SELECT * FROM Hikes WHERE ID=$id");

while ($row= mysqli_fetch_assoc($result)){

$name=$row["Name"];
$location=$row["Location"];
$date=$row["Date"];
$timee=$row["Time"]; 
$price=$row["Price"]; 
$maxCap=$row["MaxCapacity"]; 
$image=$row["Image"]; 


}


$result=mysqli_query($conn,"SELECT * FROM SelectedTrips WHERE HikerID=$HikerID AND HikeID = $id");
$row1= mysqli_fetch_array($result);


$result2 = $conn->query("SELECT COUNT(*)  FROM SelectedTrips WHERE HikeID = $id;");

$row = $result2->fetch_row();

$currentPart=$row[0];

$result2->close();

if ($row1!=NULL){ //alert
	echo '<script>alert("You booked this trip before, check your upcoming trips section")</script>';
	header("location:selectedTrips.php");
}

else if ($currentPart==$maxCap){

echo '<script>alert("Sorry this trip is fully booked :(")</script>';
}

else if(($row1==NULL) && ($currentPart<$maxCap) ){
$sql="INSERT SelectedTrips (HikerID,HikeID) 
VALUES ('".$HikerID."','".$id."') ";  
    
$result=mysqli_query($conn,$sql);

 //   header("location:selectedTrips.php");


}

}

?>
