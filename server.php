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
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']); 
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $enrl = mysqli_real_escape_string($db, $_POST['enrl']);
    $bhawan = mysqli_real_escape_string($db, $_POST['bhawan']);

if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password_1)) { array_push($errors, "Password is required"); }
if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match"); }

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
    $password = $password_1;
    $query = "INSERT INTO userData (name, enrl, bhawan, username, email, password) 
              VALUES('$name','$enrl','$bhawan','$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = 1;
    header('location: welcome.php');
}
  }


  if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }
if(count($errors) == 0){
    $query = "SELECT * FROM userData WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
   
    if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_array($result)){
            $_SESSION['id'] = $row['userID'];
            $_SESSION['bhawan'] = $row['bhawan'];
            $_SESSION['name'] = $row['name'];
        }
        $_SESSION['username'] = $username;  
        
        $_SESSION['success'] = 1;
        header('location: welcome.php');
}
}
}
  
  ?>