<?php

session_start();
ob_start();

// Connect to the database
require 'connection.php';

$TeamRefNumber = $_SESSION['teamRefNumber']; //need to remove $ sign
//########## Initiating session #####################
$email = $_SESSION['email'];                  //###
$position = $_SESSION['position'];               //###
$userRefCode = $_SESSION['userRefCode'];        //###
//########## Initiating session #####################





// Prepare and execute query to check if the reference number exists
$stmt = $pdo->prepare("SELECT * FROM yoshi_schools_officials_tbl WHERE TeamRefNumber = :refNumber");
$stmt->bindParam(':refNumber', $TeamRefNumber);
$stmt->execute();
$studentDetails = $stmt->fetch(PDO::FETCH_ASSOC);

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


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected country code
    $countryCode = $_POST['countryCode'];
    // Get the phone number
    $phoneNumber = $_POST['phone'];
    $full_phone = $countryCode . $phoneNumber;


  }




  $userRefCode = $_SESSION['userRefCode'];
  $TeamRefNumber = $_SESSION['teamRefNumber'];
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
  $means_id = check_input($_POST['means_id']); //check_input is sensitising the input field
  $id_number = check_input($_POST['id_number']); //check_input is sensitising the input field
  $address = check_input($_POST['address']); //check_input is sensitising the input field

  $team_name = check_input($_POST['team_name']); //check_input is sensitising the input field
  $team_country = check_input($_POST['team_country']); //check_input is sensitising the input field
  $team_state = check_input($_POST['team_state']); //check_input is sensitising the input field
  $team_city = check_input($_POST['team_city']); //check_input is sensitising the input field
  $position = check_input($_POST['position']); //check_input is sensitising the input field
  $jerseyNumber = check_input($_POST['jerseyNumber']); //check_input is sensitising the input field

  $number_of_players = check_input($_POST['number_of_players']); //check_input is sensitising the input field
  $team_address = check_input($_POST['team_address']); //check_input is sensitising the input field


  $emergency_name = check_input($_POST['emergency_name']); //check_input is sensitising the input field
  $emergency_phone = check_input($_POST['emergency_phone']); //check_input is sensitising the input field
  $emergency_email = check_input($_POST['emergency_email']); //check_input is sensitising the input field
  $emergency_address = check_input($_POST['emergency_address']); //check_input is sensitising the input field


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
      if ($imgsize1 <= 3145728 && $imgsize2 <= 3145728) {
        move_uploaded_file($imgloc1, "schools/student_photo/" . $imgname1);
        //move_uploaded_file($team_logo_tmp, "team_logos/" . $team_logo_name);


        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Generate user reference code
        $userRefNo = $_SESSION['userRefCode'];

        // Insert data into the database

        $stmt = $pdo->prepare("INSERT INTO `yoshi_school_students_tbl` (`id`, `userRefNo`, `TeamRefNumber`, `user_position`, `surname`, `firstname`, `dob`, `gender`, `hieght`, `weight`, `country`, `state`, `city`, `zipcode`, `phone`, `email`, `means_id`, `id_number`, `address`, `team_name`, `player_position`, `jersy_number`,`team_country`, `team_state`, `team_city`, `number_of_players`, `team_address`, `passport`, `team_logo`, `emergency_name`, `emergency_phone`, `emergency_email`, `emergency_address`, `time_created`, `date_created`, `ip_address`) VALUES (NULL, :userRefNo, :TeamRefNumber, :position, :surname, :firstname, :dob, :gender, :height, :weight, :country, :state, :city, :zipcode, :phone, :email,:means_id,:id_number, :address, :team_name, :position, :jerseyNumber, :team_country, :team_state, :team_city, :number_of_players, :team_address, :passport, :team_logo,:emergency_name,:emergency_phone,:emergency_email,:emergency_address, :time_create, :date_create, :ip_address)");

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
        $stmt->bindParam(':phone', $full_phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':means_id', $means_id);
        $stmt->bindParam(':id_number', $id_number);
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
        $stmt->bindParam(':emergency_name', $emergency_name);
        $stmt->bindParam(':emergency_phone', $emergency_phone);
        $stmt->bindParam(':emergency_email', $emergency_email);
        $stmt->bindParam(':emergency_address', $emergency_address);
        $stmt->bindParam(':time_create', $time_create);
        $stmt->bindParam(':date_create', $date_create);
        $stmt->bindParam(':ip_address', $ipaddress);
        $stmt->execute();

        ################################################
        $to = $email;
        // Set the email subject
        $subject = "Registration Successful";

        // Set the email message
        $message = "Dear $firstname,\n\n";
        $message .= "Thank you for registering with Yoshi Tournament (YAPS) " . date("Y") . ".\n\n";
        $message .= "Your Team Reference Number is : $TeamRefNumber \n\n";
        $message .= "Player Reference Number is: $userRefCode \n\n";
        $message .= "Your position: $position \n\n";
        $message .= "Schedules for the matches will be send to you soon.\n\n";
        $message .= "Visit www.yoshitournaments.com\n\n";
        $message .= "Sign: Mr. Sadeeq \n Admin - yoshitournaments.com\n\n";
        $message .= "Yoshi Football Academy UAE www.yoshifa.com \n All Rights Reserved " . date('Y');

        // Set additional headers
        $headers = "From: no-reply@yoshitournament.com\r\n";
        $headers .= "Reply-To: support@yoshitournament.com\r\n";
        // $headers .= "CC: yoshitournaments@gmail.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Send the email
        $mail_sent = mail($to, $subject, $message, $headers);

        // Insert data into the database
        $stmt = $pdo->prepare("UPDATE `yoshi_signup_tbl` SET `reg_status` = 1 WHERE `userRefNo` = :userRefNo");
        $stmt->execute([':userRefNo' => $userRefCode]);

        // Redirect user to the dashboard
        header("Location: player_confirmation.php");

      } else {

        $image_size_error = "Please try uploading image less than 500kb";

        // Define the notification message


        // Generate the JavaScript code to trigger the notification
        $size_error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$image_size_error',
                type: 'error',
                timeout: 1000
                
            }).show();
        </script>
        ";



      }
    } else {

      $image_error = "Image supported only .jpg, .jpeg, or .png";

      // Define the notification message


      // Generate the JavaScript code to trigger the notification
      $extension_error_notify = "
        <script>
            new Noty({
                theme: 'metroui',
                text: '$image_error',
                type: 'error',
                timeout: 1000
                
            }).show();
        </script>
        ";


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

  <!-- Top Bar Start -->
  <?php require 'reg_header.php'; ?>

  <section class="sub-main-banner float-start w-100">


    <div class="sub-banner">
      <div class="container">
        <h1 class="text-center"> Player Registration </h1>
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
                                300KB, jpg, jpeg, png</p>
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
                            <input type="text" name="surname" class="form-control wizard-required" value="?php if (isset($surname)) {
                              echo $surname;
                            } ?>" placeholder="Surname" required>
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> First Name<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="text" name="firstName" class="form-control wizard-required" value="<?php if (isset($firstName)) {
                              echo $firstName;
                            } ?>" placeholder=" First Name" required>
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Date of Birth<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="date" name="dob" class="form-control wizard-required" value="<?php if (isset($dob)) {
                              echo $dob;
                            } ?>" placeholder="dd/mm/YYYY" required />
                            <div class="wizard-form-error"></div>

                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Gender<sup style="color: red !important;">*</sup> </label> </label>
                            <select class="form-select" name="gender" required>
                              <!-- <option  selected> Select Gender </option> -->
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others"> Others</option>

                            </select>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="text" name="height" value="<?php if (isset($height)) {
                              echo $height;
                            } ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="text" name="weight" value="<?php if (isset($weight)) {
                              echo $weight;
                            } ?>" class="form-control">
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
                            <input type="text" class="form-control" name="city" value="<?php if (isset($city)) {
                              echo $city;
                            } ?>" required>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Postal Code / Zipcode </label>
                            <input type="text" class="form-control" name="zipcode"
                              onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)" value="<?php if (isset($zipcode)) {
                                echo $zipcode;
                              } ?>" />
                          </div>
                        </div>

                        <div class="col-lg-6">

                          <div class="form-group">
                            <label> Phone Number<sup style="color: red !important;">*</sup> </label><br>
                            <input type="tel" id="phone" name="phone" name="player_phone_number" class="form-control"
                              onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)"
                              style="width: 330px !important;" value="<?php if (isset($player_phone_number)) {
                                echo $player_phone_number;
                              } ?>" required />
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Email<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"
                              name="email_address" readonly>
                          </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label> Means of Identification<sup style="color: red !important;">*</sup> </label> </label>
                            <select class="form-select" name="means_id">
                              <option value="Student ID">Student ID</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label> Student ID Number<sup style="color: red !important;">*</sup> </label> </label>
                            <input type="text" class="form-control wizard-required" placeholder="123456789"
                              name="id_number" value="<?php if (isset($id_number)) {
                                echo $id_number;
                              } ?>" required>
                            <div class="wizard-form-error"></div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label> Address 1<sup style="color: red !important;">*</sup> </label> </label>
                            <textarea class="form-control wizard-required" cols="4" rows="10" name="address" value="<?php if (isset($address)) {
                              echo $address;
                            } ?>" required></textarea>
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
                        <div class="row mt-4"></div>
                        <div class="row">

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Team Name<sup style="color: red !important;">*</sup> </label>
                              <input type="text" name="team_name" class="form-control wizard-required"
                                value="<?php echo $studentDetails['team_name'] ?>" readonly required>
                              <div class="wizard-form-error"></div>
                            </div>
                          </div>


                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Position<sup style="color: red !important;">*</sup> </label> </label>
                              <select class="form-select" name="position">
                                <option value="null" selected> Select Position </option>
                                <option value="Goalkeeper">Goalkeeper</option>
                                <option value="Sweeper keeper">Sweeper keeper</option>
                                <option value="Defender"> Defender</option>
                                <option value="Defender (Centre-back)">Defender (Centre-back)</option>
                                <option value="Defender (Full-back)">Defender (Full-back)</option>
                                <option value="Defender (central-defender)"> Defender (central-defender)</option>
                                <option value="Defender (Sweeper)"> Defender (Sweeper)</option>
                                <option value="Defender (Wing-back)"> Defender (Wing-back)</option>
                                <option value="Defender (Right Wing-back)"> Defender (Right Wing-back)</option>
                                <option value="Wing Back">Wing Back</option>
                                <option value="Midfielder"> Midfielder</option>
                                <option value="Midfielder (Central Midfielder)"> Midfielder (Central Midfielder)
                                </option>
                                <option value="Midfielder (Defensive Midfielder)"> Midfielder (Defensive Midfielder)
                                </option>
                                <option value="Midfielder (Attacking Midfielder)"> Midfielder (Attacking Midfielder)
                                </option>
                                <option value="Midfielder (Wide Midfielder)"> Midfielder (Wide Midfielder)</option>
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
                                maxlength="2" onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)" value="<?php if (isset($jerseyNumber)) {
                                  echo $jerseyNumber;
                                } ?>" required />
                              <div class="wizard-form-error"></div>
                            </div>
                          </div>


                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Country<sup style="color: red !important;">*</sup></label>
                              <select id='country_select' name='team_country' class="form-select" readonly>
                                <option value="<?php echo $studentDetails['team_country'] ?>">
                                  <?php echo $studentDetails['team_country'] ?>
                                </option>
                              </select>
                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>State<sup style="color: red !important;">*</sup> </label>
                              <select class="form-select" name="team_state" readonly required>
                                <option value="<?php echo $studentDetails['team_state'] ?>">
                                  <?php echo $studentDetails['team_state'] ?>
                                </option>
                              </select>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Town / City<sup style="color: red !important;">*</sup> </label>
                              <input type="text" class="form-control" name="team_city"
                                value="<?php echo $studentDetails['team_city'] ?>" readonly required>
                            </div>
                          </div>





                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Number of Players<sup style="color: red !important;">*</sup></label>
                              <input type="text" class="form-control" name="number_of_players"
                                placeholder="Number of Players"
                                onkeypress="return /^-?[0-9]*$/.test(this.value+event.key)"
                                value="<?php echo $studentDetails['number_of_players'] ?>" readonly required />
                            </div>
                          </div>



                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Address 1<sup style="color: red !important;">*</sup> </label>
                              <input type="text" class="form-control wizard-required" name="team_address"
                                value="<?php echo $studentDetails['team_address'] ?>" readonly required>
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

                  <div class="ad-fm mt-5">
                    <div class="paymeny comon-steps-div mt-5">
                      <h2 class="comon-heading m-0"> Emergency Contact (Parent Details) </h2>
                      <div class="account-page-n" id="ac-1">
                        <!-- <div class="row mt-4"></div> -->
                        <div class="row">

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Full Name <sup style="color: red !important;">*</sup> </label>
                              <input type="text" name="emergency_name" class="form-control wizard-required" value="<?php if (isset($emergency_name)) {
                                echo $emergency_name;
                              } ?>" placeholder="Full Name" required>
                              <div class="wizard-form-error"></div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Email<sup style="color: red !important;">*</sup> </label>
                              <input type="email" class="form-control" name="emergency_email" value="<?php if (isset($emergency_email)) {
                                echo $emergency_email;
                              } ?>" placeholder="emergency@email.com" required>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Phone Number<sup style="color: red !important;">*</sup> </label>
                              <input type="tel" class="form-control" name="emergency_phone" value="<?php if (isset($emergency_phone)) {
                                echo $emergency_phone;
                              } ?>" placeholder="e.g 08167913802" required>
                            </div>
                          </div>


                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Emergency Address<sup style="color: red !important;">*</sup> </label>
                              <textarea rows="4" class="form-control" name="emergency_address" value="<?php if (isset($emergency_address)) {
                                echo $emergency_address;
                              } ?>" placeholder="e.g 08167913802" required></textarea>
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
                            <img src="schools/school_logo/<?php echo $studentDetails['team_logo'] ?>"
                              class="team_logo" />
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
              <div class="form-group d-lg-flex clearfix"></div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>










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

  <!-- Initialize intlTelInput -->
  <script>
    $(document).ready(function () {
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
  echo $size_error_notify;
  echo $extension_error_notify;

  ?>




</body>

</html>