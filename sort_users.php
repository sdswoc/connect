<?php 
include('dbconfig.php');
session_start();

mysqli_query($conn, "CREATE TEMPORARY TABLE reward_pts SELECT * from userData;");
$self_ID = $_SESSION['id'];

//add reward points for hobbies


$fetch_hobbies = mysqli_query($conn, "SELECT hobbie_ID FROM `hobbieData` WHERE userID = $self_ID");
$hobbie_count = $fetch_hobbies->num_rows;
$hobbie_increment = round((37.5)/($hobbie_count), 3);
while($hobbie = $fetch_hobbies->fetch_assoc()){
    $h_id = $hobbie['hobbie_ID'];
    $fetch_h_users = mysqli_query($conn, "SELECT userID FROM `hobbieData` WHERE hobbie_ID = $h_id");

   while($row = $fetch_h_users->fetch_assoc()){
      
       $ptr_id = $row['userID'];
       
       //increment hobbie_reward by 3 points for that userID
          $fetch_h_rwd_pts = mysqli_query($conn, "SELECT rwd_pts from reward_pts where userID = $ptr_id");
          $h_rwd_pts = $fetch_h_rwd_pts->fetch_assoc();
          $h_rwd = floatval($h_rwd_pts['rwd_pts']);
          $h_rwd += $hobbie_increment;
          mysqli_query($conn, "UPDATE reward_pts SET rwd_pts = $h_rwd where userID = $ptr_id");
      }
}

//add reward points for goals


$fetch_goals = mysqli_query($conn, "SELECT goal_ID FROM `goalData` WHERE userID = $self_ID");
$goal_count = $fetch_goals->num_rows;
$goal_increment = round((62.5)/($goal_count),3);
while($goal = $fetch_goals->fetch_assoc()){
    $g_id = $goal['goal_ID']; 
    $fetch_h_users = mysqli_query($conn, "SELECT userID FROM `goalData` WHERE goal_ID = $g_id");
      while($row = $fetch_h_users->fetch_assoc()){
        $ptr_id = $row['userID'];
          //increment goal_reward by 5 points for that userID
          $fetch_g_rwd_pts = mysqli_query($conn, "SELECT rwd_pts from reward_pts where userID = $ptr_id");
          $g_rwd_pts = $fetch_g_rwd_pts->fetch_assoc();
          $g_rwd = floatval($g_rwd_pts['rwd_pts']);
          $g_rwd += $goal_increment;
          mysqli_query($conn, "UPDATE reward_pts SET rwd_pts = $g_rwd where userID = $ptr_id");
      }
}


?>