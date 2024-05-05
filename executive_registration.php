<?php
session_start();
ob_start();
require 'connection.php';

echo $_SESSION['reg_notify'];

if (isset($_POST["complete_register"])) {




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
  $TeamRefNumber = $TeamRefNumber . date("Y");






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




  $userRefCode = $_SESSION['userRefCode'];
  $TeamRefNumber;
  $position = check_input($_POST['position']); //check_input is sensitising the input field
  $email = check_input($_POST['email']); //check_input is sensitising the input field
  $surname = check_input($_POST['surname']); //check_input is sensitising the input field
  $firstname = check_input($_POST['firstName']); //check_input is sensitising the input field
  $dob = check_input($_POST['dob']); //check_input is sensitising the input field
  $country = check_input($_POST['country']); //check_input is sensitising the input field
  $state = check_input($_POST['state']); //check_input is sensitising the input field
  $city = check_input($_POST['city']); //check_input is sensitising the input field
  $zipcode = check_input($_POST['zipcode']); //check_input is sensitising the input field
  $phone = check_input($_POST['phone']); //check_input is sensitising the input field
  $address = check_input($_POST['address']); //check_input is sensitising the input field

  $team_name = check_input($_POST['team_name']); //check_input is sensitising the input field
  $team_country = check_input($_POST['team_country']); //check_input is sensitising the input field
  $team_state = check_input($_POST['team_state']); //check_input is sensitising the input field
  $team_city = check_input($_POST['team_city']); //check_input is sensitising the input field
  $number_of_players = check_input($_POST['number_of_players']); //check_input is sensitising the input field
  $team_address = check_input($_POST['team_address']); //check_input is sensitising the input field

  $time = time();//function for current time
  $date_create = date("d/M/Y", $time);//function for current date
  $time_create = date("H:i:s a");//function for current time using "strtotime" to minus 1hour
  $ipaddress = getRealIpAddr();


  //image upload manipulations
  $img1 = trim($_FILES['passport']['name']);
  $imgsize1 = $_FILES['passport']['size'];
  $imgloc1 = $_FILES['passport']['tmp_name'];
  $Extention1 = explode(".", $img1);
  $imgExtention1 = strtolower(end($Extention1));
  $imgname1 = (str_replace("/", "", $userRefCode)) . "." . $imgExtention1;


  //team logo upload manipulations
  $img2 = trim($_FILES['team_logo']['name']);
  $imgsize2 = $_FILES['team_logo']['size'];
  $imgloc2 = $_FILES['team_logo']['tmp_name'];
  $Extention2 = explode(".", $img1);
  $imgExtention2 = strtolower(end($Extention2));
  $imgname2 = (str_replace("/", "", $TeamRefNumber)) . "." . $imgExtention2;




  //########## Initiating session #####################
  $_SESSION['email'] = $email;                    //###
  $_SESSION['postion'] = $position;               //###
  //$_SESSION['userRefCode'] = $userRefCode;
  $_SESSION['teamRefNumber'] = $TeamRefNumber;         //###
  //########## Initiating session #####################


  if (!empty($position) && !empty($surname) && !empty($firstname) && !empty($phone) && !empty($address) && !empty($team_name) && !empty($team_country) && !empty($team_state) && !empty($team_city) && !empty($number_of_players) && !empty($team_address)) {
    if ($imgExtention1 == "jpeg" or $imgExtention1 == "png" or $imgExtention1 == "jpg" && $imgExtention2 == "jpeg" or $imgExtention2 == "png" or $imgExtention2 == "jpg") {
      if ($imgsize1 <= 1048576 && $imgsize2 <= 1048576) {
        move_uploaded_file($imgloc1, "executive_Images/" . $imgname1);//moving image to a folder "memberimg"
        move_uploaded_file($imgloc2, "team_logo/" . $imgname2);//moving image to a folder "memberimg"



        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Generate user reference code
        $userRefNo = $_SESSION['userRefCode'];

        // Insert data into the database

        $stmt = $pdo->prepare("INSERT INTO `yoshi_executive_tbl` (`id`, `userRefNo`, `TeamRefNumber`, `user_position`, `surname`, `firstname`,`dob`, `country`, `state`, `city`, `zipcode`, `phone`, `email`, `address`, `passport`, `team_name`, `team_country`, `team_state`, `team_city`, `number_of_players`, `team_address`, `team_logo`, `time_created`, `date_created`, `ip_address`) VALUES (NULL, :userRefNo, :TeamRefNumber, :position, :surname, :firstname,:dob, :country, :state, :city, :zipcode, :phone, :email, :address, :passport, :team_name, :team_country, :team_state, :team_city, :number_of_players, :team_address, :team_logo, :time_create, :date_create, :ip_address)");

        $stmt->bindParam(':userRefNo', $userRefCode);
        $stmt->bindParam(':TeamRefNumber', $TeamRefNumber);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':passport', $imgname1);
        $stmt->bindParam(':team_name', $team_name);
        $stmt->bindParam(':team_country', $team_country);
        $stmt->bindParam(':team_state', $team_state);
        $stmt->bindParam(':team_city', $team_city);
        $stmt->bindParam(':number_of_players', $number_of_players);
        $stmt->bindParam(':team_address', $team_address);
        $stmt->bindParam(':team_logo', $imgname2);
        $stmt->bindParam(':time_create', $time_create);
        $stmt->bindParam(':date_create', $date_create);
        $stmt->bindParam(':ip_address', $ipaddress);
        $stmt->execute();

        $_SESSION['teamRefNumber'] = $TeamRefNumber;

        ################################################
        //sending email including user details "email", "phone", "account" and access "PIN"
        $to = $email;
        //header with html version
        $header = 'from: yoshitournament.com <no-reply@yoshitournament.com>\r\n';
        $header .= 'Reply-To: no-reply@yoshitournament.com\r\n';
        $header .= 'CC: admin@yoshitournament.com\r\n';
        $subject = " Team Successfully Registered ";
        $body = "Dear " . $firstname . "Thank you for registering" . $team_name . " with Yoshi Tournament " . date("Y") . " Your Team Reference Number is : " . $TeamRefNumber . " Share it with your team players for registeration. Failure to do so will automatically disqualify your team from participation";
        $body .= '';
        $body .= 'Your players are to used the reference link for registration';
        $body .= 'visit www.yoshitournaments.com</p>';
        $body .= 'Sign: Mr. Sadeeq Admin  - yoshitournaments.com Thank You';
        $body .= '';
        $body .= 'yoshifa.com | Allright Reserved' . date('Y') . ' - Yoshi Football Academy';
        //mail fuction
        mail($to, $subject, $body, $header);

        // Redirect user to the dashboard
        header("Location: confirmation.php");



      } else {
        $image_size_error = "Please try uploading image less than 500kb";
        echo $image_size_error;
      }
    } else {
      $image_error = "Image supported only .jpg, .jpeg, or .png";
      echo $image_error;
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
  <title>Registration - Yoshi Tournament </title>
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


  <!-- International Telephone Input CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">







  <!-- JavaScript code -->
  <script type="text/javascript">
    function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();
      var imgtag = document.getElementById("image");
      var progressBar = document.getElementById("progressBar");

      // Check file type
      if (!selectedFile.type.match('image/jpeg') && !selectedFile.type.match('image/png')) {
        alert('Please select a valid image file (jpg, jpeg, png)');
        return;
      }

      imgtag.title = selectedFile.name;

      reader.onloadstart = function () {
        progressBar.style.display = 'block'; // Show progress bar when loading starts
      };

      reader.onprogress = function (event) {
        if (event.lengthComputable) {
          var percentLoaded = (event.loaded / event.total) * 100;
          progressBar.value = Math.round(percentLoaded);
        }
      };

      reader.onload = function (event) {
        imgtag.src = event.target.result;
        progressBar.style.display = 'none'; // Hide progress bar after loading
      };

      reader.readAsDataURL(selectedFile);
    }
  </script>


  <!-- Javascript for Team Logo display -->
  <script type="text/javascript">
    function onFileSelectedLogo(event) {
      var selectedFileLogo = event.target.files[0];
      var reader_logo = new FileReader();
      var imgtag_logo = document.getElementById("teamImage");
      imgtag_logo.title = selectedFileLogo.name;
      reader_logo.onload = function (event) {
        teamImage.src = event.target.result;
      };
      reader_logo.readAsDataURL(selectedFileLogo);
    }
  </script>


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
        <h1 class="text-center"> Registration </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registration </li>
          </ol>
        </nav>
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
          <form action="" method="POST" role="form" enctype="multipart/form-data" autocomplete='on'>
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


              <div class="row g-lg-5">
                <div class="col-lg-8">
                  <div class="ad-fm ">
                    <div class="comon-steps-div">
                      <h2 class="comon-heading m-0"> Personal details</h2>

                      <div class="row mt-4">
                        <div class="col-lg-6">

                          <div class="form-group">
                            <!-- HTML code -->
                            <fieldset>
                              <label>Passport<sup style="color: red !important;">*</sup></label>
                              <p style="font-size: 12px;">[ Note:<sup style="color: red !important;">*</sup> Image size:
                                300KB, jpg, jpeg, png ] </p>
                              <img style="height:50%; width: 50%;" class="my-select" id="image">
                              <input type="file" name="passport" onchange="onFileSelected(event);"
                                class="form-control wizard-required" style="border-radius: 10px 10px;"
                                accept="image/jpeg, image/png" required>

                            </fieldset>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Surname<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="text" name="surname" class="form-control wizard-required" required>
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> First Name<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="text" name="firstName" class="form-control wizard-required" required>
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Gender<sup style="color: red !important;">*</sup> </label> </label>
                            <select class="form-select" name="position">
                              <option selected>Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others"> Others</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Date of Birth<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="date" name="dob" class="form-control wizard-required" required />
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>






                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Country<sup style="color: red !important;">*</sup> </label></label>
                            <select id="country" name='country' class="form-select" required></select>

                          </div>
                        </div>



                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>State<sup style="color: red !important;">*</sup> </label> </label>
                            <select class="form-select" id="state" name="state" required></select>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Town / City<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="text" class="form-control" name="city" required>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Postal Code / Zipcode </label>
                            <input type="text" class="form-control" name="zipcode">
                          </div>
                        </div>




                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Phone Number<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="tel" id="phone" name="phone" name="player_phone_number" class="form-control"
                              onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)"
                              style="width: 330px !important;" required />

                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Email<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="email" class="form-control" name="email"
                              value="<?php echo $_SESSION['email']; ?>" readonly required />
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Address 1<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="text" class="form-control wizard-required" name="address" required>
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>

                        <!-- <div class="col-lg-6">
                                             <div class="row row-cols-1 row-cols-lg-2 mt-2">
                                                 <div class="col">
                                                    <label> Adults </label>
                                                    <input type="text" class="form-control wizard-required">
                                                    <div class="wizard-form-error"></div>
                                                 </div>
                                                 <div class="col">
                                                    <label> Child <span class="codition-txn"> ( Below 5 years) </span>  </label>
                                                    <input type="text" class="form-control wizard-required">
                                                    <div class="wizard-form-error"></div>
                                                 </div>
                                             </div>
                                           
                                          </div> -->


                      </div>
                    </div>

                  </div>

                  <!-- <div class="ad-fm mt-5">
                                 <div class="form-check additon-cha">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Collect Ticket Form home <span class="d-block"> (Additional Charges Rs 50/-)</span>
                                    </label>
                                  </div>
                              </div> -->

                  <div class="ad-fm mt-5">

                    <div class="paymeny comon-steps-div mt-5">

                      <h2 class="comon-heading m-0"> Team details </h2>


                      <div class="account-page-n" id="ac-1">
                        <div class="row mt-4">

                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Positon<sup style="color: red !important;">*</sup> </label> </label>
                              <select class="form-select" name="position">
                                <option selected>Select Position</option>
                                <option value="Manager">Manager</option>
                                <option value="Coach">Coach</option>
                                <option value="Founder"> Founder</option>
                              </select>
                            </div>
                          </div>


                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Team Name<sup style="color: red !important;">*</sup> </label>
                              <input type="text" name="team_name" class="form-control wizard-required"
                                placeholder="Team/School/Organization/Academy" required>
                              <div class="wizard-form-error"></div>

                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Team Country<sup style="color: red !important;">*</sup></label>
                              <select id='country2' name='team_country' class="form-select"></select>

                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Team State<sup style="color: red !important;">*</sup> </label>
                              <select class="form-select" id="state2" name="team_state" required></select>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Team Town / City<sup style="color: red !important;">*</sup> </label>
                              <input type="text" class="form-control" name="team_city" required>
                            </div>
                          </div>





                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Number of Players<sup style="color: red !important;">*</sup></label>
                              <input type="text" class="form-control" name="number_of_players" required>
                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Team Address <sup style="color: red !important;">*</sup> </label>
                              <input type="text" class="form-control wizard-required" name="team_address" required>
                              <div class="wizard-form-error"></div>

                            </div>
                          </div>

                          <p style="font-size: 12px;">[ Note:<sup style="color: red !important;">*</sup> Input field
                            with asterisk are required ] </p>


                          <!-- <div class="col-lg-6">
                                             <div class="row row-cols-1 row-cols-lg-2 mt-2">
                                                 <div class="col">
                                                    <label> Adults </label>
                                                    <input type="text" class="form-control wizard-required">
                                                    <div class="wizard-form-error"></div>
                                                 </div>
                                                 <div class="col">
                                                    <label> Child <span class="codition-txn"> ( Below 5 years) </span>  </label>
                                                    <input type="text" class="form-control wizard-required">
                                                    <div class="wizard-form-error"></div>
                                                 </div>
                                             </div>
                                           
                                          </div> -->


                        </div>
                      </div>






                    </div>
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="ceck-out-right-div new-checkout">
                    <div class="d-flex justify-content-between align-items-center">
                      <h2 class="page-titel comon-heading m-0"> Team logo </h2>

                    </div>
                    <hr class="mt-2">

                    <div class="oder-summary-item">

                      <div class="col-lg-12">
                        <div class="form-group">
                          <!-- HTML code -->
                          <fieldset>
                            <p style="font-size: 12px;">[ Note:<sup style="color: red !important;">*</sup> Team logo
                              must be white background ] </p>
                            <!-- <legend>Team Logo</legend> -->
                            <img style="height:20%;width: 50%;" class="my-select" id="teamImage">
                            <input type="file" name="team_logo" onchange="onFileSelectedLogo(event);"
                              class="form-control wizard-required" style="border-radius: 10px 10px;"
                              accept="image/jpeg, image/png" required>
                            <div class="wizard-form-error"></div>
                            <progress id="logoProgressBar" value="0" max="100" style="display: none;"></progress>
                          </fieldset>

                        </div>
                      </div>


                    </div>





                  </div>

                  <!-- <a href="javascript:;" class="form-wizard-next-btn w-100 text-center float-right mt-2">Complete Regitration</a> -->

                  <button type="submit" name="complete_register"
                    class="form-wizard-next-btn w-100 text-center float-right mt-2 buy-now-btn">
                    Complete Regitration

                  </button>

                </div>




              </div>


              <div class="form-group d-lg-flex clearfix">


              </div>
            </fieldset>





          </form>
        </div>

      </div>

    </div>

  </section>


  <?php include 'footer.php'; ?>



  <!--right silde-bar-->
  <?php include 'sidebar.php'; ?>




  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/countries.js"></script>
  <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>



  <!-- International Telephone Input JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
  <script>
    // Initialize the international phone input
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
      initialCountry: "auto",
      separateDialCode: true,
      placeholderNumberType: "MOBILE",
      geoIpLookup: function (success, failure) {
        $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          success(countryCode);
        });
      }
    });
  </script>


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
        //window.location.href = "dashboard.php";
      }, 2000);
    });
  </script>






</body>

</html>