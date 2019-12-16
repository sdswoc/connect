<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");
if(isset($_GET['msg'])){
//share message to all the followers 
$id = $_SESSION['id'];
$msg = $_GET['msg'];
if($msg != ""){
    if(mysqli_query($conn, "INSERT INTO `publicMessageData` (`from_ID`, `audience_ID`, `message`) VALUES ($id, '1' , '$msg')")){
    echo "Successfully shared with your followers!";
}
else{
    echo "Couldn\'t share! We\'re Sorry!";
}
}
}

?>