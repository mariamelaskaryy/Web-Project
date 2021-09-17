<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="StyleSheet.css" rel="stylesheet">
</head>
<body>
<?php session_start();
 include "menu.php";
 include "slideshow.php";?>
 
<div class='Contents'>

<br><br>
<div class='AboutUs-Heading'>

 <h2>Services we provide</h2>
  At Hikes, our job and our goal are the same — to curate guidebook-quality information that inspires hikers like you to plan an adventure with confidence using the most accurate data available.
</div>
	

<br>
   <div id='Link1'>
  <img src="contact.webp" style="width:220px;height:220px;border-radius:20%;"><br><br>
  <a href="ContactUs.php"> Contact Us </a><br>
  We are available 24 hours a day.
  </div>


<div id='Link2' >
<img src="group.jpg" style="width:220px;height:220px;border-radius:20%;"><br><br>
<a href="AvailableHikes.php"> Join Trips </a><br>
Save 20% or more on your next booking to get 2021 off to a good start.
   </div>


<div id='Link3'>
<img src="chat.png" style="width:220px;height:220px;border-radius:20%;" ><br><br>
<?php 

if (($_SESSION["Role"]=="Admin")  || ($_SESSION["Role"]=="Auditor") || ($_SESSION["Role"]=="SuperiorAdmin")){
echo "<a href='viewMessages.php'> Chat </a><br>";
}
else  if ($_SESSION["Role"]=="User"){
   echo"<br><a href=\"Messages.php?id=$_SESSION[ID]\">Chat</a></br> ";
}
else {
 	echo"<a href='Login.php'> Chat </a><br>";
 	echo"well";
 }
?>
Sign in to call or chat with us – we’re always available.
   </div>

   <div id='Link4' >
<img src="review.png" style="width:220px;height:220px;border-radius:20%;"><br><br>
<?php
			//if((isset($_SESSION['Name'])) && ($_SESSION["Role"]=="User" )){}

  echo"<a href='showRating.php'> Reviews </a><br>";
 
			?>

Your opinion matters.
   </div>



</div> <br><br>

</body>
</html>
