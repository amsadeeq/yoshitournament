<?php


session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];

if (isset($_POST['adminId'])) {
    $adminId = $_POST['adminId'];

    $stmt = $pdo->prepare("DELETE FROM `yoshi_admins_tbl` WHERE `admin_userID` = :adminId");
    $stmt->bindParam(':adminId', $adminId);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "success";
    } else {
        echo "Failed to delete admin. Please try again.";
    }
} else {
    echo 'Invalid request';
}
?>