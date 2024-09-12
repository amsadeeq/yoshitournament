<?php
session_start();
ob_start();

require 'connection.php';

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Check if the email and token exist in the database
    $stmt = $pdo->prepare("SELECT * FROM yoshi_signup_tbl WHERE email = :email AND reset_code = :token");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (isset($_POST['reset_password_button'])) {

            // Function checking for malicious inputs using trim(), stripslashes(), htmlspecialchars(), htmlentities()
            function check_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = htmlentities($data);
                return $data;
            }

            $newPassword = check_input($_POST['new_password']);
            $confirmPassword = check_input($_POST['confirm_password']);

            // Validate the new password
            // ...

            if ($newPassword === $confirmPassword) {
                // Update the password in the database
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET user_password = :password WHERE user_email = :email");
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                // Delete the reset token from the database
                $stmt = $pdo->prepare("UPDATE yoshi_signup_tbl SET reset_code = NULL WHERE user_email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                // Display a success message
                $successMessage = "Password reset successful!";
            } else {
                // Display an error message
                $errorMessage = "Passwords do not match!";
            }
        }
    } else {
        // Display an error message
        $errorMessage = "Invalid email or token!";
    }
} else {
    // Display an error message
    $errorMessage = "Invalid request!";
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New password - Yoshi Tournament</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800&family=Cormorant:wght@500&family=Josefin+Sans:wght@400;500;600&family=Merriweather:wght@300;400;700;900&family=Nunito:wght@300;400;500;600&family=Open+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&family=Saira+Condensed:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
</head>

<body>
    <header class="float-start w-100">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="logo" class="yoshi_logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRightmobile">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Add your navigation links here -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="sub-main-banner float-start w-100">
        <div class="sub-banner">
            <div class="container">
                <h1 class="text-center">Reset Password</h1>
            </div>
        </div>
    </section>

    <section class="body-part-total float-start w-100">
        <div class="checkout-page-main-div booking-page-main my-5">
            <div class="container">
                <div class="form-wizard">
                    <form action="" method="post" role="form">
                        <div class="form-wizard-header">
                            <ul class="list-unstyled form-wizard-steps clearfix d-none">
                                <li class="active">
                                    <small class="d-block mb-3">Checkout</small>
                                    <span>1</span>
                                </li>
                                <li>
                                    <small class="d-block mb-3">Finished</small>
                                    <span>4</span>
                                </li>
                            </ul>
                        </div>
                        <fieldset class="wizard-fieldset show">
                            <div class="modal-body">
                                <?php if (isset($successMessage)): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $successMessage; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($errorMessage)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!$successMessage && !$errorMessage): ?>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                                    <div class="mb-3">
                                        <input type="password" name="new_password" class="form-control"
                                            placeholder="Enter new password" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="confirm_password" class="form-control"
                                            placeholder="Confirm new password" required>
                                    </div>
                                    <button type="submit" name="reset_password_button" class="btn btn-primary">Reset
                                        Password</button>
                                <?php endif; ?>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script>
        AOS.init({
            offset: 100,
            easing: 'ease',
            delay: 0,
            once: true,
            duration: 800,
        });
    </script>
</body>

</html>