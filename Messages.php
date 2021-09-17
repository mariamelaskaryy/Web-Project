
<link href="chat.css" rel="stylesheet">

<style>

#profileDisplay
{
 display: block; height: 50px; width: 50; margin: 10px auto; border-radius: 50%;
 float:left;
 padding: 5px 10px 10px ;
}

.container{
    border: 2px solid #dedede;
     margin: 0 auto;
  max-width: 600px;
  
  padding: 20 20px;
  background-color:#f1f1f1;
  font-family: Arial, Helvetica, sans-serif;
  border-radius: 25px;
}
.userA{
  border: 2px solid #dedede;
  background-color: #c9f5f1;
  border-radius: 5px;
  padding: 10px;
  

}
.adminA{
  border: 2px solid #dedede;
  background-color: #93d1ab;
  border-radius: 5px;
  padding: 10px ;
  border-color: #ccc;
  
}
.admin{
position: relative;
  border: 2px solid #dedede;
  background-color: #c9f5f1;
  border-radius: 5px;
  padding: 10px 10px 5px ;
   max-width: 400px;
    left: 180px;
}
.timeAdmin{
    float: right;
  color: #aaa;
  position: relative;
  
 
}
input[type=submit] {
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
   max-width: 100px;

}
.timeUser{
    float: right;
  color: #aaa;
  position: relative;
   left: -185px;


}

.user{
  border: 2px solid #dedede;
  background-color: #93d1ab;
  border-radius: 5px;
  padding: 10px ;
  border-color: #ccc;
  width: 400px;
   
  
}
.penalty{
max-width: 300px;
border: 2px solid #dedede;
  background-color:	#B22222;
  border-radius: 5px;
  padding: 10px;
  border-color: #ccc;
float:right;
 color:white;

}

.container2{
 padding: 10px;
   
    height: 70px;
    border: 1px solid #dedede;
  background-color: #ffffff;
  border-radius: 5px;
  
}


</style>

<?php
session_start();

include "menu.php";
date_default_timezone_set('Africa/Cairo');
include ('databaseConn.php');
$timestamp = date("Y-m-d H:i:s");
if(isset($_POST['Submit'])){

echo $_SESSION['ID'];
$userID=$_SESSION['ID'];
$sqlCheck="SELECT * FROM LoginDeets where (UserID=$userID)";
 $resultCheck=mysqli_query($conn,$sqlCheck);
$rowCheck=mysqli_fetch_assoc($resultCheck);
$lastTimeStamp=$rowCheck['CurrentTime'];

echo $rowCheck['UserID'];

    if ( (empty($rowCheck['UserID'])) ){
         $sql="INSERT INTO LoginDeets (UserID,LastAct)
         VALUES ('$userID','$timestamp')";
         $result=mysqli_query($conn,$sql);
    }
    else{
        $sql="UPDATE LoginDeets SET  LastAct='$lastTimeStamp',CurrentTime='$timestamp'
        WHERE UserID=$userID";   
        $result=mysqli_query($conn,$sql);

    }


    $id=$_POST["ID"];
    $message=$_POST['message'];
    echo $id;

    if ($_SESSION["Role"]=="User"){
$sql = "INSERT INTO ContactUs(fromHikerID, Message) 
VALUES ('$id','$message')";
        $result=mysqli_query($conn,$sql);
}

else{
   $AdminId=$_SESSION["ID"];
$sql = "INSERT INTO ContactUs(fromHikerID,toHikerID, Message) 
VALUES ('$AdminId','$id','$message')";
        $result=mysqli_query($conn,$sql);

}
}




?>
<br>
<?php
echo '<div class="container">';


$sql="select M.ID , S.ProfilePicture, M.fromHikerID, S.Name,M.Message,M.TimeStamp,S.Role
from ContactUs M 
inner join Hikers S on M.fromHikerID = S.id
where  (M.fromHikerID =".$_GET['id'].") OR (M.toHikerID =".$_GET['id'].")
order by M.TimeStamp asc";
 //echo $_GET['id'];
 $idCurrent=$_GET['id'];
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$userID=$_SESSION['ID'];
$sqlCheck="SELECT * FROM LoginDeets where (UserID=$userID)";
$resultCheck=mysqli_query($conn,$sqlCheck);
$rowCheck=mysqli_fetch_assoc($resultCheck);
$lastTimeStamp=$rowCheck['CurrentTime'];
echo '<div class="container2">';
      $profilePic=$row["ProfilePicture"];
       if ($profilePic==NULL){
        echo '<img src="images/pp.png "  id="profileDisplay" width="50" >';         
          echo"<br>";}
            else{
                  echo '<img src="images/'.$profilePic.' "   id="profileDisplay"  width="50">';
            }

      if ($_SESSION["Role"]=="User"){ 
        echo '<div class="name"><br><br>Admin</div>';         
            }
            else if ($_SESSION["Role"]=="Admin" || $_SESSION["Role"]=="Auditor" || $_SESSION["Role"]=="HRPartner" ){
              echo '<div class="name"><br><br>'. $row["Name"].'</div>'; 
            }
              
            
echo '</div><br>';

    
    if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
      $idMessage=$row["ID"];
   
    if ($_SESSION["Role"]=="User"){
        if($row["fromHikerID"]!=$_GET['id']){
                      
         // echo '<div class="name">Admin</div>';

             if($row["TimeStamp"]>$lastTimeStamp)
              {

          echo '<div class="user"><u><b>'. $row["Message"].'</u></b></div>';
          echo '<div class="timeUser">'.$row["TimeStamp"].'</div>';
          echo"<br>";
          }
            else
              {
                 echo   '<div class="user"><i>'. $row["Message"].'<i></div>';
                 echo '<div class="timeUser">'.$row["TimeStamp"].'</div>';
                 echo"<br>";

              }

          
        }
        
    
    else{

   // echo '<div class="name">'. $row["Name"].'</div>';

    echo '<div class="admin">'. $row["Message"].'</div>';
    echo '<div class="timeAdmin">'.$row["TimeStamp"].'</div>';
    echo"<br>";
}
}  



else if($_SESSION["Role"]=="Admin" ){

        if($row["fromHikerID"]!=$_GET['id']){
       
       //  echo '<div class="name">'. $row["Name"].'</div>';
 
        echo   '<div class="admin">'. $row["Message"].'</div>';
        echo '<div class="timeAdmin">'.$row["TimeStamp"].'</div>';
         echo"<br>";
    
            
        }
        
        else{

    //echo '<div class="name">'. $row["Name"].'</div>';
    
    
             if($row["TimeStamp"]>$lastTimeStamp)
              {
             
                 echo   '<div class="user"><u><b>'. $row["Message"].'</b></u></div>';
                 echo '<div class="timeUser">'.$row["TimeStamp"].'</div>';
                 echo"<br>";
                 }
              else
              {
                 echo   '<div class="user"><i>'. $row["Message"].'<i></div>';
                 echo '<div class="timeUser">'.$row["TimeStamp"].'</div>';
                 echo"<br>";

              }
              
    }
}    

else if($_SESSION["Role"]=="Auditor" || $_SESSION["Role"]=="HRPartner" || $_SESSION["Role"]=="SuperiorAdmin"){

        if($row["fromHikerID"]!=$_GET['id']){
            $id=$_GET['id'];
                $senderID = $row["fromHikerID"];
            $idMsg=$row["ID"];
          

         echo '<div class="name">'. $row["Name"].'</div><br>';

        echo   '<div class="adminA">'. $row["Message"].'';
       
 ?>
 <form action=" " method="post"   enctype="multipart/form-data" >
 
 <input class="penalty" type="submit"  name="Submit2" value="Comment">
 <?php echo'<input type="hidden" name="senderID"  value='.$senderID .'>'; ?>
 <?php echo'<input type="hidden" name="idMsg"  value='.$idMsg.'>'; ?>

<?php echo'<div><input type="text" name="comment" class="penalty" placeholder='.$idMsg.'></div></div>'; ?>
 </form>
 <?php
        echo '<div class="time">'.$row["TimeStamp"].'</div><br>';
         echo"<br>";
               
        }
        
        else{

    //echo '<div class="name">'. $row["Name"].'</div>whatever<br>';

    echo   '<div class="userA">'. $row["Message"].'</div>';
    echo '<div class="time">'.$row["TimeStamp"].'</div><br>';
    echo"<br>";
    }
 
}    


  }   
 
}

if ($_SESSION["Role"]=="Auditor" || $_SESSION["Role"]=="HRPartner"  ){


        echo '<input type="hidden" name="message" placeholder="type your message here">';
         echo'<input type="hidden" name="ID" value="<?php echo $idCurrent;?>">';
        echo'<input type="hidden" value="send">';

    }
    else
    {
        
              echo' <form action="" method="post"   enctype="multipart/form-data">';

         echo '<input type="text" name="message" placeholder="type your message here">';
        echo'<input type="hidden" name="ID" value='.$idCurrent.'>';
        echo'<input type="submit" value="send" name="Submit"></form>';

    }

 

?>
   <?php 
      if(isset($_POST['Submit2'])){
          $senderID = $_POST["senderID"];
          $MessageID=$_POST["idMsg"];
           $comment=$_POST["comment"];
           $sql2 = "INSERT INTO CommentsByAuditor(senderID,MessageID, Comment) 
VALUES ('$senderID','$MessageID','$comment')";
        $result=mysqli_query($conn,$sql2);
        
          
      }
  
?>


      	    
	

<?php echo '</div>'; ?>