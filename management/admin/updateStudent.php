<?php
require '../../connection.php';


// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {


        // Check if the userRefNo exists
        $stmt = $pdo->prepare("SELECT * FROM `yoshi_school_students_tbl` WHERE `userRefNo` = :userRefNo");
        $stmt->execute(['userRefNo' => $_POST['editUserRefNo']]);
        $school = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$school) {
            echo json_encode(['status' => 'error', 'message' => 'No record found for this userRefNo.']);
            exit;
        }

        // Prepare the update statement (bind WHERE clause separately)
        $stmt = $pdo->prepare("UPDATE `yoshi_school_students_tbl` 
            SET `user_position` = :user_position, 
                `surname` = :surname, 
                `firstname` = :firstname, 
                `dob` = :dob, 
                `gender` = :gender, 
                `country` = :country, 
                `state` = :state, 
                `city` = :city, 
                `zipcode` = :zipcode, 
                `phone` = :phone, 
                `email` = :email, 
                `means_id` = :means_id, 
                `id_number` = :id_number, 
                `address` = :address, 
                `team_name` = :team_name, 
                `team_country` = :team_country, 
                `team_state` = :team_state, 
                `team_city` = :team_city, 
                `number_of_players` = :number_of_players, 
                `team_address` = :team_address, 
                `TeamRefNumber` = :TeamRefNumber
            WHERE `userRefNo` = :whereUserRefNo"); // Use a different placeholder for the WHERE clause

        // Bind parameters
        $stmt->bindParam(':user_position', $_POST['editUserPosition']);
        $stmt->bindParam(':surname', $_POST['editSurname']);
        $stmt->bindParam(':firstname', $_POST['editFirstname']);
        $stmt->bindParam(':dob', $_POST['editDob']);
        $stmt->bindParam(':gender', $_POST['editGender']);
        $stmt->bindParam(':country', $_POST['editCountry']);
        $stmt->bindParam(':state', $_POST['editState']);
        $stmt->bindParam(':city', $_POST['editCity']);
        $stmt->bindParam(':zipcode', $_POST['editZipcode']);
        $stmt->bindParam(':phone', $_POST['editPhone']);
        $stmt->bindParam(':email', $_POST['editEmail']);
        $stmt->bindParam(':means_id', $_POST['editMeansId']);
        $stmt->bindParam(':id_number', $_POST['editIdNumber']);
        $stmt->bindParam(':address', $_POST['editAddress']);
        $stmt->bindParam(':team_name', $_POST['editTeamName']);
        $stmt->bindParam(':team_country', $_POST['editTeamCountry']);
        $stmt->bindParam(':team_state', $_POST['editTeamState']);
        $stmt->bindParam(':team_city', $_POST['editTeamCity']);
        $stmt->bindParam(':number_of_players', $_POST['editNumberOfPlayers']);
        $stmt->bindParam(':team_address', $_POST['editTeamAddress']);
        $stmt->bindParam(':TeamRefNumber', $_POST['editTeamRefNumber']);

        // Bind WHERE clause separately
        $stmt->bindParam(':whereUserRefNo', $_POST['editUserRefNo']);

        // Execute the update query
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No rows updated.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update the record.']);
        }

    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
