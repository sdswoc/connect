<?php 
include('dbconfig.php');
session_start();

mysqli_query($conn, "CREATE TEMPORARY TABLE reward_pts SELECT * from userData;");
$self_ID = $_SESSION['id'];

//add reward points for hobbies

$fetch_hobbies = mysqli_query($conn, "SELECT hobbie_ID FROM `hobbieData` WHERE userID = $self_ID");
while($hobbie = $fetch_hobbies->fetch_assoc()){
    $h_id = $hobbie['hobbie_ID'];
    $fetch_h_users = mysqli_query($conn, "SELECT userID FROM `hobbieData` WHERE hobbie_ID = $h_id");
      while($row = $fetch_h_users->fetch_assoc()){
        $ptr_id = $row['userID'];
          //increment hobbie_reward by 3 points for that userID
          mysqli_query($conn, "SELECT @pt_count := rwd_pts from reward_pts where userID = $ptr_id");
          mysqli_query($conn, "SELECT @pt_count := @pt_count + 3");
          mysqli_query($conn, "UPDATE reward_pts SET rwd_pts = @pt_count where userID = $ptr_id");
      }
}

$fetch_goals = mysqli_query($conn, "SELECT goal_ID FROM `goalData` WHERE userID = $self_ID");
while($goal = $fetch_goals->fetch_assoc()){
    $g_id = $goal['goal_ID'];
    $fetch_h_users = mysqli_query($conn, "SELECT userID FROM `goalData` WHERE goal_ID = $g_id");
      while($row = $fetch_h_users->fetch_assoc()){
        $ptr_id = $row['userID'];
          //increment goal_reward by 5 points for that userID
          mysqli_query($conn, "SELECT @pt_count := rwd_pts from reward_pts where userID = $ptr_id");
          mysqli_query($conn, "SELECT @pt_count := @pt_count + 5");
          mysqli_query($conn, "UPDATE reward_pts SET rwd_pts = @pt_count where userID = $ptr_id");
      }
}


?>