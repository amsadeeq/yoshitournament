<?php


session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];

if (isset($_POST['newsId'])) {
    $newsId = $_POST['newsId'];

    $stmt = $pdo->prepare("DELETE FROM `yoshi_featured_news_tbl` WHERE `newsRefCode` = :newsId");
    $stmt->bindParam(':newsId', $newsId);
    $stmt->execute();

    // Fetch the image file name associated with the newsId
    $stmt_image = $pdo->prepare("SELECT `cover_picture_name` FROM `yoshi_featured_news_tbl` WHERE `newsRefCode` = :newsId");
    $stmt_image->bindParam(':newsId', $newsId);
    $stmt_image->execute();
    $imageFileName = $stmt_image->fetchColumn();

    // Delete the image file from the folder
    if ($imageFileName) {
        $filePath = '/featured_news_photo/' . $imageFileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "success";
    } else {
        echo "Failed to delete news. Please try again.";
    }
} else {
    echo 'Invalid request';
}
?>