<?php

session_start();
ob_start();

require_once '../../connection.php';
$email = $_SESSION['a_email'];

$stmt = $pdo->query("SELECT * FROM `yoshi_admins_tbl` ORDER BY id DESC, time_updated DESC");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

try {
	if (isset($_POST['addadmin'])) {

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

		$userRefCode = productCode(8); //function that generate 8 unique characters for reference number

		//function checking for malicious inputs using trim(),stripslahes(),htmlspecialchars(),htmlentities()
		function check_input($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			$data = htmlentities($data);
			return $data;
		}

		// Function to sanitize input data
		function sanitize_input($data)
		{
			return htmlspecialchars(stripslashes(trim($data)));
		}

		//function for collecting user ip address
		// function getRealIpAddr()
		// {
		// 	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		// 		//check IP from internet
		// 		$ip = $_SERVER['HTTP_CLIENT_IP'];
		// 	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		// 		//check IP is passed from proxy
		// 		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		// 	} else {
		// 		//get IP address from remote address
		// 		$ip = $_SERVER['REMOTE_ADDR'];
		// 	}
		// 	return $ip;
		// }

		// ----------------------------------------------------------------//
		//Collecting user information//

		$full_name = check_input($_POST['full_name']); //check_input is sensitising the input field
		$phone = check_input($_POST['phone']); //check_input is sensitising the input field
		$email = check_input($_POST['email']); //check_input is sensitising the input field
		$role = check_input($_POST['role']); //check_input is sensitising the input field
		$gender = check_input($_POST['gender']); //check_input is sensitising the input field
		$temp_password = check_input($_POST['temp_password']); //check_input is sensitising the input field

		$status = "pending";
		$time = time(); //function for current time
		$date_create = date("d/M/Y", $time); //function for current date
		$time_create = date("H:i:s a"); //function for current time using "strtotime" to minus 1hour
		// $ipaddress = getRealIpAddr();


		// Collecting user information
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		// Hash the password
		$hashed_password = md5($temp_password);
		// Insert data into the database
		$stmt = $pdo->prepare("INSERT INTO `yoshi_admins_tbl` (`id`, `admin_userID`, `full_name`, `admin_email`, `admin_phone`, `admin_role`, `temp_password`,`time_created`, `date_created`, `acct_status`) VALUES (NULL, :admin_userID, :full_name, :email, :phone, :role, :hashed_password, :time_create, :date_create, :status)");
		$stmt->bindParam(':admin_userID', $userRefCode);
		$stmt->bindParam(':full_name', $full_name);
		$stmt->bindParam(':email', $email); // Changed from 'admin_email' to 'email'
		$stmt->bindParam(':phone', $phone); // Changed from 'admin_phone' to 'phone'
		$stmt->bindParam(':role', $role);
		$stmt->bindParam(':hashed_password', $hashed_password);
		$stmt->bindParam(':time_create', $time_create); // Changed from 'time_created' to 'time_create'
		$stmt->bindParam(':date_create', $date_create); // Changed from 'date_created' to 'date_create'
		$stmt->bindParam(':status', $status);
		$stmt->execute();

		################################################
		$to = $email;
		// Set the email subject
		$subject = "Admin Account Created - Yoshi Tournaments";

		$message = "Dear Admin,\n\n";
		$message .= "An admin account has been created for you on Yoshi Tournaments.\n";
		$message .= "Please visit the following link to activate your account and create a new password:\n";
		$message .= "https://www.yoshitournaments.com/management/admin/index.php\n\n";
		$message .= "Your temporary password is: $temp_password\n\n";
		$message .= "Once you have activated your account and created a new password, you will be able to access the admin panel and manage the tournament.\n\n";
		$message .= "If you have any questions or need further assistance, please feel free to contact us at account@yoshitournaments.com or +2348167913802.\n\n";
		$message .= "Best Regards,\n";
		$message .= "Yoshi Tournament Team";

		// Set additional headers
		$headers = "From: no-reply@yoshitournament.com\r\n";
		$headers .= "Reply-To: support@yoshitournament.com\r\n";
		// $headers .= "CC: yoshitournaments@gmail.com\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion();
		// Send the email
		$mail_sent = mail($to, $subject, $message, $headers);
		$register_message = "Account Successfully created !";
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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
	<!-- Include SweetAlert CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">



	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="mainDashboard.php" class="site_title"><img src="../../images/logo.png"
								style="width: 40px; height: 40px;" /> <span>Yoshi Tournaments</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>John Doe</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="index.html">Dashboard</a></li>
										<li><a href="index2.html">Dashboard2</a></li>
										<li><a href="index3.html">Dashboard3</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="form.html">General Form</a></li>
										<li><a href="form_advanced.html">Advanced Components</a></li>
										<li><a href="form_validation.html">Form Validation</a></li>
										<li><a href="form_wizards.html">Form Wizard</a></li>
										<li><a href="form_upload.html">Form Upload</a></li>
										<li><a href="form_buttons.html">Form Buttons</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> UI Elements <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="general_elements.html">General Elements</a></li>
										<li><a href="media_gallery.html">Media Gallery</a></li>
										<li><a href="typography.html">Typography</a></li>
										<li><a href="icons.html">Icons</a></li>
										<li><a href="glyphicons.html">Glyphicons</a></li>
										<li><a href="widgets.html">Widgets</a></li>
										<li><a href="invoice.html">Invoice</a></li>
										<li><a href="inbox.html">Inbox</a></li>
										<li><a href="calendar.html">Calendar</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="tables.html">Tables</a></li>
										<li><a href="tables_dynamic.html">Table Dynamic</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="chartjs.html">Chart JS</a></li>
										<li><a href="chartjs2.html">Chart JS2</a></li>
										<li><a href="morisjs.html">Moris JS</a></li>
										<li><a href="echarts.html">ECharts</a></li>
										<li><a href="other_charts.html">Other Charts</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
										<li><a href="fixed_footer.html">Fixed Footer</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="menu_section">
							<h3>Live On</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-bug"></i> Additional Pages <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="e_commerce.html">E-commerce</a></li>
										<li><a href="projects.html">Projects</a></li>
										<li><a href="project_detail.html">Project Detail</a></li>
										<li><a href="contacts.html">Contacts</a></li>
										<li><a href="profile.html">Profile</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="page_403.html">403 Error</a></li>
										<li><a href="page_404.html">404 Error</a></li>
										<li><a href="page_500.html">500 Error</a></li>
										<li><a href="plain_page.html">Plain Page</a></li>
										<li><a href="login.html">Login Page</a></li>
										<li><a href="pricing_tables.html">Pricing Tables</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="#level1_1">Level One</a>
										<li><a>Level One<span class="fa fa-chevron-down"></span></a>
											<ul class="nav child_menu">
												<li class="sub_menu"><a href="level2.html">Level Two</a>
												</li>
												<li><a href="#level2_1">Level Two</a>
												</li>
												<li><a href="#level2_2">Level Two</a>
												</li>
											</ul>
										</li>
										<li><a href="#level1_2">Level One</a>
										</li>
									</ul>
								</li>
								<li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
											class="label label-success pull-right">Coming Soon</span></a></li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
									id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="images/img.jpg" alt="">John Doe
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right"
									aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="javascript:;"> Profile</a>
									<a class="dropdown-item" href="javascript:;">
										<span class="badge bg-red pull-right">50%</span>
										<span>Settings</span>
									</a>
									<a class="dropdown-item" href="javascript:;">Help</a>
									<a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i>
										Log Out</a>
								</div>
							</li>

							<li role="presentation" class="nav-item dropdown open">
								<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
									data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">6</span>
								</a>
								<ul class="dropdown-menu list-unstyled msg_list" role="menu"
									aria-labelledby="navbarDropdown1">
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<div class="text-center">
											<a class="dropdown-item">
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Add Admin</h3>
						</div>


					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Sub Admin </h2>

									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2 adminForm" method="POST" data-parsley-validate
										class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="first-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="full_name" id="first-name" required="required"
													class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="last-name">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" id="last-name" name="email" required="required"
													class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name"
												class="col-form-label col-md-3 col-sm-3 label-align">Phone
												Number</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" id="last-name" class="form-control" type="text"
													name="phone">
											</div>
										</div>
										<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="gender">
													<option value="null">Choose Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div> -->
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Admin
												Role</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="role" required="required">
													<option value="null">Choose Role</option>
													<option value="View Role">View Role</option>
													<option value="Patial Role">Patial Role</option>
													<option value="Sub Admin">Sub Admin</option>
													<option value="Admin">Admin</option>
												</select>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name"
												class="col-form-label col-md-3 col-sm-3 label-align">Temporary
												Password</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" id="last-name" class="form-control" type="text"
													name="temp_password" placeholder="simple password"
													required="required">
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" name="addadmin" class="btn btn-success">Add
													admin</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Admin Lists </h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<div class="col-md-12 col-sm-12  ">
										<div class="x_panel">
											<div class="x_content">
												<div class="table-responsive">
													<table class="table table-hover">
														<thead>
															<tr>

																<th>ID</th>
																<th>Name</th>
																<th>Email</th>
																<th>Phone</th>
																<th>Role</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody id="adminTableBody"></tbody>
														<tbody>

															<?php foreach ($admins as $admin) {
																$id = $admin['id'];
																$admin_id = $admin['admin_userID'];
																$name = $admin['full_name'];
																$email = $admin['admin_email'];
																$phone = $admin['admin_phone'];
																$role = $admin['admin_role'];
																$status = $admin['acct_status'];
																?>
																<tr>
																	<td><?php echo $id; ?></td>
																	<td><?php echo $name; ?></td>
																	<td><?php echo $email; ?></td>
																	<td><?php echo $phone; ?></td>
																	<td><?php echo $role; ?></td>
																	<td>
																		<?php if ($status == 'Updated') { ?>
																			<span
																				class="badge badge-success"><?php echo $status; ?></span>
																		<?php } elseif ($status == 'suspend') { ?>
																			<span
																				class="badge badge-danger"><?php echo $status; ?></span>
																		<?php } elseif ($status == 'pending') { ?>
																			<span
																				class="badge badge-warning"><?php echo $status; ?></span>
																		<?php } ?>
																	</td>
																	<td>
																		<div class="btn-group" role="group"
																			aria-label="Basic example">
																			<button type="button"
																				class="btn btn-sm btn-secondary"
																				data-toggle="modal"
																				data-target="#viewModal<?php echo $admin_id; ?>"
																				data-id="<?php echo $admin_id; ?>">View
																			</button>
																			<button type="button"
																				class="btn btn-sm btn-warning"
																				data-toggle="modal"
																				data-target="#suspendModal<?php echo $admin_id; ?>"
																				data-id="<?php echo $admin_id; ?>">Suspend
																			</button>
																			<button type="button"
																				class="btn btn-sm btn-danger"
																				data-toggle="modal"
																				data-target="#deleteModal<?php echo $admin_id; ?>"
																				data-id="<?php echo $admin_id; ?>">Delete
																			</button>
																		</div>
																	</td>
																</tr>

																<!-- View Modal -->
																<div class="modal fade"
																	id="viewModal<?php echo $admin_id; ?>" tabindex="-1"
																	role="dialog"
																	aria-labelledby="viewModalLabel<?php echo $admin_id; ?>"
																	aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title"
																					id="viewModalLabel<?php echo $admin_id; ?>">
																					View Admin</h5>
																				<button type="button" class="close"
																					data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<!-- Add the necessary fields to display admin details -->
																				<p>ID: <?php echo $admin_id; ?></p>
																				<p>Name: <?php echo $name; ?></p>
																				<p>Email: <?php echo $email; ?></p>
																				<p>Phone: <?php echo $phone; ?></p>
																				<p>Role: <?php echo $role; ?></p>
																				<p>Status: <?php echo $status; ?></p>
																			</div>
																			<div class="modal-footer">
																				<button type="button"
																					class="btn btn-secondary"
																					data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>

																<!-- Suspend Modal -->
																<div class="modal fade"
																	id="suspendModal<?php echo $admin_id; ?>" tabindex="-1"
																	role="dialog"
																	aria-labelledby="suspendModalLabel<?php echo $admin_id; ?>"
																	aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title"
																					id="suspendModalLabel<?php echo $admin_id; ?>">
																					Suspend Admin</h5>
																				<button type="button" class="close"
																					data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<!-- Add the necessary fields and confirmation message for suspending the admin -->
																				<p>Are you sure you want to suspend this
																					admin?
																				</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button"
																					class="btn btn-secondary"
																					data-dismiss="modal">Cancel</button>
																				<button type="button" name="suspend"
																					class="btn btn-warning"
																					onclick="suspendAdmin(<?php echo $admin_id; ?>)">Suspend
																				</button>
																			</div>
																		</div>
																	</div>
																</div>

																<script>
																	function suspendAdmin(adminId) {
																		// Send an AJAX request to update the admin's status to "suspend"
																		$.ajax({
																			url: 'suspend_admin.php',
																			method: 'POST',
																			data: { adminId: adminId },
																			success: function (response) {
																				// Handle the response from the server
																				if (response === 'success') {
																					// Reload the page or update the admin's status dynamically
																					location.reload();
																				} else {
																					alert('Failed to suspend admin. Please try again.');
																				}
																			},
																			error: function () {
																				alert('An error occurred while suspending admin. Please try again.');
																			}
																		});
																	}
																</script>

																<!-- Delete Modal -->
																<div class="modal fade"
																	id="deleteModal<?php echo $admin_id; ?>" tabindex="-1"
																	role="dialog"
																	aria-labelledby="deleteModalLabel<?php echo $admin_id; ?>"
																	aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title"
																					id="deleteModalLabel<?php echo $admin_id; ?>">
																					Delete Admin</h5>
																				<button type="button" class="close"
																					data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<!-- Add the necessary fields and confirmation message for deleting the admin -->
																				<p>Are you sure you want to delete this
																					admin?
																				</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button"
																					class="btn btn-secondary"
																					data-dismiss="modal">Cancel</button>
																				<button type="button" class="btn btn-danger"
																					onclick="deleteAdmin(<?php echo $admin_id; ?>)">Delete
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<script>
																	function deleteAdmin(adminId) {
																		// Send an AJAX request to delete the admin
																		$.ajax({
																			url: 'delete_admin.php',
																			method: 'POST',
																			data: { adminId: adminId },
																			success: function (response) {
																				// Handle the response from the server
																				if (response === 'success') {
																					// Reload the page or update the admin list dynamically
																					location.reload();
																				} else {
																					alert('Failed to delete admin. Please try again.');
																				}
																			},
																			error: function () {
																				alert('An error occurred while deleting admin. Please try again.');
																			}
																		});
																	}
																</script>
															<?php } ?>

															<?php if (empty($admins)) { ?>
																<tr>
																	<td colspan="8" class="text-center"
																		style="text-align:center;">No records found.</td>
																</tr>
															<?php } ?>

														</tbody>
													</table>
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
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- Include SweetAlert JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




	<script>
		// Function to update the admin table dynamically
		function updateAdminTable() {
			$.ajax({
				url: 'get_admins.php',
				method: 'GET',
				success: function (response) {
					// Parse the JSON response
					var admins = JSON.parse(response);

					// Clear the existing table body
					$('#adminTableBody').empty();

					// Iterate through the admins and append rows to the table
					admins.forEach(function (admin) {
						var id = admin.id;
						var admin_id = admin.admin_userID;
						var name = admin.full_name;
						var email = admin.admin_email;
						var phone = admin.admin_phone;
						var role = admin.admin_role;
						var status = admin.acct_status;

						var statusBadge = '';
						if (status === 'Updated') {
							statusBadge = '<span class="badge badge-success">' + status + '</span>';
						} else if (status === 'suspend') {
							statusBadge = '<span class="badge badge-danger">' + status + '</span>';
						} else if (status === 'pending') {
							statusBadge = '<span class="badge badge-warning">' + status + '</span>';
						}

						var row = '<tr>' +
							'<td>' + id + '</td>' +
							'<td>' + name + '</td>' +
							'<td>' + email + '</td>' +
							'<td>' + phone + '</td>' +
							'<td>' + role + '</td>' +
							'<td>' + statusBadge + '</td>' +
							'<td>' +
							'<div class="btn-group" role="group" aria-label="Basic example">' +
							'<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#viewModal' + admin_id + '" data-id="' + admin_id + '">View</button>' +
							'<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#suspendModal' + admin_id + '" data-id="' + admin_id + '">Suspend</button>' +
							'<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal' + admin_id + '" data-id="' + admin_id + '">Delete</button>' +
							'</div>' +
							'</td>' +
							'</tr>';

						$('#adminTableBody').append(row);
					});
				},
				error: function () {
					alert('An error occurred while updating the admin table. Please try again.');
				}
			});
		}

		// Call the updateAdminTable function initially
		$(document).ready(function () {
			updateAdminTable();
		});

		// Set an interval to update the admin table every 5 seconds
		setInterval(updateAdminTable, 5000);
	</script>





	<?php

	echo $welcome_notify;
	exit;

	?>

</body>

</html>