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
													<table id="adminTable" class="table table-hover">
														<thead>
															<tr>


																<th>Name</th>
																<th>Email</th>
																<th>Phone</th>
																<th>Role</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>

														<tbody>



															<!-- Container for dynamically generated modals -->
															<div id="dynamicModals"></div>



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
		function fetchAdmins() {
			$.ajax({
				url: 'get_admins.php',
				method: 'GET',
				dataType: 'json',
				success: function (admins) {
					// Clear the current table body
					$('#adminTable tbody').empty();

					// Clear any existing modals to avoid duplicates
					$('#dynamicModals').empty();

					if (admins.error) {
						alert('Error fetching data: ' + admins.error);
						return;
					}

					// Populate the table with new data
					admins.forEach(function (admin) {
						let adminRow = `
					<tr>
						
						<td>${admin.full_name}</td>
						<td>${admin.admin_email}</td>
						<td>${admin.admin_phone}</td>
						<td>${admin.admin_role}</td>
						<td>
							${getStatusBadge(admin.acct_status)}
						</td>
						<td>
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-sm btn-secondary"
									data-toggle="modal" data-target="#viewModal${admin.admin_userID}" data-id="${admin.admin_userID}">View</button>
								<button type="button" class="btn btn-sm btn-warning"
									data-toggle="modal" data-target="#suspendModal${admin.admin_userID}" data-id="${admin.admin_userID}">Suspend</button>
								<button type="button" class="btn btn-sm btn-danger"
									data-toggle="modal" data-target="#deleteModal${admin.admin_userID}" data-id="${admin.admin_userID}">Delete</button>
							</div>
						</td>
					</tr>
				`;

						// Append row to the table body
						$('#adminTable tbody').append(adminRow);

						// Generate and append modals for the current admin
						let modals = generateModals(admin);
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
			if (status === 'Updated') {
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
		function generateModals(admin) {
			return `
		<!-- View Modal -->
		<div class="modal fade" id="viewModal${admin.admin_userID}" tabindex="-1" role="dialog"
			aria-labelledby="viewModalLabel${admin.admin_userID}" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="viewModalLabel${admin.admin_userID}">View Admin</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>ID: ${admin.admin_userID}</p>
						<p>Name: ${admin.full_name}</p>
						<p>Email: ${admin.admin_email}</p>
						<p>Phone: ${admin.admin_phone}</p>
						<p>Role: ${admin.admin_role}</p>
						<p>Status: ${admin.acct_status}</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Suspend Modal -->
		<div class="modal fade" id="suspendModal${admin.admin_userID}" tabindex="-1" role="dialog"
			aria-labelledby="suspendModalLabel${admin.admin_userID}" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="suspendModalLabel${admin.admin_userID}">Suspend Admin</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to suspend this admin?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-warning" onclick="suspendAdmin(${admin.admin_userID})">Suspend</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Delete Modal -->
		<div class="modal fade" id="deleteModal${admin.admin_userID}" tabindex="-1" role="dialog"
			aria-labelledby="deleteModalLabel${admin.admin_userID}" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteModalLabel${admin.admin_userID}">Delete Admin</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this admin?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-danger" onclick="deleteAdmin(${admin.admin_userID})">Delete</button>
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
						fetchAdmins();
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
		function deleteAdmin(adminId) {
			$.ajax({
				url: 'delete_admin.php',
				method: 'POST',
				data: { adminId: adminId },
				success: function (response) {
					if (response === 'success') {
						// Reload the admin data dynamically
						fetchAdmins();
					} else {
						alert('Failed to delete admin. Please try again.');
					}
				},
				error: function () {
					alert('An error occurred while deleting admin. Please try again.');
				}
			});
		}

		// Refresh the table every 5 seconds
		setInterval(fetchAdmins, 50000);

		// Fetch the admins when the page loads
		$(document).ready(function () {
			fetchAdmins();
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