<?php
require 'connection.php';

header('Content-Type: application/json');

// Get the POSTed data from fetch
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$newPassword = $data['newPassword'] ?? '';

$response = ['success' => false];

if ($email && $newPassword) {
    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET user_password = :password WHERE user_email = :email");
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $response['success'] = true;
    }
}

echo json_encode($response);
?>