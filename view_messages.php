<?php 
    session_start();   
                               include('dbconfig.php');
                               $selfID = $_SESSION['id']; 
function following_check($conn, $id_followed){
    $selfID = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM followerData WHERE userID = $id_followed AND followerID = $selfID");
    return ($result->num_rows > 0) ? TRUE : FALSE ; 
 }
 $fetch_messages = mysqli_query($conn, "SELECT * FROM `publicMessageData` ORDER BY posting_time DESC");
 
 while($read_msg = $fetch_messages->fetch_assoc()){
     $test_id = $read_msg['from_ID'];
    $self_ID = $_SESSION['id'];


    if($test_id == $self_ID){
        $fetch_name_dp = mysqli_query($conn, "SELECT name, img from userData where userID = $test_id");
        while($dp = $fetch_name_dp->fetch_assoc()){
            $target_dp = $dp['img'];
            $target_name = $dp['name'];
           }
            echo "<tr><td><img src = ";

            if(isset($target_dp)){
                echo "'userImages/".$target_dp."'";
              }
               else{ echo "'res/default.jpeg'";}
            echo "style = 'border-radius: 50%' width = 50px height = 50px></td>";
            echo "<td>You : </td><td>".$read_msg['message']."</td><td>".$read_msg['posting_time']."</td>";
     }


     if(following_check($conn, $test_id)){
        $fetch_name_dp = mysqli_query($conn, "SELECT name, img from userData where userID = $test_id");
        while($dp = $fetch_name_dp->fetch_assoc()){
            $target_dp = $dp['img'];
            $target_name = $dp['name'];
           }
            echo "<tr><td><img src = ";

            if(isset($target_dp)){
                echo "'userImages/".$target_dp."'";
              }
               else{ echo "'res/default.jpeg'";}
            echo "style = 'border-radius: 50%' width = 50px height = 50px></td>";
            echo "<td>".$target_name." : </td><td>".$read_msg['message']."</td><td>".$read_msg['posting_time']."</td>";
     }
 } 
                                                             
                               
                               ?>