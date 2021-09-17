
<?php
session_start(); 
include ('databaseConn.php');


$id= $_SESSION['ID'];

$sql= "Select * from Hikers WHERE ID=$id";
$result=mysqli_query($conn,$sql);


while ($row= mysqli_fetch_assoc($result)){
$name=$row["Name"]; 
}

$cookie_name = "CookieName";
$cookie_value = $name;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
     echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
   //  echo "Cookie '" . $cookie_name . "' is set!<br>";
     echo "Value is: " . $_COOKIE[$cookie_name];
}
?>



</body>
</html>
