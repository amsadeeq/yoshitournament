<?php

session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];
// Check if the adminId parameter is set
if (isset($_POST['adminId'])) {
    $adminId = $_POST['adminId'];

    $stmt = $pdo->prepare("UPDATE `yoshi_admins_tbl` SET `acct_status` = 'suspend' WHERE `admin_userID` = :adminId");
    $stmt->bindParam(':adminId', $adminId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "success";
    } else {
        $error_message = "Oops! Please try again later!";
        //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
        // Define the notification message
        // Generate the JavaScript code to trigger the notification
        $welcome_notify = "
			<script>
				new Noty({
					theme: 'metroui',
					text: '$error_message',
					type: 'danger',
					timeout: 1000
					
				}).show();
			</script>
			";
    }
} else {
    echo 'Invalid request';
}
?>