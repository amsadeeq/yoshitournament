<?php
// Include the connection file
require_once 'connection.php';

// Get the user ID from the POST data
$userId = $_POST['userId'];

// SQL query to select the record
$sql = "SELECT * FROM yoshi_players_tbl WHERE userRefNo = :userId";

// Prepare the SQL statement
$stmt = $pdo->prepare($sql);

// Bind parameters and execute the query
$stmt->bindParam(':userId', $userId);
$stmt->execute();

// Fetch the record as an associative array
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the record details in the modal
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">View Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <?php if ($record): ?>
                <p>User ID: <?php echo $record['id']; ?></p>
                <p>Name: <?php echo $record['firstname']; ?></p>
                <!-- Add other record details here -->
            <?php else: ?>
                <p>No record found</p>
            <?php endif; ?>
        </div>
    </div>
</div>