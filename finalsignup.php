<?php include('server.php') ?>

<html>
   
   <head>
      <title>Signup Page</title>
      
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="rem.css">      
   </head>
   
   <body>
<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
<div class="test2">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ' index.php'><img src="res/gplogo2.png" height = '110px' width = '110px' style = "border-radius: 10px;"></a>     <object align='right'><br><br>
<?php if(isset($_SESSION['id'])) : ?>
<a class = "google" href = ' NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <?php endif ; ?>        <a class = "google" href = ' login.php' style = "text-decoration: none;">&nbsp;&nbsp;Login&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class = "google" href = ' finalsignup.php' style = "text-decoration: none;">&nbsp;Signup&nbsp;&nbsp;</a>
      </object> 
</div></object></div><br><br><br>
      <div align = "center">
         <div style = "width:30vw ; height: 50vw;" class="signup_box" >
            <div style = " font-family:Comic sans MS; color:white; padding:20px; font-size:30px; text-align:center;"><b>SIGN UP</b></div>
				
            <div style = "margin:5px">
            <?php if(!empty($errors)) : ?>
            <div class="error" id = "error_box" style = "width: 19vw;">
             <b>  <?php echo print_r($errors) ?> </b>
               </div>
            <?php endif; ?>   
               <br>
            <form method="post"  action="finalsignup.php">
            <div align="center" class="form-group"><input type = "text" style ="width: 80%" placeholder="E-mail" name = "email" class = "form-control" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input type = "text" style ="width: 80%" placeholder="Name" name = "name" class = "form-control" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input type = "text" placeholder="Username" style ="width: 80%" name = "username" class = "form-control" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input type = "password" placeholder="Password" style ="width: 80%" name = "password_1" class = "form-control" font-family= 'Comic Sans MS'/><br/><br />
                  <br><input type = "password" placeholder="Re-enter Password" style ="width: 80%" name = "password_2" class = "form-control" font-family= 'Comic Sans MS'/><br/><br />
                  <br><input type = "text" placeholder="Enrl. No." style ="width: 80%" name = "enrl" class = "form-control" font-family= 'Comic Sans MS'/><br /><br />
                  <br><input placeholder="Bhawan" list = "bhawans" style ="width: 80%" name = "bhawan" class = "form-control" font-family= 'Comic Sans MS'>
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
                  <div align="right"><input type = "submit" value = "Submit " class="google" name="reg_user" align="right";/><br /></div><br><br>
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

