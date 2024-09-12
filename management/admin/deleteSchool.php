<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamRefNumber = $_POST['teamRefNumber'];

    // Delete the school record from the database
    $stmt = $pdo->prepare("DELETE FROM `yoshi_schools_officials_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
    $stmt->execute(['teamRefNumber' => $teamRefNumber]);

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "School deleted successfully.";
    } else {
        echo "Failed to delete school.";
    }
}

?>