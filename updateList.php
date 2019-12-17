<?php
session_start();
$selfID = $_SESSION['id'];
include('dbconfig.php');

if(isset($_GET['id'])){

$hobbieID = mysqli_real_escape_string($conn, $_GET['id']); 
$existing_row = mysqli_query($conn, "SELECT * from hobbieData where userID = $selfID AND hobbie_ID = $hobbieID");
if(mysqli_num_rows($existing_row) == 0 && mysqli_query($conn, "INSERT INTO `hobbieData` (`userID`, `hobbie_ID`) VALUES ($selfID, $hobbieID)")){
    echo "canAdd";
}
else{
    echo "Already added!";
}
}

if(isset($_GET['delete_id'])){

    $remove_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_query = "DELETE FROM hobbieData WHERE userID = $selfID AND hobbie_ID = $remove_id";
    if(mysqli_query($conn, $delete_query)){
        echo "Deleted!";
    }
    else{
        echo "Couldn't Delete!";
    }
    
}
?>