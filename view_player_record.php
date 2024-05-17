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

<div class="modal-dialog modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Player Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <?php if ($record): ?>

                <div class="row">
                    <div class="col-md-3 col-6">
                        <img src="<?php echo "players_Images/" . $record['passport']; ?>"
                            alt="<?php echo $record['firstname'] ?>" class="player_view_passport"
                            style="width: 100% !important; height: 90%; " />
                    </div>
                    <div class="col-6 d-md-none d-lg-none d-xl-none d-xxl-none">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="badge rounded-pill text-bg-primary"><b>Team No.</b>
                                    <?php echo $record['TeamRefNumber']; ?>
                                </span>
                                <span class="badge rounded-pill text-bg-danger"><b>Player ID:</b>
                                    <?php echo $record['userRefNo']; ?></span>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row d-none d-sm-none d-md-block">
                            <div class="col-md-12">
                                <span class="badge rounded-pill text-bg-dark"><b>Team No.</b>
                                    <?php echo $record['TeamRefNumber']; ?>
                                </span>
                                <span class="badge rounded-pill text-bg-dark"><b>Player ID:</b>
                                    <?php echo $record['userRefNo']; ?></span>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><?php echo $record['firstname'] . " " . $record['surname']; ?></p>
                                <hr>
                                <p><a href="tel:+<?php echo $record['phone']; ?>"><?php echo $record['phone']; ?></a>
                                </p>
                                <hr>
                                <p><a href='mailto: <?php echo $record['email']; ?>'><?php echo $record['email']; ?></a>
                                </p>
                                <hr>
                            </div>
                            <div class="col-md-6">

                                <p><?php echo $record['user_position']; ?></p>
                                <hr>
                                <p><b>Weight:</b> <?php echo $record['weight'] . "kg"; ?></p>
                                <hr>
                                <p><b>height:</b> <?php echo $record['hieght']; ?></p>
                                <hr>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Jersey No.</b>
                            <?php echo $record['jersy_number']; ?>
                        </p>
                        <hr>
                        <p><b>dob:</b>
                            <?php
                            $birthday = new DateTime($dob);
                            $currentDate = new DateTime();
                            $age = $currentDate->diff($birthday)->y;
                            echo $record['dob'] . "(" . $age . ") years old";
                            ?>
                        </p>
                        <hr>
                        <p><b>Gender:</b> <?php echo $record['gender']; ?></p>
                        <hr>

                    </div>
                    <div class="col-md-6">
                        <p><b></b> <?php echo $record['country']; ?></p>
                        <hr>
                        <p><b></b> <?php echo $record['state']; ?></p>
                        <hr>
                        <p><b></b> <?php echo $record['address']; ?></p>
                        <hr>
                    </div>
                </div>




            <?php else: ?>
                <p>No record found</p>
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
    </div>

</div>