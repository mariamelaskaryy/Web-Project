
<?php
    session_start();
include ('databaseConn.php');

$id= $_GET['id'];
$hikerID=$_GET['idHiker'];
    echo $id;
$sql = "DELETE FROM selectedTrips WHERE HikerID='$hikerID' AND HikeID='$id'";
echo $sql;
if(mysqli_query($conn, $sql))
{
    mysqli_close($dbname);
    header("location:viewHikes.php");
    exit;	
}
else
{
    echo "Error deleting record";
}
?>
