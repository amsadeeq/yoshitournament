<?php
session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];
try {
    $stmt = $pdo->query("SELECT * FROM `yoshi_featured_news_tbl` ORDER BY id DESC, time_published DESC");
    $featured_news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data in JSON format
    echo json_encode($featured_news);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}


?>