<script>
function myFunction() {
  alert("Survey submitted successfully!");
}
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php session_start();
include "menu.php";
include ('databaseConn.php');?>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
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
  
</div>

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
