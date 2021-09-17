<html>
<body>


<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Help us improve!</h4>
        </div>
        <div class="modal-body">
            
            <form action="" method="post"  class='contact'>
          How often do you book your travels with us?<br>
   <input type="radio" id="Q1-1" name="Q1" value="first booking">
<label>This is my first booking</label><br>
<input type="radio" id="Q1-2" name="Q1" value="Rarely">
<label >Rarely</label><br>
<input type="radio" id="Q1-3" name="Q1" value="Often">
<label>Often</label> <br><br>
            How did you hear about us?<br>
   <input type="radio" id="Q2-1" name="Q2" value="friends">
<label >Friend/relative</label><br>
<input type="radio" id="Q2-2" name="Q2" value="internet">
<label >Internet Ads</label><br>
<input type="radio" id="Q2-3" name="Q2" value="newspaper">
<label>Newspaper</label> <br><br>
            How satisfied are you with our service?<br>
   <input type="radio" id="Q3-1" name="Q3" value="satisfied">
<label>Very satisfied</label><br>
<input type="radio" id="Q3-2" name="Q3" value="Neutral">
<label>Neutral</label><br>
<input type="radio" id="Q3-3" name="Q3" value="dissatisfied">
<label>Very dissatisfied</label> <br><br>
How can we improve?<br>
<input  style="height:150px;" type="text"  name="message" class="textarea" required="">

      
        <div class="modal-footer">
         <input type="submit" name="submit" value="submit">
               </div>
               </form>
            
        </div>
      </div>
      
    </div>
  </div>
  <script type="text/javascript">
      $(window).on('load', function() {
          $('#myModal').modal('show');
      });
  </script>
</div>
<?php session_start(); 
include "menu.php";
include ('databaseConn.php');?>

<?php

if(isset($_POST['submit'])){

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

@$a=$_POST['Q1'];
@$b=$_POST['Q2'];
@$c=$_POST['Q3'];
$ID= $_SESSION["ID"];
$text=$_POST['message'];

$sql = "INSERT INTO survey(HikerID, Question1,Question2,Question3,Question4) VALUES ('$ID','$a','$b','$c', '$text')";

$result=mysqli_query($conn,$sql);

}
?>

<?php

 $id= $_GET['id'];
 $HikerID=$_SESSION["ID"];

$sql= "Select * from Hikes WHERE ID=$id";
$result=mysqli_query($conn,$sql);


while ($row= mysqli_fetch_assoc($result)){


$name=$row["Name"];
$date=$row["Date"];
}

 
 ?>

<link href="Forms.css" rel="stylesheet" type="text/css">
<link href="rate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<form action="" method="POST"  class='contact'>
<h1>Review: </h1> 
 
  Trip:<br>
  <input type="text" name="trip" placeholder="<?php echo $name;?>" readonly> 
    <input type="text" name="date" placeholder="<?php echo $date;?>" readonly> 

  
  <br> <br>

  Rate: 
  <div class="rating">
        <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating" id="rating-1" value="1" type="radio"checked>

        <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">

        <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating" id="rating-3" value="3" type="radio" >

        <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">

        <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating" id="rating-5" value="5" type="radio">
  </div>
<br><br>
 Review:<br>
<textarea rows="4" name="message" class="textarea" required=""> </textarea>

<input type="submit" value="Submit">
</form>

<?php


    if( ! empty(  $_POST['message']) AND ! empty( $_POST['rating'] ) )
    {
$trip=$_POST['trip'];
$review=$_POST['message'];
$rating=$_POST['rating'];

$sql = "INSERT INTO Reviews(HikeID, HikerID, Review, Rating)
VALUES ('$id','$HikerID','$review','$rating')";

if ($conn->query($sql) === TRUE) {
  echo "Your message was sent successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
}


?>
</body>
</html>