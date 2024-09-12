<?php

session_start();
ob_start();

require 'connection.php';

if (isset($_POST['reset_button'])) {

  // Function checking for malicious inputs using trim(), stripslashes(), htmlspecialchars(), htmlentities()
  function check_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
  }

  // Function for collecting user IP address
  function getRealIpAddr()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      // Check IP from internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      // Check IP is passed from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      // Get IP address from remote address
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  // Collecting user information
  // $roll = check_input($_POST['position']);
  $email = check_input($_POST['email']);
  // $password = check_input($_POST['password']);
  // $confirm_Password = check_input($_POST['confirm_Password']);
  $time = time(); // Function for current time
  $date_reset = date("d/M/Y", $time); // Function for current date
  $time_reset = date("H:i:s a"); // Function for current time using "strtotime" to minus 1 hour
  $ipaddress = getRealIpAddr();

  // Generate a random token for password reset
  $token = bin2hex(random_bytes(32));

  // Send password reset link to the user's email
  $resetLink = "http://yoshitournaments.com/reset_password.php?email=" . urlencode($email) . "&token=" . urlencode($token);
  // Replace "http://example.com/reset_password.php" with the actual URL of your password reset page

  // Update the database with the reset token and reset time




  // Update the yoshi_signup_tbl table
  $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET time_reset = :time_reset, reset_code = :reset_code, date_reset = :date_reset WHERE user_email = :email");
  $stmt->bindParam(':time_reset', $time_create);
  $stmt->bindParam(':reset_code', $token);
  $stmt->bindParam(':date_reset', $date_create);
  $stmt->bindParam(':email', $email);
  $stmt->execute();



  // Send the password reset link to the user's email
  // You can use a library like PHPMailer or the built-in mail() function to send the email
  // Here's an example using PHPMailer:

  ################################################
  $to = $email;
  // Set the email subject
  $subject = "Password Reset - YAPS 2024 Yoshi Tournament - Abuja  " . date("Y");
  // Set the email message

  $message .= "Kindly reset your password using the link below: \n";
  $message .= $resetLink;
  $message .= "Secure your login credential: $email \n\n\n";

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

  echo "<script>$('#lostpsModal').modal('show');</script>";
  exit();






  // Uncomment the code above and configure it with your email settings to send the password reset link

}

?>


<div class='modal fade login-div-modal' id='lostpsModal' tabindex='-1' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <!-- <h5 class='modal-title' id='exampleModalLabel'>Register</h5>
         <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button> -->
      </div>
      <div class='modal-body'>
        <div id='login-td-div' class='com-div-md'>
          <span class='text-center d-table m-auto user-icon'> <i class='fas fa-lock-open'></i> </span>
          <h6 class='text-center mb-3 form-text'> Forget Your Password? </h6>
          <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>
          <form method='POST'>
            <div class='login-modal-pn'>
              <h6> We will email you a link to reset your password</h6>
              <div class='cm-select-login mt-3'>
                <div class='phone-div'>
                  <input type='email' class='form-control login-input' placeholder='Enter Your Email' name='email'
                    required />
                </div>
              </div>
              <button id='resetButton' name='reset_button' class='btn continue-bn login-input'> Send Me a password reset
                Link </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>



<!-- <script>
  document.getElementById('resetButton').addEventListener('click', function () {
    var emailInput = document.querySelector('input[name="email"]');
    var resetButton = document.getElementById('resetButton');
    var message = document.createElement('h6');
    message.textContent = 'We have sent you a reset link to your email address';
    resetButton.style.display = 'none';
    emailInput.style.display = 'none';
    resetButton.parentNode.appendChild(message);
  });
</script> -->

<script>
  document.getElementById('resetButton').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent page reload
    var emailInput = document.querySelector('input[name="email"]');
    var resetButton = document.getElementById('resetButton');
    var message = document.createElement('h6');
    message.textContent = 'We have sent you a reset link to your email address';
    resetButton.style.display = 'none';
    emailInput.style.display = 'none';
    resetButton.parentNode.appendChild(message);

    // Show the modal again
    var modal = document.getElementById('lostpsModal');
    modal.style.display = 'block';
  });
</script>
<script>$('#lostpsModal').modal('show');</script>
<?php ?>