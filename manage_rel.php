<?php
include('dbconfig.php');
session_start();
if(isset($_GET['unfollow_id'])){
    $self_ID = $_SESSION['id'];
    $id_to_unfollow = $_GET['unfollow_id'];
  if(mysqli_query($conn, "DELETE FROM followerData where userID = $id_to_unfollow AND followerID = $self_ID")){
      $qr_1 = "SELECT @count := follow_count from userData where userID = $id_to_unfollow";
      $qr_2 = "SELECT @count := @count - 1";
      $qr_3 = "UPDATE userData SET follow_count = @count where userID = $id_to_unfollow";
      mysqli_query($conn, $qr_1);
      mysqli_query($conn, $qr_2);
      mysqli_query($conn, $qr_3);
      echo "Unfollowed";
  }
  }

  ?>

