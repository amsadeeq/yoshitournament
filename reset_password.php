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
    $hashedPassword = md5($newPassword);

    // Generate time_reset and date_reset
    $time = time();//function for current time
    $dateReset = date("d/M/Y", $time);//function for current date
    $timeReset = date("H:i:s a");//function for current time using "strtotime" to minus 1hour


    // Update the password, time_reset, and date_reset in the database
    $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET user_password = :password, time_reset = :timeReset, date_reset = :dateReset WHERE user_email = :email");
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':timeReset', $timeReset);
    $stmt->bindParam(':dateReset', $dateReset);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $response['success'] = true;
    }
}

echo json_encode($response);
?>