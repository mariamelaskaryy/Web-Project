
<html>
<?php
session_start();
 include "menu.php";
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
.ResetButton{
  background-color: red;
  border: none;
  color: white;
  padding: 5px 5px;
  text-align: center;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
}
.SubmitButton{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 5px 5px;
  text-align: center;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
}
.login{
  font-family: arial;
font-size: 14px;
}
</style>
<?php

include ('databaseConn.php');

    
  $error="";

    $password="";
    $_SESSION["ID"]="";

    if(isset($_POST['Submit'])){
        $password = $_POST["Password"];
        $email=$_POST["Email"];
        $sql="Select * from Hikers Where Email='".$_POST["Email"]."' AND Password='".$_POST["Password"]." ' ";
    

        
        $result=mysqli_query($conn,$sql);
    
       
        if($row=mysqli_fetch_array($result)){
             
             
                $_SESSION["ID"]=$row["ID"];
		        $_SESSION["Name"]=$row["Name"];
		        $_SESSION["Email"]=$row["Email"];
	        	$_SESSION["Password"]=$row["Password"];
	        	$_SESSION["Role"]=$row["Role"];

                $_SESSION["loggedin"]===TRUE;
                header("location:homepage.php");
            
        }
            else {
               $error="Please make sure you have the correct Email or Password.";
            }
        
    }
    ?>
    
<br>
<link href="Forms.css" rel="stylesheet"  type="text/css">


<form action="" method="post" class='login'>
<h1>Login:</h1>
  Email:<br>
  <input type="text" name="Email" required  >
   <br>
  Password:<br>
  <input type="password" name="Password" required  ><br><?php echo  $error; ?><br>

  <input class='SubmitButton' type="submit" value="Submit" name="Submit">
<h4> Don't have an account? <a href='Register.php'> Sign Up</a> </h4>
</form>

<style>

body{
  background-color: #85e085;
  background-image: url('5.jpg');
}

</style>
</html>