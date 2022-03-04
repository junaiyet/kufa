<?php 
require '../db.php';

$topic = $_POST['topic'];
$desp = $_POST['desp'];
$percentage = $_POST['percentage'];


$insert = "INSERT INTO skills(topic, desp, percentage)VALUES('$topic', '$desp', '$percentage')";
$insert_result = mysqli_query($db_connection,$insert);
header('location:add_skill.php');

?>