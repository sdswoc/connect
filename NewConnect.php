<?php 
include('server.php');
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: welcome.php");
  }

$id = $_SESSION['id'];
  $notifications = mysqli_query($db, "SELECT * FROM notificationData WHERE to_userID = $id && seen_status = 0");
  $notif_count = $notifications->num_rows;  
  if (isset($_GET['id'])) {
   $follower_id = $_SESSION['id'];
   $id_to_be_followed = $_GET['id'];
   if($follower_id != $id_to_be_followed){

     $existing_query = "SELECT * from followerData where userID = $id_to_be_followed AND followerID = $follower_id";
     $redundancy_check = mysqli_query($db, $existing_query);

     if(mysqli_num_rows($redundancy_check) == 0){

        $sql = "INSERT INTO followerData (userID, followerID) VALUES($id_to_be_followed,$follower_id)";
       if(mysqli_query($db, $sql)){
         $usrname = $_SESSION['username'];

        $check_1 = mysqli_query($db,"SELECT * from followerData where userID = $id_to_be_followed AND followerID = $follower_id");
        $check_2 = mysqli_query($db,"SELECT * from followerData where userID = $follower_id AND followerID = $id_to_be_followed");
 if(mysqli_num_rows($check_1) == 1 && mysqli_num_rows($check_2) == 1 ){
   $msg = $usrname." followed you back!";
   $notify = "INSERT INTO notificationData (typeOf, to_userID, from_userID, message, seen_status) VALUES('accepted_request',$id_to_be_followed , $follower_id, '$msg',0)";
   mysqli_query($db, $notify);
 }
else{
   $msg = $usrname." started following you! Follow Back?";
          
          $notify = "INSERT INTO notificationData (typeOf, to_userID, from_userID, message, seen_status) VALUES('follow_request',$id_to_be_followed , $follower_id, '$msg',0)";
          if(mysqli_query($db, $notify)){
            $dyn_update = "SELECT @count:= follow_count from userData where userID = $id_to_be_followed;
            SELECT @count := @count + 1; UPDATE userData SET follow_count = @count where userID = $id_to_be_followed";
              mysqli_query($db, $dyn_update);
          }
}        
     }  
  }

 }
}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Connect@IIT-R</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="sample.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard.css">
        <link rel="stylesheet" type="text/css" href="rem.css">
        <script src = "update_n_share.js"></script>

    </head>

    <body bgcolor="#FFFFFF">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

        <div class="test2">
        &nbsp;&nbsp;&nbsp;&nbsp;<a href='  index.php'><img src="res/gplogo2.png" height='110px' width='110px' style = "border-radius: 10px;"></a>
            <object align="right">
                <br>
                <br>
                <object align='right'>

                    <?php  if (!isset($_SESSION['username'])) : ?>
                        <a class="google" href='  NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

                        <a class="google" href='  login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="google" href='  finalsignup.php'>&nbsp;Signup&nbsp;&nbsp;</a>
                        <?php endif ?>

                            <?php  if (isset($_SESSION['username'])) : ?>
                              <a id="notif_trigger" href="#" onclick = notify_alert(<?php echo $_SESSION[ 'id'] ?>) style = "text-decoration: none;"><i class = "fa fa-bell"></i>
                &nbsp;&nbsp;<span style="color:white" ><?php echo $notif_count ?></span</a> &nbsp;&nbsp;
                                <a class="google" href='  welcome.php' style="text-decoration: none;">&nbsp;&nbsp;Back to Dashboard&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            More Options..
                                </button>
                                        <div class="dropdown-menu" style="z-index: 2;">
                                            <a class="dropdown-item google" href='welcome.php?logout=1'>Logout</a>
                                            <a class="dropdown-item google" href='finalsignup.php'>Signup</a>
                                            <a class="dropdown-item google" href='welcome.php?delete=1'>Delete my Account</a>
                                        </div>
                                <?php endif ?>
                </object>
            </object>
        </div>
        <br>
        <div class="connect">
            <center>
                <div class="signup_box info" style="height: 600px; width: 90%; overflow:auto;">
                    <br>
                    <table class="table table-dark table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Profile Pic</th>  
                            <th>Bio</th>
                            <th>No. of Followers </th>
                            <th>Follow Status</th>
                        </tr>
                        <?php
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");
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

$sql = "SELECT userID, name, username, img, bio, follow_count FROM userData";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row["userID"];
$self_ID = $_SESSION['id'];
if($row['userID'] != $self_ID){
  echo "<tr><td>" . $row["userID"]. "</td>
<td>" . $row["name"] . "</td>
<td>" . $row["username"] . "</td>
<td><img src = '";

if(isset($row["img"])){
  echo "userImages/".$row['img'];
}
 else{ echo 'res/default.jpeg';}
 echo "' style = 'border-radius: 50%' width = 50px height = 50px></td>
<td>" . $row["bio"] . "</td>";
echo "<td>" . $row["follow_count"] . "</td>";

echo "<td>";
$msg = follow_status($conn, $id, $self_ID);
echo "<a class = 'google follow_status' style = 'padding-left: 5px; text-decoration:none; padding-right: 5px;' href = 'NewConnect.php?id=".$id."'>".$msg."</a>";
echo "</td>";
}


}
} 
else { echo "0 results"; }
$conn->close(); 
?>
                            </tr>

                    </table>
                </div>
        </div>
        </center>

        <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
            <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
           <object align = 'right'><?php echo $_SESSION['username'] ?></object>

        </div>