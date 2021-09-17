
<?php
 session_start();
 include "menu.php";
 ?>
<style>


table {
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
  padding: 0.5px;
  border-collapse: collapse;
  width: 100%;
  height:60%;
  text-align: center;
  border: none;
}

th, td {
  padding: 1px;
  border-bottom: 1px solid #ddd;
  width: 15%;
  font-family: "Times New Roman", Times, serif;
  font-size: 20px;
}


th{
	background-color: #f5f5f5;
}

.button {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  padding: 16px 32px;
  font-size: 16px;
  border-radius: 8px;
  width: 250px;
  position: absolute;
  margin-left: 550px;
}

.button:hover 
{
 background-color: #4CAF50;
 color: white;
}

tr:hover {background-color:#f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}


</style>
<?php


include ('databaseConn.php');


// Create connection

$query = "SELECT * FROM Hikers";
$result = mysqli_query($conn,$query);
if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
    $del_id = $checkbox[$i]; 
    $sql="DELETE FROM Hikers WHERE ID='".$del_id."'";
    echo $sql;
	mysqli_query($conn,$sql);
    $message = "Data deleted successfully !";
    echo ($message);
}
}
?>
<html>
<form method="post" action="">
<table class=" table-bordered" >
<thead>
<tr>
<br><br>
	<th> ID</th>
	<th> Name</th>
	<th>Email</th>
    <th>View Hiker</th>

	 
</tr>
</thead>
<?php
 
while($row = mysqli_fetch_array($result)) 
{       if ($row["Role"]=="User"){
      if ($_SESSION["ID"]!=$row["ID"]){
    
?>
<tr>
  
	<td><?= $row['ID']; ?></td>
	<td><?= $row['Name']; ?></td>
	<td><?=  $row['Email']; ?></td>
	<?php
	echo "<td> <a  href=\"HikerProfile.php?id=$row[ID]\"> view Hiker</a> </td></tr>";
?>
	
   	 
</tr>
<?php
 
}}}
?>
</table>


<?php
 echo " <a href=\"Register.php?Role=Admin\" >";
 ?>
 <br>
 <br>
 <button type="button" class="button">Add New Admin</button></a>
</form>

</body>
</html>
</html>
