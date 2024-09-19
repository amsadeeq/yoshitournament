<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userRefNo = $_POST['userRefNo'];

    // Delete the school record from the database
    $stmt = $pdo->prepare("DELETE FROM `yoshi_signup_tbl` WHERE `userRefNo` = :userRefNo");
    $stmt->execute(['userRefNo' => $userRefNo]);

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "School deleted successfully.";
    } else {
        echo "Failed to delete school.";
    }
}

?>