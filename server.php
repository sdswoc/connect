<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

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
 
  $all_users = mysqli_query($db, "SELECT COUNT(*) AS COUNT FROM userData;");
  $count = $all_users->fetch_assoc();
  $user_count = $count['COUNT'];  
if(isset($_POST['reg_user'])){
  /*function email_validation($str) { 
    return (!preg_match( 
  "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
  }*/
    $username = mysqli_real_escape_string($db, $_POST['reg_username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['passwordCon']); 
    $name = mysqli_real_escape_string($db, $_POST['reg_name']);
    $enrl = mysqli_real_escape_string($db, $_POST['enrl']);
    $branch_y = mysqli_real_escape_string($db, $_POST['branch_y']);
    $bhawan = mysqli_real_escape_string($db, $_POST['bhawan']);
    $bio = "Hey! I am ";
/*if (empty($username)) { array_push($errors, "Username is required"); $no_username = "Username is required"; }
if (empty($email)) { array_push($errors, "Email is required"); $no_email = "Email is required";}
if (empty($name)) { array_push($errors, "Name is required"); $no_name = "Name is required";}
if (empty($enrl)) { array_push($errors, "Enrl. No. is required"); $no_enrl = "Enrl. No. is required"; }
if (empty($bhawan)) { array_push($errors, "Bhawan is required"); $no_bhawan = "Bhawan is required";}
if (empty($password_1)) { array_push($errors, "Password is required"); $no_password = "Password is required";}
if (empty($branch_y)) { array_push($errors, "Branch/Year Required");}

if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match"); $password_mismatch = "The two passwords do not match"; }

//regex check for e-mail

if(!email_validation($email)){array_push($errors, "Enter valid E-mail ID!");}
if(strlen($enrl) != 8){array_push($errors, "Enter valid ENRL. NO.");}*/

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
    $hashed_password = password_hash($password_1, PASSWORD_BCRYPT);
    $query = "INSERT INTO userData (name, enrl, bhawan, username, email, password, bio, branch_y) 
              VALUES('$name','$enrl','$bhawan','$username', '$email', '$hashed_password', '$bio$name', '$branch_y');";
        if(mysqli_query($db, $query)){
          echo "Success!";
        }

        $get_user = "SELECT * FROM userData WHERE username='$username'";
        $result = mysqli_query($db, $get_user);
    
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                $_SESSION['id'] = $row['userID'];
                $_SESSION['bhawan'] = $row['bhawan'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['img'] = $row['img'];
                $_SESSION['bio'] = $row['bio'];
                $_SESSION['username'] = $row['username'];
            }
    }
   
}
}

  if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //password_matching_code
    $get_hash = mysqli_query($db, "SELECT password from userData where username='$username'");
    $user_pass = $get_hash->fetch_assoc();
    if(password_verify($password, $user_pass['password'])){
      echo "1";
      $query = "SELECT * FROM userData WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_array($result)){
            $_SESSION['id'] = $row['userID'];
            $_SESSION['bhawan'] = $row['bhawan'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['img'] = $row['img'];
            $_SESSION['bio'] = $row['bio'];
            $_SESSION['username'] = $row['username'];
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
        //header('location: welcome.php');
}
    }
    else{
      array_push($errors, "1");
      echo "Error!";
    }
    
}
  
?>