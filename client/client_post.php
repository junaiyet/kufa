<?php
    require '../db.php';


    $uploaded_file = $_FILES['client'];
    $name = $uploaded_file['name'];
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'png', 'jpeg', 'JPG');
    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] <=  2000000){
            $insert = "INSERT INTO clients(client)VALUES('$name')";
            $insert_result = mysqli_query($db_connection, $insert);
            $last_id = mysqli_insert_id($db_connection);
            $file_name = $last_id.'.'.$extension;

            $new_location = '../uploads/client/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            
            $update = "UPDATE clients SET client='$file_name' WHERE id=$last_id";
            $update_result = mysqli_query($db_connection, $update);

            header('location:add_client.php');
        }
        else{
            header('location:add_client.php');
        }
    }
    else{
        header('location:add_client.php');
    }

?>