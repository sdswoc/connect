<?php 

include('dbconfig.php');
session_start();


$to_id = $_GET['to_id'];
$from_id = $_SESSION['id'];
$msg = mysqli_real_escape_string($conn, $_GET['chat_msg']);

$insert_chat_query = "INSERT INTO chat_messages (to_user_id, from_user_id, chat_message, msg_time,status) VALUES ($to_id, $from_id, '$msg', NOW() ,0)";

if(mysqli_query($conn, $insert_chat_query)){
    echo "Success!";
}


?>