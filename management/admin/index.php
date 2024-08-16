<?php

session_start();
ob_start();

require_once '../../connection.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" class="form">
            <h1>Admin Login</h1>
            <div>
              <input type="email" class="form-control" name="a_email" placeholder="Username" required />
            </div>
            <div>
              <input type="password" class="form-control" name="a_password" placeholder="Password" required />
            </div>
            <div>
              <button type="submit" name="access" class="btn btn-danger submit"
                style="border-radius: 15px 15px;">Access</button>

              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to Admin?
                <a href="#signup" class="to_register"> Validate </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><img src="../../images/logo.png" style="width: 60px; height: 60px;" /> Yoshi Tournaments</h1>
                <p>©2024 All Rights Reserved. Yoshi Football Academy, Dubai, UAE. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form method="POST" class="'form">
            <h1>Validate Account</h1>
            <div>
              <input type="text" class="form-control" name="a_username" placeholder="Username" required />
            </div>
            <div>
              <input type="email" class="form-control" name="a_email" placeholder="Email" required />
            </div>
            <div>
              <input type="password" class="form-control" name="temporary_password" placeholder="Temporary Password"
                required />
            </div>
            <div>
              <input type="password" class="form-control" name="original_password" placeholder="Your Password"
                required />
            </div>
            <div>
              <button type="submit" name="validate" class="btn btn-danger submit"
                style="border-radius: 15px 15px;">Validate</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already an Admin ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><img src="../../images/logo.png" style="width: 60px; height: 60px;" /> Yoshi Tournaments</h1>
                <p>©2024 All Rights Reserved. Yoshi Football Academy, Dubai, UAE. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>