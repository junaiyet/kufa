<?php 
    session_start();
    require '../db.php';
    $id = $_GET['id'];

    $select_skill_status1 = "SELECT * FROM skills WHERE id=$id";
    $select_skill_status_result1 = mysqli_query($db_connection, $select_skill_status1);
    $after_assoc1 = mysqli_fetch_assoc($select_skill_status_result1);
    
    if($after_assoc1['status']==1){

        $select_skill_status = "SELECT COUNT(*) as total FROM skills WHERE status=1";
        $select_skill_status_result = mysqli_query($db_connection, $select_skill_status);
        $after_assoc = mysqli_fetch_assoc($select_skill_status_result);

        if($after_assoc['total'] == 1){
            $_SESSION['limit'] = 'Minimum 1 Icon Need to Active!';
            header('location:view_skill.php');
        }
        else{
            $update_status = "UPDATE skills SET status=0 WHERE id=$id";
            $update_status_result = mysqli_query($db_connection, $update_status);
            header('location:view_skill.php');
        }
    }
    else{
        $select_skill_status = "SELECT COUNT(*) as total FROM skills WHERE status=1";
        $select_skill_status_result = mysqli_query($db_connection, $select_skill_status);
        $after_assoc = mysqli_fetch_assoc($select_skill_status_result);

        if ($after_assoc['total'] == 4) {
            $_SESSION['limit'] = 'Maximum 4 Icon Can Active!';
            header('location:view_skill.php');
        } else {
            $update_status = "UPDATE skills SET status=1 WHERE id=$id";
            $update_status_result = mysqli_query($db_connection, $update_status);

            header('location:view_skill.php');
        }
    }
