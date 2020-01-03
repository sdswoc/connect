<?php
session_start();
$selfID = $_SESSION['id'];
include('dbconfig.php');

if(isset($_GET['update_login_status_id'])){
$selfID = $_SESSION['id'];
   $last_activity = "UPDATE login_details SET last_activity = now() where userID = $selfID";
   mysqli_query($conn, $last_activity);
}

if(isset($_GET['notif_count'])){
    $id = $_SESSION['id'];
    $notifications = mysqli_query($conn, "SELECT * FROM notificationData WHERE to_userID = $id && seen_status = 0");
  $notif_count = $notifications->num_rows;
  echo $notif_count;  
}

if(isset($_GET['h_id'])){

$hobbieID = mysqli_real_escape_string($conn, $_GET['h_id']); 
$existing_row = mysqli_query($conn, "SELECT * from hobbieData where userID = $selfID AND hobbie_ID = $hobbieID");
if(mysqli_num_rows($existing_row) == 0 && mysqli_query($conn, "INSERT INTO `hobbieData` (`userID`, `hobbie_ID`) VALUES ($selfID, $hobbieID)")){
    echo "canAdd";
}
else{
    echo "Already added!";
}
}

if(isset($_GET['h_delete_id'])){

    $remove_id = mysqli_real_escape_string($conn, $_GET['h_delete_id']);
    $delete_query = "DELETE FROM hobbieData WHERE userID = $selfID AND hobbie_ID = $remove_id";
    if(mysqli_query($conn, $delete_query)){
        echo "Deleted!";
    }
    else{
        echo "Couldn't Delete!";
    }
    
}



///////

if(isset($_GET['g_id'])){

    $goalID = mysqli_real_escape_string($conn, $_GET['g_id']); 
    $existing_row = mysqli_query($conn, "SELECT * from goalData where userID = $selfID AND goal_ID = $goalID");
    if(mysqli_num_rows($existing_row) == 0 && mysqli_query($conn, "INSERT INTO `goalData` (`userID`, `goal_ID`) VALUES ($selfID, $goalID)")){
        echo "canAdd";
    }
    else{
        echo "Already added!";
    }
    }
    
    if(isset($_GET['g_delete_id'])){
    
        $remove_id = mysqli_real_escape_string($conn, $_GET['g_delete_id']);
        $delete_query = "DELETE FROM goalData WHERE userID = $selfID AND goal_ID = $remove_id";
        if(mysqli_query($conn, $delete_query)){
            echo "Deleted!";
        }
        else{
            echo "Couldn't Delete!";
        }
        
    }
?>