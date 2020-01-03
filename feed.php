<?php 
session_start();
include('dbconfig.php');
$id = $_SESSION['id'];
$name = $_SESSION['username'];
if(isset($_GET['msg'])){
//share message to all the followers 
 
$msg = mysqli_real_escape_string($conn, $_GET['msg']);
if($msg != ""){
    if(mysqli_query($conn, "INSERT INTO `publicMessageData` (`from_ID`, `audience_ID`, `message`, `posting_time`) VALUES ($id, '1' , '$msg', CURRENT_TIMESTAMP())")){
   $fetch_followers = mysqli_query($conn, "SELECT * from followerData WHERE userID = $id");
   $follow_count = $fetch_followers->num_rows ;
   while($row = $fetch_followers->fetch_assoc()){
       $receiver_id = $row['followerID'];
       $msg = $name." shared a message recently!";
       mysqli_query($conn, "INSERT INTO `notificationData` (`typeOf`, `to_userID`, `from_userID`, `message`, `seen_status`) VALUES ('msg_post', $receiver_id , $id , '$msg', '0')");
   }
   echo "<br>Successfully shared with ".$follow_count." followers!";
   
}
else{
    echo "<br>Couldn't share! We're Sorry!";
}
}
}

?>

