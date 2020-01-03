<?php
include('dbconfig.php');
include('sort_users.php');
// Check connection

session_start();

echo '<tr>
<th>Id</th>
<th>Name</th>
<th>Username</th>
<th>Profile Pic</th>  
<th>Bio</th>
<th>No. of Followers </th>
<th>Follow Status</th>
<th></th><th></th>
<th>Status</th>
<th>Relative Match</th>
</tr>';


$sql = "SELECT userID, name, username, img, bio, follow_count, rwd_pts FROM reward_pts ORDER BY rwd_pts DESC, follow_count DESC";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    function follow_status($conn, $id, $self_ID){

        $query = "SELECT * from followerData where userID = $id AND followerID = $self_ID";
        $check = mysqli_query($conn, $query);
        $friend_query = "SELECT * from followerData where userID = $self_ID AND followerID = $id";
        $check_2 = mysqli_query($conn, $friend_query);
        if(mysqli_num_rows($check) == 1 && mysqli_num_rows($check_2) == 1){
          $msg_return = "Friends";
        };
        if(mysqli_num_rows($check) == 0 && mysqli_num_rows($check_2) == 1){
          $msg_return = "Follow Back";
        };
        if(mysqli_num_rows($check) == 1 && mysqli_num_rows($check_2) == 0){
          $msg_return = "Requested";
        };
        if(mysqli_num_rows($check) == 0 && mysqli_num_rows($check_2) == 0){
          $msg_return = "Follow";
        };
      
        return $msg_return;
      }
// output data of each row
while($row = $result->fetch_assoc()) {
  

//$time = mysqli_query($conn, "")

$id = $row["userID"];
$self_ID = $_SESSION['id'];

$fetch_last_activity = mysqli_query($conn, "SELECT * from login_details where userID =$id");
$row_time = $fetch_last_activity->fetch_assoc();

$user_last_activity = $row_time['last_activity'];

$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

 if($user_last_activity > $current_timestamp){
   $status = "ONLINE";
 }
 else{
   $status = "OFFLINE";
 }


if($row['userID'] != $self_ID){
  echo "<tr><td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["userID"]. "</td>
<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["name"] . "</td>
<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["username"] . "</td>
<td>";
echo '<div><button class="btn" data-toggle="modal" data-target="#view_profile'.$id.'">';
echo "<img class='rounded-circle user_img' src = '";

if(isset($row["img"])){
  echo "userImages/".$row['img'];
}
 else{ echo 'res/default.jpeg';}
 echo "'></button></div>";
 
echo '</td>';
echo "<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["bio"] . "</td>";
echo "<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["follow_count"] . "</td>";
echo "<td>";
$msg = follow_status($conn, $id, $self_ID);
echo "<a class = 'google follow_status' style = 'padding-left: 5px; text-decoration:none; padding-right: 5px;' href = 'NewConnect.php?id=".$id."'>".$msg."</a>";
echo "</td>";
if($msg === "Requested" || $msg === "Friends"){
  echo "<td><button class = 'google follow_status' style = 'padding-left: 5px; padding-right: 5px;' onclick = unfollow(".$id.")>Unfollow</button></td>";
}
else{echo "<td></td><td></td>";}
if($msg === "Requested"){echo "<td></td>";}
 if($msg === "Friends"){
  echo "<td><button class = 'start_chat' data-touserid='".$row['userID']."' data-tousername='".$row['username']."' style = 'padding-left: 5px; text-decoration:none; padding-right: 5px;'>
  Chat Now</button></td>";
  echo '<td id="status_'.$row['userID'].'">'.$status.'</td>';
}
else{echo "<td></td>";}

echo "<td>".$row['rwd_pts']." % </td>";
echo "</tr>";
}
}
} 
else { echo "0 results"; }
$conn->close(); 
?>