<?php 
include('dbconfig.php');


$get_ids = mysqli_query($conn, "SELECT userID from userData");
while($id = $get_ids->fetch_assoc()){
    $id_focus = $id['userID'];
$get_pass = mysqli_query($conn, "SELECT password from userData where userID=$id_focus");
$row = $get_pass->fetch_assoc();

$hashed = password_hash($row['password'], PASSWORD_BCRYPT);

if(mysqli_query($conn, "UPDATE userData SET password = '$hashed' where userID = $id_focus")){
    echo $hashed;
}

}


?>
