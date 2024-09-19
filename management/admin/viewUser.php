<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userRefNo = $_POST['userRefNo'];

    $stmt = $pdo->prepare("SELECT * FROM `yoshi_signup_tbl` WHERE `userRefNo` = :userRefNo");
    $stmt->execute(['userRefNo' => $userRefNo]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($user);
}

?>