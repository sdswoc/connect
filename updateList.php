<?php
session_start();
$selfID = $_SESSION['id'];
include('dbconfig.php');

if(isset($_GET['h_id'])){

$hobbieID = mysqli_real_escape_string($conn, $_GET['h_id']); 
$existing_row = mysqli_query($conn, "SELECT * from hobbieData where userID = $selfID AND hobbie_ID = $hobbieID");
if(mysqli_num_rows($existing_row) == 0 && mysqli_query($conn, "INSERT INTO `hobbieData` (`userID`, `hobbie_ID`) VALUES ($selfID, $hobbieID)")){
    echo "canAdd";
}
else{
    echo "Already added!";
}
}

if(isset($_GET['h_delete_id'])){

    $remove_id = mysqli_real_escape_string($conn, $_GET['h_delete_id']);
    $delete_query = "DELETE FROM hobbieData WHERE userID = $selfID AND hobbie_ID = $remove_id";
    if(mysqli_query($conn, $delete_query)){
        echo "Deleted!";
    }
    else{
        echo "Couldn't Delete!";
    }
    
}



///////

if(isset($_GET['g_id'])){

    $goalID = mysqli_real_escape_string($conn, $_GET['g_id']); 
    $existing_row = mysqli_query($conn, "SELECT * from goalData where userID = $selfID AND goal_ID = $goalID");
    if(mysqli_num_rows($existing_row) == 0 && mysqli_query($conn, "INSERT INTO `goalData` (`userID`, `goal_ID`) VALUES ($selfID, $goalID)")){
        echo "canAdd";
    }
    else{
        echo "Already added!";
    }
    }
    
    if(isset($_GET['g_delete_id'])){
    
        $remove_id = mysqli_real_escape_string($conn, $_GET['g_delete_id']);
        $delete_query = "DELETE FROM goalData WHERE userID = $selfID AND goal_ID = $remove_id";
        if(mysqli_query($conn, $delete_query)){
            echo "Deleted!";
        }
        else{
            echo "Couldn't Delete!";
        }
        
    }
?>