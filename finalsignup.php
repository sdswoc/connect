<?php include('server.php') ?>

<html>
   
   <head>
      <title>Signup Page</title>
      
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="rem.css">

      
   </head>
   
   <body>
   <link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
<div class="test2">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ' index.php'><img src="res/gplogo2.png" height = '110px' width = '110px' style = "border-radius: 10px;"></a>     <object align='right'><br><br>
<?php if(isset($_SESSION['id'])) : ?>
<a class = "google" href = ' NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <?php endif ; ?>        <a class = "google" href = ' login.php'>&nbsp;&nbsp;Login&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = ' finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
      </object> 
</div></object></div><br><br><br>
      <div align = "center">
         <div style = "width:500px; " class="signup_box" >
            <div style = " font-family:Comic sans MS; color:white; padding:20px; font-size:30px; text-align:center;"><b>Sign Up</b></div>
				
            <div style = "margin:5px">
            <?php if(!empty($errors)) : ?>
            <div class="error" id = "error_box" style = "width: 19vw;">
             <b>  <?php echo print_r($errors) ?> </b>
               </div>
            <?php endif; ?>   
               <br>
            <form method="post"  action="finalsignup.php">
            <div align="center"><input type = "text" placeholder="E-mail" name = "email" class = "box" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input type = "text" placeholder="Name" name = "name" class = "box" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input type = "text" placeholder="Username" name = "username" class = "box" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input type = "password" placeholder="Password" name = "password_1" class = "box" font-family= 'Comic Sans MS'/><br/><br />
                  <br><input type = "password" placeholder="Re-enter Password" name = "password_2" class = "box" font-family= 'Comic Sans MS'/><br/><br />
                  <br><input type = "text" placeholder="Enrl. No." name = "enrl" class = "box" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input placeholder="Bhawan" list = "bhawans" name = "bhawan" class = "box" font-family= 'Comic Sans MS'>
 <datalist id="bhawans">
    <option value="Rajendra Bhawan">
    <option value="Sarojini Bhawan">
    <option value="Radhakrishnan Bhawan">
    <option value="Rajeev Bhawan">
    <option value="Kasturba Bhawan"> 
    <option value="Jawahar Bhawan">
    <option value="Govind Bhawan">
    <option value="Azad Bhawan">
    <option value="Ravindra Bhawan">  
  </datalist>
                  
                  <br /><br /></div>
                  <div align="right"><input type = "submit" value = "Submit " onClick = "display_box()" class="google" name="reg_user" align="right";/><br /></div><br><br>
               </form>
               <div style = "font-size:14px; color:#cc0000; margin-top:10px"><?php echo $success; ?></div>
          
					
            </div>
				
         </div>
			
      </div>
      <object align='bottom'>
        <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
           <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        
        </div>
    </object>
   </body>
</html>

