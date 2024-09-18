<?php

require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get all the form fields from the POST request
    $user_position = $_POST['editUserPosition'];
    $surname = $_POST['editSurname'];
    $firstname = $_POST['editFirstname'];
    $dob = $_POST['editDob'];
    $gender = $_POST['editGender'];
    $country = $_POST['editCountry'];
    $state = $_POST['editState'];
    $city = $_POST['editCity'];
    $zipcode = $_POST['editZipcode'];
    $phone = $_POST['editPhone'];
    $email = $_POST['editEmail'];
    $means_id = $_POST['editMeansId'];
    $id_number = $_POST['editIdNumber'];
    $address = $_POST['editAddress'];
    $team_name = $_POST['editTeamName'];
    $team_country = $_POST['editTeamCountry'];
    $team_state = $_POST['editTeamState'];
    $team_city = $_POST['editTeamCity'];
    $number_of_players = $_POST['editNumberOfPlayers'];
    $team_address = $_POST['editTeamAddress'];
    $teamRefNumber = $_POST['teamRefNumber']; // Assuming you're passing this in the form

    // Prepare the SQL query to update the record (excluding photo and team logo)
    $sql = "UPDATE `yoshi_schools_officials_tbl` 
            SET user_position = :user_position, 
                surname = :surname, 
                firstname = :firstname, 
                dob = :dob, 
                gender = :gender, 
                country = :country, 
                state = :state, 
                city = :city, 
                zipcode = :zipcode, 
                phone = :phone, 
                email = :email, 
                means_id = :means_id, 
                id_number = :id_number, 
                address = :address, 
                team_name = :team_name, 
                team_country = :team_country, 
                team_state = :team_state, 
                team_city = :team_city, 
                number_of_players = :number_of_players, 
                team_address = :team_address
            WHERE TeamRefNumber = :teamRefNumber";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Execute the update query with the form data (excluding passport and team logo)
    $stmt->execute([
        ':user_position' => $user_position,
        ':surname' => $surname,
        ':firstname' => $firstname,
        ':dob' => $dob,
        ':gender' => $gender,
        ':country' => $country,
        ':state' => $state,
        ':city' => $city,
        ':zipcode' => $zipcode,
        ':phone' => $phone,
        ':email' => $email,
        ':means_id' => $means_id,
        ':id_number' => $id_number,
        ':address' => $address,
        ':team_name' => $team_name,
        ':team_country' => $team_country,
        ':team_state' => $team_state,
        ':team_city' => $team_city,
        ':number_of_players' => $number_of_players,
        ':team_address' => $team_address,
        ':teamRefNumber' => $teamRefNumber
    ]);

    // Return success response (you can customize this based on your needs)
    // echo json_encode(['status' => 'success', 'message' => 'School details updated successfully, excluding logo and passport.']);
    echo json_encode('success');
}

?>