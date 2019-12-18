<?php 
session_start();
$db = mysqli_connect('localhost', 'root', 'abiit@2019', 'rconnect');

  $path_parts = pathinfo($_FILES["profileImage"]["name"]);
$extension = $path_parts['extension'];
$userID = $_SESSION['id'];
  $newName = $userID.".".$extension;

if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], "userImages/".$newName)){
 $_SESSION['img'] = $newName;
  
    $sql = "UPDATE userData SET img = '$newName' where userID = $userID";
    if(mysqli_query($db, $sql)){
        
        header('location: welcome.php');
   }
}


?>
