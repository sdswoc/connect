<!DOCTYPE html>

<?php include('server.php');
if(isset($_SESSION['id'])){
   header('location: welcome.php');
}


?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Connect @ IIT-R</title>
  <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="rem.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./login.css">
<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

</head>
<body>

<div class="test2">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = ' index.php'><img id = "logo" src="res/gplogo2.png" height = '110px' width = '110px' style = "border-radius: 10px;"></a>
    <object align = "right">
        <br>
        <br>
      <object align='right'>
         <?php if(isset($_SESSION['id'])) : ?>
<a class = "google" href = ' NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <?php endif ; ?>
        <a class = "shiney-button switch_2_login" style="text-decoration: none; font-size: 18px">Signup</a>&nbsp;&nbsp;&nbsp;&nbsp;
      </object>  
</div></object></div>
<!-- partial:index.partial.html -->
<div class="container">
   <section id="formHolder">

      <div class="row">

         <!-- Brand Box -->
         <div class="col-sm-6 brand">
            <a href="#" class="logo">CONNECT <span>@IIT-R</span></a>

            <div class="heading">
               <h2>CONNECT</h2>
               <p>Bringing Like-minded people aboard!</p>
            </div>

            <div class="success-msg">
               <p>Great! You are one of our members now</p>
               <a href="welcome.php" class="profile">Your Profile</a>
            </div>
         </div>


         <!-- Form Box -->
         <div class="col-sm-6 form">

            <!-- Login Form -->
            <div class="login form-peice">
               <form class="login-form" action="login.php" method="post">
                  <div class="form-group">
                     <label for="username">Username</label>
                     <input type="text" name="username" id="username" class="username" required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="loginPassword" >Password</label>
                     <input type="password" name="password" id="loginPassword" class="login_password" required>
                     <span class="error"></span>
                  </div>

                  <div class="CTA">
                     <input type="submit" value="Login" name="login_user">
                     <a href="#" class="switch">I'm New</a>
                  </div>
               </form>
            </div><!-- End Login Form -->


            <!-- Signup Form -->
            <div class="signup form-peice switched">
               <form class="signup-form" action="login.php" method="post">

                  <div class="form-group">
                     <label for="name">Full Name</label>
                     <input type="text" name="reg_name" id="reg_name" class="name" required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="username">Username</label>
                     <input type="text" name="reg_username" id="reg_username" class="username" required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="email">Email Address</label>
                     <input type="email" name="email" id="email" class="email">
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="pass" required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="passwordCon">Confirm Password</label>
                     <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="enrl">Enrl. No.</label>
                     <input type="text" name="enrl" id="enrl" class="enrl">
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="branch_y">Branch and Year</label>
                     <input type="text" name="branch_y" id="branch_y">
                  </div>
                  
                  <div class="form-group">
                     <label for="bhawan">Bhawan<label>
                     <input type="text" name="bhawan" list="bhawans" id="bhawan" >
                     <datalist id="bhawans">
 <?php 
                                        $bhawans = array("Rajendra Bhawan", "Sarojini Bhawan", "Radhakrishnan Bhawan","Rajeev Bhawan","Kasturba Bhawan", "Jawahar Bhawan","Govind Bhawan", "Azad Bhawan", "Ravindra Bhawan" );
                                        foreach($bhawans as $b){
                                            echo '<option value="'.$b.'">';
                                        }
                                        ?> 
  </datalist>
                     <span class="error"></span>
                  </div>
<br><br><br>
                  <div class="CTA">
                     <input type="submit" name="reg_user" value="Signup Now" id="submit">
                     <a href="#" class="switch" style="color: blue">I have an account</a>
                  </div>
               </form>
            </div><!-- End Signup Form -->
         </div>
      </div>

   </section>


  

</div>

<object align='bottom'>
         <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
            <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
         
         </div>
      </object>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./login.js"></script>

</body>
</html>