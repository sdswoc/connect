<?php 
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
include('server.php');
session_start();
  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: welcome.php");
  }

  if (isset($_GET['delete'])) {
    $temp = $_SESSION['id'];
    $sql_1 = "DELETE FROM userData where userID = $temp";
    $sql_2 = "DELETE FROM followerData where followerID = $temp";
    $sql_3 = "DELETE FROM hobbieData where userID = $temp";
    $sql_4 = "DELETE FROM goalData where userID = $temp";
    mysqli_query($db, $sql_1); 
    mysqli_query($db, $sql_2);
    mysqli_query($db, $sql_3);
    mysqli_query($db, $sql_4);
    session_unset();
    session_destroy();
    header("location: login.php") AND die();
} 
$id = $_SESSION['id'];
$sql_1 = "SELECT @var1 := COUNT(*) from followerData where userID = $id";
$sql_2 = "UPDATE userData SET follow_count = @var1 where userID = $id";
mysqli_query($db, $sql_1);
mysqli_query($db, $sql_2);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Welcome
            <?php echo $_SESSION['name'] ?>
        </title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="list.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard.css">
        <link rel="stylesheet" type="text/css" href="rem.css">
        <script src="update_n_share.js"></script>
        <script src="list.js"></script>
<script src="profileUpdate.js"></script>

       
    </head>

    <body bgcolor="#FFFFFF" onload = add_cross()>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

        <div class="test2">
            &nbsp;&nbsp;&nbsp;&nbsp;
  

  <a href='index.php'> <img src="res/gplogo2.png" height='110px' width='110px' style="border-radius: 10px;"> </a>
            
            
            
            
            
            <object align="right">
                <br>
                <br>
                <object align='right'>
                <button type="button" class="shiney-button" data-toggle="modal" data-target="#view_messages"  onclick = view_messages()>&ensp;
                <i class="fa fa-comment"></i>&ensp;View Message-Posts&ensp;</button>&emsp;
                <button type="button" class="shiney-button-2" data-toggle="modal" data-target="#post_message">&ensp;
                <i class="fa fa-envelope"></i>&ensp;Post something&ensp;</button>
               
       &emsp;             <a id="notif_trigger" href="#" onclick=notify_alert(<?php echo $_SESSION['id'] ?>) data-toggle="modal" data-target="#view_notif" style = "text-decoration: none;"><i class = "fa fa-bell"></i>
                &nbsp;&nbsp;<span id = "notif_count" style="color:white" class="counter counter-lg"><?php echo $notif_count ?></span></a> &nbsp;&nbsp;
                    <a class="btn btn-primary" role = "button" href='NewConnect.php' style="text-decoration: none;">&nbsp;&nbsp;View Connections&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;

                    <?php  if (!isset($_SESSION['id'])) : ?>
                        <a class="google" href='login.php'>
        &nbsp;&nbsp;Login&nbsp;&nbsp;
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="google" href='login.php'>&nbsp;Signup&nbsp;&nbsp;</a>
                        <?php endif ?>

                            <?php  if (isset($_SESSION['id'])) : ?>
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
        <br>
        <br>
        <br>
        <?php  if (isset($_SESSION['id'])) : ?>
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
            <div class="modal fade" id="post_message" style = "overflow: auto;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 30vw;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Share something with your followers!</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                            <input id = "msg_post" class = "col-xs-3 inputlg form-control" rows=1 style = "width: 80%; overflow: auto; "> </input><br>
                            <input placeholder="Share with..?"  list = "audience" id = "audience_id" font-family= 'Comic Sans MS'>
                                    
                                    <datalist id="audience">
                                        <option value="1">Friends
                                            <option value="2">Followers
                                                <option value="3">Public
                                        
                                    </datalist>
                            <p id="msg_status"></p>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                           
                           <button type="button" class="btn btn-secondary" onclick = msg_post()>Share</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="view_messages">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 50vw; height: 40vw; overflow: auto;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Messages from: FOLLOWING</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="msg_window">
                                <table id = "public-message-container" class = "table table-hover">
                              
                               </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row" style="z-index: 0; flex-box: wrap;">
                <div class="column">
                    <div class="signup_box" style="height: 400px; width: 90%; overflow: auto">
                        <br>
                        <center>
                            <?php 
$userID = $_SESSION['id'];
include('updateDP.php') ?>
                                <form action="welcome.php" method="post" enctype="multipart/form-data">
<span class="img-div">
              <div class="img-placeholder"  onClick="triggerClick()">
               <h4>Update image</h4>
              </div>
              <img src="<?php 
                if(isset($_SESSION['img'])){
                    echo "userImages/".$_SESSION['img'];
                }
                else{
                    echo "res/default.jpeg";
                }
              
              ?>"  onClick="triggerClick()" id="profileDisplay">
</span>

                                    <input type="file" name="profileImage" onChange="displayImage(this); this.form.submit();" id="profileImage" class="form-control" style="display: none;">
                                    <input type="text" name="id" value="<?php echo $_SESSION['id'] ?>" style="display:none" />
                                </form>
                        </center>
                        <br>

                        <?php
include('dbconfig.php');// Check connection
$id = $_SESSION['id'];
$sql = "SELECT follow_count, bio, branch_y, email FROM userData where userID = $id";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
// output data of each row
$row = $result->fetch_assoc();
$followers_count = $row['follow_count'];
$email = $row['email'];
$branch_y =  $row['branch_y'];
$bio = $row['bio'];
$bhawan = $_SESSION['bhawan'];
}

$conn->close();
?>
                            <table class="table" style = "color:white; ">
    <div id = "I-card ">
        <th> </th>
     <th> <h4><?php echo $_SESSION['name']; ?></h4></th>
   <tr> <div class="form-group ">
 <td> <span> Bio:</span> </td><td><textarea id = "bio" class = "col-xs-3 inputsm form-control" rows=1 style = "width: 80%; overflow: auto; " onchange=updateBio(<?php echo $_SESSION['id'] ?>) ><?php echo $bio ?></textarea></td></tr>
 <tr><td> <span> Bhawan:</span> </td> 
 <td> <input placeholder="<?php echo $_SESSION['bhawan'] ?>" onchange=updateBhawan(<?php echo $_SESSION['id'] ?>) list = "bhawans" id = "bhawan" class = "form-control" font-family= 'Comic Sans MS'></td>
                                    </tr>
                                    <datalist id="bhawans">
                                        <?php 
                                        $bhawans = array("Rajendra Bhawan", "Sarojini Bhawan", "Radhakrishnan Bhawan","Rajeev Bhawan","Kasturba Bhawan", "Jawahar Bhawan","Govind Bhawan", "Azad Bhawan", "Ravindra Bhawan" );
                                        foreach($bhawans as $b){
                                            echo '<option value="'.$b.'">';
                                        }
                                        ?>
                                        
                                            
                                    </datalist>
                                    <tr>
                                        <td>No. of followers :</td>
                                        <td>
                                            <?php echo $followers_count ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Branch and Year: </td>
                                        <td>
                                        <textarea id = "branch" class = "col-xs-3 inputsm form-control" rows=1 style = "width: 80%; overflow: auto; " onchange=updateBranch(<?php echo $_SESSION['id'] ?>) ><?php echo $branch_y ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>
                                        <td>
                                        <textarea id = "email" class = "col-xs-3 inputsm form-control" rows=1 style = "width: 80%; overflow: auto;" onchange=updateEmail(<?php echo $_SESSION['id'] ?>) ><?php echo $email ?></textarea>
                                        </td>
                                    </tr>

                    </div>
                </div>
                </table>

            </div>

            </div>
            <div class="column2">
                <div class="signup_box info" style="height: 400px; width: 100%;">
                    <br>
                    <div class="hobbies" style="width: 45%; float:left; ">
                        <!--HOBBIES-->

                        <div id="myDIV" class="hobbie_header">
                            <h2>Hobbies</h2>
                            <input list="hobbies" id="hobbieInput" type="text" placeholder="Title...">
                            <datalist id="hobbies">
                                <option value="Dancing">
                                    <option value="Listening Music">
                                        <option value="Cricket">
                                            <option value="Singing">
                                                <option value="Fooseball">
                                                    <option value="Reading Novels">
                            </datalist>

                            <span onclick="add_hobbie()" class="addBtn">Add</span>
                        </div>

                        <ul id="hobbieUL">
                            <?php 
function hobbieID_to_name($a){
    $hobbies = array("Dancing", "Listening Music", "Cricket", "Singing", "Fooseball", "Reading Novels");
    return $hobbies[$a - 1];
}
$selfID = $_SESSION['id'];
include('dbconfig.php');
$sql = "SELECT * from hobbieData where userID = $selfID";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  $hobbieName = hobbieID_to_name($row['hobbie_ID']);
  echo "<li>".$hobbieName."</li>";
}
}
?>
                        </ul>

                    </div>

                    <div class="goals" style="width: 45%; float:right">
                        <!--GOALS-->

                        <div id="myDIV" class="goal_header">
                            <h2>GOALS</h2>
                            <input type="text" id="goalInput" list = "goals" placeholder="Title...">
                            <datalist id = "goals">
                                <option value = "Gymming">
                                <option value = "Tech Group">
                                <option value = "UPSC">
                                <option value = "Branch Change">
                                <option value = "Internship">

                            </datalist>
                            <span onclick="add_goal()" class="addBtn">Add</span>
                        </div>

                        <ul id="goalUL">
                        <?php 
function goalID_to_name($a){
    $goals = array("Gymming", "Tech Group", "UPSC", "Branch Change", "Internship");
    return $goals[$a - 1];
  }
$selfID = $_SESSION['id'];
include('dbconfig.php');
$sql = "SELECT * from goalData where userID = $selfID";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  $goalName = goalID_to_name($row['goal_ID']);
  echo "<li>".$goalName."</li>";
}
}
?>
                        </ul>

                    </div>

                </div>

            </div>

            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div style="margin-left: 15px;">
                <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view_friends">
                    View Friends
                </button>
                <div class="modal fade" id="view_friends" style = "overflow: auto;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 40vw;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Friends</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Profile Pic</th>
                                        <th>Bio</th>
                                    </tr>
                                    <?php
include('dbconfig.php');// Check connection

$sql = "SELECT userID, name, username, img, bio FROM userData";
$result = mysqli_query($conn, $sql);
$self_ID = $_SESSION['id']; 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row["userID"];
$check = mysqli_query($conn, "SELECT * from followerData where userID = $id AND followerID = $self_ID");
$check_2 = mysqli_query($conn, "SELECT * from followerData where userID = $self_ID AND followerID = $id");
if(mysqli_num_rows($check) == 1 && mysqli_num_rows($check_2) == 1){
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

  }

}
} 
else { echo "0 results"; }
$conn->close(); 
?>

                                </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>&emsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view_followers">
                    View Followers
                </button>
                <div class="modal fade" id="view_followers" style = "overflow: auto;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 40vw;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Followers</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Profile Pic</th>
                                        <th>Bio</th>
                                    </tr>
                                    <?php
include('dbconfig.php');// Check connection

$sql = "SELECT userID, name, username, img, bio FROM userData";
$result = mysqli_query($conn, $sql);
$self_ID = $_SESSION['id']; 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row["userID"];
$check = mysqli_query($conn, "SELECT * from followerData where userID = $id AND followerID = $self_ID");
$check_2 = mysqli_query($conn, "SELECT * from followerData where userID = $self_ID AND followerID = $id");
if(mysqli_num_rows($check) <= 1 && mysqli_num_rows($check_2) == 1) {
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

  }

}
} 
else { echo "0 results"; }
$conn->close(); 
?>

                                </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                &emsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view_following">
                    View Following
                </button>
                <div class="modal fade" id="view_following" style = "overflow: auto;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 40vw;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Followers</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Profile Pic</th>
                                        <th>Bio</th>
                                    </tr>
                                    <?php
include('dbconfig.php');// Check connection

$sql = "SELECT userID, name, username, img, bio FROM userData";
$result = mysqli_query($conn, $sql);
$self_ID = $_SESSION['id']; 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row["userID"];
$check = mysqli_query($conn, "SELECT * from followerData where userID = $id AND followerID = $self_ID");
$check_2 = mysqli_query($conn, "SELECT * from followerData where userID = $self_ID AND followerID = $id");
if(mysqli_num_rows($check) == 1 && mysqli_num_rows($check_2) <= 1) {
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

  }

}
} 
else { echo "0 results"; }
$conn->close(); 
?>

                                </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                </center>
            </div>

            

            <?php endif; ?>

                <div class="userC">&nbsp;&nbsp;No. of Users:&nbsp;&nbsp;
                    <b><?php echo $user_count ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <object align = 'right'><?php echo $_SESSION['username'] ?></object>
        </div>
</body>
</html>
