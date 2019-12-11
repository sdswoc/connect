<?php 

$db = mysqli_connect('localhost', 'root', 'abiit@2019', 'rconnect');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
$msg_error ="NOT SAVED YET!!";

$path_parts = pathinfo($_FILES["profileImage"]["name"]);
$extension = $path_parts['extension'];
$newName = $userID.".".$extension;
if (!isset($_POST['profileImage'])) {
  $userID = mysqli_real_escape_string($db, $_POST['id']);
  
if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], "userImages/".$newName)){
 $_SESSION['img'] = $newName;
 
  $msg_error = "FINALLY SAVED!";
    $sql = "UPDATE userData SET img = '$newName' where userID = $userID;";
    if(mysqli_query($db, $sql)){
        header('location: welcome.php');
   }
}
}

?>
