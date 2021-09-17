
<?php
$connect = mysqli_connect("localhost", "root", "", "Hiking");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Hikes 
	WHERE Name LIKE '%".$search."%'
	OR Location LIKE '%".$search."%' 
	OR Date LIKE '%".$search."%' 
	OR Time LIKE '%".$search."%' 
	OR Price LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM Hikes ORDER BY Time";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Name</th>
							<th>Location</th>
							<th>Date</th>
							<th>Time</th>
							<th>Price</th>
							<th>Link</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["Name"].'</td>
				<td>'.$row["Location"].'</td>
				<td>'.$row["Date"].'</td>
				<td>'.$row["Time"].'</td>
				<td>'.$row["Price"].'</td>
				<td>'."<a  href=\"viewHikeDeets-User.php?id=$row[ID]\"> view Hike </a>" .'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
<style>

table{
border: 1px solid #ccc;
 border-radius: 10px;
 width:76%;
 border-collapse: collapse;
 margin:auto;
 }
table td, table th { 
	border: 1px solid #ccc;
    padding-bottom: 10px;
	padding-top: 10px;
	text-align: center;
	background-color: white;
}


</style>