<style>
body{
background-image: url("footprints.jpg");
background-color: #cccccc;
}
    </style>
    
<link href="cart.css" rel="stylesheet"/>

<?php
session_start(); ?>

<?php include "Menu.php";
include ('databaseConn.php');

$id= $_SESSION['ID'];
?>

<h1>My Trips</h1>
<?php
$date = date('m/d/Y h:i:s a', time());

?>
<br>
<div id="shopping-cart">
<div class="txt-heading">Past Trips</div>

    
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Image</th>
<th style="text-align:left;">Name</th>
<th style="text-align:right;" width="5%">Location</th>
<th style="text-align:right;" width="10%">Date</th>
<th style="text-align:right;" width="10%">Time</th>
<th style="text-align:center;" width="5%">Price</th>
<th style="text-align:center;" width="5%">Review</th>

</tr>
<?php

$sql="select S.HikeID, H.Name, H.Location,H.Date,H.Time, H.Price, H.Image
from SelectedTrips S 
inner join Hikes H on S.HikeID = H.ID
where  (S.HikerID =".$id.")";


$sql2="select SUM(Price) AS Price
from SelectedTrips S 
inner join Hikes H on S.HikeID = H.ID
where  (S.HikerID =".$id.")";

 $result=mysqli_query($conn,$sql);
  $result2=mysqli_query($conn,$sql2);
  $date= date('Y-m-d ');

 
 if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
      

 if ($date>$row["Date"])
    {
    echo "<tr><td>".'<img src="images/'.$row['Image'].'"  width="200">'."</td><br>";
       echo "<td>" .$row["Name"]. "</td><td>" . $row["Location"].  "</td><td>" . $row["Date"].  "</td><td> " . $row["Time"].  "</td><td>" . $row["Price"].  "EGP</td>";
        $tripID=$row["HikeID"];




 echo " <td><a href=\"review.php?id=$tripID\" >";
 ?>
 
<img src="rev.png" width="30" height="30" alt="review" /></a></td></tr>
<?php

    echo"<br><br>";

    
    
    }
    }}
    ?>
