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
?>