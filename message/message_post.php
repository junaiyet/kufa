<?php 
session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$insert = "INSERT INTO messages(name, email, message)VALUES('$name', '$email', '$message')";
$insert_result = mysqli_query($db_connection, $insert);
$_SESSION['message'] = 'Message Send SuccessFully';
header('location:../index.php#contact');