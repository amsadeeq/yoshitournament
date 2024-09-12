<?php

session_start();
ob_start();

require 'connection.php';

$response = [];

if (isset($_POST['reset_button'])) {

  // Sanitize inputs
  function check_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
  }

  function getRealIpAddr()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      return $_SERVER['REMOTE_ADDR'];
    }
  }

  $email = check_input($_POST['email']);
  $time = time();
  $date_reset = date("d/M/Y", $time);
  $time_reset = date("H:i:s a");
  $ipaddress = getRealIpAddr();

  // Generate a random token for password reset
  $token = bin2hex(random_bytes(32));
  $resetLink = "http://yoshitournaments.com/reset_password.php?email=" . urlencode($email) . "&token=" . urlencode($token);

  // Update the yoshi_signup_tbl table
  $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET time_reset = :time_reset, reset_code = :reset_code, date_reset = :date_reset WHERE user_email = :email");
  $stmt->bindParam(':time_reset', $time_reset);
  $stmt->bindParam(':reset_code', $token);
  $stmt->bindParam(':date_reset', $date_reset);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  // Send email (You can add actual email sending logic here)
  // Assuming email is sent successfully

  $response['status'] = "success";
  $response['message'] = "We have sent you a reset link to your email address.";
  echo json_encode($response);
  exit();
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
          <form id='resetPasswordForm' method='POST'>
            <div class='login-modal-pn'>
              <h6> We will email you a link to reset your password</h6>
              <div class='cm-select-login mt-3'>
                <div class='phone-div'>
                  <input type='email' class='form-control login-input' placeholder='Enter Your Email' name='email'
                    required />
                </div>
              </div>
              <button type="submit" id='resetButton' class='btn continue-bn login-input'>Send Me a password reset
                Link</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
    event.preventDefault();  // Prevent the form from reloading the page

    var formData = new FormData(this);

    fetch('reset_password.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Change the content of the modal
          document.getElementById('resetButton').style.display = 'none';
          document.querySelector('input[name="email"]').style.display = 'none';

          var message = document.createElement('h6');
          message.textContent = data.message;
          document.querySelector('.login-modal-pn').appendChild(message);

          // Show the modal again
          var modal = new bootstrap.Modal(document.getElementById('lostpsModal'), {
            backdrop: 'static',
            keyboard: false
          });
          modal.show();
        }
      })
      .catch(error => console.error('Error:', error));
  });
</script>


<?php ?>