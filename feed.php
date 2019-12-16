<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");
$id = $_SESSION['id'];
if(isset($_GET['msg'])){
//share message to all the followers 

$msg = mysqli_real_escape_string($conn, $_GET['msg']);
if($msg != ""){
    if(mysqli_query($conn, "INSERT INTO `publicMessageData` (`from_ID`, `audience_ID`, `message`) VALUES ($id, '1' , '$msg')")){
    echo "<br>Successfully shared with your followers!";
}
else{
    echo "Couldn't share! We're Sorry!";
}
}
}

?>

