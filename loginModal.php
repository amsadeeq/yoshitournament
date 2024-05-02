<?php
echo "
  
<div class='modal fade login-div-modal' id='loginModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
   <div class='modal-dialog'>
     <div class='modal-content'>
       <div class='modal-header'></div>
        <form method = 'POST' role = 'form'>
       <div class='modal-body'>
          
         <div id='login-td-div' class='com-div-md'>
           <span class='text-center d-table m-auto user-icon'> <i class='fas fa-user-circle'></i> </span>
           <h5 class='text-center mb-3 form-text'> Sign In </h5>
           <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>
          
          
           <div class='login-modal-pn'>
           
            <div class='cm-select-login mt-3'>
              <div class='country-dp'>
                
                <input type='email' name='login_email' class='form-control login-input' id='login-email' placeholder='Email' alt='pn' required />
              </div>
              <div class='phone-div'>
                
                 <input type='password' name='login_password' class='form-control login-input' id='login-password' placeholder='Password' alt='pn' required />
              </div>
              
           
            </div>
            
            <button type='submit' class='btn continue-bn login-input' name = 'login'> Sign In </button>
          </div>
 
          <p class='text-center  mt-3'>  
           <a data-bs-toggle='modal' class='regster-bn' data-bs-target='#lostpsModal' data-bs-dismiss='modal'> Forget password ? </a>  </p>
           
           
            <p class='text-center  mt-3'> Do not have an account yet ? 
              <a data-bs-toggle='modal' class='regster-bn' data-bs-target='#registerModal' data-bs-dismiss='modal'> Register </a>  </p>
         </div>
 
       
       </div>
       </form>
     </div>
   </div>
</div>";
?>