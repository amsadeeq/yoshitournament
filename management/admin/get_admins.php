<?php
session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];
try {
    $stmt = $pdo->query("SELECT * FROM `yoshi_admins_tbl` ORDER BY id DESC, time_updated DESC");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data in JSON format
    echo json_encode($admins);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}


?>