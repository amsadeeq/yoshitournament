<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userRefNo = $_POST['userRefNo'];

    $stmt = $pdo->prepare("SELECT * FROM `yoshi_school_students_tbl` WHERE `userRefNo` = :userRefNo");
    $stmt->execute(['userRefNo' => $userRefNo]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($student);
}

?>