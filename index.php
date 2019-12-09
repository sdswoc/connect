<?php 
include('server.php');
if(isset($_SESSION['id'])){
   header('location: welcome.php');
}

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
    
?>
<!DOCTYPE html>
<html>
<head>
      <title>Welcome <?php echo $_SESSION['name'] ?></title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="sample.css">

      <link rel="stylesheet" type="text/css" href="dashboard.css">
      <link rel="stylesheet" type="text/css" href="rem.css">
</head>
<body bgcolor = "#FFFFFF">
   <link rel="icon" href="favicon.ico" type="image/x-icon"/>
   <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

<div class="test2">
<a href = 'http://localhost/connect/index.php'><img src="res/gplogo2.png" height = '110px' width = '110px'></a>    <object align = "right">
        <br>
        <br>
      <object align='right'>
<a class = "google" href = 'http://localhost/connect/NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
        
<?php  if (!isset($_SESSION['username'])) : ?>
<a class = "google" href = 'http://localhost/connect/login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'http://localhost/connect/finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>

      <?php  if (isset($_SESSION['username'])) : ?>
<a class = "google" href = 'http://localhost/connect/welcome.php?logout=1'>
        &nbsp;&nbsp;Logout&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'http://localhost/connect/finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>
      </object>  
</object>
</div>   
<br>



<div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
           <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        
        </div>