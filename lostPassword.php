<div class='modal fade login-div-modal' id='lostpsModal' tabindex='-1' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class='modal-body'>
        <!-- Initial Email Form -->
        <div id='emailFormDiv' class='com-div-md'>
          <span class='text-center d-table m-auto user-icon'> <i class='fas fa-lock-open'></i> </span>
          <h6 class='text-center mb-3 form-text'>Forget Your Password?</h6>
          <form id='resetPasswordForm'>
            <div class='login-modal-pn'>
              <h6>We will email you a link to reset your password</h6>
              <div class='cm-select-login mt-3'>
                <div class='phone-div'>
                  <input type='email' class='form-control login-input' placeholder='Enter Your Email' name='email'
                    id='emailInput' required />
                </div>
              </div>
              <button type="submit" id='resetButton' class='btn continue-bn login-input'>Send Me a Password Reset
                Link</button>
            </div>
          </form>
        </div>

        <!-- Hidden Password Reset Form -->
        <div id='passwordResetDiv' class='com-div-md' style="display: none;">
          <span class='text-center d-table m-auto user-icon'> <i class='fas fa-lock'></i> </span>
          <h6 class='text-center mb-3 form-text'>Reset Your Password</h6>
          <form id='passwordResetForm'>
            <div class='login-modal-pn'>
              <div class='cm-select-login mt-3'>
                <div class='phone-div'>
                  <input type='password' class='form-control login-input' placeholder='Enter New Password'
                    id='newPassword' required />
                </div>
                <div class='phone-div mt-3'>
                  <input type='password' class='form-control login-input' placeholder='Confirm New Password'
                    id='confirmPassword' required />
                </div>
              </div>
              <button type="submit" id='confirmResetButton' class='btn continue-bn login-input'>Reset Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const emailForm = document.getElementById('resetPasswordForm');
    const passwordResetForm = document.getElementById('passwordResetForm');
    const emailInput = document.getElementById('emailInput');
    const emailFormDiv = document.getElementById('emailFormDiv');
    const passwordResetDiv = document.getElementById('passwordResetDiv');
    const newPasswordInput = document.getElementById('newPassword');
    const confirmPasswordInput = document.getElementById('confirmPassword');

    // Handle email form submission
    emailForm.addEventListener('submit', function (event) {
      event.preventDefault();
      const email = emailInput.value;


      // Perform an AJAX call to verify the email from the backend
      fetch('check_email.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email: email })
      })
        .then(response => response.json())
        .then(data => {
          if (data.exists) {
            // Email exists, proceed to show the password reset fields
            emailFormDiv.style.display = 'none';
            passwordResetDiv.style.display = 'block';
          } else {
            alert('Email not found.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });

    // Handle password reset form submission
    passwordResetForm.addEventListener('submit', function (event) {
      event.preventDefault();



      // Trim the values to remove any spaces before or after the input
      const newPassword = newPasswordInput.value.trim();
      const confirmPassword = confirmPasswordInput.value.trim();

      // const newPassword = newPasswordInput.value;
      // const confirmPassword = confirmPasswordInput.value;

      // if (newPassword !== confirmPassword) {
      //   alert('Passwords do not match!');
      //   return;
      // }

      if (newPassword.length < 8) {
        alert('Password must be at least 8 characters long');
        return;
      }

      // Perform an AJAX call to reset the password
      fetch('reset_password.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email: emailInput.value,
          newPassword: newPassword
        })
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Password reset successful!');
            $('#lostpsModal').modal('hide'); // Close current modal
            $('#loginModal').modal('show'); // Show login modal
          } else {
            alert('Password reset failed. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  });
</script>