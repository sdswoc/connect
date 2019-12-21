<?php 
session_start();
include('dbconfig.php');
  $path_parts = pathinfo($_FILES["profileImage"]["name"]);
$extension = $path_parts['extension'];
$userID = $_SESSION['id'];
  $newName = $userID.".".$extension;

if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], "userImages/".$newName)){
 $_SESSION['img'] = $newName;
  
    $sql = "UPDATE userData SET img = '$newName' where userID = $userID";
    if(mysqli_query($conn, $sql)){
        
        header('location: welcome.php');
   }
}


?>
