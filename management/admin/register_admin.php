<?php
session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];

$stmt = $pdo->query("SELECT * FROM `yoshi_admins_tbl` ORDER BY id DESC, time_updated DESC");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

try {
    if (isset($_POST['addadmin'])) {

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

        $userRefCode = productCode(8); //function that generate 8 unique characters for reference number

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
        // function getRealIpAddr()
        // {
        // 	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // 		//check IP from internet
        // 		$ip = $_SERVER['HTTP_CLIENT_IP'];
        // 	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // 		//check IP is passed from proxy
        // 		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // 	} else {
        // 		//get IP address from remote address
        // 		$ip = $_SERVER['REMOTE_ADDR'];
        // 	}
        // 	return $ip;
        // }

        // ----------------------------------------------------------------//
        //Collecting user information//

        $full_name = check_input($_POST['full_name']); //check_input is sensitising the input field
        $phone = check_input($_POST['phone']); //check_input is sensitising the input field
        $email = check_input($_POST['email']); //check_input is sensitising the input field
        $role = check_input($_POST['role']); //check_input is sensitising the input field
        $gender = check_input($_POST['gender']); //check_input is sensitising the input field
        $temp_password = check_input($_POST['temp_password']); //check_input is sensitising the input field

        $status = "pending";
        $time = time(); //function for current time
        $date_create = date("d/M/Y", $time); //function for current date
        $time_create = date("H:i:s a"); //function for current time using "strtotime" to minus 1hour
        // $ipaddress = getRealIpAddr();


        // Collecting user information
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // Hash the password
        $hashed_password = md5($temp_password);
        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO `yoshi_admins_tbl` (`id`, `admin_userID`, `full_name`, `admin_email`, `admin_phone`, `admin_role`, `temp_password`,`time_created`, `date_created`, `acct_status`) VALUES (NULL, :admin_userID, :full_name, :email, :phone, :role, :hashed_password, :time_create, :date_create, :status)");
        $stmt->bindParam(':admin_userID', $userRefCode);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email); // Changed from 'admin_email' to 'email'
        $stmt->bindParam(':phone', $phone); // Changed from 'admin_phone' to 'phone'
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':hashed_password', $hashed_password);
        $stmt->bindParam(':time_create', $time_create); // Changed from 'time_created' to 'time_create'
        $stmt->bindParam(':date_create', $date_create); // Changed from 'date_created' to 'date_create'
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        ################################################
        $to = $email;
        // Set the email subject
        $subject = "Admin Account Created - Yoshi Tournaments";

        $message = "Dear Admin,\n\n";
        $message .= "An admin account has been created for you on Yoshi Tournaments.\n";
        $message .= "Please visit the following link to activate your account and create a new password:\n";
        $message .= "https://www.yoshitournaments.com/management/admin/index.php\n\n";
        $message .= "Your temporary password is: $temp_password\n\n";
        $message .= "Once you have activated your account and created a new password, you will be able to access the admin panel and manage the tournament.\n\n";
        $message .= "If you have any questions or need further assistance, please feel free to contact us at account@yoshitournaments.com or +2348167913802.\n\n";
        $message .= "Best Regards,\n";
        $message .= "Yoshi Tournament Team";

        // Set additional headers
        $headers = "From: no-reply@yoshitournament.com\r\n";
        $headers .= "Reply-To: support@yoshitournament.com\r\n";
        // $headers .= "CC: yoshitournaments@gmail.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        // Send the email
        $mail_sent = mail($to, $subject, $message, $headers);
        $register_message = "Account Successfully created !";
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
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>