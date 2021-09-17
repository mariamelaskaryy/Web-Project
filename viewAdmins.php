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
  height:15%;
  text-align: left;
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
  padding: 16px 32px;
  width: 250px;
  margin-left: 550px;
}

.button:hover 
{
 background-color: #4CAF50;
 color: white;
}

.button1
{
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  padding: 16px 32px;
  font-size: 16px;
  border-radius: 8px;
  padding: 16px 32px;
  width: 250px;
  margin-left: 550px;
}

.button1:hover 
{
 background-color: #f44336;
 color: white;
}

tr:hover {background-color:#f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>
<?php


include ('databaseConn.php');



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
     header("location:viewAdmins.php");
}
}
?>
<html>
<form method="post" action="">
<table class="table table-bordered">
<thead>
<tr>

	<th> ID</th>
	<th> Name</th>
		<th>Role</th>
	<th>Email</th>
	
	<?php
	  if ($_SESSION["Role"]=="Admin" ||  $_SESSION["Role"]=="SuperiorAdmin"){
	      ?>
	       <th>Delete </th>
	       <?php
	       }
	       else{
	           ?>
	            <th>Select </th>
<?php } ?>
	 
</tr>
</thead>
<?php
 
while($row = mysqli_fetch_array($result)) 
    {   
    if ($_SESSION["Role"]=="Admin" ){   
      if ($row["Role"]=="Admin"){
          if ($_SESSION["ID"]!=$row["ID"]){
    
?>
<tr>
  
	<td><?= $row['ID']; ?></td>
	<td><?= $row['Name']; ?></td>
	<td><?= $row['Role']; ?></td>
	<td><?=  $row['Email']; ?></td>
	
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["ID"]; ?>"></td>
	 
</tr>
<?php
 
}

}
}
else if ( $_SESSION["Role"]=="SuperiorAdmin"){   

      if ($row["Role"]=="Admin" || $row["Role"]=="Auditor" || $row["Role"]=="HRPartner" ){
          if ($_SESSION["ID"]!=$row["ID"]){
      
?>
<tr>

	<td><?= $row['ID']; ?></td>
	<td><?= $row['Name']; ?></td>
	<td><?= $row['Role']; ?></td>
	<td><?=  $row['Email']; ?></td>
	
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["ID"]; ?>"></td>
	 
</tr>
<?php
 
}

}


}

else{
  if ($row["Role"]=="Admin"){
          if ($_SESSION["ID"]!=$row["ID"]){
    
?>
<tr>

	<td><?= $row['ID']; ?></td>
	<td><?= $row['Name']; ?></td>
			<td><?= $row['Role']; ?></td>

	<td><?=  $row['Email']; ?></td>
	<?php
	 if ($_SESSION["Role"]=="Admin" ||  $_SESSION["Role"]=="SuperiorAdmin"){   
	 ?>
     <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["ID"]; ?>"></td>
     <?php
     
	 }
	 else{
	     $adminID=$row["ID"];
	   
	        echo "<td><a href=\"RequestInvest.php?id=$adminID\" >";

	       echo'<button type="button" id="select" name="select" value="select">Select</button></a></td>';

	 }
	 ?>
</tr>
<?php
 
}
}

}
}
?>
<br><br>
</table>
<?php
  if ($_SESSION["Role"]=="Admin" ){


echo'<p><button type="submit" class="button1" name="save">Delete</button></p>';

 echo "<a href=\"Register.php?Role=Admin\" >";

 echo'<button type="button" class="button">Add New Admin</button></a>';

 }
 else if($_SESSION["Role"]=="SuperiorAdmin"){
     ?>
<br><br>
       <select name="RoleOption" class="button">
    <option value="Admin">Admin</option>
    <option  value="HR">HR</option>
    <option value="Auditor">Auditor</option>
 </select><br>
    

   <input type="submit" name="submit" value="Add New" class="button" />

     
<?php
 echo'<p><button type="submit" class="button1" name="save">Delete</button></p>';
    
 }

if(isset($_POST['submit'])){

$selected_val = $_POST['RoleOption'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_val;  // Displaying Selected Value
echo $selected_val;
$_SESSION["NewJobRole"]=$selected_val ; 
 header("location:Register.php?Role=$selected_val");
echo $_SESSION["NewJobRole"];

}
 
 ?>
 
 

</form>

</body>
</html>
</html>
