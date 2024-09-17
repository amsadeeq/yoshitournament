<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the team reference number from the request
    $teamRefNumber = $_POST['teamRefNumber'];

    // Prepare the SQL query to fetch school details
    $stmt = $pdo->prepare("SELECT * FROM `yoshi_schools_officials_tbl` WHERE `TeamRefNumber` = :teamRefNumber");

    // Execute the query with the provided team reference number
    $stmt->execute(['teamRefNumber' => $teamRefNumber]);

    // Fetch the result as an associative array
    $school = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the result as a JSON response
    echo json_encode($school);
}

?>