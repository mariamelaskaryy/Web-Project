<html>
<body>

<?php 
session_start(); 
include "menu.php";

?>

<link href="Forms.css" rel="stylesheet" type="text/css">

<br>
<form action="" method="post"  class='contact'>
<h1>Contact Us: </h1> 

 Subject:<br>
  <input type="text" name="subject" required=""><br> <br>
 Message:<br>
<input  style="height:150px;" type="text"  name="message" class="textarea" required=""> </textarea>
  
   <input type="submit" value="Submit" name="Submit">

  

</form>

<?php

include ('databaseConn.php');

if(isset($_POST['Submit']))
    {
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$subject=$_POST['subject'];
$message=$_POST['message'];
$ID= $_SESSION["ID"];

$sql = "INSERT INTO ContactUs(fromHikerID, Subject, Message) VALUES ('$ID','$subject','$message')";
$result=mysqli_query($conn,$sql);
echo '<script>alert("Thank You For Contacting Us")</script>';

}
?>
</body>
</html>