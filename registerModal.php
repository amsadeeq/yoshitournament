<?php
echo "
    <div class='modal fade login-div-modal' id='registerModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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

        <form method = 'POST' class='form'>

            <div class='login-modal-pn'>
                <div class='cm-select-login mt-3'>
              
                    <div class='phone-div'>
                        <select name='position' class='form-select form-control login-input mb-3' aria-label='Default select example' required>
                        <option value='' disabled selected hidden>Position</option>
                        <option value='Official'>Official</option>
                        <option value='Manager/Coach'>Manager/Coach</option>
                        <option value='Player'>Player</option>
                        </select>
                    </div>

                    <div class='phone-div'>
                        <input type='email' name='email' class='form-control login-input' placeholder='Email' alt='pn' required />
                    </div>

                    <div class='phone-div'>
                        <input type='password' name='password' class='form-control login-input' placeholder='Password' alt='pn' required />
                    </div>

                    <div class='phone-div'>
                        <input type='password' name='confirm_password' class='form-control login-input' placeholder='Confirm Password' alt='pn' required>
                    </div>
                
                    <div class='forget2 mt-3 ml-3 d-flex justify-content-between'>
                        <input type='checkbox' name='check_policy' class='form-check-input' id='exampleCheck1' required />
                        <label class='form-check-label form-text' for='exampleCheck1'> By clicking Register, you agree to our Terms of Use and Cookie Policy</label>
                    </div>
           
                </div>
            
                
                <button type='submit' class='btn continue-bn login-input' name='register' > Sign Up </button>
            </div>
        </form>

 
          <h6 class='text-center'>
           or sign in with
          </h6>
          <ul class='list-unstyled socal-linka-div d-flex  align-content-center justify-content-center'>
             <li>
                <a href='#' class='facebtn'> <i class='fab fa-facebook-f'></i> </a>
             </li>
             <li>
               <a href='#' class='twiiterbtn'> <i class='fab fa-twitter'></i> </a>
             </li>
             <li>
               <a href='#' class='googlebtn'> <i class='fab fa-google-plus-g'></i> </a>
             </li>
             
          </ul>
            <p class='text-center  mt-3'> Already have an account? 
              <a data-bs-toggle='modal' class='regster-bn' data-bs-target='#loginModal' data-bs-dismiss='modal'> Login </a>  </p>
         </div>
       </div>
      
     </div>
   </div>
</div>";
?>