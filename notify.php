<?php

session_start();
include('dbconfig.php');$id = $_SESSION['id'];
$notifications = mysqli_query($conn, "SELECT * FROM notificationData WHERE to_userID = $id && seen_status = 0");

mysqli_query($conn, "DELETE from notificationData WHERE seen_status = 1");
if(isset($_GET['id'])){ 
    
    if ($notifications->num_rows > 0) {
    // output data of each row
    $i = 1;
    echo "  <tr><th>Sr. No.</th><th>Message</th><th>Time</th><th></th></tr>";
    while($row = $notifications->fetch_assoc()) {
    $ntf_id = $row['notif_id'];
    $date=date_create($row['notif_time']);
       echo "<tr><td>".$i."</td><td>".$row['message']."</td><td>".date_format($date,"d/m/y h:i a")."</td>";
       mysqli_query($conn, "UPDATE notificationData SET seen_status = 1 WHERE notif_id = $ntf_id");
       $i += 1;
       if($row['typeOf'] == "follow_request"){echo "<td><a class='google' style='text-decoration: none' href='NewConnect.php'>Follow Back</a></td></tr>";}
       elseif($row['typeOf'] == "accepted_request"){echo "<td><a class='google' style='text-decoration: none' href='NewConnect.php'>Chat Now</a></td></tr>";}
       else{echo "</tr>";}

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

if(isset($_GET['branch_update_id'])){
    $selfID = mysqli_real_escape_string($conn, $_GET['branch_update_id']);
    $branch_retrieve = addslashes($_GET['branch']);
    if(mysqli_query($conn, "UPDATE userData SET branch_y = '$branch_retrieve' WHERE userID = $selfID")){
        echo "Branch/Year updated!";
    }
    else{
        echo "Failed to update Branch/Year!";
    }
}

if(isset($_GET['email_update_id'])){
    function email_validation($str) { 
        return (!preg_match( 
      "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
            ? FALSE : TRUE; 
      }
    $selfID = mysqli_real_escape_string($conn, $_GET['email_update_id']);
    $email_retrieve = addslashes($_GET['email']);
    if(email_validation($email_retrieve)){
    if(mysqli_query($conn, "UPDATE userData SET email = '$email_retrieve' WHERE userID = $selfID")){
        echo "Email updated!";
    }
}
    else{
        echo "Failed to update Email!";
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