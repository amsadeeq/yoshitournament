<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../../connection.php'); // Include your DB connection file

    $userRefNo = $_POST['userRefNo'];

    // Validate the user reference number in the database
    $stmt = $pdo->prepare("SELECT * FROM `yoshi_signup_tbl` WHERE `userRefNo` = :userRefNo");
    $stmt->execute(['userRefNo' => $userRefNo]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Update attendance record
        // $updateStmt = $pdo->prepare("UPDATE `yoshi_signup_tbl` SET `attendance` = 'present' WHERE `userRefNo` = :userRefNo");
        // $updateStmt->execute(['userRefNo' => $userRefNo]);

        echo "<div class='alert alert-success'>Attendance recorded for user: $userRefNo</div>";
    } else {
        echo "<div class='alert alert-danger'>Invalid QR Code.</div>";
    }
}


?>