  <head>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
<?php
 session_start();
include ('databaseConn.php');

$nameError="";
$emailError="";
$emailError2="";
$passwordError="";
$conPasswordError="";    
$matchPasswordError="";

$condition=false;
$role="User";
$id= $_GET['id'];

$sql= "Select * from Hikers WHERE ID=$id";

$result=mysqli_query($conn,$sql);


while ($row= mysqli_fetch_assoc($result)){

$profilePic=$row["ProfilePicture"];
$name=$row["Name"];
$email=$row["Email"];
$password=$row["Password"]; 
$conPassword=$row["ConfirmPassword"]; 
$bio=$row["Bio"]; 


}


if(isset($_POST['Update'])){ //check if form was submitted
    


  if(!$condition){
     if(($_POST['Password']) != ($_POST['PasswordConfirm'])){
        
        $matchPasswordError="Passwords don't match.";
        $condition=true;   
    }
        
         if( !(empty($row[2]))  )
	{
             $emailError2="Email was used before";
             $condition=true;  

      
    }
    }

  
	if($condition==false)
	{
	    
		$image = $_FILES['image']['name'];
    $target = "images/".basename($image);

    $file_tmp = $_FILES['image']['tmp_name'];
    $file_size= filesize($file_tmp);
    

		$id=$_POST["ID"];
		$name=$_POST["Name"];
		$bio=$_POST["Bio"];
		$email=$_POST["Email"];
		$password=$_POST["Password"]; 
		$conPassword=$_POST["PasswordConfirm"]; 

		if($image==NULL){
		    $image=$profilePic;
		    
		}
 
     if ( $file_size >1048576){ //image greater than 1MB
    echo '<script>alert("Error: Cannot upload image. The image exceeds the size limit. ")</script>';
   }
   else {
		$sql= "Update Hikers SET Name='$name',  Email='$email', Password='$password',ConfirmPassword='$conPassword', Bio='$bio',ProfilePicture='$image' WHERE ID=$id";   

        $result=mysqli_query($conn,$sql);

        
        	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
  	else{
  		$msg = "Failed to upload image";
  	}	
	}
}
}

?>

<html>
<?php include "menu.php";?>

<br>
<link href="profile.css" rel="stylesheet" type="text/css">

<!-- action="profile.php?id=<?php //echo $_SESSION['ID'] ?>" -->

<form action="" method="post" enctype="multipart/form-data"  class='UpdateProfile'>

<h1> Profile Update </h1>

<div id="wrapper">
<?php 
if($profilePic!=NULL){

 echo '<img src="images/'.$profilePic.' "  width="50" id="profileDisplay">';
}

else{
echo'<img src="pp.png" onClick="triggerClick()" id="profileDisplay">';
}
?>
   <!-- <img id="output_image"/><br> -->
<br>
 <input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)" hidden>
 <label for="image">  Upload Image  </label>
 
</div>
<br><br>
<br>
  Name:<br>
  <input type="text" name="Name" id='Name' value="<?php echo $name;?>" required><br> <br>
 
     About Me:<br>

 <?php 
    if($bio==NULL){
echo" <input type='text' name='Bio' placeholder='A few words about you ...'  class='textarea' >";

}

else {


echo" <input type='text' name='Bio' value='".$bio."' class='textarea' >";
}
?>


Email:<br>
  <input type="email" name="Email" value="<?php echo $email;?>" required> <br> <br>
   <?php echo $emailError2; ?>
  


Password:<br>
  <input type="text" id="password" name="Password" value="<?php echo $password;?>"><br><br>

Confirm Password:<br>
  <input type="text" id="PasswordConfirm" name="PasswordConfirm" value="<?php echo $conPassword;?>"><br><br>

   
   <input type="hidden" name="ID" value="<?php echo $_GET['id'];?>"><br>

   <input type="submit" value="Update" name="Update"  class='SubmitButton'> 


    <?php /*BACK BUTTON*/
 echo " <a href=\"profile.php?id=$_SESSION[ID]\" >";
 ?>
 <button type="button" class="UpdateProfileButton">Back to Profile </button></a>
 <br>


</form>



<script type='text/javascript'>
  function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('profileDisplay');  
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>


</html>