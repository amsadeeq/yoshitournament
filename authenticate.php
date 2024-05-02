<?php
// Start session
session_start();

// Include database connection file
//include_once 'db_connection.php';

// Fetching records from the database
// Insert data into the database
$pdo = new PDO('mysql:host=localhost;dbname=yoshi_tournament_db', 'root', '');

//function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
function check_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}

// Fetch user credentials from POST request
$email = check_input($_POST['email']);
$password = md5($_POST['password']); // Assuming password is stored as MD5 hash in the database

// Prepare SQL statement to fetch user from yoshi_signup_tbl
$stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE user_email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // User found, verify password
    if ($user['user_password'] == $password) {
        // Password matches
        if ($user['user_position'] == 'Manager' || $user['user_position'] == 'Coach') {
            // User is a Manager or Coach
            $_SESSION['userRefNo'] = $user['userRefNo'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_position'] = $user['user_position'];
            echo 'success_manager';
        } else {
            // User is a Player
            $_SESSION['userRefNo'] = $user['userRefNo'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_position'] = $user['user_position'];
            echo 'success_player';
        }
    } else {
        // Password does not match
        echo 'error_wrong_credentials';
    }
} else {
    // User not found
    echo 'error_not_registered';
}
?>