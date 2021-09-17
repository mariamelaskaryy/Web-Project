<html>

<body>
  
<?php include "menu.php";?>

<link href="Forms.css" rel="stylesheet" type="text/css">
<br>

<form action="" method="post"  class='contact' enctype="multipart/form-data">
<h1>Tell Us Where We Should Go Next! </h1> 

Name:<br>
  <input type="text" name="name"  required=""><br> <br>

Email: <br>
  <input type="text" name="email" required=""><br><br>

Destination: <br>
  <input type="text" name="destination" required=""><br><br>

Photo : 
 <input type="file" id="image" name="image" accept="image/*" hidden>
 <label for="image">  Upload Image  </label>
      
         <span>Image size must be under 1MB</span>
          <br>

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



if(isset($_POST["submit"]))
{
$Name=$_POST['name'];
$Email=$_POST['email'];
$Destination=$_POST['destination'];

$image = $_FILES['image']['name'];
$target = "images/".basename($image);

$file_tmp = $_FILES['image']['tmp_name'];
$file_size= filesize($file_tmp);


   if ( $file_size >1048576){ //image greater than 1MB
   	echo '<script>alert("Error: Cannot upload image. The image exceeds the size limit. ")</script>';
   }
   else {
$sql = "INSERT INTO requests( name, email, destination, image) VALUES ('".$Name."','".$Email."','".$Destination."','$image')";
     
     /*Upload Image from anywhere*/
	if (move_uploaded_file($file_tmp, $target)) {
  		$msg = "Image uploaded successfully";
  	}
  	else{
  		$msg = "Failed to upload image";
  	}

  	
if ($conn->query($sql) === TRUE) {
echo '<script>alert("Thank You For Your Recommendation")</script>'; } 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	}
$conn->close();
}
?>


 </body>

</html>