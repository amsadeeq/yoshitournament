<?php


//####### Importing database connections and EngineFile

require 'connection.php';


if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
  $logout_message = "
  <script>
      new Noty({
          theme: 'metroui',
          text: 'You are logged out!',
          type: 'success',
          timeout: 2000 // 2 seconds
      }).show();
  </script>";
}



// Check if the session is active
if (session_status() === PHP_SESSION_ACTIVE) {
  // Unset all session variables
  $_SESSION = [];

  // Destroy the session cookie
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
  }

  // Destroy the session
  session_destroy();
} else {
  session_start();
  ob_start();
}





// require 'classes/dbconnection.php';
// require_once 'classes/yoshiDatabaseConn.php';//creating coonection to the database ubifcs_database
// require_once 'classes/yoshiEngine.php';//calling the engine classes to excutes all the mySql(inserting, selecting, updating and deleting)
// $yoshiengine = new yoshiEngine();//creating object of class ubifcsEngine which Extends ubifcsDatabaseCon






// Initialize login_error variable
$login_error = '';

// Check if login form is submitted
if (isset($_POST['login'])) {
  // Fetch user credentials from POST request

  //function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
  function check_input($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
  }

  // Get user's device and browser
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  $browser = get_browser(null, true);
  $device = $browser['platform'];
  // Get user's IP address
  $ip_address = $_SERVER['REMOTE_ADDR'];


  $email = check_input($_POST['login_email']);
  $password = md5(check_input($_POST['login_password'])); // Assuming password is stored as MD5 hash in the database

  // Fetching records from the database


  // Prepare SQL statement to fetch user from yoshi_signup_tbl
  // Perform authentication against yoshi_signup_tbl
  $stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE user_email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {

    // User is authenticated

    // User found, verify password
    if ($user['user_password'] == $password) {


      // Define the notification message
      $welcome_message = "Welcome  " . $user['user_position'];



      // Generate the JavaScript code to trigger the notification
      $welcome_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$welcome_message',
                type: 'success',
                timeout: 1000
                
            }).show();
        </script>
        ";


      // Password matches
      // Set session variables based on user's role
      $_SESSION['userRefNo'] = $user['userRefNo'];
      $_SESSION['user_email'] = $user['user_email'];
      $_SESSION['user_position'] = $user['user_position'];
      $_SESSION['welcome'] = $welcome_notify;
      // Set login status to 'passed'
      $login_status = 'passed';


      if ($user['user_position'] == 'Manager/Coach') {
        // Fetch user information from yoshi_executive_tbl based on userRefNo
        $stmt = $pdo->prepare("SELECT * FROM yoshi_executive_tbl WHERE userRefNo = :userRefNo");
        $stmt->bindParam(':userRefNo', $user['userRefNo']);
        $stmt->execute();
        $executive = $stmt->fetch(PDO::FETCH_ASSOC);
        // User is a Manager or Coach
        $_SESSION['teamRefNumber'] = $executive['TeamRefNumber'];

        header("Location: dashboard.php");


        // Insert login log
        // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
        // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
        // $stmt->execute([
        //   ':userRefNo' => $user['userRefNo'],
        //   ':user_email' => $user['user_email'],
        //   ':user_position' => $user['user_position'],
        //   ':TeamRefNumber' => $executive['TeamRefNumber'],
        //   ':device_used' => $device,
        //   ':browser_used' => $user_agent,
        //   ':ip_address' => $ip_address,
        //   ':login_status' => $login_status,
        //   ':password_used' => $password
        // ]);



      } else {
        // Fetch user information from yoshi_executive_tbl based on userRefNo
        $stmt = $pdo->prepare("SELECT * FROM yoshi_players_tbl WHERE userRefNo = :userRefNo");
        $stmt->bindParam(':userRefNo', $user['userRefNo']);
        $stmt->execute();
        $player_details = $stmt->fetch(PDO::FETCH_ASSOC);
        // User is a Player
        $_SESSION['teamRefNumber'] = $player_details['TeamRefNumber'];

        header("Location: PlayerDashboard.php");


        // Insert login log
        // $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
        // VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
        // $stmt->execute([
        //   ':userRefNo' => $user['userRefNo'],
        //   ':user_email' => $user['user_email'],
        //   ':user_position' => $user['user_position'],
        //   ':TeamRefNumber' => $player_details['TeamRefNumber'], // Adjust accordingly if TeamRefNumber is not directly available
        //   ':device_used' => $device,
        //   ':browser_used' => $user_agent,
        //   ':ip_address' => $ip_address,
        //   ':login_status' => $login_status,
        //   ':password_used' => $password
        // ]);


      }
    } else {
      // Password does not match
      $login_error_message = "Invalid email or password."; // Define the notification message




      // Generate the JavaScript code to trigger the notification
      $login_error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$login_error_message',
                type: 'error',
                timeout: 1000,
                callbacks: {
                  onClose: function() {
                      $('#loginModal').modal('show'); // Show login modal when notification is closed
                  }
              } // 3 seconds
            }).show();
        </script>
        ";




      // Insert login log
//       $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
// VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
//       $stmt->execute([
//         ':userRefNo' => $user ? $user['userRefNo'] : 'Not a user',
//         ':user_email' => $email,
//         ':user_position' => $user ? $user['user_position'] : 'Not a user',
//         ':TeamRefNumber' => $user && $user['user_position'] == 'Manager/Coach' ? $executive['TeamRefNumber'] : 'Not a user', // Adjust accordingly if TeamRefNumber is not directly available
//         ':device_used' => $device,
//         ':browser_used' => $user_agent,
//         ':ip_address' => $ip_address,
//         ':login_status' => $login_status,
//         ':password_used' => $password
//       ]);
    }
  } else {

    // Password does not match

    $error_message = "Invalid email or password."; // Define the notification message
    // Set login status to 'failed'
    $login_status = 'failed';

    // Generate the JavaScript code to trigger the notification
    $error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$error_message',
                type: 'error',
                timeout: 1000,
                callbacks: {
                  onClose: function() {
                      $('#loginModal').modal('show'); // Show login modal when notification is closed
                  }
              } // 3 seconds
            }).show();
        </script>
        ";


    // Insert login log
//     $stmt = $pdo->prepare("INSERT INTO login_log_history (userRefNo, user_email, user_position, TeamRefNumber, `login_time`, `login_date`, device_used, browser_used, ip_address, login_status, password_used)
// VALUES (:userRefNo, :user_email, :user_position, :TeamRefNumber, NOW(), CURDATE(), :device_used, :browser_used, :ip_address, :login_status, :password_used)");
//     $stmt->execute([
//       ':userRefNo' => $user ? $user['userRefNo'] : 'Not a user',
//       ':user_email' => $email,
//       ':user_position' => $user ? $user['user_position'] : 'Not a user',
//       ':TeamRefNumber' => $user && $user['user_position'] == 'Manager/Coach' ? $executive['TeamRefNumber'] : 'Not a user', // Adjust accordingly if TeamRefNumber is not directly available
//       ':device_used' => $device,
//       ':browser_used' => $user_agent,
//       ':ip_address' => $ip_address,
//       ':login_status' => $login_status,
//       ':password_used' => $password
//     ]);


  }
}



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



    // Insert data into the database

    $stmt = $pdo->prepare("INSERT INTO `yoshi_signup_tbl` (`id`, `userRefNo`, `user_email`, `user_position`, `user_password`, `termsCondition`, `time_created`, `date_created`, `ip_address`) VALUES (NULL, :userRefNo, :email, :position, :password, :termsCondition, :time_create, :date_create, :ip_address)");
    $stmt->bindParam(':userRefNo', $userRefCode);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':termsCondition', $termsCondition);
    $stmt->bindParam(':time_create', $time_create);
    $stmt->bindParam(':date_create', $date_create);
    $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']); // Get user's IP address
    $stmt->execute();

    //########## Initiating session #####################
    $_SESSION['email'] = $email;                    //###
    $_SESSION['position'] = $position;               //###
    $_SESSION['userRefCode'] = $userRefCode;        //###
    //########## Initiating session #####################

    ################################################
    $to = $email;
    // Set the email subject
    $subject = "Welcome to Yoshi Tournament  " . date("Y");

    // Set the email message
    $message = "Hi $position,\n\n";
    $message .= "Thank you for creating Account with Yoshi Tournament " . date("Y") . ".\n";
    $message .= "Secure your login credential: $email \n";
    $message .= "Password: ******** \n";
    $message .= "Visit www.yoshitournaments.com\n\n";
    $message .= "Sign: Mr. Sadeeq \n Yoshi Tournaments \n\n\n";
    $message .= "Powered by: Yoshi Football Academy www.yoshifa.com All Rights Reserved " . date('Y');

    // Set additional headers
    $headers = "From: no-reply@yoshitournament.com\r\n";
    $headers .= "Reply-To: support@yoshitournament.com\r\n";
    $headers .= "CC: yoshitournaments@gmail.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    $mail_sent = mail($to, $subject, $message, $headers);

    if ($position == 'Player') {
      header("Location:referenceNumber.php");
      exit();
    } elseif ($position == 'Official') {
      header("Location:official_registration.php");
      exit();
    } else {
      $register_message = "Welcome  to Yoshi Tournament platform " . $position;
      //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
      // Define the notification message


      // Generate the JavaScript code to trigger the notification
      $welcome_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$register_message',
                type: 'success',
                timeout: 1000
                
            }).show();
        </script>
        ";
      $_SESSION['reg_notify'] = $welcome_notify;
      header('Location:executive_registration.php');

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
  <title> Yoshi Tournament - Home </title>
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


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/animate.css" />

  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">

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

            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="tournaments.php">Tournament</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="matches.php">Events</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="registration.php">Registration</a>
            </li>

            <!-- <li class="nav-item">
          <a class="nav-link " href="schedule.php">Schedule</a>
        </li> -->

            <li class="nav-item">
              <a class="nav-link " href="news.php">News</a>
            </li>

            <!-- <li class="nav-item">
          <a class="nav-link " href="players.php">Players</a>
        </li> -->

            <li class="nav-item">
              <a class="nav-link " href="media.php">Media</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="about.php">About us</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link " href="shop.php">Shop</a>
          </li> -->

            <li class="nav-item">
              <a class="nav-link " href="contact.php">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn join-btn animate__animated animate__zoomIn" data-bs-toggle="modal"
                class="regster-bn" data-bs-target="#loginModal">

                Sign Up</a>
            </li>


            <li class="nav-item">
              <a class="nav-link btn bar-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile"><i
                  class="fas fa-bars"></i></a>
            </li>

          </ul>

        </div>
      </div>
    </nav>

  </header>

  <section class="banner float-start w-100">
    <div class="container">


      <!-- banner part start  -->


      <div class="banner-part">
        <div class="css-slider-wrapper">
          <input type="radio" name="slider" class="slide-radio1" checked id="slider_1" />
          <input type="radio" name="slider" class="slide-radio2" id="slider_2" />
          <input type="radio" name="slider" class="slide-radio3" id="slider_3" />


          <!-- Slider Pagination -->
          <div class="slider-pagination">
            <label for="slider_1" class="page1">

            </label>
            <label for="slider_2" class="page2">

            </label>
            <label for="slider_3" class="page3">

            </label>



          </div>

          <!-- Slider #1 -->
          <div class="slider slide-1">

            <div class="slider-content">
              <h3> Welcome To Yoshi Football Academy </h3>
              <h2>WE ARE PROFESSIONAL
                <span class="d-block"> FOOTBALL ACADEMY </span>
              </h2>
              <p> Football tournaments are not just about winning games; they're about the passion, camaraderie, and
                unforgettable moments that unite players and fans alike in the beautiful game</p>
              <a href="about.php" class="buy-now-btn" name="button">

                Tournament
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                  </path>
                </svg> </a>




            </div>
            <div class="number-pagination">
              <span>1</span>
            </div>
          </div>

          <!-- Slider #2 -->
          <div class="slider slide-2">




            <div class="slider-content">
              <h2>Yoshi National <br>Tournament <?php echo date("Y"); ?>
                <span class="d-block"> Season Begins</span>
              </h2>
              <p> Football is not just about scoring goals; it's about winning together, losing together, and giving
                everything for the team. </p>
              <button type="button" class="buy-now-btn" name="button" data-bs-target='#registerModal'
                data-bs-toggle='modal'> Register </button>
            </div>
            <div class="number-pagination">
              <span>2</span>
            </div>
          </div>

          <!-- Slider #3 -->
          <div class="slider slide-3">


            <div class="slider-content">
              <h2> Upcoming Match <span class="d-block">For the Tournament </span></h2>
              <p> An epic showdown awaits! Join us as we cheer our teams to victory and create memories that will last a
                lifetime!</p>
              <a href="matches.php" type="button" class="buy-now-btn" name="button"> Matches
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                  </path>
                </svg> </a>
            </div>
            <div class="number-pagination">
              <span>3</span>
            </div>
          </div>



        </div>
      </div>

      <!-- silder ends -->

      <div class="next-match-banner">
        <a class="top-next-mc text-center  animate__animated animate__zoomIn">
          <h5 class="mn-mc-titel"> Next Match </h5>
          <hr class="next_match_line" />
          <h4> 2024-2025 Yoshi Tournament</h4>
          <div class="d-flex align-items-center justify-content-center mt-2">

            <figure>
              <img src="images/team_3.png" class="next_match_logo" alt="cl1" />
            </figure>
            <div class="mc-details-top text-center">

              <p class="time"> 10:20am </p>
              <h5 class="date">
                24/ 06/ 2024
              </h5>
              <p class="location-mc">Pantami Stadium, Gombe</p>
            </div>

            <figure>
              <img src="images/team_4.png" class="next_match_logo" alt="cl2" />
            </figure>

          </div>
        </a>

        <a class="top-mc-starts mt-4  animate__animated animate__zoomIn">
          <h5 class="mn-mc-titel text-center"> 2024 Tournament Starts </h5>
          <hr />

          <ul class="list-unstyled d-flex flex-column justify-content-center w-100">
            <li class="d-flex align-items-center justify-content-between w-100">
              <span class="ct-2"> <i class="fa fa-soccer-ball-o"></i> Goals </span>
              <span>12 </span>
            </li>

            <li class="d-flex align-items-center justify-content-between">
              <span class="ct-2"> <i class="fas fa-mitten"></i> Assists </span>
              <span>54 </span>
            </li>

            <li class="d-flex align-items-center justify-content-between">
              <span class="ct-2"> <i class="fas fa-running"></i> Apperarences </span>
              <span>34 </span>
            </li>


          </ul>

        </a>

      </div>


    </div>

    <div class="cart-sec-ban">
      <ul class="list-unstyled">
        <li>
          <a href="#" class="btn side_btn" data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person"
              viewBox="0 0 16 16">
              <path
                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="schedule.php" class="btn side_btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid"
              viewBox="0 0 16 16">
              <path
                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>

  </section>

  <section class="body-part-total float-start w-100">
    <div class="latest-news-div">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="py-3"> News Update </h2>
          </div>
          <div class="col-lg-9">
            <div class="latest-news owl-carousel owl-theme mt-3 py-3">
              <a href="#" class="comon-news-links">
                <i class="far fa-dot-circle"></i> Gombe Untd 1 - 0 Defeat to Kwara Untd
              </a>
              <a href="#" class="comon-news-links">
                <i class="far fa-dot-circle"></i> Live Football Scores, Fixtures & Results
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="result-div1 mt-5">
      <div class="container">

        <div class="row gx-lg-5">
          <div class="col-lg-7 col-xl-8">
            <div class="d-flex justify-content-between align-items-center">
              <h2 class="comon-heading m-0"> Fixtures & Results </h2>
              <a href="matches.php" class="btn all-cm-btn  animate__animated animate__zoomIn"> All Matches <svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg> </a>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 gy-5 g-lg-4 mt-0 mt-lg-0">
              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-mc.jpg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Pantami Stadium, Gombe
                      <span class="d-block"> June 02, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_3.png" alt="cl2" />
                        <figcaption>Kano Pillars </figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_4.png" alt="cl2" />
                        <figcaption>Yobe Untd</figcaption>
                      </figure>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-ms2.jpeg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Abuja Central Stadium
                      <span class="d-block"> June 03, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_5.png" alt="cl2" />
                        <figcaption>Lobi Stars </figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_7.png" alt="cl2" />
                        <figcaption>Jos Untd</figcaption>
                      </figure>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-mc3.jpeg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Abuja Central Stadium
                      <span class="d-block"> June 03, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_5.png" alt="cl2" />
                        <figcaption>DC Unfo.</figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_2.jpg" alt="cl2" />
                        <figcaption>Italy FC.</figcaption>
                      </figure>
                    </div>
                  </div>
                </a>
              </div>


              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-mc.jpg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Yobe Central Stadium
                      <span class="d-block"> June 03, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_3.png" alt="cl2" />
                        <figcaption>Kano P.</figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_5.png" alt="cl2" />
                        <figcaption>Italy FC.</figcaption>
                      </figure>
                    </div>
                  </div>
                </a>
              </div>

            </div>

          </div>
          <div class="col-lg-5 col-xl-4 ">
            <div class="latest-result-div mt-5 mt-lg-0">
              <div class="d-flex align-items-center justify-content-between">
                <h2 class="comon-heading m-0"> Latest Results</h2>
                <a href="matches.php" class="btn viw-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg>
                </a>
              </div>

              <div class="ltest-divbm mt-4">
                <a href="#" class="comon-items-div">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Gombe Utd</figcaption>
                        <img src="images/fc-1.jpg" alt="cl2" />

                      </figure>

                    </div>
                    <h5 class="m-0"> 1 - 2 </h5>
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Abuja FC.</figcaption>
                        <img src="images/fc-2.jpg" alt="cl2" />

                      </figure>

                    </div>
                  </div>
                  <p class="text-center"> <i class="fas fa-map-marker-alt"></i> Dec 2, 2023/ Abuja Stadium</p>
                </a>

                <a href="#" class="comon-items-div">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Gombe Utd</figcaption>
                        <img src="images/fc-1.jpg" alt="cl2" />

                      </figure>

                    </div>
                    <h5 class="m-0"> 1 - 2 </h5>
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Abuja FC.</figcaption>
                        <img src="images/fc-2.jpg" alt="cl2" />

                      </figure>

                    </div>
                  </div>
                  <p class="text-center"> <i class="fas fa-map-marker-alt"></i> Dec 2, 2023/ Abuja Stadium</p>
                </a>

                <a href="#" class="comon-items-div">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Gombe Utd</figcaption>
                        <img src="images/fc-1.jpg" alt="cl2" />

                      </figure>

                    </div>
                    <h5 class="m-0"> 1 - 2 </h5>
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Abuja FC.</figcaption>
                        <img src="images/fc-2.jpg" alt="cl2" />

                      </figure>

                    </div>
                  </div>
                  <p class="text-center"> <i class="fas fa-map-marker-alt"></i> Dec 2, 2023/ Abuja Stadium</p>
                </a>

                <a href="#" class="comon-items-div">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Gombe Utd</figcaption>
                        <img src="images/fc-1.jpg" alt="cl2" />

                      </figure>

                    </div>
                    <h5 class="m-0"> 1 - 2 </h5>
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Abuja FC.</figcaption>
                        <img src="images/fc-2.jpg" alt="cl2" />

                      </figure>

                    </div>
                  </div>
                  <p class="text-center"> <i class="fas fa-map-marker-alt"></i> Dec 2, 2023/ Abuja Stadium</p>
                </a>

                <a href="#" class="comon-items-div">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Gombe Utd</figcaption>
                        <img src="images/fc-1.jpg" alt="cl2" />

                      </figure>

                    </div>
                    <h5 class="m-0"> 1 - 2 </h5>
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Abuja FC.</figcaption>
                        <img src="images/fc-2.jpg" alt="cl2" />

                      </figure>

                    </div>
                  </div>
                  <p class="text-center"> <i class="fas fa-map-marker-alt"></i> Dec 2, 2023/ Abuja Stadium</p>
                </a>

              </div>



            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="home-about-part">
      <div class="container">
        <h5> Our History </h5>
        <h2 class="comon-heading m-0"> About the
          Yoshi Tournament</h2>

        <p class="col-lg-7 my-4"> At <a href="https://www.yoshifa.com" class="text-decoration-none"
            target="_blank">Yoshi
            Football Academy</a>, based
          in the UAE with branches around the world, we are dedicated to nurturing football talent and fostering a love
          for the sport. Our passion for football led to the creation of the Yoshi Tournament, a prestigious event that
          brings together football teams, organizations, schools, and academies from across the globe. The Yoshi
          Tournament is more than just a competition; it is a celebration of teamwork, skill, and the spirit of the
          game. Join us as we continue to inspire and develop the football stars of tomorrow.</p>
        <a href="about.php" class="btn all-cm-btn animate__animated animate__zoomIn"> About More <svg
            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
            </path>
          </svg> </a>
      </div>
    </div>

    <div class="table-ag-div py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> League Table & Schedule </h2>

        <div class="row g-lg-5">
          <div class="col-lg-5">
            <div class="table-div-left mt-4">
              <h4> Batch A </h4>


              <table id="seri1" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Club</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>

                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>

                    </td>
                    <td>13</td>
                    <td>01</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-2.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>12</td>
                    <td>20</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>25</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>

                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>25</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>

                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>12</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>12</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>




                </tbody>
                <tfoot>
                  <tr>
                    <th>Club</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                  </tr>
                </tfoot>
              </table>

            </div>
          </div>
          <div class="col-lg-7">
            <div class="table-div-left mt-4">
              <h4> Batch A </h4>


              <table id="seri2" class="display " style="width:100%">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Time</th>
                    <th>Venue</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Time</th>
                    <th>Venue</th>
                  </tr>
                </tfoot>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team-div-1">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <h2 class="comon-heading m-0"> Players Squad </h2>
          <a href="#" class="btn all-cm-btn"> Show All <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
              </path>
            </svg> </a>
        </div>

        <div class="team-slid owl-carousel owl-theme mt-5">
          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> STRIKER</span>
              </h5>
              <span class="num"> 10 </span>
            </div>
          </a>

          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> Defender</span>
              </h5>
              <span class="num"> 32 </span>
            </div>
          </a>

          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> Forward </span>
              </h5>
              <span class="num"> 99 </span>
            </div>
          </a>

          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> STRIKER</span>
              </h5>
              <span class="num"> 15 </span>
            </div>
          </a>


        </div>
      </div>
    </div>

    <div class="join-us-div">
      <div class="container">
        <div class="d-lg-flex justify-content-between">
          <h1 class="comon-heading m-0"> Become part of a Great Team </h1>
          <a href="registration.php" class="btn all-cm-btn mt-4 mt-lg-0 "> Join Us <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
            </svg> </a>
        </div>
      </div>
    </div>

    <div class="our-sponcer py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> Our Sponsors </h2>
        <div class="sponcer-slide owl-carousel owl-theme mt-5">
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/Sponsors.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/Sponsor_2.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/sponsor_4.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/sponsor_6.jpeg" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/sponsor_7.png" alt="sp" />
            </figure>
          </div>
        </div>
      </div>
    </div>

    <div class="newd-blogs-div py-5">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">

          <h2 class="comon-heading m-0"> News </h2>

          <a href="news.php" class="btn all-cm-btn animate__animated animate__zoomIn"> View All <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
              </path>
            </svg> </a>

        </div>


        <div class="row g-lg-5 mt-5 mt-lg-0">
          <div class="col-lg-8">
            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_8.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-4">
                <h5> Yoshi Tournamentin Gombe... </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2024
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>
                <p class="mt-2"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  the printing and typesetting industry.
                </p>
                <h4 class="btn mt-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg> </h4>
              </div>
            </a>

            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_6.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-4">
                <h5> Abuja Matches was a success... </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2024
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>
                <p class="mt-2"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. the printing
                  and typesetting industry.
                </p>
                <h4 class="btn mt-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg> </h4>
              </div>
            </a>


          </div>

          <div class="col-lg-4 right-home-blogs">
            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_9.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-1">
                <h5 class="mt-0">Gombe FC Team is disqualifieed </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2024
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>

              </div>
            </a>

            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_10.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-1">
                <h5 class="mt-0"> Yobe FC is signed new contract with.... </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2020
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>

              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="newd-blogs-div py-5">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">

          <h2 class="comon-heading m-0"> Media Gallery </h2>

          <a href="media.php" class="btn all-cm-btn animate__animated animate__zoomIn"> View All <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
              </path>
            </svg> </a>

        </div>


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-0 mt-lg-0 g-4 g-lg-4">


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_5.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_5.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_6.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_6.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_11.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_11.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_banner_2.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_banner_2.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>



          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_2.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_2.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_7.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_7.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/yoshi_founder.png" class="gallery-div">
                <figure>
                  <img src="images/yoshi_founder.png" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_9.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_9.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>














        </div>
      </div>
    </div>
  </section>



  <?php include 'footer.php'; ?>


  <!-- login Modal -->
  <?php include 'loginModal.php'; ?>

  <!-- register Modal -->

  <?php include 'registerModal.php'; ?>

  <!-- lost password -->

  <?php include 'lostPassword.php'; ?>

  <!--right silde-bar-->
  <?php include 'sidebar.php'; ?>





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

  // Echo the JavaScript code
  echo $login_error_notify;

  // Echo the JavaScript code
  echo $error_notify;

  echo $logout_message;

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
    function login() {
      var email = document.getElementById('login-email').value;
      var password = document.getElementById('login-password').value;

      // Send login credentials to PHP file for authentication via AJAX
      $.ajax({
        url: 'authenticate.php',
        type: 'POST',
        data: {
          email: email,
          password: password
        },
        success: function (response) {
          // Check the response from the server
          if (response === 'success_manager' || response === 'success_player') {
            // Display success notification
            new Noty({
              theme: 'metroui',
              text: 'Login successful!',
              type: 'success',
              timeout: 2000 // 2 seconds
            }).show();

            // Redirect user to the appropriate dashboard
            if (response === 'success_manager') {
              window.location.href = 'dashboard.php';
            } else if (response === 'success_player') {
              window.location.href = 'player_dashboard.php';
            }
          } else if (response === 'error_not_registered') {
            // Display error notification for unregistered user
            new Noty({
              theme: 'metroui',
              text: 'User not registered. Please sign up first.',
              type: 'error',
              timeout: 3000 // 3 seconds
            }).show();
          } else if (response === 'error_wrong_credentials') {
            // Display error notification for wrong credentials
            new Noty({
              theme: 'metroui',
              text: 'Incorrect email or password. Please try again.',
              type: 'error',
              timeout: 3000 // 3 seconds
            }).show();
          }
        },
        error: function (xhr, status, error) {
          // Display error notification for AJAX request failure
          console.error('AJAX Error:', error);
          new Noty({
            theme: 'metroui',
            text: 'An error occurred. Please try again later.',
            type: 'error',
            timeout: 3000 // 3 seconds
          }).show();
        }
      });
    }
  </script>








</body>

</html>