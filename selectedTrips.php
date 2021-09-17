<style>
body{
background-image: url("footprints.JPG");
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

<br>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="PastTrips.php">Past Trips</a>

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Image</th>
<th style="text-align:left;">Name</th>
<th style="text-align:right;" width="5%">Location</th>
<th style="text-align:right;" width="10%">Date</th>
<th style="text-align:right;" width="10%">Time</th>
<th style="text-align:center;" width="5%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php
  $date= date('Y-m-d ');
    
$sql="select S.ID, H.Name, H.Location,H.Date,H.Time, H.Price, H.Image
from SelectedTrips S
inner join Hikes H on S.HikeID = H.ID
where  (S.HikerID =".$id.")";


$sql2="select SUM(Price) AS TotalPrice
from SelectedTrips S 
inner join Hikes H on S.HikeID = H.ID
where  (S.HikerID =' ".$id." ' AND Date>' ".$date." ')";

 $result=mysqli_query($conn,$sql);
  $result2=mysqli_query($conn,$sql2);

//echo $date;
  $totalPrice = 0;
    
    
    if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
      $idTrip=$row['ID'];
      if ($date<$row["Date"]){
          
 echo "<tr><td>".'<img src="images/'.$row['Image'].'"  width="200">'."</td><br>";
         echo "<td>" .$row["Name"]. "</td><td>" . $row["Location"].  "</td><td>" . $row["Date"].  "</td><td> " . $row["Time"].  "</td><td>" . $row["Price"].  "EGP</td>";
       echo "<td> <a  href=\"remove.php?id=$idTrip\">Remove</a> </td></tr><br>";
      
    }
}}
?>

<?php
if(mysqli_num_rows($result2)>0){
       while($row=mysqli_fetch_assoc($result2)){
     if ($row["TotalPrice"]==""){
         echo "no upcoming trips";
 ?>
 

  <?php   }
     else
      $totalPrice=$row["TotalPrice"];
 }
 }

?>
<tr>
<td colspan="2" align="right">Total:</td>

<td align="right" colspan="2"><strong><?php echo number_format($totalPrice, 2)." "."EGP"; ?></strong></td>
<td></td>
</tr>
</tbody>
</table>

         
              </div>

</table>

