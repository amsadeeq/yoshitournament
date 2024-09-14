<?php

session_start();
ob_start();
//####### Importing database connections and EngineFile

require 'connection.php';

/**
 * Retrieves the team reference number for the current player from the session, or sets it to an empty string if not available.
 *
 * This code checks if the 'teamRefNumber' key is set in the session and has a non-empty value. If so, it assigns that value to the `$player_teamRefNumber` variable. If the key is not set or has an empty value, it sets `$player_teamRefNumber` to an empty string.
 *
 * This function is likely used to maintain the team reference number for the current player across multiple requests, as it is stored in the session.
 */
if (isset($_SESSION['teamRefNumber'])) {
    $player_teamRefNumber = $_SESSION['teamRefNumber'];
} else {
    $player_teamRefNumber = '';
}






// require 'classes/dbconnection.php';
// require_once 'classes/yoshiDatabaseConn.php';//creating coonection to the database ubifcs_database
// require_once 'classes/yoshiEngine.php';//calling the engine classes to excutes all the mySql(inserting, selecting, updating and deleting)
// $yoshiengine = new yoshiEngine();//creating object of class ubifcsEngine which Extends ubifcsDatabaseCon






// Initialize login_error variable
$login_error = '';

// Check if login form is submitted
if (isset($_POST['login'])) {
    // Fetch user credentials from POST request

    //function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
    function check_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        return $data;
    }

    // Get user's device and browser
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = get_browser(null, true);
    $device = $browser['platform'];
    // Get user's IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];


    $email = check_input($_POST['login_email']);
    $password = md5(check_input($_POST['login_password'])); // Assuming password is stored as MD5 hash in the database

    // Fetching records from the database


    // Prepare SQL statement to fetch user from yoshi_signup_tbl
    // Perform authentication against yoshi_signup_tbl
    $stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE user_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if ($user) {

        // User is authenticated

        // User found, verify password
        if ($user['user_password'] == $password) {


            // Define the notification message
            $welcome_message = "Welcome  " . $user['user_position'];



            // Generate the JavaScript code to trigger the notification
            $welcome_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$welcome_message',
                type: 'success',
                timeout: 1000
                
            }).show();
        </script>
        ";


            // Password matches
            // Set session variables based on user's role
            $_SESSION['userRefNo'] = $user['userRefNo'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_position'] = $user['user_position'];
            //$_SESSION['position'] = $user['user_position'];
            //$_SESSION['email'] = $user['user_email'];
            $_SESSION['teamRefNumber'] = $user['TeamRefNumber'];
            $_SESSION['welcome'] = $welcome_notify;
            // Set login status to 'passed'
            $login_status = 'passed';




            if ($user['user_position'] == 'Manager/Coach') {
                // Fetch user information from yoshi_executive_tbl based on userRefNo
                $stmt = $pdo->prepare("SELECT * FROM yoshi_executive_tbl WHERE userRefNo = :userRefNo");
                $stmt->bindParam(':userRefNo', $user['userRefNo']);
                $stmt->execute();
                $executive = $stmt->fetch(PDO::FETCH_ASSOC);
                // User is a Manager or Coach
                $_SESSION['teamRefNumber'] = $executive['TeamRefNumber'];

                header("Location: dashboard.php");


                // Insert login log
                // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
                // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
                // $stmt->execute([
                //   ':userRefNo' => $user['userRefNo'],
                //   ':user_email' => $user['user_email'],
                //   ':user_position' => $user['user_position'],
                //   ':TeamRefNumber' => $executive['TeamRefNumber'],
                //   ':device_used' => $device,
                //   ':browser_used' => $user_agent,
                //   ':ip_address' => $ip_address,
                //   ':login_status' => $login_status,
                //   ':password_used' => $password
                // ]);



            } else if ($user['user_position'] == 'Player') {
                // Fetch user information from yoshi_executive_tbl based on userRefNo
                $stmt = $pdo->prepare("SELECT * FROM yoshi_players_tbl WHERE userRefNo = :userRefNo");
                $stmt->bindParam(':userRefNo', $user['userRefNo']);
                $stmt->execute();
                $player_details = $stmt->fetch(PDO::FETCH_ASSOC);
                // User is a Player
                $_SESSION['teamRefNumber'] = $player_details['TeamRefNumber'];

                header("Location: PlayerDashboard.php");


                // Insert login log
                // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
                // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
                // $stmt->execute([
                //   ':userRefNo' => $user['userRefNo'],
                //   ':user_email' => $user['user_email'],
                //   ':user_position' => $user['user_position'],
                //   ':TeamRefNumber' => $player_details['TeamRefNumber'], // Adjust accordingly if TeamRefNumber is not directly available
                //   ':device_used' => $device,
                //   ':browser_used' => $user_agent,
                //   ':ip_address' => $ip_address,
                //   ':login_status' => $login_status,
                //   ':password_used' => $password
                // ]);


            } else if ($user['user_position'] == 'Coach/Sport Director') {
                // Fetch user information from yoshi_executive_tbl based on userRefNo
                $stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE userRefNo = :userRefNo");
                $stmt->bindParam(':userRefNo', $user['userRefNo']);
                $stmt->execute();
                $school_officials = $stmt->fetch(PDO::FETCH_ASSOC);

                // User is a Player
                //$_SESSION['teamRefNumber'] = $school_officials['TeamRefNumber'];

                switch ($user['reg_status']) {
                    case 0:
                        header("Location: school_registration.php");
                        $_SESSION['userRefCode'] = $school_officials['userRefNo'];
                        break;
                    default:
                        header("Location: schools/dashboard.php");
                        break;
                }



                // Insert login log
                // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
                // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
                // $stmt->execute([
                //   ':userRefNo' => $user['userRefNo'],
                //   ':user_email' => $user['user_email'],
                //   ':user_position' => $user['user_position'],
                //   ':TeamRefNumber' => $player_details['TeamRefNumber'], // Adjust accordingly if TeamRefNumber is not directly available
                //   ':device_used' => $device,
                //   ':browser_used' => $user_agent,
                //   ':ip_address' => $ip_address,
                //   ':login_status' => $login_status,
                //   ':password_used' => $password
                // ]);


            } else if ($user['user_position'] == 'Student') {

                // Fetch user information from yoshi_executive_tbl based on userRefNo
                $stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE userRefNo = :userRefNo");
                $stmt->bindParam(':userRefNo', $user['userRefNo']);
                $stmt->execute();
                $player_details = $stmt->fetch(PDO::FETCH_ASSOC);

                // User is a Player
                $_SESSION['teamRefNumber'] = $player_details['TeamRefNumber'];
                $_SESSION['userRefCode'] = $player_details['userRefNo'];

                if ($user['reg_status'] == 1) {
                    header("Location: schools/studentDashboard.php");
                    $_SESSION['teamRefNumber'] = $player_details['TeamRefNumber'];
                    $_SESSION['userRefCode'] = $player_details['userRefNo'];

                } else {
                    header("Location: student_registration.php");
                    $_SESSION['userRefCode'] = $player_details['userRefNo'];
                    $_SESSION['teamRefNumber'] = $player_details['TeamRefNumber'];

                }

                // switch ($user['reg_status']) {
                //     case 0:
                //         header("Location: student_registration.php");
                //         echo "is not working";
                //         break;
                //     default:
                //         header("Location: schools/studentDashboard.php");
                //         echo "is working";
                //         break;
                // }




                // Insert login log
                // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
                // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
                // $stmt->execute([
                //   ':userRefNo' => $user['userRefNo'],
                //   ':user_email' => $user['user_email'],
                //   ':user_position' => $user['user_position'],
                //   ':TeamRefNumber' => $player_details['TeamRefNumber'], // Adjust accordingly if TeamRefNumber is not directly available
                //   ':device_used' => $device,
                //   ':browser_used' => $user_agent,
                //   ':ip_address' => $ip_address,
                //   ':login_status' => $login_status,
                //   ':password_used' => $password
                // ]);


            }
            //else {

            // Fetch user information from yoshi_executive_tbl based on userRefNo
            // $stmt = $pdo->prepare("SELECT * FROM yoshi_officials_tbl WHERE userRefNo = :userRefNo");
            // $stmt->bindParam(':userRefNo', $user['userRefNo']);
            // $stmt->execute();
            // $executive = $stmt->fetch(PDO::FETCH_ASSOC);
            // User is a Manager or Coach
            // $_SESSION['teamRefNumber'] = $executive['TeamRefNumber'];

            // header("Location: officialDashboard.php");


            // Insert login log
            // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
            // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
            // $stmt->execute([
            //   ':userRefNo' => $user['userRefNo'],
            //   ':user_email' => $user['user_email'],
            //   ':user_position' => $user['user_position'],
            //   ':TeamRefNumber' => $executive['TeamRefNumber'],
            //   ':device_used' => $device,
            //   ':browser_used' => $user_agent,
            //   ':ip_address' => $ip_address,
            //   ':login_status' => $login_status,
            //   ':password_used' => $password
            // ]);


            //}
        } else {
            // Password does not match
            $login_error_message = "Invalid email or password."; // Define the notification message




            // Generate the JavaScript code to trigger the notification
            $login_error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$login_error_message',
                type: 'error',
                timeout: 1000,
                callbacks: {
                  onClose: function() {
                      $('#loginModal').modal('show'); // Show login modal when notification is closed
                  }
              } // 3 seconds
            }).show();
        </script>
        ";




            // Insert login log
//       $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
// VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
//       $stmt->execute([
//         ':userRefNo' => $user ? $user['userRefNo'] : 'Not a user',
//         ':user_email' => $email,
//         ':user_position' => $user ? $user['user_position'] : 'Not a user',
//         ':TeamRefNumber' => $user && $user['user_position'] == 'Manager/Coach' ? $executive['TeamRefNumber'] : 'Not a user', // Adjust accordingly if TeamRefNumber is not directly available
//         ':device_used' => $device,
//         ':browser_used' => $user_agent,
//         ':ip_address' => $ip_address,
//         ':login_status' => $login_status,
//         ':password_used' => $password
//       ]);
        }
    } else {

        // Password does not match

        $error_message = "Invalid email or password."; // Define the notification message
        // Set login status to 'failed'
        $login_status = 'failed';

        // Generate the JavaScript code to trigger the notification
        $error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$error_message',
                type: 'error',
                timeout: 1000,
                callbacks: {
                  onClose: function() {
                      $('#loginModal').modal('show'); // Show login modal when notification is closed
                  }
              } // 3 seconds
            }).show();
        </script>
        ";


        // Insert login log
//     $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
// VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
//     $stmt->execute([
//       ':userRefNo' => $user ? $user['userRefNo'] : 'Not a user',
//       ':user_email' => $email,
//       ':user_position' => $user ? $user['user_position'] : 'Not a user',
//       ':TeamRefNumber' => $user && $user['user_position'] == 'Manager/Coach' ? $executive['TeamRefNumber'] : 'Not a user', // Adjust accordingly if TeamRefNumber is not directly available
//       ':device_used' => $device,
//       ':browser_used' => $user_agent,
//       ':ip_address' => $ip_address,
//       ':login_status' => $login_status,
//       ':password_used' => $password
//     ]);


    }
}





require 'signupAuth.php';

ob_end_flush();
?>