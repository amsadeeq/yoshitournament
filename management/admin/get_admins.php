<?php
session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];

$stmt = $pdo->query("SELECT * FROM `yoshi_admins_tbl` ORDER BY id DESC, time_updated DESC");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>