<?php

session_start();
$message = "";
$username = "";
$email = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', 'abiit@2019', 'rconnect');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
 
  $all_users = mysqli_query($db, "SELECT * FROM userData;");
  $user_count = mysqli_num_rows($all_users);
if(isset($_POST['reg_user'])){
  function email_validation($str) { 
    return (!preg_match( 
  "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
  }
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']); 
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $enrl = mysqli_real_escape_string($db, $_POST['enrl']);
    $branch_y = mysqli_real_escape_string($db, $_POST['branch_y']);
    $bhawan = mysqli_real_escape_string($db, $_POST['bhawan']);
    $bio = "Hey! I am ";
if (empty($username)) { array_push($errors, "Username is required"); $no_username = "Username is required"; }
if (empty($email)) { array_push($errors, "Email is required"); $no_email = "Email is required";}
if (empty($name)) { array_push($errors, "Name is required"); $no_name = "Name is required";}
if (empty($enrl)) { array_push($errors, "Enrl. No. is required"); $no_enrl = "Enrl. No. is required"; }
if (empty($bhawan)) { array_push($errors, "Bhawan is required"); $no_bhawan = "Bhawan is required";}
if (empty($password_1)) { array_push($errors, "Password is required"); $no_password = "Password is required";}
if (empty($branch_y)) { array_push($errors, "Branch/Year Required");}

if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match"); $password_mismatch = "The two passwords do not match"; }

//regex check for e-mail

if(!email_validation($email)){array_push($errors, "Enter valid E-mail ID!");}
if(strlen($enrl) != 8){array_push($errors, "Enter valid ENRL. NO.");}

$user_check_query = "SELECT * from userData where username = '$username' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }  

  if (count($errors) == 0) {
    $password = ($password_1);
    $query = "INSERT INTO userData (name, enrl, bhawan, username, email, password, bio, branch_y) 
              VALUES('$name','$enrl','$bhawan','$username', '$email', '$password', '$bio$name', '$branch_y');";
        mysqli_query($db, $query);
        header('location: login.php');
    }
   
}

  if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
if (empty($username)) { array_push($errors, "Username is required"); 
$no_username = "Username is required";
}

  if (empty($password)) { array_push($errors, "Password is required");
  $no_password = "Password is required";
  }



if(count($errors) == 0){
    $query = "SELECT * FROM userData WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_array($result)){
            $_SESSION['id'] = $row['userID'];
            $_SESSION['bhawan'] = $row['bhawan'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['img'] = $row['img'];
            $_SESSION['bio'] = $row['bio'];
        }
$id = $_SESSION['id'];

$fetch_last_activity = mysqli_query($db, "SELECT * from login_details where userID =$id");
if($fetch_last_activity->num_rows == 0){
  $last_activity = "INSERT INTO login_details (userID, last_activity) VALUES ($id, NOW())";
  mysqli_query($db, $last_activity);
}
else{
  $last_activity = "UPDATE login_details SET last_activity = NOW() where userID = $id";
  mysqli_query($db, $last_activity);
}
       
            $_SESSION['username'] = $username;  
            $_SESSION['success'] = 1;
        header('location: welcome.php');
}
}
}
  
  ?>