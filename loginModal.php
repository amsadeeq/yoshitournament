<?php ?>


<div class='modal fade login-div-modal' id='loginModal' tabindex='-1' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog modal-fullscreen-sm-down'>
    <div class='modal-content'>
      <div class='modal-header'></div>
      <form method='POST' role='form'>
        <div class='modal-body'>

          <div id='login-td-div' class='com-div-md'>
            <span class='text-center d-table m-auto user-icon'> <i class='fas fa-user-circle'></i> </span>
            <h5 class='text-center mb-3 form-text'> Login </h5>

            <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>×</span>
            </button>


            <div class='login-modal-pn'>

              <div class='cm-select-login mt-3'>
                <div class='country-dp'>

                  <input type='email' name='login_email' class='form-control login-input' id='login-email'
                    placeholder='Email' alt='pn' required />
                </div>
                <div class='phone-div'>

                  <div class='input-group'>
                    <input type='password' name='login_password' class='form-control login-input' id='login-password'
                      placeholder='Password' alt='pn' required />
                    <span class=''
                      style="float: right; margin-left: -25px; margin-top: 10px; position: relative; z-index: 3;color:#aaa;"
                      type='button' id='password-toggle'>
                      <i class='fa fa-eye'></i>
                    </span>
                  </div>
                </div>


              </div>

              <button type='submit' class='btn continue-bn login-input' name='login'> Sign In </button>
            </div>

            <p class='text-center  mt-3'>
              <a data-bs-toggle='modal' class='regster-bn' data-bs-target='#lostpsModal' data-bs-dismiss='modal'> Forget
                password ? </a>
            </p>

            <p class='text-center  mt-3'> Student or Player ?
              <a class='regster-bn' href='referenceNumber.php'> Reference Number </a>
            </p>



          </div>


        </div>
      </form>

      <script>
        const passwordToggle = document.getElementById('password-toggle');
        const passwordInput = document.getElementById('login-password');

        passwordToggle.addEventListener('click', function () {
          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.innerHTML = '<i class="fa fa-eye-slash"></i>';
          } else {
            passwordInput.type = 'password';
            passwordToggle.innerHTML = '<i class="fa fa-eye"></i>';
          }
        });
      </script>
    </div>
  </div>
</div>

<!-- <p class='text-center  mt-3'> Do not have an account yet ?
  <a data-bs-toggle='modal' class='regster-bn' data-bs-target='#registerModal' data-bs-dismiss='modal'> Register </a>
</p> -->
<?php ?>