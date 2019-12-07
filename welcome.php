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
    
?>
<!DOCTYPE html>
<html>
<head>
      <title>Welcome <?php echo $_SESSION['username'] ?></title>
      <link rel="stylesheet" type="text/css" href="style.css">
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
              <img src="userImages/<?php echo $_SESSION['img'] ?>" onerror="userImages/6.jpeg" onClick="triggerClick()" id="profileDisplay">
</span>
      
            <input type="file" name="profileImage" onChange="displayImage(this); this.form.submit();" 
            id="profileImage" class="form-control" style="display: none;">
      
  </form>
</center>
 <div class="profile-detail">
   Name: <?php echo $_SESSION['name'] ?><br>
  Bhawan: <?php echo $_SESSION['img'] ?><br>
  
 </div>
</div>

  </div>
<div class="column2" >
<div class = "signup_box" style = "height: 400px; width: 100%;"><br>
     <?php echo $msg_error ?>
</div>

  </div>
  
</div>

<?php endif; ?>

<div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
           <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <object align = 'right'><?php echo $_SESSION['username'] ?></object>
        </div>

		
</body>
</html>
<script src="scripts.js"></script>
