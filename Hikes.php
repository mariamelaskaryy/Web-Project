<?php
include ('databaseConn.php');

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

    echo "$row[0]";
	
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
    

		$sql= "INSERT INTO Hikes (Name, Location, Date, Time, Price, MaxCapacity,Image) 
		VALUES (' ".$_POST["Name"]." ',' ".$_POST["Location"]." ',' ".$_POST["Date"]." ',' ".$_POST["Time"]." ',' ".$_POST["Price"]." ',' ".$_POST["MaxCapacity"]." ' ,'$image')";
        $result=mysqli_query($conn,$sql);
     
        	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
  	else{
  		$msg = "Failed to upload image";
  	}

		
	}
}
?>



<h1>Hikes</h1>


<form action="Hikes.php" method="post"   enctype="multipart/form-data" >

  Name:<br>
  <input type="text" name="Name"><br>
   <?php echo $nameError; ?>
     <?php echo $nameError2; ?><br>
 
    
  Location:<br>
  <input type="text" name="Location"><br>
    <?php echo $locationError; ?><br>
     
    
    
  Date:<br>
  <input type="date" name="Date"><br>
    <?php echo $dateError; ?><br>
    
  Time:<br>
     <input type="time" name="Time"><br>
     <?php echo $timeError; ?><br>
    
  
  Price:<br>
     <input type="text" name="Price"><br>
     <?php echo $priceError; ?><br>
    


  MaxCapacity:<br>
    <input type="integer" name="MaxCapacity"><br>
     <?php echo $maxCapacityError; ?><br>
    
     <br> Image:
 <input type="file" name="image"><br>
         <br> 
    
  <input type="submit" value="Submit" name="Submit">
  <input type="reset">
    
    
</form>