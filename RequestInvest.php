
<?php
session_start(); ?>
<html>

<body>
  
<?php include "menu.php";?>

<link href="Forms.css" rel="stylesheet" type="text/css">
<br>

<form action="" method="post"  class='contact'>
<h1>Investigation! </h1> 

Name:<br>
  <input type="text" name="name"  required=""><br> <br>

Email: <br>
  <input type="text" name="email" required=""><br><br>

Reason of Investigation: <br>
  <input type="text" name="reason" required=""><br><br>

<input type="submit" name="submit" value="Submit">

</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 $adminID=$_GET['id'];
$auditorID=$_SESSION["ID"];



if(isset($_POST["submit"]))
{

$Name=$_POST['name'];
$Email=$_POST['email'];
$reason=$_POST['reason'];


$sql = "INSERT INTO InvestReq( AuditorID, AdminID, AuditorName, AuditorEmail, Reason) VALUES ('$auditorID','$adminID','$Name','$Email','$reason')";


if ($conn->query($sql) === TRUE) {
echo '<script>alert("Your investigation request has been submitted!")</script>'; } 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
}
?>
 </body>

</html>