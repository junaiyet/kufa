<?php 
session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$select = "SELECT COUNT(*) as paisi FROM users WHERE email='$email'";
$select_result = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['paisi'] == 1){
    $_SESSION['exist'] = 'Email Already Exist';
    header('location:register.php');
}
else{

    //Image Upload
    $uploaded_file = $_FILES['profile_photo'];
    $uploaded_file_name = $uploaded_file['name'];
    $after_expolde = explode('.', $uploaded_file_name);
    $extension = end($after_expolde);
    $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
    if(in_array($extension, $allowed_extension)){
       if($uploaded_file['size'] <= 1000000){
            $insert = "INSERT INTO users(name,email,password,role)VALUES('$name', '$email', '$password','$role')";
            $insert_result = mysqli_query($db_connection, $insert);
            $last_id = mysqli_insert_id($db_connection);
            $file_name = $last_id.'.'.$extension;
            $new_location = '../uploads/users/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);

            $update_users = "UPDATE users SET profile_photo='$file_name' WHERE id=$last_id";
            $update_users_result = mysqli_query($db_connection, $update_users);
            $_SESSION['success'] = 'User Added SuccessfullY';
            header('location:register.php');

       }
       else{
            $_SESSION['size'] = 'File Size Too Large, Max 1 MB';
            header('location:register.php');
       }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extesnion';
        header('location:register.php');
    }
    
}



?>