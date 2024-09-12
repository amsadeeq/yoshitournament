<?php
require 'connection.php';

header('Content-Type: application/json');

// Get the POSTed data from fetch
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';

$response = ['exists' => false];

if ($email) {
    // Check if email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE user_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $response['exists'] = true;
    }
}

echo json_encode($response);
?>