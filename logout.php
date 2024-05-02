<?php
// Start session if not already started
session_start();

// Perform sign-out logic (e.g., destroy session)
session_destroy();

// Send response indicating success
//http_response_code(200);

// Redirect back to index.php with logout status
header('Location: index.php?logout=true');
exit;
?>