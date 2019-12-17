<?php

session_start();
include('dbconfig.php');$id = $_SESSION['id'];
$notifications = mysqli_query($conn, "SELECT * FROM notificationData WHERE to_userID = $id && seen_status = 0");

if(isset($_GET['id'])){
    
    if ($notifications->num_rows > 0) {
    // output data of each row
    while($row = $notifications->fetch_assoc()) {
    $ntf_id = $row['notif_id'];
       echo $row['message']."\n";
       mysqli_query($conn, "UPDATE notificationData SET seen_status = 1 WHERE notif_id = $ntf_id");
    }
}
else{
    echo "0";
}

}

if(isset($_GET['bio_update_id'])){
    $selfID = mysqli_real_escape_string($conn, $_GET['bio_update_id']);
    $bio_retrieve = addslashes($_GET['bio']);
    if(mysqli_query($conn, "UPDATE userData SET bio = '$bio_retrieve' WHERE userID = $selfID")){
        echo "Bio updated!";
    }
    else{
        echo "Failed to update Bio";
    }
}

if(isset($_GET['bhawan_update_id'])){
    $selfID = mysqli_real_escape_string($conn,$_GET['bhawan_update_id']);
    $bhawan_retrieve = mysqli_real_escape_string($conn,$_GET['bhawan']);
    if(mysqli_query($conn, "UPDATE userData SET bhawan = '$bhawan_retrieve' WHERE userID = $selfID")){
        echo "Bhawan updated!";
    }
    else{
        echo "Failed to update Bhawan";
    }
}


?>