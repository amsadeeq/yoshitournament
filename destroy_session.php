<?php

session_start();

// Destroy all session data
session_unset();
session_destroy();

// In destroy_session.php or before redirecting
session_start();
// Set a session variable to indicate that the modal should be shown
$_SESSION['showLoginModal'] = true;
session_destroy(); // Destroy the session after setting this flag
header('Location: index.php');

// Return a success response in JSON format
echo json_encode(['success' => true]);
exit();
?>