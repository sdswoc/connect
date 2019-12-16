<?php
session_start();
$selfID = $_SESSION['id'];
$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");

if(isset($_GET['id'])){
    $hobbieName = mysqli_real_escape_string($_GET['id']);

    $hobbies = array("Dancing", "Listening Music", "Cricket", "Singing", "Fooseball", "Reading Novels");
$hobbieID = 1 + array_search($hobbieName, $hobbies, true);
$existing_row = mysqli_query($conn, "SELECT * from hobbieData where userID = $selfID AND hobbie_ID = $hobbieID");
if(mysqli_num_rows($existing_row) == 0){
    mysqli_query($conn, "INSERT INTO `hobbieData` (`userID`, `hobbie_ID`) VALUES ($selfID, $hobbieID)");
    echo "canAdd";
}
else{
    echo "Already Added!";
}
}

if(isset($_GET['delete_id'])){
    $delete_ID = mysqli_real_escape_string($_GET['delete_id']);
   
    if(mysqli_query($conn, "DELETE FROM `hobbieData` WHERE userID = $selfID AND hobbie_ID = $delete_ID;")){
        echo "Deleted";
    } 
}

?>