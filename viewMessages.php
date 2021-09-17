
<style>
#profileDisplay
{
 display: block; height: 50px; width: 50; margin: 0px auto; border-radius: 50%;
 float:left;
}

.container{
    border: 2px solid #dedede;
     margin: 0 auto;
  max-width: 600px;
  
   padding: 20 20px;
  background-color:#c9f5f1;
  font-family: Arial, Helvetica, sans-serif;
  border-radius: 25px;
}

.container2{
 padding: 10px;
   
    height: 70px;
    border: 1px solid #dedede;
  background-color: #ffffff;
  border-radius: 5px;
  
}



</style>
<?php
session_start();
include "menu.php";


include ('databaseConn.php');
echo '<br>';




$sql= "Select * from Hikers";
$result=mysqli_query($conn,$sql);

echo '<div class="container">';

echo "<br>";
if(mysqli_num_rows($result)>0){


  while($row=mysqli_fetch_assoc($result)){
    
        
     if ($_SESSION["Role"]=="Admin" || $_SESSION["Role"]=="SuperiorAdmin"){

      if ($_SESSION["ID"]!=$row["ID"] && $row["Role"]=="User"){
          
            $profilePic=$row["ProfilePicture"];
       if ($profilePic==NULL){
                 echo '<img src="images/pp.png "  id="profileDisplay" width="50" >';
            }
            else{
                  echo '<img src="images/'.$profilePic.' "   id="profileDisplay"  width="50">';
            }


              echo"<div>";
          
              echo '<br><div class="name"> &nbsp'. $row["Name"].'</div>';
           
               echo"<a  href=\"Messages.php?id=$row[ID]\">start a converstation</a> ";
               echo"</div>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
          
      }
      }
      
      else if($_SESSION["Role"]=="User"){
      if ($_SESSION["ID"]!=$row["ID"] && $row["Role"]=="User"){
          
            $profilePic=$row["ProfilePicture"];
       if ($profilePic==NULL){
                 echo '<img src="images/pp.png "  id="profileDisplay" width="50" >';
            }
            else{
                  echo '<img src="images/'.$profilePic.' "   id="profileDisplay"  width="50">';
            }

              echo'<div>';
           echo '<br><div class="name">&nbsp'. $row["Name"].'</div>';
           
          echo"<a  href=\"Messages.php?id=$row[ID]\">start a converstation</a> ";

               echo"</div>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
          
      }
      echo "<br>";
      }
      
      else if ($_SESSION["Role"]=="Auditor" || $_SESSION["Role"]=="HRPartner" ){

      if ($_SESSION["ID"]!=$row["ID"] && $row["Role"] !="Admin" && $row["Role"] !="HRPartner" && $row["Role"] !="Auditor" ){
          
            $profilePic=$row["ProfilePicture"];
       if ($profilePic==NULL){
                 echo '<img src="images/pp.png "  id="profileDisplay" width="50" >';
            }
            else{
                  echo '<img src="images/'.$profilePic.' "   id="profileDisplay"  width="50">';
            }


              echo"<div>";
            echo '<br><div class="name">&nbsp'. $row["Name"].'</div>';
           
          echo"<a  href=\"Messages.php?id=$row[ID]\">view messages</a> ";
               echo"</div>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
          
      }
      }


      
} }
echo"</div>";
?>
<link href="chat.css" rel="stylesheet">

