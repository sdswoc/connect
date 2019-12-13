<?php 
include('server.php');
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: welcome.php");
  }
  
  if (isset($_GET['delete'])) {
    $temp = $_SESSION['id'];
    $sql = "DELETE FROM userData where userID = $temp;";
    mysqli_query($db, $sql); 
    session_unset();
    session_destroy();
    header("location: login.php") AND die();
} 
$id = $_SESSION['id'];
$sql_1 = "SELECT @var1 := COUNT(*) from followerData where userID = $id";
$sql_2 = "UPDATE userData SET follow_count = @var1 where userID = $id";
mysqli_query($db, $sql_1);
mysqli_query($db, $sql_2);
  
?>
<!DOCTYPE html>
<html>
<head>
      <title>Welcome <?php echo $_SESSION['name'] ?></title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="list.css">

      <link rel="stylesheet" type="text/css" href="dashboard.css">
      <link rel="stylesheet" type="text/css" href="rem.css">
      <script>
      function notify_alert(id){
               var xhttp = new XMLHttpRequest();
               xhttp.onreadystatechange = function(){
                  if(this.readyState == 4 && this.status == 200){
                      var message = this.responseText;
                     
                     if(message !== "0"){
                        alert(message);
                     }
                     
                  }
    }
    xhttp.open("GET", "notify.php?id="+id,false);
    xhttp.send();
}
      
      </script>
</head>
<body bgcolor = "#FFFFFF" >
   <link rel="icon" href="favicon.ico" type="image/x-icon"/>
   <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

<div class="test2">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'index.php'><img src="res/gplogo2.png" height = '110px' width = '110px' style = "border-radius: 10px;"></a>    <object align = "right">
        <br>
        <br>
      <object align='right'>
<a class = "google" href = 'NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
        
<?php  if (!isset($_SESSION['username'])) : ?>
<a class = "google" href = 'login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>

      <?php  if (isset($_SESSION['username'])) : ?>
<a class = "google" href = 'welcome.php?logout=1'>
        &nbsp;&nbsp;Logout&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
        &nbsp;&nbsp;<a class = "google" href = 'welcome.php?delete=1'>&nbsp;Delete my Account&nbsp;&nbsp;</a>

      <?php endif ?>
      </object>  
</object>
</div>   
<br>
<?php  if (isset($_SESSION['username'])) : ?>
<div class="row">
<div class="column" >
    <div class = "signup_box" style = "height: 400px; width: 90%;"><br>
        <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg ?>
            </div>
        <?php endif; ?>              
<center>
<?php 
$userID = $_SESSION['id'];
include('updateDP.php') ?>
  <form action="welcome.php" method = "post" enctype="multipart/form-data">
<span class="img-div">
              <div class="img-placeholder"  onClick="triggerClick()">
                <h4>Update image </h4>
              </div>
              <img src="userImages/<?php if(!isset($_SESSION['img'])){
  $_SESSION['img'] = 'default.png';
 }; echo $_SESSION['img'] ?>" onload = notify_alert(<?php echo $_SESSION['id'] ?>) onClick="triggerClick()" id="profileDisplay">
</span>
      
            <input type="file" name="profileImage" onChange="displayImage(this); this.form.submit();" 
            id="profileImage" class="form-control" style="display: none;">
   <input type="text" name = "id" value ="<?php echo $_SESSION['id'] ?>" style = "display:none" />  
  </form>
</center><br>
 <div class="profile-detail">
 <?php
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");
// Check connection
$id = $_SESSION['id'];
$sql = "SELECT follow_count, bio FROM userData where userID = $id";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
// output data of each row
$row = $result->fetch_assoc();
echo "Name : ".$_SESSION['name']."<br>Follow Count :  ".$row['follow_count'];
echo "<br>Bio : ".$row['bio'];
echo "<br>Bhawan : ".$_SESSION['bhawan'];
}

$conn->close();
?>
  
 </div>
</div>

  </div>
<div class="column2" >
<div class = "signup_box info" style = "height: 400px; width: 100%;"><br>
<div class = "hobbies" style="width: 45%; float:left; ">
   <!--HOBBIES-->
   
<div id="myDIV" class="header">
  <h2>Hobbies</h2>
  <input list = "hobbies" id="hobbieInput" type="text" placeholder="Title...">
  <datalist id="hobbies">
    <option value="Dancing">
    <option value="Listening Music">
    <option value="Cricket">
    <option value="Singing">
    <option value="Fooseball">
    <option value="Reading Novels">
  </datalist>

  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="hobbieUL">
<?php 
function hobbieID_to_name($a){
  if($a==1){return "Dancing";}
  if($a==2){return "Listening Music";}
  if($a==3){return "Cricket";}
  if($a==4){return "Singing";}
  if($a==5){return "Fooseball";}
  if($a==6){return "Reading Novels";}
}
$selfID = $_SESSION['id'];
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");

$sql = "SELECT * from hobbieData where userID = $selfID";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  $hobbieName = hobbieID_to_name($row['hobbie_ID']);
  echo "<li>".$hobbieName."</li>";
}
}
?>
</ul>





</div>

<div class ="goals" style="width: 45%; float:right">
   <!--GOALS-->

   <div id="myDIV" class="header">
  <h2>GOALS</h2>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
   </div>

<ul id="hobbieUL">
  <li>Gymming</li>
  <li>UPSC</li>
  <li>Competitive Coding</li>
  <li>Branch Change</li>
  <li>Tech Group</li>
</ul>






</div>
  
</div>

  </div>
  
</div>

<?php endif; ?>

<div class="userC" >&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
           <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <object align = 'right'><?php echo $_SESSION['username'] ?></object>
        </div>
</body>
</html>
<script src="list.js"></script>
<script src="profileUpdate.js"></script>
