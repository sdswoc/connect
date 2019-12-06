<?php 
include('server.php');
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['id']);
      unset($_SESSION['bhawan']);
  	header("location: login.php");
  }
  if (isset($_GET['delete'])) {
    $temp = $_SESSION['id'];
    $sql = "DELETE FROM userData where userID = $temp;";
    mysqli_query($db, $sql);
    session_destroy();
    unset($_SESSION['username']);
      unset($_SESSION['id']);
      unset($_SESSION['bhawan']);
    header("location: login.php");
}
    
?>
<!DOCTYPE html>
<html>
<head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   <body bgcolor = "#FFFFFF">
   <link rel="icon" href="favicon.ico" type="image/x-icon"/>
   <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
<div class="test2">
    <img src="res/gplogo2.png" height = '110px' width = '110px'>
    <object align = "right">
        <br>
        <br>
      <object align='right'>
<a class = "google" href = 'http://localhost/woc/NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
        
<?php  if (!isset($_SESSION['username'])) : ?>
<a class = "google" href = 'http://localhost/woc/login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'http://localhost/woc/finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>

      <?php  if (isset($_SESSION['username'])) : ?>
<a class = "google" href = 'http://localhost/woc/login.php'>
        &nbsp;&nbsp;Logout&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'http://localhost/woc/finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      <?php endif ?>
      </object>  
</div></object></div>

   
    <?php  if (isset($_SESSION['username'])) : ?>
    <center>	<div class = "user">
        <p>Welcome <strong><?php echo $_SESSION['username']." ! " ?></strong></p>
        <p> <a class = "google" href="welcome.php?logout=1" >
          &nbsp;&nbsp;Logout&nbsp;&nbsp;</a> </p>
        <p> <a class = "google" href="welcome.php?delete=1" >&nbsp;&nbsp;Delete MyAccount&nbsp;&nbsp;</a> </p>
        <p>  &nbsp;&nbsp;<?php echo $_SESSION['bhawan'] ?>&nbsp;&nbsp;</a> </p>

    </div>
    <?php endif ?>
</div>
<object align='bottom'>
        <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp<b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;</center>
        <object align='right' style="padding-right: 15px"> 
                                                  
            
        </div>
    </object>
		
</body>
</html>