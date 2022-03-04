<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


if(empty($password)){

    if($_FILES['profile_photo']['name'] != ''){
        //image update code
        $uploaded_file = $_FILES['profile_photo'];
        $uploaded_file_name = $uploaded_file['name'];
        $after_expolde = explode('.', $uploaded_file_name);
        $extension = end($after_expolde);
        $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($extension, $allowed_extension)) {
            if ($uploaded_file['size'] <= 1000000) {

                //image delete code
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connection, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);

                $delete_from = '../uploads/users/' . $after_assoc['profile_photo'];
                unlink($delete_from);

                $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
                $update_user_result = mysqli_query($db_connection, $update_user);
                $file_name = $id . '.' . $extension;
                $new_location = '../uploads/users/' . $file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_users = "UPDATE users SET profile_photo='$file_name' WHERE id=$id";
                $update_users_result = mysqli_query($db_connection, $update_users);
                $_SESSION['update_profile'] = 'Profile Update SuccessfullY';
                header('location:edit_profile.php');
            } else {
                $_SESSION['size'] = 'File Size Too Large, Max 1 MB';
                header('location:edit_profile.php');
            }
        } else {
            $_SESSION['extension'] = 'Invalid Extesnion';
            header('location:edit_profile.php');
        }


    }
    else{
        $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        $update_user_result = mysqli_query($db_connection, $update_user);
        $_SESSION['update_profile'] = 'Profile Update SuccessfullY';
        header('location:edit_profile.php');
    }
}
else{

    if ($_FILES['profile_photo']['name'] != '') {
    
        //image update code
        $uploaded_file = $_FILES['profile_photo'];
        $uploaded_file_name = $uploaded_file['name'];
        $after_expolde = explode('.', $uploaded_file_name);
        $extension = end($after_expolde);
        $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($extension, $allowed_extension)) {
            if ($uploaded_file['size'] <= 1000000) {

                //image delete code
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connection, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);

                $delete_from = '../uploads/users/' . $after_assoc['profile_photo'];
                unlink($delete_from);

                $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
                $update_user_result = mysqli_query($db_connection, $update_user);
                $file_name = $id . '.' . $extension;
                $new_location = '../uploads/users/' . $file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_users = "UPDATE users SET profile_photo='$file_name' WHERE id=$id";
                $update_users_result = mysqli_query($db_connection, $update_users);
                $_SESSION['update_profile'] = 'Profile Update SuccessfullY';
                header('location:edit_profile.php');
            } 
            else {
                $_SESSION['size'] = 'File Size Too Large, Max 1 MB';
                header('location:edit_profile.php');
            }
        } 
        else {
            $_SESSION['extension'] = 'Invalid Extesnion';
            header('location:edit_profile.php');
        }
    } 
    else {
        $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
        $update_user_result = mysqli_query($db_connection, $update_user);
        $_SESSION['update_profile'] = 'Profile Updated!';
        header('location:edit_profile.php');
    }
}


?>