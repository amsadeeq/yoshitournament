<?php
require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Prepare the update statement
        $stmt = $pdo->prepare("UPDATE `yoshi_schools_officials_tbl` 
            SET `user_position` = :userPosition, 
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
                `means_id` = :meansId, 
                `id_number` = :idNumber, 
                `address` = :address, 
                `team_name` = :teamName, 
                `team_country` = :teamCountry, 
                `team_state` = :teamState, 
                `team_city` = :teamCity, 
                `number_of_players` = :numberOfPlayers, 
                `team_address` = :teamAddress
            WHERE `TeamRefNumber` = :teamRefNumber");

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
        $stmt->bindParam(':teamRefNumber', $_POST['teamRefNumber']);

        // Execute the update query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update the record.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>