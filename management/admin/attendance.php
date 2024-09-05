<?php

session_start();
ob_start();
$email = $_SESSION['a_email'];

require '../../connection.php';

// Fetch attendance records
$stmt = $pdo->query("SELECT * FROM yoshi_school_students_tbl WHERE attendance = 1 ORDER BY attendance_date DESC, attendance_time DESC");
$attendances = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Attendance | Yoshi Tournaments</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- QR Code Scanner Library -->
  <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>



  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
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
          <?php require 'footerButton'; ?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php require 'topNavbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Attendance</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="x_panel">
              <div class="x_content">
                <div class="clearfix"></div>





                <div class="qr-container col-12 col-sm-12 col-md-5 col-lg-5">
                  <div class="scanner-con">
                    <h5 class="text-center">Scan you QR Code here for your attedance</h5>
                    <video id="interactive" class="viewport" width="100%">
                  </div>

                  <div class="qr-detected-container" style="display: none;">
                    <form action="validate_attendance.php" method="POST">
                      <h4 class="text-center">Student QR Detected!</h4>
                      <input type="hidden" id="detected-qr-code" name="qr_code">
                      <button type="submit" class="btn btn-dark form-control">Submit Attendance</button>
                    </form>
                  </div>
                </div>







              </div>
            </div>
          </div>
          <div class="container mt-5">
            <h2 class="text-center">Attendance List</h2>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Full Name</th>
                    <th>User Reference Number</th>
                    <th>Category (Section)</th>
                    <th>Attendance Time</th>
                    <th>Attendance Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($attendances as $attendance): ?>
                    <tr>
                      <td>
                        <?php echo "<img style='width:40px;height:40px;' src = ../../../../schools/student_photo/" . htmlspecialchars($attendance['passport']) . " />"; ?>
                      </td>
                      <td>
                        <?php echo htmlspecialchars($attendance['surname']) . " " . htmlspecialchars($attendance['firstname']); ?>
                      </td>
                      <td><?php echo htmlspecialchars($attendance['userRefNo']); ?></td>
                      <td><?php echo htmlspecialchars($attendance['category']); ?></td>
                      <td><?php echo htmlspecialchars($attendance['attendance_time']); ?></td>
                      <td><?php echo htmlspecialchars($attendance['attendance_date']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Yoshi Admin - by <a href="https://yoshifa.com">Yoshifa.com</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <script>
    function onScanSuccess(decodedText, decodedResult) {
      // Handle the result of the scan
      $('#qr-result').html(`QR Code detected: ${decodedText}`);

      // Make an AJAX call to validate attendance
      $.ajax({
        url: 'validate_attendance.php',
        type: 'POST',
        data: { userRefNo: decodedText },
        success: function (response) {
          $('#qr-result').html(response);
        }
      });
    }

    function onScanFailure(error) {
      // Handle scan failure, typically ignore
      console.warn(`Code scan error = ${error}`);
    }

    // Initialize QR code scanner
    let html5QrcodeScanner = new Html5QrcodeScanner(
      "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
  </script>



  <!-- instascan Js -->
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

  <script>


    let scanner;

    function startScanner() {
      scanner = new Instascan.Scanner({ video: document.getElementById('interactive'), mirror: false, backgroundScan: false, });

      scanner.addListener('scan', function (content) {
        $("#detected-qr-code").val(content);
        console.log(content);
        scanner.stop();
        document.querySelector(".qr-detected-container").style.display = '';
        document.querySelector(".scanner-con").style.display = 'none';
      });

      Instascan.Camera.getCameras()
        .then(function (cameras) {
          if (cameras.length > 0) {
            // Use the back camera if available, otherwise use the front camera
            const selectedCamera = cameras.find(camera => camera.name.includes('back')) || cameras[0];
            scanner.start(selectedCamera);
          } else {
            console.error('No cameras found.');
            alert('No cameras found.');
          }
        })
        .catch(function (err) {
          console.error('Camera access error:', err);
          alert('Camera access error: ' + err);
        });
    }

    document.addEventListener('DOMContentLoaded', startScanner);

    function deleteAttendance(id) {
      if (confirm("Do you want to remove this attendance?")) {
        window.location = "./endpoint/delete-attendance.php?attendance=" + id;
      }
    }
  </script>




  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>


</body>

</html>