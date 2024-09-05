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
                              </tr>
                              <?php
                            }
                            ?>

                          </tbody>
                        </table>
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
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse"
                          data-parent="#accordion" href="<?php echo "#collapse" . $school['TeamRefNumber']; ?>"
                          aria-expanded="true" aria-controls="<?php echo "#collapse" . $school['TeamRefNumber']; ?>">

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