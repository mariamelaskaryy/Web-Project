<?php
session_start(); ?>
<html>
<body>
<?php
include ('databaseConn.php');
include "Menu.php";
$nameError="";
$locationError="";
$dateError="";
$timeError="";
$priceError="";
$maxCapacityError="";    
$nameError2="";

 $msg = "";



if(isset($_POST['Submit'])){ //check if form was submitted

  $sql= "Select * from Hikes Where Name=' ".$_POST["Name"]." ' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);


	
    if(empty($_POST['Location']))
	{
		$locationError="Location is required";
	}
    
   
   
    if(empty($_POST['Date']))
	{
		$dateError="Date is required";
	}
    
     if(empty($_POST['Time']))
	{
		$timeError=" Time is required ";
	}
    
 
    
     if(empty($_POST['Price']))
	{
		$priceError="Price is required";
	}
    
    
     if(empty($_POST['MaxCapacity']))
	{
		$maxCapacityError="MaxCapacity is required";
	}
    
    
      if(empty($_POST['Name']))
	{
		$nameError="Name is required";
	}
    
        
    else if( !(empty($row[2]))  )
	{
		
             $nameError2="There is an existing Hike with a smilar name";
   
	}
    
	else
	{
		
	  $image = $_FILES['image']['name'];
      $target = "images/".basename($image);
    
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_size= filesize($file_tmp);

   if ( $file_size >1048576){ //image greater than 1MB
    echo '<script>alert("Error: Cannot upload data. The image exceeds the size limit. ")</script>';
   }
   else {
		$sql= "INSERT INTO Hikes (Name, Location, Date, Time, Price, MaxCapacity,Image) 
		VALUES (' ".$_POST["Name"]." ',' ".$_POST["Location"]." ',' ".$_POST["Date"]." ',' ".$_POST["Time"]." ',' ".$_POST["Price"]." ',' ".$_POST["MaxCapacity"]." ' ,'$image')";
        $result=mysqli_query($conn,$sql);
     
        	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  		header("Location:viewHikes.php");
  	}
  	else{
  		$msg = "Failed to upload image";
  	}

		}
	}
}
?>

<link href="Forms.css" rel="stylesheet"  type="text/css">
<link href="StyleSheet.css" rel="stylesheet" type="text/css">

<br>

<form action="Admin-uploadtrips.php" method="post"   enctype="multipart/form-data" class='uploadtrips' >
<h1> Upload Form</h1> <br>
  Name:<br>
  <input type="text" name="Name" required><br>
   <?php echo $nameError; ?>
     <?php echo $nameError2; ?><br>
 
    
  Location:<br>
  <input type="text" name="Location" required><br>
    <?php echo $locationError; ?><br>
     
    
    
  Date:<br>
  <input type="date" name="Date" required><br>
    <?php echo $dateError; ?><br>
    
  Time:<br>
  <input type="time" name="Time" ><br>
     <?php echo $timeError; ?><br>
    
  
  Price:<br>
     <input type="text" name="Price" required><br><span>Price must be in EGP</span>
     <?php echo $priceError; ?><br>
    


  MaxCapacity:<br>
    <input type="text" name="MaxCapacity"><br>
     <?php echo $maxCapacityError; ?><br>
    
     <br> Image:

 <input type="file" id="image" name="image" accept="image/*" hidden>
 
 <label for="image">  Upload Image  </label>
         <br> 
    <span>Image size must be under 1MB</span>
  <input type="submit" value="Submit" name="Submit">

    
    
</form>
</body>
</html>
