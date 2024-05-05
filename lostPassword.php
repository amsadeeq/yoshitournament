<?php

session_start();
ob_start();

if (isset($_POST['reset_button'])) {

  //function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
  function check_input($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
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
  $roll = check_input($_POST['position']);
  $email = check_input($_POST['email']);
  $password = check_input($_POST['password']);
  $confirm_Password = check_input($_POST['confirm_Password']);
  $time = time();//function for current time
  $date_create = date("d/M/Y", $time);//function for current date
  $time_create = date("H:i:s a");//function for current time using "strtotime" to minus 1hour
  $ipaddress = getRealIpAddr();
}

?>
<?php

echo "
 <div class='modal fade login-div-modal' id='lostpsModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
          <form method = 'POST'>
           <div class='login-modal-pn'>
                <h6> We will email you a link to reset your password</h6>
                <div class='cm-select-login mt-3'>

                <div class='phone-div'>
                    <input type='email' class='form-control login-input' placeholder='Enter Your Email ' alt='pn' required />
                </div>
                
                </div>
                
                <button name='reset_button' class='btn continue-bn login-input'> Send Me a password reset Link </button>
            </div>
          </form>
 
         </div>
       </div>
     
     </div>
   </div>
 </div>";
?>