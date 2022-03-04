<?php 
require '../db.php';

$icon_class = $_POST['service_icon'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$insert = "INSERT INTO services(icon_class, title, desp)VALUES('$icon_class', '$title', '$desp')";
$insert_result = mysqli_query($db_connection,$insert);
header('location:add_service.php');

?>