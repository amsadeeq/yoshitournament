<?php

session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];
// Check if the adminId parameter is set
if (isset($_POST['adminId'])) {
    $adminId = $_POST['adminId'];

    $stmt = $pdo->prepare("UPDATE `yoshi_admins_tbl` SET `acct_status` = 'suspend' WHERE `id` = :adminId");
    $stmt->bindParam(':adminId', $adminId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'Invalid request';
}
?>