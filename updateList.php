<?php
session_start();

if(isset($_GET['id'])){
    $hobbieName = $_GET['id'];

if($hobbieName === "Dancing"){$hobbieID = 1;}
if($hobbieName === "Listening Music"){$hobbieID = 2;}
if($hobbieName === "Cricket"){$hobbieID = 3;}
if($hobbieName === "Singing"){$hobbieID = 4;}
if($hobbieName === "Fooseball"){$hobbieID = 5;}
if($hobbieName === "Reading Novels"){$hobbieID = 6;}

$selfID = $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");


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
    $delete_ID = $_GET['delete_id'] + 1;

    $conn = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");

    if(mysqli_query($conn, "DELETE FROM `hobbieData` WHERE userID = $selfID AND hobbie_ID = $delete_ID")){
        echo "Deleted";
    } 
}

?>