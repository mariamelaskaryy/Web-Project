<style>
#btnEmpty {
	background-color: #ffffff;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
}

</style>
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

$sql= "select M.ID , S.ID, M.AuditorName, S.Name, M.Reason
from InvestReq M 
inner join Hikers S on M.AdminID = S.id";



$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
      ?>
     
<div class="w3-container w3-white">
<h1>Ivestegation Request</h1>
<a id="btnEmpty" href="viewPenalties.php">Penalties</a>
<?php
    echo "<hr>";
      echo "<tr><td>Name: ". $row["Name"]. "</td><br> <td>Reason:" . $row["Reason"].  "</td><br><br></tr>";

$idAdmin=$row["ID"];

//echo $idAdmin;

    if(isset($_POST['Submit'])){
        
        $idAdmin=$row["ID"];
         $name=$row["Name"];
         $reason=$row["Reason"];
         
         $sql2= "INSERT INTO Penalty (AdminID) 
		VALUES ('$idAdmin') ";
        $result2=mysqli_query($conn,$sql2);

        
        
    }



?>

<form action="" method="post"  class='profile'>
 
<input type="hidden" name="ID" value="<?php echo $idAdmin;?>">

  <input class='SubmitButton' type="submit" value="Penalty" name="Submit">
  
  </form>

    <?php
      
} }


?>

      </div>
    <div class="w3-half w3-margin-white">



    


     </div>
</div>
   </div>
</table>
