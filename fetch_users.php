<?php
include('dbconfig.php');
// Check connection

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
</tr>';


$sql = "SELECT userID, name, username, img, bio, follow_count FROM userData ORDER BY follow_count DESC";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row["userID"];
$self_ID = $_SESSION['id'];
if($row['userID'] != $self_ID){
  echo "<tr><td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["userID"]. "</td>
<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["name"] . "</td>
<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["username"] . "</td>
<td>";
echo '<button class="btn" data-toggle="modal" data-target="#view_profile'.$id.'">';
echo "<img class = 'blue-border-image' src = '";

if(isset($row["img"])){
  echo "userImages/".$row['img'];
}
 else{ echo 'res/default.jpeg';}
 echo "' style = 'border-radius: 50%' width = 50px height = 50px></button></td>
<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["bio"] . "</td>";
echo "<td data-toggle='modal' data-target='#view_profile".$id."'>" . $row["follow_count"] . "</td>";
echo "<td>";
$msg = follow_status($conn, $id, $self_ID);
echo "<a class = 'google follow_status' style = 'padding-left: 5px; text-decoration:none; padding-right: 5px;' href = 'NewConnect.php?id=".$id."'>".$msg."</a>";
echo "</td>";
if($msg === "Requested" || $msg === "Friends"){
  echo "<td><button class = 'google follow_status' style = 'padding-left: 5px; padding-right: 5px;' onclick = unfollow(".$id.")>Unfollow</button></td>";
}
 if($msg === "Friends"){
  echo "<td><a class = 'google follow_status' style = 'padding-left: 5px; text-decoration:none; padding-right: 5px;' href = 'NewConnect.php?chat=".$id."'>Chat Now</a></td>";
  echo '<td id = "login_status'.$id.'" >Offline</td>';
}
echo "</tr>";
$msg="";

}
}
} 
else { echo "0 results"; }
$conn->close(); 
?>