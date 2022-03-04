<?php 
require '../db.php';

$icon_class = $_POST['icon_class'];
$link = $_POST['link'];

$insert = "INSERT INTO social(icon_class, link)VALUES('$icon_class', '$link')";
$insert_result = mysqli_query($db_connection,$insert);
header('location:add_social_icon.php');

?>