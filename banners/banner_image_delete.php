<?php 
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM banner_images WHERE id=$id";
$select_img_result = mysqli_query($db_connection, $select_img);
$after_assoc_img = mysqli_fetch_assoc($select_img_result);
echo $after_assoc_img['banner_image'];

$delete_from = '../uploads/banners/'. $after_assoc_img['banner_image'];
unlink($delete_from);

$delete = "DELETE FROM banner_images WHERE id=$id";
$delete_result = mysqli_query($db_connection, $delete);
header('location:view_banner.php'); 


?>