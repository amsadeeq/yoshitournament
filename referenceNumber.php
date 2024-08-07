<?php
// Start the session to access session variables
session_start();
// Connect to the database
require 'connection.php';


// Check if the reference number is submitted
if (isset($_POST['complete_registration'])) {

  //function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
  function check_input($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
  }



  $refNumber = check_input($_POST['refNumber']);



  // Prepare and execute query to check if the reference number exists
  $stmt = $pdo->prepare("SELECT * FROM yoshi_executive_tbl WHERE TeamRefNumber = :refNumber");
  $stmt->bindParam(':refNumber', $refNumber);
  $stmt->execute();

  $stmt2 = $pdo->prepare("SELECT * FROM yoshi_schools_officials_tbl WHERE TeamRefNumber = :refNumber");
  $stmt2->bindParam(':refNumber', $refNumber);
  $stmt2->execute();





  // Fetch the details if the reference number exists
  if ($stmt->rowCount() > 0) {




    // Prepare and execute the SQL query stmt = statement
    $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl 
                           SET TeamRefNumber = :TeamRefNumber, reg_status = 'complete' 
                           WHERE userRefNo = :userRefNo");
    $stmt->bindParam(':TeamRefNumber', $teamRefNumber);
    $stmt->bindParam(':userRefNo', $_SESSION['userRefCode']);
    $stmt->execute();


    //$executiveDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Insert record into yoshi_players_tbl
    // $insertStmt = $pdo->prepare("INSERT INTO yoshi_players_tbl (userRefNo, TeamRefNumber, user_position, surname, firstname, dob, country, state, city, zipcode, phone, email, address, team_name, time_created, date_created, ip_address) 
    //                                 VALUES (:userRefNo, :TeamRefNumber, :user_position, :surname, :firstname, :dob, :country, :state, :city, :zipcode, :phone, :email, :address, :team_name, :time_created, :date_created, :ip_address)");
    // $insertStmt->bindParam(':userRefNo', $_SESSION['userRefNo']);
    // $insertStmt->bindParam(':TeamRefNumber', $executiveDetails['TeamRefNumber']);
    // $insertStmt->bindParam(':user_position', $executiveDetails['user_position']);
    // $insertStmt->bindParam(':surname', $executiveDetails['surname']);
    // $insertStmt->bindParam(':firstname', $executiveDetails['firstname']);
    // $insertStmt->bindParam(':dob', $executiveDetails['dob']);
    // $insertStmt->bindParam(':country', $executiveDetails['country']);
    // $insertStmt->bindParam(':state', $executiveDetails['state']);
    // $insertStmt->bindParam(':city', $executiveDetails['city']);
    // $insertStmt->bindParam(':zipcode', $executiveDetails['zipcode']);
    // $insertStmt->bindParam(':phone', $executiveDetails['phone']);
    // $insertStmt->bindParam(':email', $executiveDetails['email']);
    // $insertStmt->bindParam(':address', $executiveDetails['address']);
    // $insertStmt->bindParam(':team_name', $executiveDetails['team_name']);
    // $insertStmt->bindParam(':time_created', $executiveDetails['time_created']);
    // $insertStmt->bindParam(':date_created', $executiveDetails['date_created']);
    // $insertStmt->bindParam(':ip_address', $executiveDetails['ip_address']);
    // $insertStmt->execute();


    $welcome_message = "Welcome  to Yoshi Tournament";
    //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
    // Define the notification message


    // Generate the JavaScript code to trigger the notification
    $welcome_notify = "
          <script>
              new Noty({
                  theme: 'metroui',
                  text: '$welcome_message',
                  type: 'success',
                  timeout: 2000
                  
              }).show();
          </script>
          ";

    // Password matches
    // Set session variables based on user's role
    //$_SESSION['userRefNo'] = $user['userRefNo'];

    $_SESSION['teamRefNumber'] = $refNumber; //need to remove $ sign
    $_SESSION['welcome_message'] = $welcome_notify;

    // Redirect to player_registration.php
    header("Location: player_registration.php");
    exit;
  } elseif ($stmt2->rowCount() > 0) {




    // Prepare and execute the SQL query stmt = statement
    $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl 
                           SET TeamRefNumber = :TeamRefNumber, reg_status = 'complete' 
                           WHERE userRefNo = :userRefNo");
    $stmt->bindParam(':TeamRefNumber', $teamRefNumber);
    $stmt->bindParam(':userRefNo', $_SESSION['userRefCode']);
    $stmt->execute();


    //$executiveDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Insert record into yoshi_players_tbl
    // $insertStmt = $pdo->prepare("INSERT INTO yoshi_players_tbl (userRefNo, TeamRefNumber, user_position, surname, firstname, dob, country, state, city, zipcode, phone, email, address, team_name, time_created, date_created, ip_address) 
    //                                 VALUES (:userRefNo, :TeamRefNumber, :user_position, :surname, :firstname, :dob, :country, :state, :city, :zipcode, :phone, :email, :address, :team_name, :time_created, :date_created, :ip_address)");
    // $insertStmt->bindParam(':userRefNo', $_SESSION['userRefNo']);
    // $insertStmt->bindParam(':TeamRefNumber', $executiveDetails['TeamRefNumber']);
    // $insertStmt->bindParam(':user_position', $executiveDetails['user_position']);
    // $insertStmt->bindParam(':surname', $executiveDetails['surname']);
    // $insertStmt->bindParam(':firstname', $executiveDetails['firstname']);
    // $insertStmt->bindParam(':dob', $executiveDetails['dob']);
    // $insertStmt->bindParam(':country', $executiveDetails['country']);
    // $insertStmt->bindParam(':state', $executiveDetails['state']);
    // $insertStmt->bindParam(':city', $executiveDetails['city']);
    // $insertStmt->bindParam(':zipcode', $executiveDetails['zipcode']);
    // $insertStmt->bindParam(':phone', $executiveDetails['phone']);
    // $insertStmt->bindParam(':email', $executiveDetails['email']);
    // $insertStmt->bindParam(':address', $executiveDetails['address']);
    // $insertStmt->bindParam(':team_name', $executiveDetails['team_name']);
    // $insertStmt->bindParam(':time_created', $executiveDetails['time_created']);
    // $insertStmt->bindParam(':date_created', $executiveDetails['date_created']);
    // $insertStmt->bindParam(':ip_address', $executiveDetails['ip_address']);
    // $insertStmt->execute();


    $welcome_message = "Welcome  to Yoshi Tournament";
    //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
    // Define the notification message


    // Generate the JavaScript code to trigger the notification
    $welcome_notify = "
          <script>
              new Noty({
                  theme: 'metroui',
                  text: '$welcome_message',
                  type: 'success',
                  timeout: 2000
                  
              }).show();
          </script>
          ";

    // Password matches
    // Set session variables based on user's role
    //$_SESSION['userRefNo'] = $user['userRefNo'];

    $_SESSION['teamRefNumber'] = $refNumber; //need to remove $ sign
    $_SESSION['welcome_message'] = $welcome_notify;

    // Redirect to player_registration.php
    header("Location: student_registration.php");
    exit;
  } else {


    // Reference number is invalid

    $error_invalid = "Invalid reference number. Please try again.";
    //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
    // Define the notification message


    // Generate the JavaScript code to trigger the notification
    $error_invalid_notify = "
          <script>
              new Noty({
                  theme: 'metroui',
                  text: '$error_invalid',
                  type: 'error',
                  timeout: 2000
                  
              }).show();
          </script>
          ";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirmation - Yoshi Tournament </title>
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
        <h1 class="text-center"> Team Reference Number </h1>

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
          <form method="POST" role="form">
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




              <!-- Modal -->
              <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content  text-center">
                    <div class="modal-header"></div>
                    <div class="modal-body">
                      <!-- <svg class="check_logo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                            </svg> -->
                      <div class="fa-3x">
                        <!-- bounce animation with no "squish" or "rebound" -->
                        <i class="fa-solid fa-unlock fa-bounce"
                          style="--fa-bounce-start-scale-x: 1;--fa-bounce-start-scale-y: 1;--fa-bounce-jump-scale-x: 1;--fa-bounce-jump-scale-y: 1;--fa-bounce-land-scale-x: 1;--fa-bounce-land-scale-y: 1;--fa-bounce-rebound: 0;color:#dc3545;"></i>
                      </div>


                      <!-- <i class="fas fa-check-circle fa-6x text-success"></i> -->
                      <h3 class="mt-4">Enter Team Reference Number</h3>
                      <div class='phone-div'>
                        <input type='text' name='refNumber' class='form-control login-input'
                          placeholder='Reference Number' pattern="[A-Za-z0-9]{12}" alt='pn' autofocus required
                          minlength="12" maxlength="12" />
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="complete_registration"
                        class="btn btn-danger btn-border-radius">Complete Signup</button>
                      <!-- <a href="player_registration.php" class="btn btn-danger btn-border-radius">Complete Signup</a> -->
                    </div>
                  </div>
                </div>
              </div>

            </fieldset>


          </form>
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