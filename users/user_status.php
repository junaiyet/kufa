<?php 
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$id";
$select_result = mysqli_query($db_connection, $select);
$after_assoc  = mysqli_fetch_assoc($select_result);

if($after_assoc['status'] == 0){
    $update_status = "UPDATE users SET status=1 WHERE id=$id";
    $update_status_result = mysqli_query($db_connection, $update_status);
    header('location:users.php');
}
else{
    $update_status = "UPDATE users SET status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connection, $update_status);
    header('location:users.php');
}





?>