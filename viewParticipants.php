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
session_start(); ?>

<body>

<?php include "Menu.php";
include ('databaseConn.php');
$id= $_GET['id'];
$sql="select H.ID,H.Name, H.Email
from SelectedTrips S 
inner join Hikers H on S.HikerID = H.ID
where  (S.HikeID =".$id.")";
?>
    <h2>Participants</h2>
    <?php
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
      echo "<table>";
      echo "<tr><td> <b>" .$row["ID"]. "</b><td>" . $row["Name"].  "</td><td>" . $row["Email"].  " " . "</td>";
echo "<td> <a  href=\"delete.php?id=$id&&idHiker=$row[ID]\">Remove Participant </a> </td></tr><br>";
      
   
      }}
?>
</table>
    </body>