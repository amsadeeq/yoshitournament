<?php
session_start();
ob_start();
$email = $_SESSION['a_email'];

require '../../connection.php';

// Prepare SQL statement to fetch user from yoshi_signup_tbl
// Perform authentication against yoshi_signup_tbl
$stmt_signup = $pdo->prepare("SELECT * FROM `yoshi_signup_tbl` WHERE reg_status = 0 ORDER BY id DESC");
$stmt_signup->execute();
$users = $stmt_signup->fetchAll(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pending | Yoshi Tournament</title>

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
                                    <h2>List of Accounts <small>(Pending) </small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="datatable-buttons"
                                                    class="table table-striped table-bordered table-condensed "
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>Email</th>
                                                            <th>Position</th>
                                                            <th>Team Reference</th>
                                                            <th>Time / Date</th>
                                                            <th>Reg Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($users as $user) {
                                                            $userRefNo = $user['userRefNo'];
                                                            $userEmail = $user['user_email'];
                                                            $userPosition = $user['user_position'];
                                                            $teamRefNumber = $user['TeamRefNumber'];
                                                            $timeCreated = $user['time_created'];
                                                            $dateCreated = $user['date_created'];
                                                            $regStatus = $user['reg_status'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $userRefNo; ?>
                                                                </td>
                                                                <td><?php echo $userEmail; ?></td>
                                                                <td><?php echo $userPosition; ?></td>
                                                                <td><?php echo $teamRefNumber; ?></td>
                                                                <td>
                                                                    <p>
                                                                        <?php echo $timeCreated; ?>
                                                                    </p>
                                                                    <p><?php echo $dateCreated; ?></p>
                                                                </td>

                                                                <td>
                                                                    <?php switch ($regStatus) {
                                                                        case 1:
                                                                            echo '<span class="badge badge-success">Complete</span>';
                                                                            break;
                                                                        default:
                                                                            echo '<span class="badge badge-warning">Pending</span>';
                                                                            break;
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group btn-group-toggle"
                                                                        data-toggle="buttons">
                                                                        <a class="btn btn-success btn-sm" href="#"
                                                                            style="color: #fff !important;"
                                                                            onclick="viewSchool('<?php echo $userRefNo; ?>')"><i
                                                                                class="fa fa-eye"></i></a>
                                                                        <a class="btn btn-warning btn-sm" href="#"
                                                                            style="color: #fff !important;"
                                                                            onclick="editSchool('<?php echo $userRefNo; ?>')"><i
                                                                                class="fa fa-pencil"></i></a>
                                                                        <a class="btn btn-danger btn-sm" href="#"
                                                                            style="color: #fff !important;"
                                                                            onclick="deleteSchool('<?php echo $userRefNo; ?>')"><i
                                                                                class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
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

                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Yoshi Tournaments - Powered by <a href="https://yoshifa.com">Yoshi Football Academy Dubai</a>
                </div>
                <div class="clearfix"></div>
            </footer>
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