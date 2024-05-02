<?php

session_start();
ob_start();

$TeamRefNumber = $_SESSION['$teamRefNumber']; //need to remove $ sign

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=yoshi_tournament_db', 'root', '');


// Prepare and execute query to check if the reference number exists
$stmt = $pdo->prepare("SELECT * FROM yoshi_executive_tbl WHERE TeamRefNumber = :refNumber");
$stmt->bindParam(':refNumber', $TeamRefNumber);
$stmt->execute();
$executiveDetails = $stmt->fetch(PDO::FETCH_ASSOC);

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
  $TeamRefNumber = $_SESSION['$teamRefNumber'];
  $position = check_input($_POST['position']); //check_input is sensitising the input field
  $email = check_input($_POST['email_address']); //check_input is sensitising the input field
  $surname = check_input($_POST['surname']); //check_input is sensitising the input field
  $firstname = check_input($_POST['firstName']); //check_input is sensitising the input field
  $dob = check_input($_POST['dob']); //check_input is sensitising the input field
  $gender = check_input($_POST['gender']); //check_input is sensitising the input field
  $height = check_input($_POST['height']); //check_input is sensitising the input field
  $weight = check_input($_POST['weight']); //check_input is sensitising the input field
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
  $position = check_input($_POST['position']); //check_input is sensitising the input field
  $jerseyNumber = check_input($_POST['jerseyNumber']); //check_input is sensitising the input field
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



  if (!empty($position) && !empty($surname) && !empty($firstname) && !empty($phone) && !empty($address) && !empty($team_name) && !empty($team_country) && !empty($team_state) && !empty($team_city) && !empty($number_of_players) && !empty($team_address)) {
    if ($imgExtention1 == "jpeg" or $imgExtention1 == "png" or $imgExtention1 == "jpg" && $imgExtention2 == "jpeg" or $imgExtention2 == "png" or $imgExtention2 == "jpg") {
      if ($imgsize1 <= 1048576 && $imgsize2 <= 1048576) {
        move_uploaded_file($imgloc1, "players_Images/" . $imgname1);
        //move_uploaded_file($team_logo_tmp, "team_logos/" . $team_logo_name);


        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Generate user reference code
        $userRefNo = $_SESSION['userRefCode'];

        // Insert data into the database
        $pdo = new PDO('mysql:host=localhost;dbname=yoshi_tournament_db', 'root', '');
        $stmt = $pdo->prepare("INSERT INTO `yoshi_players_tbl` (`id`, `userRefNo`, `TeamRefNumber`, `user_position`, `surname`, `firstname`, `dob`, `gender`, `hieght`, `weight`, `country`, `state`, `city`, `zipcode`, `phone`, `email`, `address`, `team_name`, `player_position`, `jersy_number`, `team_country`, `team_state`, `team_city`, `number_of_players`, `team_address`, `passport`, `team_logo`, `time_created`, `date_created`, `ip_address`) VALUES (NULL, :userRefNo, :TeamRefNumber, :position, :surname, :firstname, :dob, :gender, :height, :weight, :country, :state, :city, :zipcode, :phone, :email, :address, :team_name, :position, :jerseyNumber, :team_country, :team_state, :team_city, :number_of_players, :team_address, :passport, :team_logo, :time_create, :date_create, :ip_address)");

        $stmt->bindParam(':userRefNo', $userRefCode);
        $stmt->bindParam(':TeamRefNumber', $TeamRefNumber);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':team_name', $team_name);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':jerseyNumber', $jerseyNumber);
        $stmt->bindParam(':team_country', $team_country);
        $stmt->bindParam(':team_state', $team_state);
        $stmt->bindParam(':team_city', $team_city);
        $stmt->bindParam(':number_of_players', $number_of_players);
        $stmt->bindParam(':team_address', $team_address);
        $stmt->bindParam(':passport', $imgname1);
        $stmt->bindParam(':team_logo', $imgname2);
        $stmt->bindParam(':time_create', $time_create);
        $stmt->bindParam(':date_create', $date_create);
        $stmt->bindParam(':ip_address', $ipaddress);
        $stmt->execute();

        // Redirect user to the dashboard
        header("Location: player_confirmation.php");

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


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- Include eye icon image for showing and hiding passwords -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">




  <!-- Javascript for Passport display -->
  <script type="text/javascript">
    function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();
      var imgtag = document.getElementById("image");
      imgtag.title = selectedFile.name;
      reader.onload = function (event) {
        image.src = event.target.result;
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
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.png" alt="logo" class="yoshi_logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <!-- <li class="nav-item">
              <a class="nav-link" href="matches.html">Matches</a>
            </li> -->

            <!-- <li class="nav-item">
              <a class="nav-link " href="about.html">The Tournament</a>
            </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="schedule.html">Schedule</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="news.html">News</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="players.html">Players</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link" href="media.html">Media</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="shop.html">Shop</a>
             </li> -->

            <!-- <li class="nav-item">
               <a class="nav-link " href="contact.html">Contact</a>
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
        <h1 class="text-center"> Player Registration </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registration </li>
          </ol>
        </nav>
      </div>
    </div>



    <!-- <div class="cart-sec-ban">
              <ul class="list-unstyled">
                 <li>
                   <a href="cart.html" class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                   </a>
                 </li>
                 <li>
                   <a href="wishlist.html" class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
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
          <form action="" method="post" role="form" enctype="multipart/form-data" autocomplete='on'>
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
                            <fieldset>
                              <label> Passport<sup style="color: red !important;">*</sup> </label> </label>
                              <p style="font-size: 12px;">Note:<sup style="color: red !important;">*</sup> Image size:
                                300KB, jpg, jpeg, png with team jersey</p>
                              <img style="height:50%;width: 50%;" class="my-select passport_frame" id="image">
                              <input type="file" name="passport" onchange="onFileSelected(event);"
                                class="form-control wizard-required file_input" style="border-radius: 10px 10px;"
                                required>
                              <div class="wizard-form-error"></div>
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
                            <label> Date of Birth<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="date" name="dob" class="form-control wizard-required" required />
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Gender<sup style="color: red !important;">*</sup> </label> </label>
                            <select class="form-select" name="gender">
                              <option selected> Select Gender </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others"> Others</option>

                            </select>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Height (cm)<sup style="color: red !important;">*</sup></label>
                            <input type="text" name="height" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Weight (kg)<sup style="color: red !important;">*</sup></label>
                            <input type="text" name="weight" class="form-control" required>
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
                            <input type="text" class="form-control" name="zipcode"
                              onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)" />
                          </div>
                        </div>

                        <div class="col-lg-6">

                          <div class="form-group">
                            <label> Phone Number<sup style="color: red !important;">*</sup> </label><br>
                            <input type="tel" id="phone" name="phone" name="player_phone_number" class="form-control"
                              onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)"
                              style="width: 330px !important;" required />
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Email<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"
                              name="email_address" readonly>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Address 1<sup style="color: red !important;">*</sup> </label> </label>
                            <textarea class="form-control wizard-required" cols="4" rows="10" name="address"
                              required></textarea>
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
                              <label> Team Name<sup style="color: red !important;">*</sup> </label>
                              <input type="text" name="team_name" class="form-control wizard-required"
                                value="<?php echo $executiveDetails['team_name'] ?>" readonly required>
                              <div class="wizard-form-error"></div>

                            </div>
                          </div>


                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Positon<sup style="color: red !important;">*</sup> </label> </label>
                              <select class="form-select" name="position">
                                <option selected> Select Position </option>
                                <option value="Goalkipper">Goalkipper</option>
                                <option value="Sweeper keeper">Sweeper keeper</option>
                                <option value="Defender"> Defender</option>
                                <option value="Defender (Centre-back)">Defender (Centre-back)</option>
                                <option value="Defender (Full-back)">Defender (Full-back)</option>
                                <option value="Defender (central-defender)"> Defender (central-defender)</option>
                                <option value="Defender (Sweeper)"> Defender (Sweeper)</option>
                                <option value="Defender (Wing-back)"> Defender (Wing-back)</option>
                                <option value="Defender (Right Wing-back)"> Defender (Right Wing-back)</option>
                                <option value="Wing Back">Wing Back</option>
                                <option value="Midfinder"> Midfinder</option>
                                <option value="Midfinder (Central Midfielder)"> Midfinder (Central Midfielder)</option>
                                <option value="Midfinder (Defensive Midfielder)"> Midfinder (Defensive Midfielder)
                                </option>
                                <option value="Midfinder (Attacking Midfielder)"> Midfinder (Attacking Midfielder)
                                </option>
                                <option value="Midfinder (Wide Midfielder)"> Midfinder (Wide Midfielder)</option>
                                <option value="Forward"> Forward</option>
                                <option value="Forward (Second striker)"> Forward (Second striker)</option>
                                <option value="Forward (Centre forward)"> Forward (Centre forward)</option>
                                <option value="Forward (Winger)"> Forward (Winger)</option>
                                <option value="Forward (Left Winger)"> Forward (Left Winger)</option>
                                <option value="Forward (Right Winger)"> Forward (Right Winger)</option>
                                <option value="Striker"> Striker</option>
                              </select>
                            </div>
                          </div>


                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Jersey Number<sup style="color: red !important;">*</sup> </label> </label>
                              <input type="text" name="jerseyNumber" class="form-control wizard-required jersey-input"
                                maxlength="2" onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)" required />
                              <div class="wizard-form-error"></div>

                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Country<sup style="color: red !important;">*</sup></label>
                              <select id='country_select' name='team_country' class="form-select" readonly>
                                <option value="<?php echo $executiveDetails['team_country'] ?>">
                                  <?php echo $executiveDetails['team_country'] ?>
                                </option>

                              </select>

                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>State<sup style="color: red !important;">*</sup> </label>
                              <select class="form-select" name="team_state" readonly required>
                                <option value="<?php echo $executiveDetails['team_state'] ?>">
                                  <?php echo $executiveDetails['team_state'] ?>
                                </option>
                              </select>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Town / City<sup style="color: red !important;">*</sup> </label>
                              <input type="text" class="form-control" name="team_city"
                                value="<?php echo $executiveDetails['team_city'] ?>" readonly required>
                            </div>
                          </div>





                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Number of Players<sup style="color: red !important;">*</sup></label>
                              <input type="text" class="form-control" name="number_of_players"
                                placeholder="Number of Players"
                                onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)"
                                value="<?php echo $executiveDetails['number_of_players'] ?>" required />
                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Address 1<sup style="color: red !important;">*</sup> </label>
                              <input type="text" class="form-control wizard-required" name="team_address"
                                value="<?php echo $executiveDetails['team_address'] ?>" readonly required>
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
                        <div class="form-group text-center">
                          <fieldset>
                            <img src="team_logo/<?php echo $executiveDetails['team_logo'] ?>" class="team_logo" />
                            <input type="file" name="team_logo" class="form-control" accept="image/*" hidden />
                          </fieldset>

                        </div>
                      </div>


                    </div>





                  </div>

                  <!-- <a href="javascript:;" class="form-wizard-next-btn w-100 text-center float-right mt-2">Complete Regitration</a> -->

                  <button type="submit" name="complete_registration"
                    class="form-wizard-next-btn w-100 text-center float-right mt-2 buy-now-btn" id="submit-button">
                    Complete Registration
                    <!-- <div class="spinner-border spinner-border-sm" role="status" id="loader">
                      <span class="visually-hidden">Loading...</span>
                    </div> -->
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


  <footer class="py-5 float-start w-100">

    <div class="container">
      <div class="row row-cols-1 row-cols-lg-3">
        <div class="col">
          <div class="comon-footer">
            <h5> Contact Info </h5>
            <p class="col-lg-10">We are a professional football Academy in UAE, founded in 2021.
              It is a long established fact.
            </p>
            <ul class="list-unstyled d-flex align-items-center mt-2">
              <li>
                <a href="#"> <i class="fab fa-facebook"></i> </a>
              </li>
              <li class="mx-2">
                <a href="#"> <i class="fab fa-twitter"></i> </a>
              </li>
              <li>
                <a href="#"><i class="fab fa-instagram"></i> </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="comon-footer">
            <h5> Resources </h5>
            <ul class="list-unstyled">
              <li>
                <a href="#"> Matches </a>
              </li>
              <li>
                <a href="#"> The Clubs </a>
              </li>
              <li>
                <a href="#"> Member </a>
              </li>
              <li>
                <a href="#"> News </a>
              </li>
              <li>
                <a href="#"> Players </a>
              </li>

              <li>
                <a href="#"> Media </a>
              </li>

              <li>
                <a href="#"> Shop </a>
              </li>

              <li>
                <a href="#"> Contact </a>
              </li>
            </ul>

          </div>
        </div>

        <div class="col">
          <div class="comon-footer">
            <h5>Newsletter</h5>
            <p> We'll send updates straight to your Mail. Let's Do stay connected!</p>
            <div class="d-flex mt-3 align-items-center">
              <input type="text" class="form-control" placeholder="Enter Email" />
              <button type="submit" class="btn scub-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </button>
            </div>

          </div>
        </div>

      </div>
      <hr />
      <p class="text-center copy-t"> Copyright 2024 Yoshi Football Academy, All Right Reserved</p>
    </div>
  </footer>



  <!-- login Modal -->
  <div class="modal fade login-div-modal" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">

          <div id="login-td-div" class="com-div-md">
            <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
            <h5 class="text-center mb-3"> Sign In </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="login-modal-pn">

              <div class="cm-select-login mt-3">
                <div class="country-dp">

                  <input type="email" class="form-control" placeholder="Username Or Email" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="password" class="form-control" placeholder="Password" alt="pn">
                </div>


              </div>



              <button class="btn continue-bn"> <i class="fas fa-lock"></i> SIGN IN </button>
            </div>

            <p class="text-center  mt-3">
              <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#lostpsModal" data-bs-dismiss="modal"> Lost
                Password ? </a>
            </p>


            <p class="text-center  mt-3"> Do not have an account?
              <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#registerModal" data-bs-dismiss="modal">
                Register </a>
            </p>
          </div>


        </div>

      </div>
    </div>
  </div>


  <!-- register Modal -->

  <div class="modal fade login-div-modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <div id="login-td-div" class="com-div-md">
            <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
            <h5 class="text-center mb-3"> Register </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="login-modal-pn">

              <div class="cm-select-login mt-3">
                <div class="country-dp">

                  <input type="text" class="form-control" placeholder="Full Name" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="email" class="form-control" placeholder="Email or Phone Number" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="password" class="form-control" placeholder="Create Password" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="password" class="form-control" placeholder="Confirm Password" alt="pn">
                </div>

                <div class="forget2 mt-3 ml-3 d-flex justify-content-between">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1"> By clicking Register, you agree to our
                    Terms of Use
                    and
                    Cookie Policy</label>
                </div>

              </div>




              <button class="btn continue-bn"> Register </button>
            </div>

            <h6 class="text-center">
              or sign in with
            </h6>
            <ul class="list-unstyled socal-linka-div d-flex  align-content-center justify-content-center">
              <li>
                <a href="#" class="facebtn"> <i class="fab fa-facebook-f"></i> </a>
              </li>
              <li>
                <a href="#" class="twiiterbtn"> <i class="fab fa-twitter"></i> </a>
              </li>
              <li>
                <a href="#" class="googlebtn"> <i class="fab fa-google-plus-g"></i> </a>
              </li>
              <li>
                <a href="#" class="instagbtn"> <i class="fab fa-instagram"></i> </a>
              </li>
            </ul>
            <p class="text-center  mt-3"> Do not have an account?
              <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal" data-bs-dismiss="modal"> Login
              </a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- lost password -->

  <div class="modal fade login-div-modal" id="lostpsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <div id="login-td-div" class="com-div-md">
            <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
            <h5 class="text-center mb-3"> Forget Your Password? </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="login-modal-pn">
              <p> We'll email you a link to reset your password</p>
              <div class="cm-select-login mt-3">

                <div class="phone-div">

                  <input type="email" class="form-control" placeholder="Enter Your Email " alt="pn">
                </div>


              </div>



              <button class="btn continue-bn"> Send Me a password reset Link </button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>



  <!--right silde-bar-->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightmobile" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-0">
      <button type="button" class="close-menu mt-4" data-bs-dismiss="offcanvas" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill"
          viewBox="0 0 16 16">
          <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
        </svg>
      </button>
    </div>
    <div class="offcanvas-body">
      <div class="head-contact d-none d-lg-block">
        <a href="index.html" class="logo-side">
          <img src="images/logo.png" alt="logo">
        </a>
        <p class="mt-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
          the industry's
          standard dummy text ever since the 1500s, when an unknown printer
          took a galley of type and scrambled it to make a type specimen book.
        </p>
        <div class="quick-link my-4">
          <ul>
            <li> <i class="fas fa-map-marker-alt"></i> <span> 89 Mounthoolie Lane, Sutton Bassett, UK </span> </li>
            <li> <i class="fab fa-whatsapp"></i> <span> 180-205-2560 </span> </li>
            <li> <i class="fas fa-envelope"></i> <span> example@gmail.com </span> </li>
          </ul>
        </div>
        <ul class="side-media">
          <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
        </ul>
      </div>

      <div class="head-contact d-block d-lg-none">
        <a href="index.html" class="logo-side">
          <img src="images/logo.png" alt="logo">
        </a>

        <div class="mobile-menu-sec mt-3">
          <ul>
            <li class="active-m">
              <a href="matches.html"> Matches </a>
            </li>
            <li>
              <a href="about.html"> The Club </a>
            </li>

            <li class="active-m">
              <a href="schedule.html"> Schedule </a>
            </li>
            <li>
              <a href="news.html"> News </a>
            </li>
            <li>
              <a href="players.html"> Players </a>
            </li>
            <li>
              <a href="media.html"> Media </a>
            </li>
            <li>
              <a href="shop.html"> Shop </a>
            </li>
            <li>
              <a href="contact.html"> Contact </a>
            </li>
          </ul>
        </div>
        <div class="quick-link">
          <ul>
            <li> <i class="fab fa-whatsapp"></i> <span> 180-250-9625 </span> </li>
            <li> <i class="bi bi-envelope"></i> <span> example@gmail.com</span> </li>
          </ul>
        </div>
        <ul class="side-media">
          <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
        </ul>
      </div>
    </div>
  </div>




  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/countries.js"></script>
  <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>

  <!-- Notification Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- Include SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

  <!-- <script>
    document.getElementById("submit-button").addEventListener("click", function (event) {
      event.preventDefault();

      // Enable loader
      document.getElementById("loader").style.display = "inline-block";

      // Simulate a delay
      setTimeout(function () {
        // Redirect to next page (replace "https://www.example.com" with your desired URL)
        window.location.href = "player_confirmation.php";
      }, 2000);
    });
  </script> -->

  <?php
  echo $_SESSION['welcome_message'];

  ?>




</body>

</html>