<?php

session_start();
ob_start();

require '../../connection.php';

$stmt_students = $pdo->prepare("SELECT * FROM `yoshi_school_students_tbl` ORDER BY id DESC ");
$stmt_students->execute();
$students_array = $stmt_students->fetchAll(PDO::FETCH_ASSOC);

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

  <title>YAPS Students List | Yoshi Tournaments</title>

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
                        <table id="datatable-buttons" class="table table-striped table-bordered table-condensed "
                          style="width:100%">
                          <thead>
                            <tr>
                              <th>S/No</th>
                              <th>School Logo</th>
                              <th>School Name</th>
                              <th>Team Ref No.</th>
                              <th>Student Photo</th>
                              <th>Student Name</th>
                              <th>Category</th>
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sn = 0;
                            foreach ($students_array as $student) {
                              $sn = $sn + 1;
                              $userRefNo = $student['userRefNo'];
                              $userEmail = $student['user_email'];
                              $userPosition = $student['user_position'];
                              $teamRefNumber = $student['TeamRefNumber'];
                              $timeCreated = $student['time_created'];
                              $dateCreated = $student['date_created'];
                              $regStatus = $student['reg_status'];
                              ?>
                              <tr>
                                <td><?php echo $sn; ?></td>
                                <td>
                                  <img src="<?php echo "../../schools/school_logo/" . $student['team_logo']; ?>"
                                    style="width: 40px; height:40px;" />
                                </td>
                                <td><?php echo $student['team_name']; ?></td>
                                <td><?php echo $student['TeamRefNumber']; ?></td>
                                <td>
                                  <img src="<?php echo "../../schools/student_photo/" . $student['passport']; ?>"
                                    style="width: 40px; height:40px;" />
                                </td>
                                <td><?php echo $student['surname'] . " " . $student['firstname']; ?></td>
                                <td><?php echo $student['category']; ?></td>

                                <td><?php echo $student['email']; ?></td>
                                <td>
                                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <a class="btn btn-success btn-sm" href="#" style="color: #fff !important;"
                                      onclick="viewStudent('<?php echo $userRefNo; ?>')"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="#" style="color: #fff !important;"
                                      onclick="editStudent('<?php echo $userRefNo; ?>')"><i class="fa fa-pencil"></i></a>
                                    <!-- <a class="btn btn-danger btn-sm" href="#" style="color: #fff !important;"
                                      onclick="viewStudent('<?php echo $userRefNo; ?>')"><i
                                        class="fa fa-trash"></i></a> -->
                                  </div>


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
    function deleteStudent(userRefNo) {
      // Confirm with the user before deleting the record
      if (confirm("Are you sure you want to delete this school?")) {
        // Send an AJAX request to delete the record
        $.ajax({
          url: 'deleteStudent.php',
          type: 'POST',
          data: { userRefNo: userRefNo },
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
    function viewStudent(userRefNo) {
      // Send an AJAX request to fetch the school details
      $.ajax({
        url: 'viewStudent.php',
        type: 'POST',
        data: { userRefNo: userRefNo },
        success: function (response) {
          // Parse the JSON response
          var student = JSON.parse(response);

          // Populate the modal with the student details
          $('#schoolName').text(student.team_name);
          $('#teamRefNumber').text(student.TeamRefNumber);
          $('#teamAddress').text(student.team_address);
          $('#phone').text(student.phone);
          $('#email').text(student.email);
          $('#userRefNo').text(student.userRefNo);
          $('#hshTeamRefNumber').text(student.hsh_teamRefNumber);
          $('#userPosition').text(student.user_position);
          $('#surname').text(student.surname);
          $('#firstname').text(student.firstname);
          $('#dob').text(student.dob);
          $('#gender').text(student.gender);
          $('#hieght').text(student.hieght); // New field for height
          $('#weight').text(student.weight); // New field for weight
          $('#country').text(student.country);
          $('#state').text(student.state);
          $('#city').text(student.city);
          $('#zipcode').text(student.zipcode);
          $('#meansId').text(student.means_id);
          $('#idNumber').text(student.id_number);
          $('#address').text(student.address);
          $('#studentIdPhoto').attr('src', "../../schools/student_id/" + student.student_id_photo); // New field for student ID photo
          $('#teamName').text(student.team_name);
          $('#category').text(student.category); // New field for category
          $('#playerPosition').text(student.player_position); // New field for player position
          $('#jersyNumber').text(student.jersy_number); // New field for jersey number
          $('#teamCountry').text(student.team_country);
          $('#teamState').text(student.team_state);
          $('#teamCity').text(student.team_city);
          $('#numberOfPlayers').text(student.number_of_players);
          $('#teamAddress').text(student.team_address);
          $('#passport').attr('src', "../../schools/student_photo/" + student.passport);
          $('#teamLogo').attr('src', "../../schools/school_logo/" + student.team_logo);

          $('#emergencyName').text(student.emergency_name); // New field for emergency contact name
          $('#emergencyPhone').text(student.emergency_phone); // New field for emergency contact phone
          $('#emergencyEmail').text(student.emergency_email); // New field for emergency contact email
          $('#emergencyAddress').text(student.emergency_address); // New field for emergency contact address

          $('#timeCreated').text(student.time_created);
          $('#dateCreated').text(student.date_created);
          $('#ipAddress').text(student.ip_address);

          $('#attendance').text(student.attendance); // New field for attendance
          $('#attendanceTime').text(student.attendance_time); // New field for attendance time
          $('#attendanceDate').text(student.attendance_date); // New field for attendance date


          // Show the modal
          $('#viewStudentModal').modal('show');
        },
        error: function (xhr, status, error) {
          // Handle the error if the request fails
          console.log(error);
        }
      });
    }
  </script>

  <!-- Modal -->
  <div class="modal fade" id="viewStudentModal" tabindex="-1" role="dialog" aria-labelledby="viewSchoolModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewSchoolModalLabel">View Student Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 150px; vertical-align: top;"><img id="passport"
                    style="width: 150px; height: 150px; border-radius:10px 10px;" /></td>
                <td colspan="2">
                  <strong>School Name</strong> &nbsp; <span id="schoolName"></span><br />
                  <strong>School Address</strong> &nbsp; <span id="teamAddress"></span>
                </td>
                <td style="width: 150px; vertical-align: top;"><img id="teamLogo"
                    style="width: 150px; height: 150px;" /></td>
              </tr>
              <tr>

                <!-- <td><strong>Team Address</strong></td> -->
                <!-- <td colspan="2" id="teamAddress"></td> -->
                <td><strong>User Ref No.</strong></td>
                <td id="userRefNo"></td>
                <td><strong>Team Ref No.</strong></td>
                <td id="teamRefNumber"></td>
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
                <td colspan="4">
                  <h4>Student ID</h4>
                </td>
              </tr>

              <tr>
                <td style="width: 100px; vertical-align: top;"><img id="studentIdPhoto"
                    style="width: 100px; height: 100px; border-radius:10px 10px;" /></td>
              </tr>

              <tr>
                <td colspan="4">
                  <h4>Emergency Details</h4>
                </td>
              </tr>

              <tr>
                <td colspan="2"><strong>Emergency Name</strong> &nbsp; <span id="emergencyName"></span></td>
                <td colspan="2"><strong>Emergency Phone</strong> &nbsp; <span id="emergencyPhone"></span></td>
              </tr>

              <tr>
                <td colspan="2"><strong>Emergency Email</strong> &nbsp; <span id="emergencyEmail"></span></td>
                <td colspan="2"><strong>Emergency Address</strong> &nbsp; <span id="emergencyAddress"></span></td>
              </tr>

              <tr>
                <td colspan="4">
                  <h4>Attendance</h4>
                </td>
              </tr>

              <tr>
                <td><strong>Attendance</strong> &nbsp; <span id="attendance"></span></td>
                <td><strong>Attendance Time</strong> &nbsp; <span id="attendanceTime"></span></td>
                <td><strong>Attendance Date</strong> &nbsp; <span id="attendanceDate"></span></td>
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


  <script>
    function editStudent(userRefNo) {
      // Send an AJAX request to fetch the student details
      $.ajax({
        url: 'editStudent.php',
        type: 'POST',
        data: { userRefNo: userRefNo },
        success: function (response) {
          // Parse the JSON response
          var student = JSON.parse(response);

          // Populate the form fields with the student details
          $('#editUserPosition').val(student.user_position);
          $('#editTeamRefNumber').val(student.TeamRefNumber);
          $('#editSurname').val(student.surname);
          $('#editFirstname').val(student.firstname);
          $('#editDob').val(student.dob);
          $('#editGender').val(student.gender);
          $('#editCountry').val(student.country);
          $('#editState').val(student.state);
          $('#editCity').val(student.city);
          $('#editZipcode').val(student.zipcode);
          $('#editPhone').val(student.phone);
          $('#editEmail').val(student.email);
          $('#editMeansId').val(student.means_id);
          $('#editIdNumber').val(student.id_number);
          $('#editAddress').val(student.address);

          $('#editTeamName').val(student.team_name);
          $('#editCategory').val(student.category); // New field for category
          $('#editPlayerPosition').val(student.player_position); // New field for player position
          $('#editJersyNumber').val(student.jersy_number); // New field for jersey number
          $('#editTeamCountry').val(student.team_country);
          $('#editTeamState').val(student.team_state);
          $('#editTeamCity').val(student.team_city);
          $('#editNumberOfPlayers').val(student.number_of_players);
          $('#editTeamAddress').val(student.team_address);

          $('#editEmergencyName').val(student.emergency_name); // New field for emergency contact name
          $('#editEmergencyPhone').val(student.emergency_phone); // New field for emergency contact phone
          $('#editEmergencyEmail').val(student.emergency_email); // New field for emergency contact email
          $('#editEmergencyAddress').val(student.emergency_address); // New field for emergency contact address

          $('#editTimeCreated').val(student.time_created);
          $('#editDateCreated').val(student.date_created);
          $('#editIpAddress').val(student.ip_address);

          $('#editAttendance').val(student.attendance); // New field for attendance
          $('#editAttendanceTime').val(student.attendance_time); // New field for attendance time
          $('#editAttendanceDate').val(student.attendance_date); // New field for attendance date


          // Show the edit modal
          $('#editStudentModal').modal('show');
        },
        error: function (xhr, status, error) {
          // Handle the error if the request fails
          //console.log(error);
        }
      });
    }

    function updateSchool() {
      // Get the form data
      var formData = new FormData($('#editStudentForm')[0]);

      // Log the form data to check
      // for (var pair of formData.entries()) {
      //   console.log(pair[0] + ', ' + pair[1]);
      // }

      // Send an AJAX request to update the school details
      $.ajax({
        url: 'updateSchool.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          //console.log(response);  // Log the server response to see what's coming back
          var jsonResponse = JSON.parse(response);
          if (jsonResponse.status === 'success') {
            alert('Record updated successfully');
            location.reload();
          } else {
            // alert('Update failed: ' + jsonResponse.message);
            alert('Update failed, Try some time');
          }
        },

        error: function (xhr, status, error) {
          // Handle the error if the update fails
          //console.log(xhr.responseText);
          //console.log(status);
          //console.log(error);
        }
      });
    }

  </script>

  <!-- Edit Modal -->
  <div class="modal fade" id="editSchoolModal" tabindex="-1" role="dialog" aria-labelledby="editSchoolModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSchoolModalLabel">Edit School Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="editStudentForm">
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" name="editTeamRefNumber" id="editTeamRefNumber" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editUserPosition">User Position</label>
                <!-- <input type="text" class="form-control" id="editUserPosition" name="editUserPosition"> -->
                <select class="form-select form-control" id="editUserPosition" name="editUserPosition" required>
                  <option value="Coach">Coach</option>
                  <option value="Sport Director"> Sport Director</option>
                  <option value="Game Master"> Game Master</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="editSurname">Surname</label>
                <input type="text" class="form-control" id="editSurname" name="editSurname">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editFirstname">First Name</label>
                <input type="text" class="form-control" id="editFirstname" name="editFirstname">
              </div>
              <div class="form-group col-md-6">
                <label for="editDob">Date of Birth</label>
                <input type="date" class="form-control" id="editDob" name="editDob">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editGender">Gender</label>
                <select class="form-control" id="editGender" name="editGender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="editCountry">Country</label>
                <input type="text" class="form-control" id="editCountry" name="editCountry">

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editState">State</label>
                <input type="text" class="form-control" id="editState" name="editState">
              </div>
              <div class="form-group col-md-6">
                <label for="editCity">City</label>
                <input type="text" class="form-control" id="editCity" name="editCity">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editZipcode">Zip Code</label>
                <input type="text" class="form-control" id="editZipcode" name="editZipcode">
              </div>
              <div class="form-group col-md-6">
                <label for="editPhone">Phone</label>
                <input type="text" class="form-control" id="editPhone" name="editPhone">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editEmail">Email</label>
                <input type="email" class="form-control" id="editEmail" name="editEmail">
              </div>
              <div class="form-group col-md-6">
                <label for="editMeansId">Means ID</label>
                <!-- <input type="text" class="form-control" id="editMeansId" name="editMeansId"> -->
                <select class="form-select form-control" id="editMeansId" name="editMeansId" name="means_id">
                  <option value="National Identification Number">National Identification Number(NIN)
                  </option>
                  <option value="Drivers License">Driver's License</option>
                  <option value="International Passport">International Passport</option>
                  <option value="Office ID">Office ID</option>
                  <option value="Voters Card">Voter's Card</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editIdNumber">ID Number</label>
                <input type="text" class="form-control" id="editIdNumber" name="editIdNumber">
              </div>
              <div class="form-group col-md-6">
                <label for="editAddress">Address</label>
                <textarea class="form-control" id="editAddress" name="editAddress"></textarea>
              </div>
            </div>
            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="editTeamName">Team Name</label>
                <input type="text" class="form-control" id="editTeamName" name="editTeamName">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editTeamCountry">Team Country</label>
                <input type="text" class="form-control" id="editTeamCountry" name="editTeamCountry">
              </div>
              <div class="form-group col-md-6">
                <label for="editTeamState">Team State</label>
                <input type="text" class="form-control" id="editTeamState" name="editTeamState">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editTeamCity">Team City</label>
                <input type="text" class="form-control" id="editTeamCity" name="editTeamCity">
              </div>
              <div class="form-group col-md-6">
                <label for="editNumberOfPlayers">Number of Players</label>
                <input type="number" class="form-control" id="editNumberOfPlayers" name="editNumberOfPlayers">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editTeamAddress">Team Address</label>
                <textarea class="form-control" id="editTeamAddress" name="editTeamAddress"></textarea>
              </div>


            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editTimeCreated">Time Created</label>
                <input type="text" class="form-control" id="editTimeCreated" name="editTimeCreated" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="editDateCreated">Date Created</label>
                <input type="text" class="form-control" id="editDateCreated" name="editDateCreated" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editIpAddress">IP Address</label>
                <input type="text" class="form-control" id="editIpAddress" name="editIpAddress" readonly>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="updateSchool()">Save Changes</button>
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