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

  if (isset($_GET['id'])) {
   $follower_id = $_SESSION['id'];
   $id_to_be_followed = $_GET['id'];
   if($follower_id != $id_to_be_followed){
     $sql = "INSERT INTO followerData (userID, followerID) VALUES($id_to_be_followed,$follower_id)";
   mysqli_query($db, $sql);
   }
    
  
  }

?>
<!DOCTYPE html>
<html>
<head>
      <title>Connect@IIT-R</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="sample.css">

      <link rel="stylesheet" type="text/css" href="dashboard.css">
      <link rel="stylesheet" type="text/css" href="rem.css">
</head>
<body bgcolor = "#FFFFFF">
   <link rel="icon" href="favicon.ico" type="image/x-icon"/>
   <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

<div class="test2">
<a href = '  index.php'><img src="res/gplogo2.png" height = '110px' width = '110px'></a>    <object align = "right">
        <br>
        <br>
      <object align='right'>
        
<?php  if (!isset($_SESSION['username'])) : ?>
  <a class = "google" href = '  NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a class = "google" href = '  login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = '  finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>

      <?php  if (isset($_SESSION['username'])) : ?>
        <a class = "google" href = '  welcome.php'>&nbsp;&nbsp;Back to Dashboard&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a class = "google" href = '  welcome.php?logout=1'>
        &nbsp;&nbsp;Logout&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = '  finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>
      </object>  
</object>
</div>   
<br>
<div class="connect">
<center> <div class = "signup_box info" style = "height: 400px; width: 90%;"><br>
<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Username</th>

<th>Bio</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");
// Check connection

$sql = "SELECT userID, name, username, bio FROM userData";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row["userID"];
echo "<tr><td>" . $row["userID"]. "</td><td>" . $row["name"] . "</td><td>" . $row["username"] . "</td><td>" . $row["bio"] . "</td>";
echo "<td>";
echo "<a class = 'google' href = '  NewConnect.php?id=".$id."'>&nbsp;Connect&nbsp;&nbsp;</a>";
echo "</td>";
}
} 
else { echo "0 results"; }
$conn->close();
?>
</tr>

</table>
</div>
</div>
      </center>

     
<div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
           <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        
        </div>