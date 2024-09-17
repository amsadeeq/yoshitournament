<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamRefNumber = $_POST['teamRefNumber'];

    $stmt = $pdo->prepare("SELECT * FROM `yoshi_schools_officials_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
    $stmt->execute(['teamRefNumber' => $teamRefNumber]);
    $school = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($school);
}

?>