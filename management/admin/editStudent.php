<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the team reference number from the request
    $userRefNo = $_POST['userRefNo'];
    echo $userRefNo;

    // Prepare the SQL query to fetch student details
    $stmt = $pdo->prepare("SELECT * FROM `yoshi_school_students_tbl` WHERE `userRefNo` = :userRefNo");

    // Execute the query with the provided team reference number
    $stmt->execute(['userRefNo' => $userRefNo]);

    // Fetch the result as an associative array
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the result as a JSON response
    echo json_encode($student);
}

?>