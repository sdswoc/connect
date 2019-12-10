<?php include('server.php');
if(isset($_SESSION['id'])){
   header('location: welcome.php');
}

?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="rem.css">

   <body bgcolor = "#FFFFFF">
   <link rel="icon" href="favicon.ico" type="image/x-icon"/>
   <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
<div class="test2">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = 'http://localhost/connect/index.php'><img id = "logo" src="res/gplogo2.png" height = '110px' width = '110px' style = "border-radius: 10px;"></a>
    <object align = "right">
        <br>
        <br>
      <object align='right'>
         <?php if(isset($_SESSION['id'])) : ?>
<a class = "google" href = 'http://localhost/connect/NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <?php endif ; ?>
        <a class = "google" href = 'http://localhost/connect/login.php'>&nbsp;&nbsp;Login&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = 'http://localhost/connect/finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      </object>  
</div></object></div><br><br><br>
<center>
<div  class="test">
         <div style = "width:300px;" align = "center">
            <div style = "padding:3px; font-family: Century Gothic; font-size: 42px; color:white;" >
            <b>Connect - Login</b><br>
            </div>
				
            <div style = "margin:30px">
            <?php if(!empty($errors)) : ?>
               <div class="error">
             <b>  <?php echo print_r($errors); ?> </b>
               </div>
            <?php endif ; ?>   
               <br>
            <form method="post" action="login.php">
                  <input type = "text" name = "username" class = "box" placeholder="Username"/><br /><br />
                  <br><input type = "password" name = "password" class = "box" placeholder="Password" /><br/><br />
                  <input type = "submit" onclick = "display_box()" class="google" name = "login_user" value = " Submit"/><br />
               </form>
                      
					
            </div>
				
         </div>
			
      </div>
   </center>
   <object align='bottom'>
        <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
           <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        
        </div>
    </object>
   </body>
</html>
