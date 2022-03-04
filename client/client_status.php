<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_clients_status1 = "SELECT * FROM clients WHERE id=$id";
$select_clients_status_result1 = mysqli_query($db_connection, $select_clients_status1);
$after_assoc1 = mysqli_fetch_assoc($select_clients_status_result1);

if ($after_assoc1['status'] == 1) {
    $select_client_status = "SELECT COUNT(*) as total FROM clients WHERE status=1";
    $select_client_status_result = mysqli_query($db_connection, $select_client_status);
    $after_assoc = mysqli_fetch_assoc($select_client_status_result);

    if ($after_assoc['total'] == 1) {
        $_SESSION['limit'] = 'Minimum 1 Icon Need to Active!';
        header('location:view_client.php');
    } else {
        $update_status = "UPDATE clients SET status=0 WHERE id=$id";
        $update_status_result = mysqli_query($db_connection, $update_status);
        header('location:view_client.php');
    }
} else {
    $select_client_status = "SELECT COUNT(*) as total FROM clients WHERE status=1";
    $select_client_status_result = mysqli_query($db_connection, $select_client_status);
    $after_assoc = mysqli_fetch_assoc($select_client_status_result);

    if ($after_assoc['total'] == 8) {
        $_SESSION['limit'] = 'Maximum 5 Icon Can Active!';
        header('location:view_client.php');
    } else {
        $update_status = "UPDATE clients SET status=1 WHERE id=$id";
        $update_status_result = mysqli_query($db_connection, $update_status);

        header('location:view_client.php');
    }
}
?>