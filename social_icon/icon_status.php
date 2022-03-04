<?php 
    session_start();
    require '../db.php';
    $id = $_GET['id'];

    $select_icon_status1 = "SELECT * FROM social WHERE id=$id";
    $select_icon_status_result1 = mysqli_query($db_connection, $select_icon_status1);
    $after_assoc1 = mysqli_fetch_assoc($select_icon_status_result1);
    
    if($after_assoc1['status']==1){

        $select_icon_status = "SELECT COUNT(*) as total FROM social WHERE status=1";
        $select_icon_status_result = mysqli_query($db_connection, $select_icon_status);
        $after_assoc = mysqli_fetch_assoc($select_icon_status_result);

        if($after_assoc['total'] == 1){
            $_SESSION['limit'] = 'Minimum 1 Icon Need to Active!';
            header('location:view_icon.php');
        }
        else{
            $update_status = "UPDATE social SET status=0 WHERE id=$id";
            $update_status_result = mysqli_query($db_connection, $update_status);
            header('location:view_icon.php');
        }
    }
    else{
        $select_icon_status = "SELECT COUNT(*) as total FROM social WHERE status=1";
        $select_icon_status_result = mysqli_query($db_connection, $select_icon_status);
        $after_assoc = mysqli_fetch_assoc($select_icon_status_result);

        if ($after_assoc['total'] == 4) {
            $_SESSION['limit'] = 'Maximum 4 Icon Can Active!';
            header('location:view_icon.php');
        } else {
            $update_status = "UPDATE social SET status=1 WHERE id=$id";
            $update_status_result = mysqli_query($db_connection, $update_status);

            header('location:view_icon.php');
        }
    }

?>