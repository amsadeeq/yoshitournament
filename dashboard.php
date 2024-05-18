<?php
session_start();
ob_start();

require 'connection.php';


$TeamRefNumber = $_SESSION['teamRefNumber'];
if ($TeamRefNumber) {
  // Password does not match
  $login_success = "<script>swal('Success!', 'Welcome to Yoshi Tournament.', 'success');</script>";


}
// Fetching records from the database
// Insert data into the database

$stmt = $pdo->prepare("SELECT * FROM `yoshi_executive_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
$stmt->execute(['teamRefNumber' => $TeamRefNumber]);
$executives = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Getting Players Records from yoshi_players_tbl
$stmtPlayers = $pdo->prepare("SELECT * FROM `yoshi_players_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
$stmtPlayers->execute(['teamRefNumber' => $TeamRefNumber]);
$players_record = $stmtPlayers->fetchAll(PDO::FETCH_ASSOC);

$no_of_players = 0;

// Assuming $players_record is an array containing player records
foreach ($players_record as $player_record) {
  // Increment the counter for each player record
  $no_of_players++;
}

// Getting match history record
$stmtMatchHistory = $pdo->prepare("SELECT * FROM `yoshi_player_match_history_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
$stmtMatchHistory->execute(['teamRefNumber' => $TeamRefNumber]);
$playerMatchHistory = $stmtMatchHistory->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Yoshi Tournament </title>
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="assets/css/main.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">




</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">

    <div class="progress-bar">
      <div class="progress"></div>
    </div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="dashboard.php" class="d-flex justify-content-center align-items-center">
        <img src="images/logo.png" alt="logo" class="yoshi_logo" />

      </a>
    </div>

    <?php

    // Displaying fetched records
    foreach ($executives as $executive) {
      $image_passport = $executive['passport'];
      $image_logo = $executive['team_logo'];
      $name = $executive['firstname'];
      $position = $executive['user_position'];
      $dob = $executive['dob'];
      $country = $executive['country'];
      $state = $executive['state'];
      $city = $executive['city'];
      $zipcode = $executive['zipcode'];
      $phone = $executive['phone'];
      $email = $executive['email'];
      $address = $executive['address'];
      $team_name = $executive['team_name'];
      $team_country = $executive['team_country'];
      $team_state = $executive['team_state'];
      $team_city = $executive['team_city'];
      $number_of_players = $executive['number_of_players'];
      $team_address = $executive['team_address'];
      $time_created = $executive['time_created'];
      $date_created = $executive['date_created'];
      $ip_address = $executive['ip_address'];
      ?>

      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children">
            <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                  <path
                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                </svg>
              </span>
              <span class="text">Dashboard</span>
            </a>
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
              <li>
                <a href="dashboard.php" class="active"> main </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z" />
                  <path
                    d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z" />
                </svg>
              </span>
              <span class="text">Pages</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                <a href="settings.php"> Settings </a>
              </li>
              <li>
                <a href="blank-page.php"> Blank Page </a>
              </li>
            </ul>
          </li>


          <span class="divider">
            <hr />
          </span> -->
          <!-- <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M1.66666 5.41669C1.66666 3.34562 3.34559 1.66669 5.41666 1.66669C7.48772 1.66669 9.16666 3.34562 9.16666 5.41669C9.16666 7.48775 7.48772 9.16669 5.41666 9.16669C3.34559 9.16669 1.66666 7.48775 1.66666 5.41669Z" />
                  <path
                    d="M1.66666 14.5834C1.66666 12.5123 3.34559 10.8334 5.41666 10.8334C7.48772 10.8334 9.16666 12.5123 9.16666 14.5834C9.16666 16.6545 7.48772 18.3334 5.41666 18.3334C3.34559 18.3334 1.66666 16.6545 1.66666 14.5834Z" />
                  <path
                    d="M10.8333 5.41669C10.8333 3.34562 12.5123 1.66669 14.5833 1.66669C16.6544 1.66669 18.3333 3.34562 18.3333 5.41669C18.3333 7.48775 16.6544 9.16669 14.5833 9.16669C12.5123 9.16669 10.8333 7.48775 10.8333 5.41669Z" />
                  <path
                    d="M10.8333 14.5834C10.8333 12.5123 12.5123 10.8334 14.5833 10.8334C16.6544 10.8334 18.3333 12.5123 18.3333 14.5834C18.3333 16.6545 16.6544 18.3334 14.5833 18.3334C12.5123 18.3334 10.8333 16.6545 10.8333 14.5834Z" />
                </svg>
              </span>
              <span class="text">UI Elements </span>
            </a>
            <ul id="ddmenu_4" class="collapse dropdown-nav">
              <li>
                <a href="alerts.php"> Alerts </a>
              </li>
              <li>
                <a href="buttons.php"> Buttons </a>
              </li>
              <li>
                <a href="cards.php"> Cards </a>
              </li>
              <li>
                <a href="typography.php"> Typography </a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_55" aria-controls="ddmenu_55"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M5.48663 1.1466C5.77383 0.955131 6.16188 1.03274 6.35335 1.31994L6.87852 2.10769C7.20508 2.59755 7.20508 3.23571 6.87852 3.72556L6.35335 4.51331C6.16188 4.80052 5.77383 4.87813 5.48663 4.68666C5.19943 4.49519 5.12182 4.10715 5.31328 3.81994L5.83845 3.03219C5.88511 2.96221 5.88511 2.87105 5.83845 2.80106L5.31328 2.01331C5.12182 1.72611 5.19943 1.33806 5.48663 1.1466Z" />
                  <path
                    d="M2.49999 5.83331C2.03976 5.83331 1.66666 6.2064 1.66666 6.66665V10.8333C1.66666 13.5948 3.90523 15.8333 6.66666 15.8333H9.99999C12.1856 15.8333 14.0436 14.431 14.7235 12.4772C14.8134 12.4922 14.9058 12.5 15 12.5H16.6667C17.5872 12.5 18.3333 11.7538 18.3333 10.8333V8.33331C18.3333 7.41284 17.5872 6.66665 16.6667 6.66665H15C15 6.2064 14.6269 5.83331 14.1667 5.83331H2.49999ZM14.9829 11.2496C14.9942 11.1123 15 10.9735 15 10.8333V7.91665H16.6667C16.8967 7.91665 17.0833 8.10319 17.0833 8.33331V10.8333C17.0833 11.0634 16.8967 11.25 16.6667 11.25H15L14.9898 11.2498L14.9829 11.2496Z" />
                  <path
                    d="M8.85332 1.31994C8.6619 1.03274 8.27383 0.955131 7.98663 1.1466C7.69943 1.33806 7.62182 1.72611 7.81328 2.01331L8.33848 2.80106C8.38507 2.87105 8.38507 2.96221 8.33848 3.03219L7.81328 3.81994C7.62182 4.10715 7.69943 4.49519 7.98663 4.68666C8.27383 4.87813 8.6619 4.80052 8.85332 4.51331L9.37848 3.72556C9.70507 3.23571 9.70507 2.59755 9.37848 2.10769L8.85332 1.31994Z" />
                  <path
                    d="M10.4867 1.1466C10.7738 0.955131 11.1619 1.03274 11.3533 1.31994L11.8785 2.10769C12.2051 2.59755 12.2051 3.23571 11.8785 3.72556L11.3533 4.51331C11.1619 4.80052 10.7738 4.87813 10.4867 4.68666C10.1994 4.49519 10.1218 4.10715 10.3133 3.81994L10.8385 3.03219C10.8851 2.96221 10.8851 2.87105 10.8385 2.80106L10.3133 2.01331C10.1218 1.72611 10.1994 1.33806 10.4867 1.1466Z" />
                  <path
                    d="M2.49999 16.6667C2.03976 16.6667 1.66666 17.0398 1.66666 17.5C1.66666 17.9602 2.03976 18.3334 2.49999 18.3334H14.1667C14.6269 18.3334 15 17.9602 15 17.5C15 17.0398 14.6269 16.6667 14.1667 16.6667H2.49999Z" />
                </svg>
              </span>
              <span class="text">Icons</span>
            </a>
            <ul id="ddmenu_55" class="collapse dropdown-nav">
              <li>
                <a href="icons.php"> LineIcons </a>
              </li>
              <li>
                <a href="mdi-icons.php"> MDI Icons </a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_5"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M4.16666 3.33335C4.16666 2.41288 4.91285 1.66669 5.83332 1.66669H14.1667C15.0872 1.66669 15.8333 2.41288 15.8333 3.33335V16.6667C15.8333 17.5872 15.0872 18.3334 14.1667 18.3334H5.83332C4.91285 18.3334 4.16666 17.5872 4.16666 16.6667V3.33335ZM6.04166 5.00002C6.04166 5.3452 6.32148 5.62502 6.66666 5.62502H13.3333C13.6785 5.62502 13.9583 5.3452 13.9583 5.00002C13.9583 4.65485 13.6785 4.37502 13.3333 4.37502H6.66666C6.32148 4.37502 6.04166 4.65485 6.04166 5.00002ZM6.66666 6.87502C6.32148 6.87502 6.04166 7.15485 6.04166 7.50002C6.04166 7.8452 6.32148 8.12502 6.66666 8.12502H13.3333C13.6785 8.12502 13.9583 7.8452 13.9583 7.50002C13.9583 7.15485 13.6785 6.87502 13.3333 6.87502H6.66666ZM6.04166 10C6.04166 10.3452 6.32148 10.625 6.66666 10.625H9.99999C10.3452 10.625 10.625 10.3452 10.625 10C10.625 9.65485 10.3452 9.37502 9.99999 9.37502H6.66666C6.32148 9.37502 6.04166 9.65485 6.04166 10ZM9.99999 16.6667C10.9205 16.6667 11.6667 15.9205 11.6667 15C11.6667 14.0795 10.9205 13.3334 9.99999 13.3334C9.07949 13.3334 8.33332 14.0795 8.33332 15C8.33332 15.9205 9.07949 16.6667 9.99999 16.6667Z" />
                </svg>
              </span>
              <span class="text"> Forms </span>
            </a>
            <ul id="ddmenu_5" class="collapse dropdown-nav">
              <li>
                <a href="form-elements.php"> From Elements </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="tables.php">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M1.66666 4.16667C1.66666 3.24619 2.41285 2.5 3.33332 2.5H16.6667C17.5872 2.5 18.3333 3.24619 18.3333 4.16667V9.16667C18.3333 10.0872 17.5872 10.8333 16.6667 10.8333H3.33332C2.41285 10.8333 1.66666 10.0872 1.66666 9.16667V4.16667Z" />
                  <path
                    d="M1.875 13.75C1.875 13.4048 2.15483 13.125 2.5 13.125H17.5C17.8452 13.125 18.125 13.4048 18.125 13.75C18.125 14.0952 17.8452 14.375 17.5 14.375H2.5C2.15483 14.375 1.875 14.0952 1.875 13.75Z" />
                  <path
                    d="M2.5 16.875C2.15483 16.875 1.875 17.1548 1.875 17.5C1.875 17.8452 2.15483 18.125 2.5 18.125H17.5C17.8452 18.125 18.125 17.8452 18.125 17.5C18.125 17.1548 17.8452 16.875 17.5 16.875H2.5Z" />
                </svg>
              </span>
              <span class="text">Tables</span>
            </a>
          </li> -->
          <span class="divider">
            <hr />
          </span>

          <li class="nav-item">
            <a href="notification.php">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M10.8333 2.50008C10.8333 2.03984 10.4602 1.66675 9.99999 1.66675C9.53975 1.66675 9.16666 2.03984 9.16666 2.50008C9.16666 2.96032 9.53975 3.33341 9.99999 3.33341C10.4602 3.33341 10.8333 2.96032 10.8333 2.50008Z" />
                  <path
                    d="M17.5 5.41673C17.5 7.02756 16.1942 8.33339 14.5833 8.33339C12.9725 8.33339 11.6667 7.02756 11.6667 5.41673C11.6667 3.80589 12.9725 2.50006 14.5833 2.50006C16.1942 2.50006 17.5 3.80589 17.5 5.41673Z" />
                  <path
                    d="M11.4272 2.69637C10.9734 2.56848 10.4947 2.50006 10 2.50006C7.10054 2.50006 4.75003 4.85057 4.75003 7.75006V9.20873C4.75003 9.72814 4.62082 10.2393 4.37404 10.6963L3.36705 12.5611C2.89938 13.4272 3.26806 14.5081 4.16749 14.9078C7.88074 16.5581 12.1193 16.5581 15.8326 14.9078C16.732 14.5081 17.1007 13.4272 16.633 12.5611L15.626 10.6963C15.43 10.3333 15.3081 9.93606 15.2663 9.52773C15.0441 9.56431 14.8159 9.58339 14.5833 9.58339C12.2822 9.58339 10.4167 7.71791 10.4167 5.41673C10.4167 4.37705 10.7975 3.42631 11.4272 2.69637Z" />
                  <path
                    d="M7.48901 17.1925C8.10004 17.8918 8.99841 18.3335 10 18.3335C11.0016 18.3335 11.9 17.8918 12.511 17.1925C10.8482 17.4634 9.15183 17.4634 7.48901 17.1925Z" />
                </svg>
              </span>
              <span class="text">Notifications</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="promo-box">
        <div class="promo-icon">
          <img class="mx-auto next_match_logo" src="<?php echo "team_logo/" . $image_logo; ?>"
            alt="<?php echo $team_name . "Passport Port"; ?>">
        </div>
        <h3><?php echo $team_name; ?> </h3>
        <p>Congratulations! Your team will participate in the upcoming Yoshi Tournament</p>
        <a href="#" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover">
          View Team
        </a>
      </div>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                    <i class="lni lni-chevron-left me-2"></i>
                  </button>
                </div>

              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                <div class="notification-box ml-15 d-none d-md-flex">
                  <button class="dropdown-toggle" type="button" id="notification" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M11 20.1667C9.88317 20.1667 8.88718 19.63 8.23901 18.7917H13.761C13.113 19.63 12.1169 20.1667 11 20.1667Z"
                        fill="" />
                      <path
                        d="M10.1157 2.74999C10.1157 2.24374 10.5117 1.83333 11 1.83333C11.4883 1.83333 11.8842 2.24374 11.8842 2.74999V2.82604C14.3932 3.26245 16.3051 5.52474 16.3051 8.24999V14.287C16.3051 14.5301 16.3982 14.7633 16.564 14.9352L18.2029 16.6342C18.4814 16.9229 18.2842 17.4167 17.8903 17.4167H4.10961C3.71574 17.4167 3.5185 16.9229 3.797 16.6342L5.43589 14.9352C5.6017 14.7633 5.69485 14.5301 5.69485 14.287V8.24999C5.69485 5.52474 7.60672 3.26245 10.1157 2.82604V2.74999Z"
                        fill="" />
                    </svg>
                    <span></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notification">
                    <li>
                      <a href="#0">
                        <div class="image">
                          <img src="<?php echo "team_logo/" . $image_logo; ?>"
                            alt="<?php echo $team_name . "Passport Port"; ?>" />
                        </div>
                        <div class="content">
                          <h6>
                            Update

                          </h6>
                          <p>
                            No update !
                          </p>
                          <span>10 mins ago</span>
                        </div>
                      </a>
                    </li>

                  </ul>
                </div>
                <!-- notification end -->

                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">


                      <div class="info">
                        <div class="image">
                          <img src="<?php echo "executive_Images/" . $image_passport; ?>"
                            alt="<?php echo $position . "Passport Port"; ?>" />
                        </div>
                        <div>
                          <h6 class="fw-500"><?php echo $name; ?></h6>
                          <p><?php echo $position; ?></p>
                        </div>
                      </div>




                    </div>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <div class="author-info flex items-center !p-1">
                        <div class="image">
                          <img src="<?php echo "executive_Images/" . $image_passport; ?>"
                            alt="<?php echo $position . "Passport Port"; ?>">
                        </div>
                        <div class="content">
                          <h4 class="text-sm"><?php echo $name; ?></h4>
                          <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"
                            href="#"><?php echo $position; ?></a>
                          <span
                            class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs -mt-2 "
                            style="font-size:8px;" href="#"><?php echo $email; ?></span>

                        </div>
                      </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#0">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>
                    <li>
                      <a href="#0">
                        <i class="lni lni-alarm"></i> Notifications
                      </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="lni lni-cog"></i> Account </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#0" id="signOutBtn"> <i class="lni lni-exit"></i> Sign Out </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2> <img class="mx-auto next_match_logo" src="<?php echo "team_logo/" . $image_logo; ?>"
                      alt="<?php echo $team_name . "Passport Port"; ?>">&nbsp;&nbsp;<?php echo $team_name; ?></h2>

                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Main
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">

            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon text-success">
                  <i class="lni lni-user"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Registered Players</h6>
                  <h3 class="text-bold mb-10"><?php echo $no_of_players; ?></h3>

                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-user"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Number of Players</h6>
                  <h3 class="text-bold mb-10"><?php echo $number_of_players; ?></h3>

                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30" onclick="copyToClipboard()">

                <div class="content">
                  <h6 class="mb-25">Reference Number</h6>
                  <h3 class="text-bold mb-10" id="textToCopy">
                    <?php echo $_SESSION['teamRefNumber']; ?>
                  </h3>

                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">

                <div class="content">
                  <h6 class="mb-25">Reference Link</h6>
                  <h6 class="text-wrap mb-10">https://yoshifa...</h6>

                </div>
                <div class="icon orange" onclick="shareLink()">
                  <i class="lni lni-share"></i>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
          <?php
    }
    ?>
        <div class="row">

          <div class="col-lg-12">
            <div class="card-style mb-30">
              <div class="title d-flex flex-wrap justify-content-between align-items-center">
                <div class="left">
                  <h6 class="text-medium mb-30">List of Players</h6>
                </div>

              </div>
              <!-- End Title -->
              <div class="table-responsive">
                <table class="table top-selling-table">
                  <thead>
                    <tr>

                      <th>
                        <h6 class="text-sm text-medium">Players</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">Position</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">Phone Number</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">Email</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">Age</h6>
                      </th>
                      <th></th>
                    </tr>
                  </thead>




                  <tbody>
                    <?php
                    // Displaying fetched records
                    foreach ($players_record as $player_record) {
                      // Assign values to variables
                      $user_id = $player_record['id'];
                      $userRefNo = $player_record['userRefNo'];
                      $image_passport = $player_record['passport'];
                      $image_logo = $player_record['team_logo'];
                      $firstname = $player_record['firstname'];
                      $surname = $player_record['surname'];
                      $position = $player_record['user_position'];
                      $dob = $player_record['dob'];
                      $gender = $player_record['gender']; // Added missing column
                      $height = $player_record['hieght']; // Corrected typo in column name
                      $weight = $player_record['weight']; // Added missing column
                      $country = $player_record['country'];
                      $state = $player_record['state'];
                      $city = $player_record['city'];
                      $zipcode = $player_record['zipcode'];
                      $phone = $player_record['phone'];
                      $email = $player_record['email'];
                      $address = $player_record['address'];
                      $team_name = $player_record['team_name'];
                      $player_position = $player_record['player_position']; // Added missing column
                      $jersey_number = $player_record['jersy_number']; // Corrected typo in column name
                      $team_country = $player_record['team_country'];
                      $team_state = $player_record['team_state'];
                      $team_city = $player_record['team_city'];
                      $number_of_players = $player_record['number_of_players'];
                      $team_address = $player_record['team_address'];
                      $time_created = $player_record['time_created'];
                      $date_created = $player_record['date_created'];
                      $ip_address = $player_record['ip_address'];

                      $birthday = new DateTime($dob);
                      $currentDate = new DateTime();
                      $age = $currentDate->diff($birthday)->y;
                      ?>
                      <tr>

                        <td>
                          <div class="product">
                            <div class="image">
                              <img src="<?php echo "players_Images/" . $image_passport; ?>" alt="" />
                            </div>
                            <na class="text-sm"><?php echo $firstname . " " . $surname; ?></na>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm"><?php echo $player_position; ?></p>
                        </td>
                        <td>
                          <p class="text-sm"><?php echo $phone; ?></p>
                        </td>
                        <td>
                          <p class="text-sm"><?php echo $email; ?></p>
                        </td>
                        <td>
                          <p class="text-sm"><?php echo $age; ?></p>
                        </td>
                        <td>
                          <div class="action justify-content-end">
                            <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="lni lni-more-alt"></i>
                            </button>
                            <!-- HTML Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                              <li class="dropdown-item">
                                <a href="#" class="text-gray view-record"
                                  data-user-id="<?php echo $userRefNo; ?>">View</a>
                              </li>
                              <li class="dropdown-item">
                                <a href="#" class="text-gray edit-record"
                                  data-user-id="<?php echo $userRefNo; ?>">Edit</a>
                              </li>
                              <li class="dropdown-item">
                                <a href="#" class="text-gray delete-record"
                                  data-user-id="<?php echo $userRefNo; ?>">Remove</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                    <?php if (empty($players_record)) {
                      echo "<tr><td colspan='6'><center>
                      <lord-icon
                      src='https://cdn.lordicon.com/vihyezfv.json'
                      trigger='loop'
                      delay='1000'
                      style='width:30px;height:30px'>
                  </lord-icon> &nbsp;No record found</center></td></tr>";
                    } ?>

                  </tbody>
                </table>
                <!-- End Table -->
              </div>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- View/Edit Record Modal -->
        <div class="modal" id="recordModal">
          <!-- Modal content goes here -->
        </div>

        <div class="row">

          <div class="col-lg-12">
            <div class="card-style mb-30">
              <div class="title d-flex flex-wrap align-items-center justify-content-between">
                <div class="left">
                  <h6 class="text-medium mb-30">Match History</h6>
                </div>

              </div>
              <!-- End Title -->
              <div class="table-responsive">
                <table class="table top-selling-table">
                  <thead>
                    <tr>
                      <th>
                        <h6 class="text-sm text-medium">Players</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Position
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Match/Date
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Score
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Status
                        </h6>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Displaying fetched records
                    foreach ($playerMatchHistory as $matchRecord) {
                      // Assign values to variables
                      $user_id = $matchRecord['id'];
                      $userRefNo = $matchRecord['userRefNo'];
                      $image_passport = $matchRecord['passport'];
                      $image_logo = $matchRecord['team_logo'];
                      $firstname = $matchRecord['firstname'];
                      $surname = $matchRecord['surname'];
                      $position = $matchRecord['user_position'];
                      $dob = $matchRecord['dob'];
                      $gender = $matchRecord['gender']; // Added missing column
                      $height = $matchRecord['hieght']; // Corrected typo in column name
                      $weight = $matchRecord['weight']; // Added missing column
                      $country = $matchRecord['country'];
                      $state = $matchRecord['state'];
                      $city = $matchRecord['city'];
                      $zipcode = $matchRecord['zipcode'];
                      $phone = $matchRecord['phone'];
                      $email = $matchRecord['email'];
                      $address = $matchRecord['address'];
                      $team_name = $matchRecord['team_name'];
                      $player_position = $matchRecord['player_position']; // Added missing column
                      $jersey_number = $matchRecord['jersy_number']; // Corrected typo in column name
                      $team_country = $matchRecord['team_country'];
                      $team_state = $matchRecord['team_state'];
                      $team_city = $matchRecord['team_city'];
                      $number_of_players = $matchRecord['number_of_players'];
                      $team_address = $matchRecord['team_address'];
                      $time_created = $matchRecord['time_created'];
                      $date_created = $matchRecord['date_created'];
                      $ip_address = $matchRecord['ip_address'];

                      $birthday = new DateTime($dob);
                      $currentDate = new DateTime();
                      $age = $currentDate->diff($birthday)->y;
                      ?>
                      <tr>
                        <td>
                          <div class="product">
                            <div class="image">
                              <img src="images/Yoshi Logo.png" alt="" />
                            </div>
                            <p class="text-sm">Abubakar Sadiq</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">Midfielder</p>
                        </td>
                        <td>
                          <p class="text-sm">Gombe Unt/Kwara Untd</p>
                        </td>
                        <td>
                          <p class="text-sm">2</p>
                        </td>
                        <td>
                          <span class="status-btn close-btn">Red Card</span>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <div class="product">
                            <div class="image">
                              <img src="images/Yoshi Logo.png" alt="" />
                            </div>
                            <p class="text-sm">Abubakar Sadiq</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">Midfielder</p>
                        </td>
                        <td>
                          <p class="text-sm">Gombe Unt/Kwara Untd</p>
                        </td>
                        <td>
                          <p class="text-sm">2</p>
                        </td>
                        <td>
                          <span class="status-btn warning-btn">Yellow Card</span>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <div class="product">
                            <div class="image">
                              <img src="images/Yoshi Logo.png" alt="" />
                            </div>
                            <p class="text-sm">Abubakar Sadiq</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">Midfielder</p>
                        </td>
                        <td>
                          <p class="text-sm">Gombe Unt/Kwara Untd</p>
                        </td>
                        <td>
                          <p class="text-sm">2</p>
                        </td>
                        <td>
                          <span class="status-btn success-btn">Completed</span>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <div class="product">
                            <div class="image">
                              <img src="images/Yoshi Logo.png" alt="" />
                            </div>
                            <p class="text-sm">Abubakar Sadiq</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">Midfielder</p>
                        </td>
                        <td>
                          <p class="text-sm">Gombe Unt/Kwara Untd</p>
                        </td>
                        <td>
                          <p class="text-sm">2</p>
                        </td>
                        <td>
                          <span class="status-btn close-btn">Red Card</span>
                        </td>

                      </tr>

                      <?php
                    }
                    ?>
                    <?php if (empty($playerMatchHistory)) {
                      echo "<tr><td colspan='6'><center>
                      <lord-icon
                      src='https://cdn.lordicon.com/vihyezfv.json'
                      trigger='loop'
                      delay='1000'
                      style='width:30px;height:30px'>
                  </lord-icon> &nbsp;No record found</center></td></tr>";
                    } ?>
                  </tbody>
                </table>
                <!-- End Table -->
              </div>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 order-last order-md-first">
            <div class="copyright text-center text-md-start">
              <p class="text-sm">
                Powered by
                <a href="https://yoshifa.com" rel="nofollow" target="_blank">
                  Yoshi Football Academy 2024
                </a>
              </p>
            </div>
          </div>
          <!-- end col-->
          <div class="col-md-6">
            <div class="terms d-flex justify-content-center justify-content-md-end">
              <a href="#0" class="text-sm">Term & Conditions</a>
              <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/dynamic-pie-chart.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/fullcalendar.js"></script>
  <script src="assets/js/jvectormap.min.js"></script>
  <script src="assets/js/world-merc.js"></script>
  <script src="assets/js/polyfill.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // View Record
      $('.view-record').click(function (e) {
        e.preventDefault();
        var userId = $(this).data('user-id');
        $.ajax({
          url: 'view_player_record.php',
          type: 'POST',
          data: { userId: userId },
          success: function (response) {
            $('#recordModal').html(response).modal('show');
          }
        });
      });

      // Edit Record
      $('.edit-record').click(function (e) {
        e.preventDefault();
        var userId = $(this).data('user-id');
        $.ajax({
          url: 'edit_record.php',
          type: 'POST',
          data: { userId: userId },
          success: function (response) {
            $('#recordModal').html(response).modal('show');
          }
        });
      });

      // Delete Record
      $('.delete-record').click(function (e) {
        e.preventDefault();
        var userId = $(this).data('user-id');
        if (confirm('Are you sure you want to delete this record?')) {
          $.ajax({
            url: 'delete_record.php',
            type: 'POST',
            data: { userId: userId },
            success: function (response) {
              // Handle success response, e.g., refresh page
            }
          });
        }
      });
    });
  </script>





  <script>
    // ======== jvectormap activation
    var markers = [
      { name: "Egypt", coords: [26.8206, 30.8025] },
      { name: "Russia", coords: [61.524, 105.3188] },
      { name: "Canada", coords: [56.1304, -106.3468] },
      { name: "Greenland", coords: [71.7069, -42.6043] },
      { name: "Brazil", coords: [-14.235, -51.9253] },
    ];

    var jvm = new jsVectorMap({
      map: "world_merc",
      selector: "#map",
      zoomButtons: true,

      regionStyle: {
        initial: {
          fill: "#d1d5db",
        },
      },

      labels: {
        markers: {
          render: (marker) => marker.name,
        },
      },

      markersSelectable: true,
      selectedMarkers: markers.map((marker, index) => {
        var name = marker.name;

        if (name === "Russia" || name === "Brazil") {
          return index;
        }
      }),
      markers: markers,
      markerStyle: {
        initial: { fill: "#4A6CF7" },
        selected: { fill: "#ff5050" },
      },
      markerLabelStyle: {
        initial: {
          fontWeight: 400,
          fontSize: 14,
        },
      },
    });
    // ====== calendar activation
    document.addEventListener("DOMContentLoaded", function () {
      var calendarMiniEl = document.getElementById("calendar-mini");
      var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
          end: "today prev,next",
        },
      });
      calendarMini.render();
    });

    // =========== chart one start
    const ctx1 = document.getElementById("Chart1").getContext("2d");
    const chart1 = new Chart(ctx1, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "transparent",
            borderColor: "#365CF5",
            data: [
              600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#365CF5",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 5,
            borderWidth: 5,
            pointRadius: 8,
            pointHoverRadius: 8,
            cubicInterpolationMode: "monotone", // Add this line for curved line
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              labelColor: function (context) {
                return {
                  backgroundColor: "#ffffff",
                  color: "#171717"
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            title: {
              fontFamily: "Plus Jakarta Sans",
              color: "#8F92A1",
              fontSize: 12,
            },
            body: {
              fontFamily: "Plus Jakarta Sans",
              color: "#171717",
              fontStyle: "bold",
              fontSize: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            titleColor: "#8F92A1",
            bodyColor: "#171717",
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: "16",
              weight: "bold",
            },
          },
          legend: {
            display: false,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 500,
            },
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart one end

    // =========== chart two start
    const ctx2 = document.getElementById("Chart2").getContext("2d");
    const chart2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "#365CF5",
            borderRadius: 30,
            barThickness: 6,
            maxBarThickness: 8,
            data: [
              600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
            ],
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              titleColor: function (context) {
                return "#8F92A1";
              },
              label: function (context) {
                let label = context.dataset.label || "";

                if (label) {
                  label += ": ";
                }
                label += context.parsed.y;
                return label;
              },
            },
            backgroundColor: "#F3F6F8",
            titleAlign: "center",
            bodyAlign: "center",
            titleFont: {
              size: 12,
              weight: "bold",
              color: "#8F92A1",
            },
            bodyFont: {
              size: 16,
              weight: "bold",
              color: "#171717",
            },
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
          },
        },
        legend: {
          display: false,
        },
        legend: {
          display: false,
        },
        layout: {
          padding: {
            top: 15,
            right: 15,
            bottom: 15,
            left: 15,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          title: {
            display: false,
          },
        },
      },
    });
    // =========== chart two end

    // =========== chart three start
    const ctx3 = document.getElementById("Chart3").getContext("2d");
    const chart3 = new Chart(ctx3, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "Revenue",
            backgroundColor: "transparent",
            borderColor: "#365CF5",
            data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#365CF5",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#365CF5",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
          {
            label: "Profit",
            backgroundColor: "transparent",
            borderColor: "#9b51e0",
            data: [
              120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#9b51e0",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#9b51e0",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
          {
            label: "Order",
            backgroundColor: "transparent",
            borderColor: "#f2994a",
            data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#f2994a",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#f2994a",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            intersect: false,
            backgroundColor: "#fbfbfb",
            titleColor: "#8F92A1",
            bodyColor: "#272727",
            titleFont: {
              size: 16,
              family: "Plus Jakarta Sans",
              weight: "400",
            },
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 15,
            },
            borderColor: "rgba(143, 146, 161, .1)",
            borderWidth: 1,
            enabled: true,
          },
          title: {
            display: false,
          },
          legend: {
            display: false,
          },
        },
        layout: {
          padding: {
            top: 0,
          },
        },
        responsive: true,
        // maintainAspectRatio: false,
        legend: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
            },
            max: 350,
            min: 50,
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart three end

    // ================== chart four start
    const ctx4 = document.getElementById("Chart4").getContext("2d");
    const chart4 = new Chart(ctx4, {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [
          {
            label: "",
            backgroundColor: "#365CF5",
            borderColor: "transparent",
            borderRadius: 20,
            borderWidth: 5,
            barThickness: 20,
            maxBarThickness: 20,
            data: [600, 700, 1000, 700, 650, 800],
          },
          {
            label: "",
            backgroundColor: "#d50100",
            borderColor: "transparent",
            borderRadius: 20,
            borderWidth: 5,
            barThickness: 20,
            maxBarThickness: 20,
            data: [690, 740, 720, 1120, 876, 900],
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            backgroundColor: "#F3F6F8",
            titleColor: "#8F92A1",
            titleFontSize: 12,
            bodyColor: "#171717",
            bodyFont: {
              weight: "bold",
              size: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            enabled: true,
          },
          legend: {
            display: false,
          },
        },
        layout: {
          padding: {
            top: 0,
          },
        },
        responsive: true,
        // maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart four end
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- Include SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <?php

  echo @$_SESSION['welcome'];
  echo @$login_success;

  ?>

  <script>
    function copyToClipboard() {
      var text = document.getElementById("textToCopy").innerText;
      var message = "Please use this as our team reference number to create an account with https://yoshitournaments.com:\n\n*Team Reference Number:*\n" + text;
      navigator.clipboard.writeText(text)
        .then(() => {
          new Noty({
            theme: 'metroui',
            text: 'Reference Number copied!',
            type: 'success',
            timeout: 2000 // 2 seconds
          }).show();

        })
        .catch(err => {
          console.error('Failed to copy text: ', err);
          new Noty({
            theme: 'metroui',
            text: 'Failed to copy text',
            type: 'error',
            timeout: 2000 // 2 seconds
          }).show();
        });

      if (navigator.share) {
        navigator.share({
          title: 'Yoshi-Team: Share Reference Number',
          text: message
        }).then(() => {
          new Noty({
            theme: 'metroui', //mint, sunset, relax, nest, metroui, semanticui, light, bootstrap-v3, bootstrap-v4
            text: 'Reference Number Successfully Shared!',
            type: 'success',
            timeout: 2000 // 2 seconds
          }).show();
        })
          .catch(error => {
            new Noty({
              theme: 'metroui', //mint, sunset, relax, nest, metroui, semanticui, light, bootstrap-v3, bootstrap-v4
              text: 'oops! Reference Number failed to share',
              type: 'error',
              timeout: 2000 // 2 seconds
            }).show();
          });
      } else {
        new Noty({
          theme: 'metroui', //mint, sunset, relax, nest, metroui, semanticui, light, bootstrap-v3, bootstrap-v4
          text: 'oops! Browser not supported',
          type: 'error',
          timeout: 2000 // 2 seconds
        }).show();
      }
    }
  </script>

  <script>
    function shareLink() {
      var teamRefNumber = '<?php echo $_SESSION['teamRefNumber']; ?>';
      var url = 'referenceNumber.php?id=' + teamRefNumber;
      navigator.share({
        title: 'Share Reference Link',
        text: 'Check out my reference link',
        url: url
      })
        .then(() => console.log('Shared successfully'))
        .catch(error => console.error('Error sharing:', error));
    }
  </script>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Add event listener to the sign-out button
      document.getElementById("signOutBtn").addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Perform sign-out logic here
        fetch('logout.php')
          .then(response => {
            if (response.ok) {
              // Session destroyed successfully
              // Show logout notification
              new Noty({
                theme: 'metroui',
                text: 'You are logged out!',
                type: 'success',
                timeout: 2000 // 2 seconds
              }).show();

              // Redirect to the index.php page
              window.location.href = 'index.php';
            } else {
              // Failed to destroy session
              // Show error notification
              new Noty({
                theme: 'metroui',
                text: 'Failed to sign out. Please try again later.',
                type: 'error',
                timeout: 2000 // 2 seconds
              }).show();
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
    });
  </script>


</body>

</html>