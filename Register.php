<?php
include ('databaseConn.php');

$nameError="";
$emailError="";
$emailError2="";
$passwordError="";
$conPasswordError="";    
$matchPasswordError="";

$condition=false;
$role="User";



if(isset($_POST['Submit'])){ //check if form was submitted
    
$sql= "Select * from Hikers Where Email=' ".$_POST["Email"]." ' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

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
		$sql= "INSERT Hikers (Name, Email, Password, ConfirmPassword,Role) 
		VALUES (' ".$_POST["Name"]." ',' ".$_POST["Email"]." ',' ".$_POST["Password"]." ',' ".$_POST["PasswordConfirm"]." ','".$role."') ";
        $result=mysqli_query($conn,$sql);
	}


}


?>

<html>
<?php include "menu.php";?>


<link href="Forms.css" rel="stylesheet"  type="text/css">

<br>
<form action="" method="post"  class='Register'>
<h1>Register:</h1>
  Name:<br>
  <input type="text" name="Name" id='Name' required><br> <br>
  Email:<br>
  <input type="email" name="Email" required> <br> <br>
   <?php echo $emailError2; ?><br>
  Password:<br>
  <input type="password" id="password" name="Password" required><br><br>
  Confirm Password:<br>
  <input type="password" id="confirmPassword"  name="PasswordConfirm" required><br><br>
   <?php echo $matchPasswordError; ?><br>
  Date of Birth: <br>
  <input type="date" id="birthday" name="birthday"><br><br>
  <input type="submit" value="Submit" name="Submit" class='SubmitButton' >
  

</form>




</html>