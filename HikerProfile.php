<head>
<style>
.button {
  font: bold 11px Arial;
  text-decoration: none;
  background-color: #EEEEEE;
  color: #333333;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}

</style>

</head>
<?php
 session_start();
include ('databaseConn.php');

$condition=false;
$role="User";
$id= $_GET['id'];

$sql= "Select * from Hikers WHERE ID=$id";
$result=mysqli_query($conn,$sql);


while ($row= mysqli_fetch_assoc($result)){

$profilePic=$row["ProfilePicture"];
$name=$row["Name"];
$bdate=$row["Birthdate"];
$email=$row["Email"];
$password=$row["Password"]; 
$conPassword=$row["ConfirmPassword"]; 
$bio=$row["Bio"]; 
}

if(isset($_POST['Submit'])){ //check if form was submitted
    
}


?>

<html>
<?php include "menu.php";?>

<link href="profile.css" rel="stylesheet" type="text/css">
<br>
<form action="" method="post"  class='profile'>
<?php
echo "<h1>".$name."</h1>"; 
if ($profilePic==NULL){
 echo '<img src="images/pp.png "  width="50" id="profileDisplay">';
}
else{
    echo '<img src="images/'.$profilePic.' "  width="50" id="profileDisplay">';
}

?>
 
<br>

  Name:<br>
  <input type="text" name="Name" id='Name' placeholder="<?php echo $name;?>" readonly><br> <br>
  
  
   Date of Birth: <br>
  <input type="text" id="birthday" name="birthday" placeholder="<?php echo $bdate;?>" readonly><br><br>


  
 Bio:<br>
    <?php 
    if($bio==NULL){
echo" <input type='text' name='Bio' placeholder='A few words about you ...'  class='textarea' readonly><br> <br>";

}

else {


echo" <input type='text' name='Bio' placeholder='".$bio."' class='textarea' readonly><br> <br>";

}

?>


  Email:<br>
  <input type="email" name="Email" placeholder="<?php echo $email;?>" readonly> <br> <br>
 
     
   <input type="hidden" name="ID" value="<?php echo $_GET['id'];?>"><br>





</form>

</html>