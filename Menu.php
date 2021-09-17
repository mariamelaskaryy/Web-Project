<html>

<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style>
div.fixed {
position: fixed;
}
.lists {
 color:black;
 background-color:white;
 background-image: url(background.png);
 padding:20px 20px;
 text-align: right;
	
}
.lists a{
    font-size: 20px;
	color:black;
	text-align:center;
	text-decoration:none;
	font-family:Arial;
	padding:20px;
	
}

.lists a:hover{
    text-decoration: underline;
	color:black;
	
}
.lists a:active{
	color:green;
}

.lists b{
padding:20px 20px;
 text-align:left;

}
.Logo {

	text-align: left;
	position: absolute;
	padding-left: 10px;
}

</style>

<body>

<div class='Logo'>
<a href='homepage.php'><img src="logo.png" alt="logo" style="width:70px;height:70px;"></a>
</div>	

<div class="lists">


	<?php

	    
			if((isset($_SESSION['Name'])) && ($_SESSION["Role"]=="User" )){
					$id=$_SESSION["ID"];
					echo "$id";
					echo "userrr";
				
					echo"<a href='homepage.php'>Home</a>";
		        	 echo " <a href=\"profile.php?id=$_SESSION[ID]\"> Profile</a>";

					echo"<a href='availableHikes.php'>Explore</a>";
					echo"<a href='SignOut.php'>SignOut</a>";
			         echo"<a href='search.php'><img src='search.png' alt='search' style='width:30px;height:30px;'></a>";
					 echo"<a href='selectedTrips.php'><img src='cart.png' alt='cart' style='width:30px;height:30px;'></a>";
				}
				
					else if((isset($_SESSION['Name'])) && ($_SESSION["Role"]=="Admin" || $_SESSION["Role"]="SuperiorAdmin"))
				{
					$id=$_SESSION["ID"];
					echo "$id";
					echo "admin";
				
					echo"<a href='homepage.php'>Home</a>";
		        	 echo " <a href=\"profile.php?id=$_SESSION[ID]\"> Profile</a>";

					echo"<a href='Admin-uploadtrips.php'>Add Hike</a>";
					echo"<a href='viewHikes.php'>Hikes</a>";
					echo"<a href='viewAdmins.php'>View Admins</a>";
					echo"<a href='viewHikers.php'>View Hikers</a>";


					echo"<a href='SignOut.php'>SignOut</a>";
			         echo"<a href='search.php'><img src='search.png' alt='search' style='width:30px;height:30px;'></a>";
					 echo"<a href='selectedTrips.php'><img src='cart.png' alt='cart' style='width:30px;height:30px;'></a>";
				}
					else if((isset($_SESSION['Name'])) && ($_SESSION["Role"]=="HRPartner" ))
				{
					$id=$_SESSION["ID"];

					echo "$id";
					echo "HR Partner";
					
					echo"<a href='homepage.php'>Home</a>";
		        	echo " <a href=\"profile.php?id=$_SESSION[ID]\"> Profile</a>";

				
					echo"<a href='viewHikes.php'>Hikes</a>";

				echo"<a href='SignOut.php'>SignOut</a>";
			         echo"<a href='search.php'><img src='search.png' alt='search' style='width:30px;height:30px;'></a>";
					 echo"<a href='selectedTrips.php'><img src='cart.png' alt='cart' style='width:30px;height:30px;'></a>";

				
					
}

else if((isset($_SESSION['Name'])) && ($_SESSION["Role"]=="Auditor" ))
				{
					$id=$_SESSION["ID"];

					echo "$id";
					echo "Auditor";
					
					echo"<a href='homepage.php'>Home</a>";
		        	echo " <a href=\"profile.php?id=$_SESSION[ID]\"> Profile</a>";

				
					echo"<a href='viewHikes.php'>Hikes</a>";
					echo"<a href='viewAdmins.php'>View Admins</a>";


				echo"<a href='SignOut.php'>SignOut</a>";
			         echo"<a href='search.php'><img src='search.png' alt='search' style='width:30px;height:30px;'></a>";
					 echo"<a href='selectedTrips.php'><img src='cart.png' alt='cart' style='width:30px;height:30px;'></a>";

				
					
}

				else
				{
					$_SESSION["Role"]="";
				    $_SESSION["ID"]="";
					//echo "Welcome";
					echo"<a href='homepage.php'>Home</a>";
					echo"<a href='Login.php'>Login</a>";
		            echo"<a href='availableHikes.php'>Explore</a>";
					echo"<a href='search.php'><img src='search.png' alt='search' style='width:30px;height:30px;'></a>";
					 echo"<a href='availableHikes.php'><img src='cart.png' alt='cart' style='width:30px;height:30px;'></a>";
				}
				?>




</div>

</body>
</html>