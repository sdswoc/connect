<?php 
include('server.php');
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: welcome.php");
  }


  if(isset($_GET['unfollow_id'])){
    $self_ID = $_SESSION['id'];
    $id_to_unfollow = $_GET['unfollow_id'];
  if(mysqli_query($db, "DELETE FROM followerData where userID = $id_to_unfollow AND followerID = $self_ID")){
      $qr_1 = "SELECT @count := follow_count from userData where userID = $id_to_unfollow";
      $qr_2 = "SELECT @count := @count - 1";
      $qr_3 = "UPDATE userData SET follow_count = @count where userID = $id_to_unfollow";
      mysqli_query($db, $qr_1);
      mysqli_query($db, $qr_2);
      mysqli_query($db, $qr_3);
    
    header("location: NewConnect.php");
  }


  }

$id = $_SESSION['id'];
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
   $notify = "INSERT INTO notificationData (typeOf, to_userID, from_userID, message,notif_time ,seen_status) VALUES('accepted_request',$id_to_be_followed , $follower_id, '$msg',NOW(),0)";
   if(mysqli_query($db, $notify)){
    $qr_1 = "SELECT @count := follow_count from userData where userID = $id_to_be_followed";
    $qr_2 = "SELECT @count := @count + 1";
    $qr_3 = "UPDATE userData SET follow_count = @count where userID = $id_to_be_followed";
    mysqli_query($db, $qr_1);
    mysqli_query($db, $qr_2);
    mysqli_query($db, $qr_3);
  }
 }
else{
   $msg = $usrname." started following you! Follow Back?";
          
          $notify = "INSERT INTO notificationData (typeOf, to_userID, from_userID, message,notif_time , seen_status) VALUES('follow_request',$id_to_be_followed , $follower_id, '$msg', NOW(),0)";
          if(mysqli_query($db, $notify)){
            $qr_1 = "SELECT @count := follow_count from userData where userID = $id_to_be_followed";
            $qr_2 = "SELECT @count := @count + 1";
            $qr_3 = "UPDATE userData SET follow_count = @count where userID = $id_to_be_followed";
            mysqli_query($db, $qr_1);
            mysqli_query($db, $qr_2);
            mysqli_query($db, $qr_3);
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
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard.css">
        <link rel="stylesheet" type="text/css" href="rem.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
        <link rel="stylesheet" href="chat_box.css">
        <script src = "update_n_share.js"></script>
        <script src = "manage_rel.js"></script>

        

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

                    <?php  if (!isset($_SESSION['id'])) : ?>
                        <a class="google" href='  NewConnect.php'>&nbsp;&nbsp;Find New Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

                        <a class="google" href='  login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="google" href='login.php'>&nbsp;Signup&nbsp;&nbsp;</a>
                        <?php endif ?>

                            <?php  if (isset($_SESSION['id'])) : ?>
                              
                              <a id="notif_trigger" href="#" data-toggle="modal" data-target="#view_notif"  onclick = notify_alert(<?php echo $_SESSION[ 'id'] ?>) style = "text-decoration: none;"><i class = "fa fa-bell"></i>
                &nbsp;&nbsp;<span id="notif_count" style="color:white" ><?php echo $notif_count ?></span></a> &nbsp;&nbsp;
                                <a class="google" href='  welcome.php' style="text-decoration: none">&nbsp;&nbsp;Back to Dashboard&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            More Options..
                                </button>
                                        <div class="dropdown-menu" style="z-index: 2;">
                                            <a class="dropdown-item google" href='welcome.php?logout=1'>Logout</a>
                                            <a class="dropdown-item google" href='welcome.php?delete=1'>Delete my Account</a>
                                        </div>


                                        






                                <?php endif ?>
                </object>
            </object>
        </div>
        <br>
        <div class="connect">
            <center>
                <div class="signup_box info" style="height: 600px; width: 100%; overflow:auto;">
                    <br>
                    <table class="table table-dark table-hover" id="user-details">
                        
                     
                    </table>
                </div>
        </div>

        <div id="user_model_details" style="width: 400px"></div>        
        </center>
<?php
include('dbconfig.php');
$sql = "SELECT userID, name, email, bhawan, username, img, bio, branch_y, follow_count FROM userData ORDER BY follow_count DESC";
$result = mysqli_query($conn, $sql);
function hobbieID_to_name($a){
  $hobbies = array("Dancing", "Listening Music", "Cricket", "Singing", "Fooseball", "Reading Novels");
  return $hobbies[$a - 1];
}
function goalID_to_name($a){
  $goals = array("Gymming", "Tech Group", "UPSC", "Branch Change", "Internship");
  return $goals[$a - 1];
}
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
$id = $row['userID'];
  echo'
<div class="modal fade" id="view_profile'.$row['userID'].'" style = "overflow: auto;">
 <div class="modal-dialog">
    <div class="modal-content" style = "width: 600px">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">About '.$row['name'].'</h4>
            
       </div>

        <!-- Modal body -->
        <div class="modal-body">
        <center><img class = "blue-border-image" src = "';

        if(isset($row['img'])){
          echo "userImages/".$row['img'].'"';
        }
         else{ echo 'res/default.jpeg"';}
         echo "' style = 'border-radius: 50%' width = 250px height = 250px></center>
         <hr>";
$fetch_hobbies = mysqli_query($conn, "SELECT * from hobbieData where userID = $id");
$fetch_goals = mysqli_query($conn, "SELECT * from goalData where userID = $id");
$hobbie_count = $fetch_hobbies->num_rows;
$goal_count = $fetch_goals->num_rows;

echo '<table class="table table-hover"><th>Hobbies</th><th>Goals</th>';
if($hobbie_count > $goal_count){
  while($row_h = $fetch_hobbies->fetch_assoc()){
  $row_g = $fetch_goals->fetch_assoc();
echo '<tr><td>'.hobbieID_to_name($row_h['hobbie_ID']).'</td>';
  echo '<td>'.goalID_to_name($row_g['goal_ID']).'</td></tr>';
  }
}
else{
  while($row_g = $fetch_goals->fetch_assoc()){
    $row_h = $fetch_hobbies->fetch_assoc();
  echo '<tr><td>'.hobbieID_to_name($row_h['hobbie_ID']).'</td>';
    echo '<td>'.goalID_to_name($row_g['goal_ID']).'</td></tr>';
    }
}
  
echo '</table>';
echo '<br><br><table class="table table-hover">
<tr><td><b>Email :<b></td><td>'.$row['email'].'</td></tr>
<tr><td><b>Bhawan :<b></td><td>'.$row['bhawan'].'</td></tr>
<tr><td><b>Branch/Year :<b></td><td>'.$row['branch_y'].'</td></tr>

</table>';


       echo '</div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
 </div>
</div>'  ;
}
}  
?>

<input id = "hidden_selfID" type="hidden" value="<?php echo $_SESSION['id'] ?>"/>
<div class="modal fade" id="view_notif">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 35vw; height: auto; overflow: auto;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Notifications! &emsp;&emsp;<i class="fa fa-bell" style="color: blue"></i></h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="msg_window">
                                <table id='notif_panel' class="table table-hover text-center">
                                  
                            
                                </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
            <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
           <object align = 'right'><?php echo $_SESSION['username'] ?></object>

        </div>