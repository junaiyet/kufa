<?php 
session_start();
require 'db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM users WHERE id=$id";
$select_img_result = mysqli_query($db_connection, $select_img);
$after_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = 'uploads/users/'.$after_assoc['profile_photo'];
unlink($delete_from);

$delete = "DELETE FROM users WHERE id=$id";
$delete_result = mysqli_query($db_connection, $delete);
$_SESSION['delete'] = "User Deleted Successfully!";
header('location:users.php');

?>