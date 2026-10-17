<?php
include 'db.php';
include 'auth.php';

if ($_POST) {
    $current = mysqli_real_escape_string($conn, $_POST['current']);
    $new = mysqli_real_escape_string($conn, $_POST['new']);
    $admin_id = $_SESSION['admin_id'];

    $res = mysqli_query($conn, "SELECT password FROM admins WHERE id=$admin_id");
    $row = mysqli_fetch_assoc($res);

    if ($current !== $row['password']) {
        echo json_encode(['status' => 'error', 'message' => 'Current password is wrong']);
    } else {
        mysqli_query($conn, "UPDATE admins SET password='$new' WHERE id=$admin_id");
        echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
    }
    exit;
}