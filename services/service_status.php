<?php 
    session_start();
    require '../db.php';
    $id = $_GET['id'];

    $select_service_status1 = "SELECT * FROM services WHERE id=$id";
    $select_service_status_result1 = mysqli_query($db_connection, $select_service_status1);
    $after_assoc1 = mysqli_fetch_assoc($select_service_status_result1);
    
    if($after_assoc1['status']==1){

        $select_service_status = "SELECT COUNT(*) as total FROM services WHERE status=1";
        $select_service_status_result = mysqli_query($db_connection, $select_service_status);
        $after_assoc = mysqli_fetch_assoc($select_service_status_result);

        if($after_assoc['total'] == 1){
            $_SESSION['limit'] = 'Minimum 1 Icon Need to Active!';
            header('location:view_service.php');
        }
        else{
            $update_status = "UPDATE services SET status=0 WHERE id=$id";
            $update_status_result = mysqli_query($db_connection, $update_status);
            header('location:view_service.php');
        }
    }
    else{
        $select_service_status = "SELECT COUNT(*) as total FROM services WHERE status=1";
        $select_service_status_result = mysqli_query($db_connection, $select_service_status);
        $after_assoc = mysqli_fetch_assoc($select_service_status_result);

        if ($after_assoc['total'] == 3) {
            $_SESSION['limit'] = 'Maximum 4 Icon Can Active!';
            header('location:view_service.php');
        } else {
            $update_status = "UPDATE services SET status=1 WHERE id=$id";
            $update_status_result = mysqli_query($db_connection, $update_status);

            header('location:view_service.php');
        }
    }

?>