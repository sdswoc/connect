<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");

$notifications = mysqli_query($conn, "SELECT * FROM notificationData WHERE to_userID = $id && seen_status = 0");
if ($notifications->num_rows > 0) {
    // output data of each row
    while($row = $notifications->fetch_assoc()) {
    $ntf_id = $row['notif_id'];
       echo $row['message'];
       mysqli_query($conn, "UPDATE notificationData SET seen_status = 1 WHERE notif_id = $ntf_id");
    }
}
else{
    echo "0";
}