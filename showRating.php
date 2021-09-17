<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#row").slideDown("slow");
  });
});
</script>
<style> 
#row, #flip {

  text-align: center;

  
}

#row {
 
  display: none;
}
</style>
</head>

<?php
 session_start();
include ('databaseConn.php');
 include "menu.php";
 
 $sql= "Select R.Review,R.Rating,H.Name,H.Image
  from Reviews R
  inner join Hikes H on R.HikeID=H.ID";


$result=mysqli_query($conn,$sql);



 
 $sqlAvg="SELECT AVG(Rating) As Average
FROM Reviews";
$resultAvg=mysqli_query($conn,$sqlAvg);
$rowAvg= mysqli_fetch_assoc($resultAvg);

 
 $sqlCount="SELECT Count(Rating) As Count
FROM Reviews";
$resultCount=mysqli_query($conn,$sqlCount);
$rowCount= mysqli_fetch_assoc($resultCount);





 $sqlRev1= "SELECT Count(Rating) As Count4One
FROM Reviews 
WHERE Rating='1'";
$result4One=mysqli_query($conn,$sqlRev1);
$row4One= mysqli_fetch_assoc($result4One);


 $sqlRev2= "SELECT Count(Rating) As Count4Two
FROM Reviews 
WHERE Rating='2'";
$result4Two=mysqli_query($conn,$sqlRev2);
$row4Two= mysqli_fetch_assoc($result4Two);
 
 $sqlRev3= "SELECT Count(Rating) As Count4Three
FROM Reviews 
WHERE Rating='3'";
$result4Three=mysqli_query($conn,$sqlRev3);
$row4Three= mysqli_fetch_assoc($result4Three);

$sqlRev4= "SELECT Count(Rating) As Count4Four
FROM Reviews 
WHERE Rating='4'";
$result4Four=mysqli_query($conn,$sqlRev4);
$row4Four= mysqli_fetch_assoc($result4Four);

$sqlRev5= "SELECT Count(Rating) As Count4Five
FROM Reviews 
WHERE Rating='5'";
$result4Five=mysqli_query($conn,$sqlRev5);
$row4Five= mysqli_fetch_assoc($result4Five);

 $five=($row4Five["Count4Five"]/$rowCount["Count"])*100;
 $four=($row4Four["Count4Four"]/$rowCount["Count"])*100;
 $three=($row4Three["Count4Three"]/$rowCount["Count"])*100;
 $two=($row4Two["Count4Two"]/$rowCount["Count"])*100;
 $one=($row4One["Count4One"]/$rowCount["Count"])*100;





?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  /*margin: 0 auto;  Center website */
  /*max-width: 800px;  Max width */
  
}


#profileDisplay
{
 display: block; height: 80px; width: 80; margin: 10px auto; border-radius: 50%;
 float:left;

}

#row
{
}

.container{
    border: 2px solid #dedede;
     margin: 0 auto;
  max-width: 600px;
  
  padding: 15 15px;
  background-color:#f1f1f1;
  font-family: Arial, Helvetica, sans-serif;
  border-radius: 25px;
}


.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #a9a9a9;
  text-align: center;
  color: white;
}

/* Individual bars */

.bar-5 {width: <?=$five?>%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: <?=$four?>%; height: 18px; background-color: #2196F3;}
.bar-3 {width:<?=$three?>%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: <?=$two?>%; height: 18px; background-color: #ff9800;}
.bar-1 {width: <?=$one?>%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
</head>
<body>


<?php
$average=$rowAvg["Average"];

?>
<br>
<div class="container" id="flip">

<span class="heading">Hikers' Average Rating</span>
<?php
if ($rowAvg["Average"]<1){
?>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($rowAvg["Average"]<2){
?>
<span class="heading">User Rating</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($rowAvg["Average"]<3){
?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($rowAvg["Average"]<4){
?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($rowAvg["Average"]<5){
 	?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<?php
} 
  else if ($rowAvg["Average"]==5){
 	?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<?php
}
 ?>
<p>
<?php echo $rowAvg["Average"];?> 
average based on 
<?php echo $rowCount["Count"];?> reviews.</p>

<hr style="border:3px solid #f1f1f1">



<div class="row"  id="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>
    <?php echo $row4Five["Count4Five"];?>
    </div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div>
      <?php echo $row4Four["Count4Four"];?>
</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div>
      <?php echo $row4Three["Count4Three"];?>
</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div>
      <?php echo $row4Two["Count4Two"];?>

    </div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div>
      <?php echo $row4One["Count4One"];?>
</div>
  </div>
</div>


</div>

<?php


if(mysqli_num_rows($result)>0){
 while ($row= mysqli_fetch_assoc($result)){
  echo "<br><div class='container'><br> ";  	
  $image=$row["Image"];

 if ($image==NULL){
        echo '<img src="images/pp.png "  id="profileDisplay" width="50" >&nbsp';         
          }
            else{
                  echo '<img src="images/'.$image.' "   id="profileDisplay"  width="50">&nbsp';
            }
            
                echo "&nbsp<br>&nbsp&nbsp<b>";
             echo $row["Name"];
            echo "</b><br>&nbsp";
 if ($row["Rating"]==1){
?>

<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($row["Rating"]==2){
?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($row["Rating"]==3){
?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php
}
else if ($row["Rating"]==4){
 	?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<?php
} 
  else if ($row["Rating"]==5){
 	?>


<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<?php
}
    

 

 echo "<br> &nbsp";
 echo $row["Review"];
 echo "<br><br></div>";
}
}

?>



</body>
</html>
