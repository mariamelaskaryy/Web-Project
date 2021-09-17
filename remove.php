<?php
include "Menu.php";
    session_start();
include ('databaseConn.php');

$id= $_GET['id'];


$sql = "DELETE FROM selectedTrips WHERE ID='$id'";
echo $sql;
if(mysqli_query($conn, $sql))
{
    mysqli_close($dbname);
    header("location:selectedTrips.php");
    exit;	
}
else
{
    echo "Error deleting record";
}
?>
