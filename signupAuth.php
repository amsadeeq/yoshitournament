<?php

session_start();
ob_start();

require 'connection.php';

if (isset($_SESSION['teamRefNumber'])) {
    $player_teamRefNumber = $_SESSION['teamRefNumber'];
} else {
    $player_teamRefNumber = '';
}

if (isset($_POST['register'])) {


    //**** function reference number to each registered coach/manager of the team ***//
    function productCode($length = 8)
    {

        // start with a blank reference number
        $userRefCode = "";

        // define possible characters - any character in this string can be
        $possible = "0123456789";

        // we refer to the length of $possible a few times, so let's grab it now
        $maxlength = strlen($possible);

        // check for length overflow and truncate if necessary
        if ($length > $maxlength) {
            $length = $maxlength;
        }

        // set up a counter for how many characters are in the pin so far
        $i = 0;

        // add random characters to $userRefCode until $length is reached
        while ($i < $length) {

            // pick a random character from the possible ones
            $char = substr($possible, mt_rand(0, $maxlength - 1), 1);

            // have we already used this character in $userRefCode?
            if (!strstr($userRefCode, $char)) {
                // no, so it's OK to add it onto the end of whatever we've already got...
                $userRefCode .= $char;
                // ... and increase the counter by one
                $i++;
            }
        }

        // done!
        return $userRefCode;
    }

    $userRefCode = productCode(8);//function that generate 8 unique characters for reference number



    // Function to generate a random string of 3 capital letters
    function generateRandomLetters()
    {
        $letters = '';
        $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        for ($i = 0; $i < 3; $i++) {
            $letters .= $alphabet[rand(0, strlen($alphabet) - 1)];
        }
        return $letters;
    }

    // Function to generate a random string of 5 numbers
    function generateRandomNumbers()
    {
        $numbers = '';
        for ($i = 0; $i < 5; $i++) {
            $numbers .= rand(0, 9);
        }
        return $numbers;
    }

    // Generate the combination
    $letters = generateRandomLetters();
    $numbers = generateRandomNumbers();
    $combination = $letters . $numbers;

    // Shuffle the combination
    $combinationArray = str_split($combination);
    shuffle($combinationArray);
    $TeamRefNumber = implode('', $combinationArray);

    // Output the result
    $TeamRefNumber;





    //function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
    function check_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        return $data;
    }

    // Function to sanitize input data
    function sanitize_input($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    //function for collecting user ip address
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //check IP from internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //check IP is passed from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            //get IP address from remote address
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    // ----------------------------------------------------------------//
    //Collecting user information//

    $position = check_input($_POST['position']); //check_input is sensitising the input field
    $email = check_input($_POST['email']); //check_input is sensitising the input field
    $password = check_input($_POST['password']); //check_input is sensitising the input field
    $confirm_Password = check_input($_POST['confirm_password']); //check_input is sensitising the input field


    $time = time();//function for current time
    $date_create = date("d/M/Y", $time);//function for current date
    $time_create = date("H:i:s a");//function for current time using "strtotime" to minus 1hour
    $ipaddress = getRealIpAddr();


    // Check if email is already registered
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `yoshi_signup_tbl` WHERE `user_email` = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $email_error = 'Email already registered';
        $email_error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$email_error',
                type: 'error',
                timeout: 1000,
                callbacks: {
                  onClose: function() {
                      $('#registerModal').modal('show'); // Show login modal when notification is closed
                  }
              } // 3 seconds
            }).show();
        </script>
        ";
    } else {



        if ($password != $confirm_Password) {

            $password_error = 'Oops! Password did not match';

        } else {
            // Collecting user information
            $position = sanitize_input($position);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            $termsCondition = isset($_POST['termsCondition']) ? 0 : 1; // Convert checkbox value to boolean

            // Hash the password
            $hashed_password = md5($password);





            // Insert data into the database

            $stmt = $pdo->prepare("INSERT INTO `yoshi_signup_tbl` (`id`, `userRefNo`, `user_email`, `user_position`,`TeamRefNumber`,`reg_status`, `user_password`, `termsCondition`, `time_created`, `date_created`, `ip_address`) VALUES (NULL, :userRefNo, :email, :position,:TeamRefNumber, 0, :password, :termsCondition, :time_create, :date_create, :ip_address)");
            $stmt->bindParam(':userRefNo', $userRefCode);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':TeamRefNumber', $player_teamRefNumber);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':termsCondition', $termsCondition);
            $stmt->bindParam(':time_create', $time_create);
            $stmt->bindParam(':date_create', $date_create);
            $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']); // Get user's IP address
            $stmt->execute();

            //########## Initiating session #####################
            $_SESSION['user_email'] = $email;                   //###
            $_SESSION['user_position'] = $position;           //###
            $_SESSION['userRefCode'] = $userRefCode;        //###
            if (isset($_SESSION['teamRefNumber'])) {
                $_SESSION['teamRefNumber'] = $teamRefNumber; //###
            }
            //########## Initiating session #####################

            ################################################
            $to = $email;
            // Set the email subject
            $subject = "YAPS 2024 Yoshi Tournament - Abuja  " . date("Y");

            // Set the email message
            $message = "Dear $position,\n\n";
            $message .= "Thank you for creating Account with Yoshi Tournament " . date("Y") . ".\n";
            $message .= "For Yoshi Abuja Private Schools (YAPS) " . date("Y") . ".\n";
            $message .= "Secure your login credential: $email \n";
            $message .= "Password: ******** \n";
            $message .= "Visit www.yoshitournaments.com\n\n\n";
            $message .= "Best Regards,\n\n";
            $message .= "Halilu Muazu\nTournament Coordinator\n\n";
            $message .= "Powered by: Yoshi Football Academy, Dubai (UAE) www.yoshifa.com  " . date('Y');

            // Set additional headers
            $headers = "From: no-reply@yoshitournament.com\r\n";
            $headers .= "Reply-To: support@yoshitournament.com\r\n";
            // $headers .= "CC: yoshitournaments@gmail.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            // Send the email
            $mail_sent = mail($to, $subject, $message, $headers);

            if ($position == 'Player') {
                header("Location:referenceNumber.php");
                exit();
            } elseif ($position == 'Official') {
                header("Location:official_registration.php");
                exit();
            } elseif ($position == 'Student') {
                header("Location:student_registration.php");
                exit();
            } elseif ($position == 'Coach/Sport Director') {
                // header("Location:school_registration.php");
                header("Location:confirmed_signup.php");

                exit();
            } else {
                $register_message = "Welcome  to Yoshi Tournament platform " . $position;
                //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
                // Define the notification message


                // Generate the JavaScript code to trigger the notification
                $welcome_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$register_message',
                type: 'success',
                timeout: 1000
                
            }).show();
        </script>
        ";
                $_SESSION['reg_notify'] = $welcome_notify;
                header('Location:executive_registration.php');

                exit();
            }

        }
    }





}

?>