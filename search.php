<?php
session_start(); ?>

<html>
	<head>
		<?php include"menu.php"?>
		<link href="search.css" rel="stylesheet"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<br>
		
		<div class="container">

		<?php 

if ($_SESSION["Role"]=="Admin"){
echo "<a href='viewRequests.php'> View Requests </a>";
}
else {
 	echo "<a href='Request.php'> Submit a request </a>";

 }
?>


			<br />
			<br />
			<br />
			<div class="form-group">
				<div class="input-group">
				
					<input type="text" name="search_text" id="search_text" placeholder="Search for Trips, Prices, Time, or Dates" class="form-control" />
					
					 
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />

	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>




