<?php

session_start();
ob_start();

require '../../connection.php';

$stmt_school = $pdo->prepare("SELECT * FROM `yoshi_schools_officials_tbl` ORDER BY id DESC ");
$stmt_school->execute();
$school_official = $stmt_school->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>YAPS Schools List | Yoshi Tournaments</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->

  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
          <?php require 'footerButton.php'; ?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php require 'topNavbar.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>List of Accounts <small>(Users) <?php echo $email; ?></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>S/No</th>
                              <th>School Logo</th>
                              <th>School Name</th>
                              <th>Team Ref No.</th>
                              <th>Team Address</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sn = 0;
                            foreach ($school_official as $school) {
                              $sn = $sn + 1;
                              $userRefNo = $school['userRefNo'];
                              $userEmail = $school['user_email'];
                              $userPosition = $school['user_position'];
                              $teamRefNumber = $school['TeamRefNumber'];
                              $timeCreated = $school['time_created'];
                              $dateCreated = $school['date_created'];
                              $regStatus = $school['reg_status'];
                              ?>
                              <tr>
                                <td><?php echo $sn; ?></td>
                                <td>
                                  <img src="<?php echo "../../schools/school_logo/" . $school['team_logo']; ?>"
                                    style="width: 40px; height:40px;" />
                                </td>
                                <td><?php echo $school['team_name']; ?></td>
                                <td><?php echo $school['TeamRefNumber']; ?></td>
                                <td><?php echo $school['team_address']; ?></td>
                                <td><?php echo $school['phone']; ?></td>
                                <td><?php echo $school['email']; ?></td>
                                <td>
                                  <a href="#" style="color: green !important;"
                                    onclick="viewSchool('<?php echo $teamRefNumber; ?>')"><i class="fa fa-eye"></i></a> |
                                  <a href="#" style="color: brown !important;"
                                    onclick="editSchool('<?php echo $teamRefNumber; ?>')"><i class="fa fa-pencil"></i></a>
                                  |
                                  <a href="#" style="color: red !important;"
                                    onclick="deleteSchool('<?php echo $teamRefNumber; ?>')"><i
                                      class="fa fa-trash"></i></a>

                                </td>
                              </tr>
                              <?php
                            }
                            ?>
                          </tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-align-left"></i> Schools and Players</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <!-- start accordion -->
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel">
                    <?php
                    $sn = 0;
                    foreach ($school_official as $school) {
                      $sn = $sn + 1;
                      $userRefNo = $school['userRefNo'];
                      $userEmail = $school['user_email'];
                      $userPosition = $school['user_position'];
                      $teamRefNumber = $school['TeamRefNumber'];
                      $timeCreated = $school['time_created'];
                      $dateCreated = $school['date_created'];
                      $regStatus = $school['reg_status'];
                      ?>
                      <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion"
                        href="<?php echo "#collapse" . $school['TeamRefNumber']; ?>" aria-expanded="true"
                        aria-controls="<?php echo "#collapse" . $school['TeamRefNumber']; ?>">

                        <table class="table table-striped table-bordered">
                          <tbody>

                            <tr class="panel-title">
                              <td><?php echo $school['id']; ?></td>
                              <td>
                                <img src="<?php echo "../../schools/school_logo/" . $school['team_logo']; ?>"
                                  style="width: 40px; height:40px;" />
                              </td>
                              <td><?php echo $school['team_name']; ?></td>
                              <td><?php echo $school['TeamRefNumber']; ?></td>
                              <td><?php echo $school['team_address']; ?></td>
                              <td><?php echo $school['phone']; ?></td>
                              <td><?php echo $school['email']; ?></td>
                            </tr>

                          </tbody>
                        </table>
                      </a>
                      <div id="<?php echo "collapse" . $school['TeamRefNumber']; ?>" class="panel-collapse collapse in"
                        role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>User Ref No</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Emergency</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $stmt_player = $pdo->prepare("SELECT * FROM `yoshi_school_students_tbl` WHERE `TeamRefNumber` = :teamRefNumber ORDER BY id DESC ");
                              $stmt_player->execute(['teamRefNumber' => $school['TeamRefNumber']]);
                              $players_record = $stmt_player->fetchAll(PDO::FETCH_ASSOC);

                              $sn = 0;
                              foreach ($players_record as $player) {
                                $sn = $sn + 1;

                                ?>
                                <tr>
                                  <th><?php echo $sn; ?></th>
                                  <td><?php echo $player['userRefNo']; ?></td>
                                  <td>
                                    <img src="<?php echo "../../schools/student_photo/" . $player['passport']; ?>"
                                      style="width: 40px; height:40px;" />
                                  </td>
                                  <td><?php echo $player['surname'] . " " . $player['firstname']; ?></td>
                                  <td><?php echo $player['phone']; ?></td>
                                  <td><?php echo $player['email']; ?></td>
                                  <td>
                                    <h6><a
                                        href="tel:<?php echo $player['emergency_phone']; ?>"><?php echo $player['emergency_phone']; ?></a>
                                    </h6>
                                    <h6>
                                      <a
                                        href="mailto:<?php echo $player['emergency_email']; ?>"><?php echo $player['emergency_email']; ?></a>
                                    </h6>
                                    <h6><?php echo $player['emergency_name']; ?></h6>
                                    <h6><?php echo $player['emergency_address']; ?></h6>

                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>
                <!-- end of accordion -->


              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <?php require 'mainFooter.php'; ?>
    <!-- /footer content -->
  </div>
  </div>

  <script>
    function deleteSchool(teamRefNumber) {
      // Confirm with the user before deleting the record
      if (confirm("Are you sure you want to delete this school?")) {
        // Send an AJAX request to delete the record
        $.ajax({
          url: 'deleteSchool.php',
          type: 'POST',
          data: { teamRefNumber: teamRefNumber },
          success: function (response) {
            // Reload the page after successful deletion
            location.reload();
          },
          error: function (xhr, status, error) {
            // Handle the error if the deletion fails
            console.log(error);
          }
        });
      }
    }
  </script>

  <script>
    function viewSchool(teamRefNumber) {
      // Send an AJAX request to fetch the school details
      $.ajax({
        url: 'viewSchool.php',
        type: 'POST',
        data: { teamRefNumber: teamRefNumber },
        success: function (response) {
          // Parse the JSON response
          var school = JSON.parse(response);

          // Populate the modal with the school details
          $('#schoolName').text(school.team_name);
          $('#teamRefNumber').text(school.TeamRefNumber);
          $('#teamAddress').text(school.team_address);
          $('#phone').text(school.phone);
          $('#email').text(school.email);
          $('#userRefNo').text(school.userRefNo);
          $('#hshTeamRefNumber').text(school.hsh_teamRefNumber);
          $('#userPosition').text(school.user_position);
          $('#surname').text(school.surname);
          $('#firstname').text(school.firstname);
          $('#dob').text(school.dob);
          $('#gender').text(school.gender);
          $('#country').text(school.country);
          $('#state').text(school.state);
          $('#city').text(school.city);
          $('#zipcode').text(school.zipcode);
          $('#meansId').text(school.means_id);
          $('#idNumber').text(school.id_number);
          $('#address').text(school.address);
          $('#passport').attr('src', "../../schools/school_registrant_photo/" + school.passport);
          $('#teamCountry').text(school.team_country);
          $('#teamState').text(school.team_state);
          $('#teamCity').text(school.team_city);
          $('#numberOfPlayers').text(school.number_of_players);
          $('#teamAddress').text(school.team_address);
          $('#teamLogo').attr('src', "../../schools/school_logo/" + school.team_logo);
          $('#timeCreated').text(school.time_created);
          $('#dateCreated').text(school.date_created);
          $('#ipAddress').text(school.ip_address);

          // Show the modal
          $('#viewSchoolModal').modal('show');
        },
        error: function (xhr, status, error) {
          // Handle the error if the request fails
          console.log(error);
        }
      });
    }
  </script>

  <!-- Modal -->
  <div class="modal fade" id="viewSchoolModal" tabindex="-1" role="dialog" aria-labelledby="viewSchoolModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewSchoolModalLabel">View School Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 100px; vertical-align: top;"><img id="passport"
                    style="width: 100px; height: 100px; border-radius:10px 10px;" /></td>
                <td colspan="2"><strong>School Name</strong> &nbsp; <span id="schoolName"></span></td>
                <td style="width: 100px; vertical-align: top;"><img id="teamLogo"
                    style="width: 100px; height: 100px;" /></td>
              </tr>
              <tr>
                <td><strong>Team Ref No.</strong></td>
                <td id="teamRefNumber"></td>
                <!-- <td><strong>Team Address</strong></td> -->
                <td colspan="2" id="teamAddress"></td>
              </tr>


              <tr>
                <td><strong>User Ref No.</strong></td>
                <td colspan="3" id="userRefNo"></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Surname </strong> &nbsp; <span id="surname"></span></td>
                <td colspan="2"><strong>First Name </strong> &nbsp; <span id="firstname"></span></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Phone</strong> &nbsp; <span id="phone"></span></td>
                <td colspan="2"><strong>Email</strong> &nbsp; <span id="email"></span></td>

              </tr>



              <tr>
                <td><strong>User Position</strong></td>
                <td colspan="3" id="userPosition"></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Date of Birth</strong> &nbsp; <span id="dob"></span></td>
                <td colspan="2"><strong>Gender</strong> &nbsp; <span id="gender"></span></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Country</strong> &nbsp; <span id="country"></span></td>
                <td colspan="2"><strong>State</strong> &nbsp; <span id="state"></span></td>
              </tr>

              <tr>
                <td colspan="2"><strong>City</strong> &nbsp; <span id="city"></span></td>
                <td colspan="2"><strong>Zip Code</strong> &nbsp; <span id="zipcode"></span></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Means ID</strong> &nbsp; <span id="meansId"></span></td>
                <td colspan="2"><strong>ID Number</strong> &nbsp; <span id="idNumber"></span></td>
              </tr>

              <tr>
                <td><strong>Address</strong></td>
                <td colspan="3" id="address"></td>
              </tr>
              <tr>
                <td colspan="2"><strong>Team Country</strong> &nbsp; <span id="teamCountry"></span></td>
                <td colspan="2"><strong>Team State</strong> &nbsp; <span id="teamState"></span></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Team City</strong> &nbsp; <span id="teamCity"></span></td>
                <td colspan="2"><strong>Number of Players</strong> &nbsp; <span id="numberOfPlayers"></span></td>
              </tr>


              <tr>
                <td colspan="2"><strong>Time Created</strong> &nbsp; <span id="timeCreated"></span></td>
                <td colspan="2"><strong>Date Created</strong> &nbsp; <span id="dateCreated"></span></td>
              </tr>

              <tr>
                <td><strong>IP Address</strong></td>
                <td colspan="3" id="ipAddress"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>
</tr>