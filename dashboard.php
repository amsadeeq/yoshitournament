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


$stmtPlayers = $pdo->prepare("SELECT * FROM `yoshi_players_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
$stmtPlayers->execute(['teamRefNumber' => $TeamRefNumber]);
$players_record = $stmtPlayers->fetchAll(PDO::FETCH_ASSOC);

$no_of_players = 0;

// Assuming $players_record is an array containing player records
foreach ($players_record as $player_record) {
  // Increment the counter for each player record
  $no_of_players++;
}


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
    
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      

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

                  <tbody id="player-records-container">
                    <!-- Player records will be inserted here dynamically -->
                  </tbody>


                  <tbody>
                    <?php
                    // Displaying fetched records
                    foreach ($players_record as $player_record) {
                      // Assign values to variables
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
                          <p class="text-sm"><?php echo $dob; ?></p>
                        </td>
                        <td>
                          <div class="action justify-content-end">
                            <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="lni lni-more-alt"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                              <li class="dropdown-item">
                                <a href="#0" class="text-gray">Remove</a>
                              </li>
                              <li class="dropdown-item">
                                <a href="#0" class="text-gray">Edit</a>
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

  <script>
    // Function to fetch player records using AJAX
    function fetchPlayerRecords() {
      $.ajax({
        url: 'dashboard.php', // Use the same file for PHP processing
        type: 'POST', // Send a POST request to execute PHP code
        data: { action: 'fetch_players' }, // Send a parameter to indicate fetching players
        success: function (data) {
          // Parse the JSON response
          var playerRecords = JSON.parse(data);

          // Clear previous content
          $('#player-records-container').empty();

          // Loop through each player record
          playerRecords.forEach(function (record) {
            // Append player record HTML to the container
            $('#player-records-container').append(`
          <tr>
            <td>${record.firstname} ${record.surname}</td>
            <td>${record.player_position}</td>
            <td>${record.phone}</td>
            <td>${record.email}</td>
            <td>${record.dob}</td>
            <td>
              <button class="remove-btn" data-id="${record.id}">Remove</button>
              <button class="edit-btn" data-id="${record.id}">Edit</button>
            </td>
          </tr>
        `);
          });
        },
        error: function (xhr, status, error) {
          console.error('Error fetching player records:', error);
        }
      });
    }

    // Call the function when the page loads
    $(document).ready(function () {
      fetchPlayerRecords();

      // Fetch player records every 5 seconds
      setInterval(fetchPlayerRecords, 5000);
    });
  </script>

  <?php
  // Check if action is set and equal to 'fetch_players'
  if (isset($_POST['action']) && $_POST['action'] === 'fetch_players') {
    // Include the connection file
    require_once 'connection.php';

    $stmtPlayers = $pdo->prepare("SELECT * FROM `yoshi_players_tbl` WHERE `TeamRefNumber` = :teamRefNumber");
    $stmtPlayers->execute(['teamRefNumber' => $TeamRefNumber]);
    $players_record = $stmtPlayers->fetchAll(PDO::FETCH_ASSOC);
    // Return JSON response
    header('Content-Type: application/json');

    // Convert to JSON format and output
    echo json_encode($players_record);
  } else {
    echo "Error part";
  }
  ?>




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