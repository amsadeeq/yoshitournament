<?php

session_start();
ob_start();

require 'connection.php';

$show_modal = false;  // This flag will determine whether the modal should be shown

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
  $email = check_input($_POST['email']);
  $time = time(); // Function for current time
  $date_reset = date("d/M/Y", $time); // Function for current date
  $time_reset = date("H:i:s a"); // Function for current time using "strtotime" to minus 1 hour
  $ipaddress = getRealIpAddr();

  // Generate a random token for password reset
  $token = bin2hex(random_bytes(32));

  // Send password reset link to the user's email
  $resetLink = "http://yoshitournaments.com/reset_password.php?email=" . urlencode($email) . "&token=" . urlencode($token);

  // Update the yoshi_signup_tbl table
  $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET time_reset = :time_reset, reset_code = :reset_code, date_reset = :date_reset WHERE user_email = :email");
  $stmt->bindParam(':time_reset', $time_reset);
  $stmt->bindParam(':reset_code', $token);
  $stmt->bindParam(':date_reset', $date_reset);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  // Send the password reset email (mail function or PHPMailer)
  $to = $email;
  $subject = "Password Reset - YAPS 2024 Yoshi Tournament - Abuja  " . date("Y");
  $message = "Kindly reset your password using the link below: \n";
  $message .= $resetLink;
  $message .= "\nSecure your login credential: $email \n\n";
  $message .= "Best Regards,\nHalilu Muazu\nTournament Coordinator\nPowered by: Yoshi Football Academy, Dubai (UAE) www.yoshifa.com  " . date('Y');

  $headers = "From: no-reply@yoshitournament.com\r\n";
  $headers .= "Reply-To: support@yoshitournament.com\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  $mail_sent = mail($to, $subject, $message, $headers);

  if ($mail_sent) {
    $show_modal = true;  // Set the flag to true to show the modal
  }

}

?>

<!-- Modal HTML Structure -->
<div class='modal fade login-div-modal' id='lostpsModal' tabindex='-1' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'></div>
      <div class='modal-body'>
        <div id='login-td-div' class='com-div-md'>
          <span class='text-center d-table m-auto user-icon'> <i class='fas fa-lock-open'></i> </span>
          <h6 class='text-center mb-3 form-text'> Forget Your Password? </h6>
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

<?php if ($show_modal): ?>
  <script>
    $(document).ready(function () {
      $('#lostpsModal').modal('show');
      document.getElementById('resetButton').style.display = 'none';
      document.querySelector('input[name="email"]').style.display = 'none';
      var message = document.createElement('h6');
      message.textContent = 'We have sent you a reset link to your email address';
      document.querySelector('.login-modal-pn').appendChild(message);
    });
  </script>
<?php endif; ?>