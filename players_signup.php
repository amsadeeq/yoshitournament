<?php
// Start the session to access session variables
session_start();
// Connect to the database
require 'connection.php';


if (isset($_POST['register'])) {


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

  $userRefCode = productCode(8);//function that generate 8 unique characters for reference number



  // Function to generate a random string of 3 capital letters
  function generateRandomLetters()
  {
    $letters = '';
    $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    for ($i = 0; $i < 3; $i++) {
      $letters .= $alphabet[rand(0, strlen($alphabet) - 1)];
    }
    return $letters;
  }

  // Function to generate a random string of 5 numbers
  function generateRandomNumbers()
  {
    $numbers = '';
    for ($i = 0; $i < 5; $i++) {
      $numbers .= rand(0, 9);
    }
    return $numbers;
  }

  // Generate the combination
  $letters = generateRandomLetters();
  $numbers = generateRandomNumbers();
  $combination = $letters . $numbers;

  // Shuffle the combination
  $combinationArray = str_split($combination);
  shuffle($combinationArray);
  $TeamRefNumber = implode('', $combinationArray);

  // Output the result
  $TeamRefNumber;





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

  $position = check_input($_POST['position']); //check_input is sensitising the input field
  $email = check_input($_POST['email']); //check_input is sensitising the input field
  $password = check_input($_POST['password']); //check_input is sensitising the input field
  $confirm_Password = check_input($_POST['confirm_password']); //check_input is sensitising the input field


  $time = time();//function for current time
  $date_create = date("d/M/Y", $time);//function for current date
  $time_create = date("H:i:s a");//function for current time using "strtotime" to minus 1hour
  $ipaddress = getRealIpAddr();






  if ($password != $confirm_Password) {

    $password_error = 'Oops! Password did not match';

  } else {
    // Collecting user information
    $position = sanitize_input($position);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $termsCondition = isset($_POST['termsCondition']) ? 0 : 1; // Convert checkbox value to boolean

    // Hash the password
    $hashed_password = md5($password);

    //########## Initiating session #####################
    $_SESSION['email'] = $email;                    //###
    $_SESSION['position'] = $position;               //###
    $_SESSION['userRefCode'] = $userRefCode;        //###
    //########## Initiating session #####################



    // Insert data into the database

    $stmt = $pdo->prepare("INSERT INTO `yoshi_signup_tbl` (`id`, `userRefNo`, `user_email`, `user_position`,`TeamRefNumber`,`reg_status`, `user_password`, `termsCondition`, `time_created`, `date_created`, `ip_address`) VALUES (NULL, :userRefNo, :email, :position,:TeamRefNumber, 0, :password, :termsCondition, :time_create, :date_create, :ip_address)");
    $stmt->bindParam(':userRefNo', $userRefCode);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':TeamRefNumber', $player_teamRefNumber);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':termsCondition', $termsCondition);
    $stmt->bindParam(':time_create', $time_create);
    $stmt->bindParam(':date_create', $date_create);
    $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']); // Get user's IP address
    $stmt->execute();



    ################################################
    $to = $email;
    // Set the email subject
    $subject = "YAPS 2024 Yoshi Tournament - Abuja  " . date("Y");

    // Set the email message
    $message = "Dear $position,\n\n";
    $message .= "Thank you for creating Account with Yoshi Tournament " . date("Y") . ".\n";
    $message .= "For Yoshi Abuja Private Schools (YAPS) " . date("Y") . ".\n";
    $message .= "Secure your login credential: $email \n";
    $message .= "Password: ******** \n";
    $message .= "Visit www.yoshitournaments.com\n\n";
    $message .= "Sign: Mr. Sadeeq \n Yoshi Tournaments \n\n\n";
    $message .= "Powered by: Yoshi Football Academy (UAE) www.yoshifa.com All Rights Reserved " . date('Y');

    // Set additional headers
    $headers = "From: no-reply@yoshitournament.com\r\n";
    $headers .= "Reply-To: support@yoshitournament.com\r\n";
    // $headers .= "CC: yoshitournaments@gmail.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    $mail_sent = mail($to, $subject, $message, $headers);

    if ($position == 'Student') {
      header("Location:student_registration.php");
      exit();
    }

  }





}










?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Player Signup - Yoshi Tournament </title>
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800&family=Cormorant:wght@500&family=Josefin+Sans:wght@400;500;600&family=Merriweather:wght@300;400;700;900&family=Nunito:wght@300;400;500;600&family=Open+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&family=Saira+Condensed:wght@400;500;600;700&display=swap"
    rel="stylesheet">


  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">

  <!-- our project just needs Font Awesome Solid + Brands -->
  <link href="fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="fontawesome/css/brands.css" rel="stylesheet" />
  <link href="fontawesome/css/solid.css" rel="stylesheet" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- Include eye icon image for showing and hiding passwords -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">




</head>

<body>

  <header class="float-start w-100">

    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" alt="logo" class="yoshi_logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <!-- <li class="nav-item">
              <a class="nav-link" href="matches.php">Matches</a>
            </li> -->

            <!-- <li class="nav-item">
              <a class="nav-link " href="about.php">The Tournament</a>
            </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="schedule.php">Schedule</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="news.php">News</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="players.php">Players</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link" href="media.php">Media</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="shop.php">Shop</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="contact.php">Contact</a>
             </li> -->

            <!-- <li class="nav-item">
              <a class="nav-link btn join-btn" data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal">
                
                Register</a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link btn bar-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile"><i
                  class="fas fa-bars"></i></a>
            </li>

          </ul>

        </div>
      </div>
    </nav>

  </header>

  <section class="sub-main-banner float-start w-100">


    <div class="sub-banner">
      <div class="container">
        <h1 class="text-center"> Player Signup </h1>

      </div>
    </div>



    <!-- <div class="cart-sec-ban">
              <ul class="list-unstyled">
                 <li>
                   <a href="cart.php" class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                   </a>
                 </li>
                 <li>
                   <a href="wishlist.php" class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                   </a>
                 </li>
              </ul>
            </div> -->

  </section>

  <section class="body-part-total float-start w-100">

    <div class="checkout-page-main-div booking-page-main my-5">

      <div class="container">
        <div class="form-wizard">

          <div class="form-wizard-header">

            <ul class="list-unstyled form-wizard-steps clearfix d-none">
              <li class="active">
                <small class="d-block mb-3"> Checkout </small>
                <span>1</span>

              </li>


              <li>
                <small class="d-block mb-3"> Finished </small>
                <span>4</span>

              </li>

            </ul>

          </div>


          <fieldset class="wizard-fieldset show">

            <div class='modal fade login-div-modal' data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true" aria-labelledby='exampleModalLabel'
              aria-hidden='true'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>

                  </div>
                  <div class='modal-body'>
                    <div id='login-td-div' class='com-div-md'>
                      <span class='text-center d-table m-auto user-icon'> <i class='fas fa-user-circle'></i> </span>
                      <h5 class='text-center mb-3 form-text'> Player Signup </h5>


                      <form method='POST' class='form'>

                        <div class='login-modal-pn'>
                          <div class='cm-select-login mt-3'>

                            <div class='phone-div'>
                              <select name='position' class='form-select form-control login-input mb-3'
                                aria-label='Default select example' required>
                                <option value='' disabled selected hidden>Position</option>
                                <!-- <option value='Official'>Official</option>-->
                                <!--<option value='Manager/Coach'>Manager/Coach</option>-->
                                <option value='Student'>Student</option>
                                <!--<option value='Player'>Player</option>-->
                              </select>
                            </div>

                            <div class='phone-div'>
                              <input type='email' name='email' class='form-control login-input' placeholder='Email'
                                alt='pn' required />
                            </div>

                            <div class='phone-div'>
                              <input type='password' name='password' class='form-control login-input'
                                placeholder='Password' alt='pn' required />
                            </div>

                            <div class='phone-div'>
                              <input type='password' name='confirm_password' class='form-control login-input'
                                placeholder='Confirm Password' alt='pn' required>
                            </div>

                            <div class='forget2 mt-3 ml-3 d-flex justify-content-between'>
                              <input type='checkbox' name='check_policy' class='form-check-input' id='exampleCheck1'
                                required />
                              <label class='form-check-label form-text' for='exampleCheck1'> By clicking signup, you
                                agree to our Terms of Use and Cookie Policy</label>
                            </div>

                          </div>


                          <button type='submit' class='btn continue-bn login-input' name='register'> Sign Up </button>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>






          </fieldset>



        </div>

      </div>

    </div>

  </section>




















  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- Include SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <?php

  echo $error_invalid_notify;

  ?>


  <script>
    AOS.init({
      offset: 100,
      easing: 'ease',
      delay: 0,
      once: true,
      duration: 800,

    });

  </script>

  <script>
    $(document).ready(function () {
      var TIMEOUT = 6000;

      var interval = setInterval(handleNext, TIMEOUT);

      function handleNext() {
        var $radios = $('input[class*="slide-radio"]');
        var $activeRadio = $('input[class*="slide-radio"]:checked');

        var currentIndex = $activeRadio.index();
        var radiosLength = $radios.length;

        $radios.attr("checked", false);

        if (currentIndex >= radiosLength - 1) {
          $radios.first().attr("checked", true);
        } else {
          $activeRadio.next('input[class*="slide-radio"]').attr("checked", true);
        }
      }
    });
  </script>

  <script>
    document.getElementById("submit-button").addEventListener("click", function (event) {
      event.preventDefault();

      // Enable loader
      document.getElementById("loader").style.display = "inline-block";

      // Simulate a delay
      setTimeout(function () {
        // Redirect to next page (replace "https://www.example.com" with your desired URL)
        window.location.href = "index.php";
      }, 2000);
    });
  </script>







  <script>
    $(document).ready(function () {
      $('#exampleModal').modal('show');
      $('#exampleModal').on('shown.bs.modal', function () {
        // Remove the click event listener for dismissing the modal
        $(document).off('click', '[data-dismiss="modal"][href="#exampleModal"]');
        $(document).off('click', '[data-dismiss="modal"]');

        // Disable the keyboard interaction
        $(document).off('keydown', '[data-dismiss="modal"].btn-check');

        // When the user clicks on <span> (x), close the modal
        $('#exampleModal').on('hidden.bs.modal', function () {
          // Do not redirect the user
        });
      });

      // Open the modal automatically when the page loads
      $(document).ready(function () {
        $('#exampleModal').modal({
          backdrop: 'static',
          keyboard: false
        });
      });
    });

  </script>




</body>

</html>