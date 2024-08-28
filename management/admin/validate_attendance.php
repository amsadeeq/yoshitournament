<?php
include('../../connection.php'); // Include your DB connection file
// Check if userRefNo is posted


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['qr_code'])) {
        $qrCode = $_POST['qr_code'];

        // Check if the userRefNo exists in the database
        $stmt = $pdo->prepare("SELECT * FROM yoshi_school_students_tbl WHERE userRefNo = :userRefNo");
        $stmt->execute(['userRefNo' => $qrCode]);
        $selectStmt = $stmt->fetch(PDO::FETCH_ASSOC);

        // $selectStmt = $conn->prepare("SELECT tbl_student_id FROM tbl_student WHERE generated_code = :generated_code");
        // $selectStmt->bindParam(":generated_code", $qrCode, PDO::PARAM_STR);

        if ($selectStmt->execute()) {
            $result = $selectStmt->fetch();
            if ($result !== false) {
                $userRefNo = $result["userRefNo"];
                $timeIn = date("Y-m-d H:i:s");
                // Update attendance details
                $attendance_time = date("H:i:s");
                $attendance_date = date("Y-m-d");
            } else {
                echo "No student found in QR Code";
            }
        } else {
            echo "Failed to execute the statement.";
        }


        try {
            $updateStmt = $pdo->prepare("UPDATE yoshi_school_students_tbl SET attendance = 1, attendance_time = :attendance_time,
            attendance_date = :attendance_date WHERE userRefNo = :userRefNo");
            $updateStmt->execute([
                'attendance_time' => $attendance_time,
                'attendance_date' => $attendance_date,
                'userRefNo' => $userRefNo
            ]);

            header("Location: attendance.php");

            exit();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    } else {
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'attendance.php';
            </script>
        ";
    }
}


// if (isset($_POST['userRefNo'])) {
//     $userRefNo = $_POST['userRefNo'];

//     // Validate the userRefNo format if necessary
// // Check if the userRefNo exists in the database
//     $stmt = $pdo->prepare("SELECT * FROM yoshi_school_students_tbl WHERE userRefNo = :userRefNo");
//     $stmt->execute(['userRefNo' => $userRefNo]);
//     $student = $stmt->fetch(PDO::FETCH_ASSOC);

//     if ($student) {
//         // Update attendance details
//         $attendance_time = date("H:i:s");
//         $attendance_date = date("Y-m-d");

//         $updateStmt = $pdo->prepare("UPDATE yoshi_school_students_tbl SET attendance = 1, attendance_time = :attendance_time,
// attendance_date = :attendance_date WHERE userRefNo = :userRefNo");
//         $updateStmt->execute([
//             'attendance_time' => $attendance_time,
//             'attendance_date' => $attendance_date,
//             'userRefNo' => $userRefNo
//         ]);

//         echo "<div class='alert alert-success'>Attendance marked successfully for $userRefNo.</div>";
//     } else {
//         echo "<div class='alert alert-danger'>User reference number not found.</div>";
//     }
// }

?>