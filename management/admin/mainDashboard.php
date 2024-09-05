<?php

session_start();
ob_start();
$email = $_SESSION['a_email'];

require '../../connection.php';

// Prepare SQL statement to fetch user from yoshi_signup_tbl
// Perform authentication against yoshi_signup_tbl
$stmt_signup = $pdo->prepare("SELECT COUNT(*) as total_users FROM yoshi_signup_tbl");
$stmt_signup->execute();
$result = $stmt_signup->fetch(PDO::FETCH_ASSOC);
$total_users = $result['total_users'];

// Prepare SQL statement to fetch user from yoshi_signup_tbl
// Perform authentication against yoshi_signup_tbl
$stmt_pending = $pdo->prepare("SELECT COUNT(*) as total_users FROM yoshi_signup_tbl WHERE reg_status = 0");
$stmt_pending->execute();
$result_pending = $stmt_pending->fetch(PDO::FETCH_ASSOC);
$total_users_pending = $result_pending['total_users'];


// Perform authentication against yoshi_signup_tbl
$stmt_attendance = $pdo->prepare("SELECT COUNT(*) as total_attendance FROM yoshi_school_students_tbl WHERE attendance = 1");
$stmt_attendance->execute();
$result_attendance = $stmt_attendance->fetch(PDO::FETCH_ASSOC);
$total_attendance = $result_attendance['total_attendance'];







// Fetching records from the database
// Insert data into the database

// ##### Fetching record for School Officials #######

$stmt_school = $pdo->prepare("SELECT COUNT(*) as total_school_officials FROM yoshi_schools_officials_tbl");
$stmt_school->execute();
$result_school = $stmt_school->fetch(PDO::FETCH_ASSOC);
$total_school_officials = $result_school['total_school_officials'];


// ##### Fetching record for admins #######

$stmt_admin = $pdo->prepare("SELECT COUNT(*) as total_admin FROM yoshi_admins_tbl");
$stmt_admin->execute();
$result_admin = $stmt_admin->fetch(PDO::FETCH_ASSOC);
$total__admin = $result_admin['total_admin'];




// ##### Fetching record for School Officials #######

$stmt_student = $pdo->prepare("SELECT COUNT(*) as total_student  FROM yoshi_school_students_tbl");
$stmt_student->execute();
$result_student = $stmt_student->fetch(PDO::FETCH_ASSOC);
$total_student = $result_student['total_student'];



// Getting Players Records from yoshi_players_tbl
// $stmtPlayers = $pdo->prepare("SELECT * FROM `yoshi_school_students_tbl` ORDER BY `id` DESC");
// $stmtPlayers->execute();
// $players_record = $stmtPlayers->fetchAll(PDO::FETCH_ASSOC);

// $no_of_players = 0;

// Assuming $players_record is an array containing player records
// foreach ($players_record as $player_record) {
//   // Increment the counter for each player record
//   $no_of_players++;
// }

// Getting match history record
// $stmtMatchHistory = $pdo->prepare("SELECT * FROM `yoshi_player_match_history_tbl`");
// $stmtMatchHistory->execute();
// $playerMatchHistory = $stmtMatchHistory->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" href="images/favicon.ico" type="image/ico" /> -->
  <link rel="shortcut icon" href="../../images/logo.png" type="image/x-icon">

  <title>Management</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css"
    integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/regular.min.css"
    integrity="sha512-j+P0XpTXw+hDTK64xqC/cjv62cf629/IR4/0bokmich7J8XdVlWT40+1M/Z58rCQ4F+3QoJIfzh6Ui6TTIP6WQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- QR code scanner -->
  <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <style>
    .icon {
      font-size: 50px !important;
      color: #eee !important;
    }

    .tile-stats {
      border-radius: 15px 15px !important;
    }

    .stats_text {
      font-size: 16px !important;
      color: dimgrey !important;
      margin-left: 10px;
    }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <?php require 'smallNavbar.php'; ?>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <?php require 'profileQuickInfo.php'; ?>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <?php require 'sideMenu.php'; ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <?php require 'footerButton.php'; ?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php require 'topNavbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <a href="signupList.php" class=" text-decoration-none">
              <div class="tile-stats">
                <div class="icon" style="font-size:30px;">
                  <i class="fas fa-users"></i>
                </div>
                <div class="count"><?php echo $total_users; ?></div>
                <h4 class="stats_text">Sign up</h4>
              </div>
            </a>
          </div>



          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <a href="schoolList.php" class=" text-decoration-none">
              <div class="tile-stats">
                <div class="icon">
                  <i class="fas fa-school"></i>
                </div>
                <div class="count"><?php echo $total_school_officials; ?></div>
                <h4 class="stats_text">Schools</h4>
              </div>
            </a>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <div class="tile-stats">
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <div class="count"><?php echo $total_student; ?></div>

              <h4 class="stats_text">Students</h4>

            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <div class="tile-stats" style="background-color: #ffbc42;">
              <div class="icon">
                <i class="fas fa-user-clock"></i>
              </div>
              <div class="count"><?php if (!empty($total_users_pending)) {
                echo $total_users_pending;
              } else {
                echo "0";
              } ?></div>

              <h4 class="stats_text">Pending</h4>

            </div>
          </div>
        </div>

        <div class="row">

          <div class="animated flipInY  col-lg-3 col-md-3 col-sm-6">
            <a href="attendance.php" class=" text-decoration-none">
              <div class="tile-stats" style="background-color:#83c5be;">
                <div class="icon" style="font-size:30px;">
                  <i class="fas fa-user-plus"></i>
                </div>
                <div class="count"><?php echo $total_attendance; ?></div>
                <h4 class="stats_text">Attendance</h4>
              </div>
            </a>
          </div>



          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <a href="addadmin.php" class=" text-decoration-none">
              <div class="tile-stats">
                <div class="icon">
                  <i class="fas fa-user-tie"></i>
                </div>
                <div class="count"><?php echo $total__admin; ?></div>
                <h4 class="stats_text">Add Admin</h4>
              </div>
            </a>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <div class="tile-stats">
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <div class="count"><?php echo $total_student; ?></div>

              <h4 class="stats_text">Students</h4>

            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <div class="tile-stats">
              <div class="icon">
                <i class="fas fa-user-clock"></i>
              </div>
              <div class="count"><?php if (!empty($total_users_pending)) {
                echo $total_users_pending;
              } else {
                echo "0";
              } ?></div>

              <h4 class="stats_text">Pending</h4>

            </div>
          </div>
        </div>

        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-6">
                  <h3>Registration <small>Staff & Students</small></h3>
                </div>
                <div class="col-md-6">
                  <div id="reportrange" class="pull-right"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>December 30, 2023 - August 28, 2024</span> <b class="caret"></b>
                  </div>
                </div>
              </div>

              <div class="col-md-9 col-sm-9 ">
                <div id="chart_plot_01" class="demo-placeholder"></div>
              </div>
              <div class="col-md-3 col-sm-3  bg-white">
                <div class="x_title">
                  <h2>Based on Gender</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 ">
                  <div>
                    <p>Male</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Female</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />

        <!-- <div class="row">


          <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
              <div class="x_title">
                <h2>App Versions</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                        class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <h4>App Usage across versions</h4>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.2</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 66%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>123k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.3</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 45%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>53k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.4</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 25%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>23k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.5</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 5%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>3k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.6</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 2%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>1k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Device Usage</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                        class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">
                      <p>Top 5</p>
                    </th>
                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 ">
                        <p class="">Device</p>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 ">
                        <p class="">Progress</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <td>
                            <p><i class="fa fa-square blue"></i>IOS </p>
                          </td>
                          <td>30%</td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square green"></i>Android </p>
                          </td>
                          <td>10%</td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                          </td>
                          <td>20%</td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square aero"></i>Symbian </p>
                          </td>
                          <td>15%</td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square red"></i>Others </p>
                          </td>
                          <td>30%</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>


          <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
              <div class="x_title">
                <h2>Quick Settings</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                        class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="dashboard-widget-content">
                  <ul class="quick-list">
                    <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                    </li>
                    <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                    </li>
                    <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                    <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                    </li>
                    <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                    <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                    </li>
                    <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                    </li>
                  </ul>

                  <div class="sidebar-widget">
                    <h4>Profile Completion</h4>
                    <canvas width="150" height="80" id="chart_gauge_01" class=""
                      style="width: 160px; height: 100px;"></canvas>
                    <div class="goal-wrapper">
                      <span id="gauge-text" class="gauge-value pull-left">0</span>
                      <span class="gauge-value pull-left">%</span>
                      <span id="goal-text" class="goal-value pull-right">100%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> -->


        <!-- <div class="row">
          <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Recent Activities <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                        class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="dashboard-widget-content">

                  <ul class="list-unstyled timeline widget">
                    <li>
                      <div class="block">
                        <div class="block_content">
                          <h2 class="title">
                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
                          <div class="byline">
                            <span>13 hours ago</span> by <a>Jane Smith</a>
                          </div>
                          <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were
                            where you met the producers that could fund your project, and if the buyers liked your
                            flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="block_content">
                          <h2 class="title">
                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
                          <div class="byline">
                            <span>13 hours ago</span> by <a>Jane Smith</a>
                          </div>
                          <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were
                            where you met the producers that could fund your project, and if the buyers liked your
                            flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="block_content">
                          <h2 class="title">
                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
                          <div class="byline">
                            <span>13 hours ago</span> by <a>Jane Smith</a>
                          </div>
                          <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were
                            where you met the producers that could fund your project, and if the buyers liked your
                            flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="block_content">
                          <h2 class="title">
                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
                          <div class="byline">
                            <span>13 hours ago</span> by <a>Jane Smith</a>
                          </div>
                          <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were
                            where you met the producers that could fund your project, and if the buyers liked your
                            flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-8 col-sm-8 ">



            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Visitors location <small>geo-presentation</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                          aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="dashboard-widget-content">
                      <div class="col-md-4 hidden-small">
                        <h2 class="line_30">125.7k Views from 60 countries</h2>

                        <table class="countries_list">
                          <tbody>
                            <tr>
                              <td>United States</td>
                              <td class="fs15 fw700 text-right">33%</td>
                            </tr>
                            <tr>
                              <td>France</td>
                              <td class="fs15 fw700 text-right">27%</td>
                            </tr>
                            <tr>
                              <td>Germany</td>
                              <td class="fs15 fw700 text-right">16%</td>
                            </tr>
                            <tr>
                              <td>Spain</td>
                              <td class="fs15 fw700 text-right">11%</td>
                            </tr>
                            <tr>
                              <td>Britain</td>
                              <td class="fs15 fw700 text-right">10%</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">


             
              <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>To Do List <small>Sample tasks</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                          aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="">
                      <ul class="to_do">
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Schedule meeting with new client
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Create email address for new intern
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Have IT fix the network printer
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Copy backups to offsite location
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Create email address for new intern
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Have IT fix the network printer
                          </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Copy backups to offsite location
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              


        <div class="col-md-6 col-sm-6 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Daily active users <small>Sessions</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                      class="fa fa-wrench"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="temperature"><b>Monday</b>, 07:30 AM
                    <span>F</span>
                    <span><b>C</b></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="weather-icon">
                    <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="weather-text">
                    <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="weather-text pull-right">
                  <h3 class="degrees">23</h3>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="row weather-days">
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Mon</h2>
                    <h3 class="degrees">25</h3>
                    <canvas id="clear-day" width="32" height="32"></canvas>
                    <h5>15 <i>km/h</i></h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Tue</h2>
                    <h3 class="degrees">25</h3>
                    <canvas height="32" width="32" id="rain"></canvas>
                    <h5>12 <i>km/h</i></h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Wed</h2>
                    <h3 class="degrees">27</h3>
                    <canvas height="32" width="32" id="snow"></canvas>
                    <h5>14 <i>km/h</i></h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Thu</h2>
                    <h3 class="degrees">28</h3>
                    <canvas height="32" width="32" id="sleet"></canvas>
                    <h5>15 <i>km/h</i></h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Fri</h2>
                    <h3 class="degrees">28</h3>
                    <canvas height="32" width="32" id="wind"></canvas>
                    <h5>11 <i>km/h</i></h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Sat</h2>
                    <h3 class="degrees">26</h3>
                    <canvas height="32" width="32" id="cloudy"></canvas>
                    <h5>10 <i>km/h</i></h5>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

        </div>
        
      </div>
    </div>
  </div> -->
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?php require 'mainFooter.php'; ?>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
    integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/fontawesome.min.js"
    integrity="sha512-NeFv3hB6XGV+0y96NVxoWIkhrs1eC3KXBJ9OJiTFktvbzJ/0Kk7Rmm9hJ2/c2wJjy6wG0a0lIgehHjCTDLRwWw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../vendors/Flot/jquery.flot.js"></script>
  <script src="../vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../vendors/Flot/jquery.flot.time.js"></script>
  <script src="../vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>