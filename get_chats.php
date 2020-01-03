<?php 

include('dbconfig.php');
session_start();

if(isset($_GET['to_ID'])){

$to_id = $_GET['to_ID'];
$self_id = $_SESSION['id'];

$get_chats_query = mysqli_query($conn, "SELECT * from chat_messages where (to_user_id=$to_id AND from_user_id=$self_id) OR (to_user_id=$self_id AND from_user_id=$to_id) ORDER BY msg_time ASC");
$msg_count = $get_chats_query->num_rows;
$output =  '';
while($row = $get_chats_query->fetch_assoc()){
if($row['to_user_id'] == $self_id && $row['from_user_id'] == $to_id){
   $date=date_create($row['msg_time']);

   $output .= '<div class="d-flex justify-content-start mb-4">';
   $output .= '<div class="img_cont_msg"><img src="" class="rounded-circle user_img_msg img_sml_'.$to_id.'"></div>';
   $output .= '<div class="msg_cotainer">'.$row['chat_message'].'<span class="msg_time">'.date_format($date,"d/m/y h:i a").'</span></div>';
   $output .= '</div>';
}
if($row['to_user_id'] == $to_id && $row['from_user_id'] == $self_id){
   $date=date_create($row['msg_time']);
   $output .= '<div class="d-flex justify-content-end mb-4">';
   $output .= '<div class="msg_cotainer_send">'.$row['chat_message'].'<span class="msg_time_send">'.date_format($date,"d/m/y h:i a").'</span></div>';
   $output .= '<div class="img_cont_msg"><img src="" class="rounded-circle user_img_msg img_sml_self_'.$self_id.'"></div>';
   $output .= '</div>';
}
}

echo $output." ".$msg_count;
}

if(isset($_GET['msg_count_id'])){
   $to_id = $_GET['msg_count_id'];
$self_id = $_SESSION['id'];

$get_chats_query = mysqli_query($conn, "SELECT * from chat_messages where (to_user_id=$to_id AND from_user_id=$self_id) OR (to_user_id=$self_id AND from_user_id=$to_id)");
$msg_count = $get_chats_query->num_rows;
echo $msg_count." Messages";
}

if(isset($_GET['get_img_id'])){
    $img_id = $_GET['get_img_id'];

    $img_link = mysqli_query($conn, "SELECT img FROM userData where userID = $img_id");
    $row = $img_link->fetch_assoc();
    $output_img_id = $row['img'];
    echo $output_img_id;
}

?>