<?php ?>

<div class='modal fade login-div-modal' id='registerModal' tabindex='-1' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>

      </div>
      <div class='modal-body'>
        <div id='login-td-div' class='com-div-md'>
          <span class='text-center d-table m-auto user-icon'> <i class='fas fa-user-circle'></i> </span>
          <h5 class='text-center mb-3 form-text'> Sign Up </h5>
          <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>

          <form method='POST' class='form'>

            <div class='login-modal-pn'>
              <div class='cm-select-login mt-3'>

                <div class='phone-div'>
                  <select name='position' class='form-select form-control login-input mb-3'
                    aria-label='Default select example' required>
                    <option value='' disabled selected hidden>Position</option>
                    <!-- <option value='Official'>Official</option>-->
                    <!--<option value='Manager/Coach'>Manager/Coach</option>-->
                    <option value='Coach/Sport Director'>Coach / Sport Director</option>
                    //
                    <!--<option value='Player'>Player</option>-->
                  </select>
                </div>

                <div class='phone-div'>
                  <input type='email' name='email' class='form-control login-input' placeholder='Email' alt='pn'
                    required />
                </div>

                <div class='phone-div'>
                  <div class='input-group'>
                    <input type='password' name='password' id='password' class='form-control login-input'
                      placeholder='Password' alt='pn' required />
                    <span
                      style="float: right; margin-left: -25px; margin-top: 10px; position: relative; z-index: 3;color:#aaa;"
                      type='button' id='showPassword'>
                      <i class='fas fa-eye'></i>
                    </span>
                  </div>
                </div>

                <div class='phone-div'>
                  <div class='input-group'>
                    <input type='password' name='confirm_password' id='confirmPassword' class='form-control login-input'
                      placeholder='Confirm Password' alt='pn' required>
                    <span
                      style="float: right; margin-left: -25px; margin-top: 10px; position: relative; z-index: 3;color:#aaa;"
                      type='button' id='showConfirmPassword'>
                      <i class='fas fa-eye'></i>
                      </>
                  </div>
                  <div class='invalid-feedback' id='passwordError'>
                    Passwords do not match.
                  </div>
                </div>

                <div class='forget2 mt-3 ml-3 d-flex justify-content-between'>
                  <input type='checkbox' name='check_policy' class='form-check-input' id='exampleCheck1' required />
                  <label class='form-check-label form-text' for='exampleCheck1'> By clicking signup, you agree to our
                    Terms of Use and Cookie Policy</label>
                </div>

              </div>


              <button type='submit' class='btn continue-bn login-input' name='register'> Sign Up </button>
            </div>
          </form>



          <p class='text-center  mt-3'> Already have an account?
            <a data-bs-toggle='modal' class='regster-bn' data-bs-target='#loginModal' data-bs-dismiss='modal'> Login
            </a>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');

    function togglePasswordVisibility(inputId) {
      const input = document.getElementById(inputId);
      const icon = input.nextElementSibling.querySelector('i');

      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }

    document.getElementById('showPassword').addEventListener('click', function () {
      togglePasswordVisibility('password');
    });

    document.getElementById('showConfirmPassword').addEventListener('click', function () {
      togglePasswordVisibility('confirmPassword');
    });

    confirmPasswordInput.addEventListener('keyup', function () {
      if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordInput.classList.add('is-invalid');
        passwordError.style.display = 'block';
      } else {
        confirmPasswordInput.classList.remove('is-invalid');
        passwordError.style.display = 'none';
      }
    });
  });
</script>

<?php ?>