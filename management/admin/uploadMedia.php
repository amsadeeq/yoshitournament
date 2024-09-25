<?php

session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];

$stmt = $pdo->query("SELECT * FROM `yoshi_featured_news_tbl` ORDER BY id DESC, time_published DESC");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

try {
    if (isset($_POST['publish'])) {

        //**** function reference number to each registered coach/manager of the team ***//
        function productCode($length = 8)
        {
            // start with a blank reference number
            $userRefCode = "";

            // define possible characters - any character in this string can be
            $possible = "0123456789";

            // we refer to the length of $possible a few times, so let's grab it now
            $maxlength = strlen($possible);

            // check for length overflow and truncate if necessary
            if ($length > $maxlength) {
                $length = $maxlength;
            }

            // set up a counter for how many characters are in the pin so far
            $i = 0;

            // add random characters to $userRefCode until $length is reached
            while ($i < $length) {
                // pick a random character from the possible ones
                $char = substr($possible, mt_rand(0, $maxlength - 1), 1);

                // have we already used this character in $userRefCode?
                if (!strstr($userRefCode, $char)) {
                    // no, so it's OK to add it onto the end of whatever we've already got...
                    $userRefCode .= $char;
                    // ... and increase the counter by one
                    $i++;
                }
            }

            // done!
            return $userRefCode;
        }

        $newsRefCode = productCode(8); //function that generate 8 unique characters for reference number

        //function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
        function check_input($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            // $data = htmlentities($data);
            return $data;
        }

        // Function to sanitize input data
        function sanitize_input($data)
        {
            return htmlspecialchars(stripslashes(trim($data)));
        }


        //Collecting user information//
        $coverPhoto = check_input($_POST['coverPhoto']); //check_input is sensitising the input field
        $newsTitle = check_input($_POST['newsTitle']); //check_input is sensitising the input field
        $shortHighlight = check_input($_POST['shortHighlight']); //check_input is sensitising the input field
        $newsURL = check_input($_POST['newsURL']); //check_input is sensitising the input field
        $author = 'Admin';
        $time = time(); //function for current time
        $date_published = date("d/M/Y", $time); //function for current date
        $time_published = date("H:i:s a"); //function for current time using "strtotime" to minus 1hour


        //image upload manipulations
        $img1 = trim($_FILES['coverPhoto']['name']);
        $imgsize1 = $_FILES['coverPhoto']['size'];
        $imgloc1 = $_FILES['coverPhoto']['tmp_name'];
        $Extention1 = explode(".", $img1);
        $imgExtention1 = strtolower(end($Extention1));
        $imgname1 = (str_replace("/", "", $newsRefCode)) . "." . $imgExtention1;


        if (!empty($imgname1) && !empty($newsTitle) && !empty($shortHighlight) && !empty($newsURL) && !empty($author)) {
            if ($imgExtention1 == "jpeg" or $imgExtention1 == "png" or $imgExtention1 == "jpg") {
                if ($imgsize1 <= 9145728) {
                    move_uploaded_file($imgloc1, "featured_news_photo/" . $imgname1);


                    // Insert data into the database
                    $stmt = $pdo->prepare("INSERT INTO `yoshi_featured_news_tbl` (`id`, `newsRefCode`, `cover_picture_name`, `title`, `short_higlight`, `news_url`, `time_published`, `date_published`, `author`) VALUES (NULL, :newsRefCode, :cover_picture_name, :title, :short_higlight, :news_url, :time_published, :date_published, :author)");
                    $stmt->bindParam(':newsRefCode', $newsRefCode);
                    $stmt->bindParam(':cover_picture_name', $imgname1);
                    $stmt->bindParam(':title', $newsTitle); // Changed from 'admin_email' to 'email'
                    $stmt->bindParam(':short_higlight', $shortHighlight); // Changed from 'admin_phone' to 'phone'
                    $stmt->bindParam(':news_url', $newsURL);
                    $stmt->bindParam(':time_published', $time_published);
                    $stmt->bindParam(':date_published', $date_published); // Changed from 'date_created' to 'date_create'
                    $stmt->bindParam(':author', $author); // Changed from 'date_created' to 'date_create'
                    $stmt->execute();


                    $register_message = "Featured News Publish!";
                    //echo "<script>swal('Error!', 'Invalid email or password.', 'error');</script>";
                    // Define the notification message
                    // Generate the JavaScript code to trigger the notification
                    $welcome_notify = "
                                <script>
                                    new Noty({
                                        theme: 'metroui',
                                        text: '$register_message',
                                        type: 'success',
                                        timeout: 1000
                                        
                                    }).show();
                                </script>
                                ";

                }
            }
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Management | Yoshi Tournaments</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">



    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">


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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Media Upload </h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>multiple file uploader</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Drag multiple files to the box below for multi upload or click to select files.
                                    </p>
                                    <form enctype="multipart/form-data" action="form_upload.html" class="dropzone">
                                    </form>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->



            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Featured News</h3>
                        </div>


                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="x_panel">
                                <!-- <div class="x_title">

                                    <div class="clearfix"></div>
                                </div> -->
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <br />
                                            <form enctype="multipart/form-data" id="demo-form2 adminForm" method="POST"
                                                data-parsley-validate class="form-horizontal form-label-left">

                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="first-name">Cover Picture <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 ">
                                                        <input type="file" onchange="onFileSelected(event);"
                                                            name="coverPhoto" id="first-name" required="required"
                                                            class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="last-name">Title <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 ">
                                                        <input type="text" id="last-name" name="newsTitle"
                                                            required="required" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label for="middle-name"
                                                        class="col-form-label col-md-3 col-sm-3 label-align">Short
                                                        Highlight</label>
                                                    <div class="col-md-8 col-sm-8 ">
                                                        <textarea rows="6" name="shortHighlight" class="form-control"
                                                            id="" required="required"></textarea>
                                                    </div>
                                                </div>

                                                <div class="item form-group">
                                                    <label for="middle-name"
                                                        class="col-form-label col-md-3 col-sm-3 label-align">
                                                        News Blog URL</label>
                                                    <div class="col-md-8 col-sm-8 ">
                                                        <input class="form-control" type="url" name="newsURL" required>
                                                    </div>
                                                </div>


                                                <div class="ln_solid"></div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                                        <button class="btn btn-warning" type="reset">Cancel</button>
                                                        <button type="submit" name="publish"
                                                            class="btn btn-success">Publish</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <br />
                                            <img style="height:70%;width: 70%;" class="my-select passport_frame"
                                                id="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Published </h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div class="col-md-12 col-sm-12  ">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <div class="table-responsive">
                                                    <table id="adminTable" class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>News ID</th>
                                                                <th>Cover Photo</th>
                                                                <th>Title</th>
                                                                <th>Short Highlight</th>
                                                                <th>News URL</th>
                                                                <th>Time Pub</th>
                                                                <th>Date Pub</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Container for dynamically generated modals -->
                                                            <div id="dynamicModals"></div>
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
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Yoshi Admin - by <a href="https://yoshifa.com">Yoshi Football Academy</a>
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Dropzone.js -->
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        function fetchNews() {
            $.ajax({
                url: 'get_featured_news.php',
                method: 'GET',
                dataType: 'json',
                success: function (featured_news) {
                    // Clear the current table body
                    $('#adminTable tbody').empty();

                    // Clear any existing modals to avoid duplicates
                    $('#dynamicModals').empty();

                    if (featured_news.error) {
                        alert('Error fetching data: ' + featured_news.error);
                        return;
                    }

                    // Populate the table with new data
                    featured_news.forEach(function (news) {
                        let newsRow = `
                    <tr>
                    
                        <td>${news.newsRefCode}</td>
                        <td><img src='featured_news_photo/${news.cover_picture_name}' style='width:150px;height:120px;'></td>
                        <td>${news.title}</td>
                        <td>${news.short_higlight}</td>
                        <td>${news.news_url}</td>
                        <td>${news.time_published}</td>
                        <td>${news.date_published}</td>
                        <td>
                            ${getStatusBadge(news.author)}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-sm btn-secondary"
                                    data-toggle="modal" data-target="#viewModal${news.newsRefCode}" data-id="${news.newsRefCode}">View</button>
                                <button type="button" class="btn btn-sm btn-warning"
                                    data-toggle="modal" data-target="#suspendModal${news.newsRefCode}" data-id="${news.newsRefCode}">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-toggle="modal" data-target="#deleteModal${news.newsRefCode}" data-id="${news.newsRefCode}">Delete</button>
                            </div>
                        </td>
                    </tr>
                `;

                        // Append row to the table body
                        $('#adminTable tbody').append(newsRow);

                        // Generate and append modals for the current admin
                        let modals = generateModals(news);
                        $('#dynamicModals').append(modals);
                    });
                },
                error: function () {
                    alert('An error occurred while fetching data.');
                }
            });
        }

        // Helper function to generate status badge
        function getStatusBadge(status) {
            if (status === 'Admin') {
                return `<span class="badge badge-success">${status}</span>`;
            } else if (status === 'suspend') {
                return `<span class="badge badge-danger">${status}</span>`;
            } else if (status === 'pending') {
                return `<span class="badge badge-warning">${status}</span>`;
            } else {
                return `<span class="badge badge-secondary">${status}</span>`;
            }
        }

        // Helper function to generate modals dynamically
        function generateModals(news) {
            return `
        <!-- View Modal -->
        <div class="modal fade" id="viewModal${news.newsRefCode}" tabindex="-1" role="dialog"
            aria-labelledby="viewModalLabel${news.newsRefCode}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel${news.newsRefCode}">View Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>ID: ${news.newsRefCode}</p>
                        <p>Title: ${news.title}</p>
                        <p>Short Highlight: ${news.short_higlight}</p>
                        <p>News URL: ${news.news_url}</p>
                        <p>TIme: ${news.time_published}</p>
                        <p>Date: ${news.date_published}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suspend Modal -->
        <div class="modal fade" id="suspendModal${news.newsRefCode}" tabindex="-1" role="dialog"
            aria-labelledby="suspendModalLabel${news.newsRefCode}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="suspendModalLabel${news.newsRefCode}">Suspend Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to suspend this admin?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-warning" onclick="suspendAdmin(${news.newsRefCode})">Suspend</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal${news.newsRefCode}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel${news.newsRefCode}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel${news.newsRefCode}">Delete Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this news?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteNews(${news.newsRefCode})">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    `;
        }

        // Suspend admin function
        function suspendAdmin(adminId) {
            $.ajax({
                url: 'suspend_admin.php',
                method: 'POST',
                data: { adminId: adminId },
                success: function (response) {
                    if (response === 'success') {
                        // Reload the admin data dynamically
                        fetchNews();
                    } else {
                        alert('Failed to suspend admin. Please try again.');
                    }
                },
                error: function () {
                    alert('An error occurred while suspending admin. Please try again.');
                }
            });
        }

        // Delete admin function
        function deleteNews(newsId) {
            $.ajax({
                url: 'delete_featured_news.php',
                method: 'POST',
                data: { newsId: newsId },
                success: function (response) {
                    if (response === 'success') {
                        // Reload the admin data dynamically
                        fetchNews();

                    } else {
                        alert('Failed to delete news. Please try again.');
                    }
                },
                error: function () {
                    alert('An error occurred while deleting admin. Please try again.');
                }
            });
        }

        // Refresh the table every 5 seconds
        setInterval(fetchNews, 50000);

        // Fetch the admins when the page loads
        $(document).ready(function () {
            fetchNews();
        });


        $('#dynamicModals').on('shown.bs.modal', function (e) {
            console.log('Modal is shown:', e.target.id);
        });

        $('#dynamicModals').on('hidden.bs.modal', function (e) {
            console.log('Modal is hidden:', e.target.id);
        });


    </script>






    <?php

    echo $welcome_notify;
    exit;

    ?>

</body>

</html>