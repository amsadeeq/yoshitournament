<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yoshi Tournament - Players Details </title>
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


</head>

<body>

  <header class="float-start w-100">

    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" alt="logo" class="yoshi_logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="matches.php">Matches</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="about.php">The Club</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="schedule.php">Schedule</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="news.php">News</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="players.php">Players</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="media.php">Media</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link " href="shop.php">Shop</a>
             </li> -->

            <li class="nav-item">
              <a class="nav-link " href="contact.php">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn join-btn" data-bs-toggle="modal" class="reAbujaer-bn" data-bs-target="#loginModal">

                Register</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn bar-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile"><i
                  class="fas fa-bars"></i></a>
            </li>

          </ul>

        </div>
      </div>
    </nav>

  </header>

  <section class="sub-main-banner float-start w-100">


    <div class="sub-banner">
      <div class="container">
        <h1 class="text-center"> Players details </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Players details </li>
          </ol>
        </nav>
      </div>
    </div>



    <div class="cart-sec-ban">
      <ul class="list-unstyled">
        <li>
          <a href="#" class="btn side_btn" data-bs-toggle="modal" class="reAbujaer-bn" data-bs-target="#loginModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person"
              viewBox="0 0 16 16">
              <path
                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="schedule.php" class="btn side_btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid"
              viewBox="0 0 16 16">
              <path
                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>

  </section>

  <section class="body-part-total float-start w-100">


    <div class="playerrs-details-div-total py-5">
      <div class="top-details-palya">
        <div class="container">
          <div class="row g-lg-5">
            <div class="col-lg-4">
              <figure>
                <img src="images/goal1.jpg" alt="gps1" />
              </figure>
            </div>
            <div class="col-lg-8">
              <div class="players-details-div">
                <h2 class="comon-heading m-0"> Abubakar Sadiq
                  <span class="d-block mt-2">
                    Goalkeeper
                  </span>
                </h2>

                <ul class="list-unstyled mt-2">
                  <li>
                    <span> Nationality :</span>
                    <span> Nigerian </span>
                  </li>
                  <li>
                    <span> DateOfBith :</span>
                    <span> 25/02/2000 </span>
                  </li>
                  <li>
                    <span> Height :</span>
                    <span> 190cm </span>
                  </li>
                  <li>
                    <span> Weight :</span>
                    <span> 90kh </span>
                  </li>
                </ul>
                <h2 class="comon-heading mt-3 mb-3"> Biography</h2>
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                  scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                  into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                  release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                  desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                <h2 class="comon-heading mt-4"> Players Performance </h2>

                <div class="perform-div mt-4">
                  <div class="comonper-m">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5> Attack </h5>
                      <span>25%</span>
                    </div>

                    <div class="progress">

                      <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="comonper-m">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5> Defence </h5>
                      <span>25%</span>
                    </div>

                    <div class="progress">

                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="comonper-m">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5> Kick </h5>
                      <span>25%</span>
                    </div>

                    <div class="progress">

                      <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>




  </section>


  <footer class="py-5 float-start w-100">

    <div class="container">
      <div class="row row-cols-1 row-cols-lg-3">
        <div class="col">
          <div class="comon-footer">
            <h5> Yoshi FA </h5>
            <p class="col-lg-10">We are a professional football Academy in UAE, founded in 2021.
              It is a long established fact.
            </p>
            <ul class="list-unstyled d-flex align-items-center mt-2">
              <li>
                <a href="#"> <i class="fab fa-facebook"></i> </a>
              </li>
              <li class="mx-2">
                <a href="#"> <i class="fab fa-twitter"></i> </a>
              </li>
              <li>
                <a href="#"><i class="fab fa-instagram"></i> </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="comon-footer">
            <h5> Resources </h5>
            <ul class="list-unstyled">
              <li>
                <a href="#"> Matches </a>
              </li>
              <li>
                <a href="#"> The Club </a>
              </li>
              <li>
                <a href="#"> Member </a>
              </li>
              <li>
                <a href="#"> News </a>
              </li>
              <li>
                <a href="#"> Players </a>
              </li>

              <li>
                <a href="#"> Media </a>
              </li>

              <!-- <li>
                       <a href="#"> Shop </a>
                      </li> -->

              <li>
                <a href="#"> Contact </a>
              </li>
            </ul>

          </div>
        </div>

        <div class="col">
          <div class="comon-footer">
            <h5>Sport update</h5>
            <p> We'll send updates straight to your Mail. Let's Do stay connected!</p>
            <div class="d-flex mt-3 align-items-center input-group mt-3">
              <input type="email" class="form-control" placeholder="Enter Email" aria-label="Enter Email"
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn scub-btn" type="button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg>
                </button>
              </div>
            </div>


          </div>
        </div>

      </div>
      <hr />
      <p class="text-center copy-t"> Copyright 2024 <span class="text-danger"><a href="yoshi.com">Yoshi Football
            Academy</a></span>, All Right Reserved</p>
    </div>
  </footer>




  <!-- login Modal -->
  <div class="modal fade login-div-modal" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">

          <div id="login-td-div" class="com-div-md">
            <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
            <h5 class="text-center mb-3"> Sign In </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="login-modal-pn">

              <div class="cm-select-login mt-3">
                <div class="country-dp">

                  <input type="email" class="form-control" placeholder="Username Or Email" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="password" class="form-control" placeholder="Password" alt="pn">
                </div>


              </div>



              <button class="btn continue-bn"> <i class="fas fa-lock"></i> SIGN IN </button>
            </div>

            <p class="text-center  mt-3">
              <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#lostpsModal" data-bs-dismiss="modal"> Lost
                Password ? </a>
            </p>


            <p class="text-center  mt-3"> Do not have an account?
              <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#registerModal" data-bs-dismiss="modal">
                Register </a>
            </p>
          </div>


        </div>

      </div>
    </div>
  </div>


  <!-- register Modal -->

  <div class="modal fade login-div-modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <div id="login-td-div" class="com-div-md">
            <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
            <h5 class="text-center mb-3"> Register </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="login-modal-pn">

              <div class="cm-select-login mt-3">
                <div class="country-dp">

                  <input type="text" class="form-control" placeholder="Full Name" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="email" class="form-control" placeholder="Email or Phone Number" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="password" class="form-control" placeholder="Create Password" alt="pn">
                </div>
                <div class="phone-div">

                  <input type="password" class="form-control" placeholder="Confirm Password" alt="pn">
                </div>

                <div class="forget2 mt-3 ml-3 d-flex justify-content-between">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1"> By clicking Register, you agree to our
                    Terms of Use
                    and
                    Cookie Policy</label>
                </div>

              </div>




              <button class="btn continue-bn"> Register </button>
            </div>

            <h6 class="text-center">
              or sign in with
            </h6>
            <ul class="list-unstyled socal-linka-div d-flex  align-content-center justify-content-center">
              <li>
                <a href="#" class="facebtn"> <i class="fab fa-facebook-f"></i> </a>
              </li>
              <li>
                <a href="#" class="twiiterbtn"> <i class="fab fa-twitter"></i> </a>
              </li>
              <li>
                <a href="#" class="googlebtn"> <i class="fab fa-google-plus-g"></i> </a>
              </li>
              <li>
                <a href="#" class="instagbtn"> <i class="fab fa-instagram"></i> </a>
              </li>
            </ul>
            <p class="text-center  mt-3"> Do not have an account?
              <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal" data-bs-dismiss="modal"> Login
              </a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- lost password -->

  <div class="modal fade login-div-modal" id="lostpsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <div id="login-td-div" class="com-div-md">
            <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
            <h5 class="text-center mb-3"> Forget Your Password? </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="login-modal-pn">
              <p> We'll email you a link to reset your password</p>
              <div class="cm-select-login mt-3">

                <div class="phone-div">

                  <input type="email" class="form-control" placeholder="Enter Your Email " alt="pn">
                </div>


              </div>



              <button class="btn continue-bn"> Send Me a password reset Link </button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>



  <!--right silde-bar-->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightmobile" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-0">
      <button type="button" class="close-menu mt-4" data-bs-dismiss="offcanvas" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill"
          viewBox="0 0 16 16">
          <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
        </svg>
      </button>
    </div>
    <div class="offcanvas-body">
      <div class="head-contact d-none d-lg-block">
        <a href="index.php" class="logo-side">
          <img src="images/logo.png" alt="logo">
        </a>
        <p class="mt-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
          the industry's
          standard dummy text ever since the 1500s, when an unknown printer
          took a galley of type and scrambled it to make a type specimen book.
        </p>
        <div class="quick-link my-4">
          <ul>
            <li> <i class="fas fa-map-marker-alt"></i> <span> 89 Mounthoolie Lane, Sutton Bassett, UK </span> </li>
            <li> <i class="fab fa-whatsapp"></i> <span> 180-205-2560 </span> </li>
            <li> <i class="fas fa-envelope"></i> <span> example@gmail.com </span> </li>
          </ul>
        </div>
        <ul class="side-media">
          <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
        </ul>
      </div>

      <div class="head-contact d-block d-lg-none">
        <a href="index.php" class="logo-side">
          <img src="images/logo.png" alt="logo">
        </a>

        <div class="mobile-menu-sec mt-3">
          <ul>
            <li class="active-m">
              <a href="matches.php"> Matches </a>
            </li>
            <li>
              <a href="about.php"> The Clubs </a>
            </li>

            <li class="active-m">
              <a href="schedule.php"> Schedule </a>
            </li>
            <li>
              <a href="news.php"> News </a>
            </li>
            <li>
              <a href="players.php"> Players </a>
            </li>
            <li>
              <a href="media.php"> Media </a>
            </li>
            <!-- <li>
              <a href="shop.php"> Shop </a>
            </li> -->
            <li>
              <a href="contact.php"> Contact </a>
            </li>
          </ul>
        </div>
        <div class="quick-link">
          <ul>
            <li> <i class="fab fa-whatsapp"></i> <span> 180-250-9625 </span> </li>
            <li> <i class="bi bi-envelope"></i> <span> example@gmail.com</span> </li>
          </ul>
        </div>
        <ul class="side-media">
          <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
          <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
        </ul>
      </div>
    </div>
  </div>



  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script>
    AOS.init({
      offset: 100,
      easing: 'ease',
      delay: 0,
      once: true,
      duration: 800,

    });

  </script>

  <script>
    $(document).ready(function () {
      var TIMEOUT = 6000;

      var interval = setInterval(handleNext, TIMEOUT);

      function handleNext() {
        var $radios = $('input[class*="slide-radio"]');
        var $activeRadio = $('input[class*="slide-radio"]:checked');

        var currentIndex = $activeRadio.index();
        var radiosLength = $radios.length;

        $radios.attr("checked", false);

        if (currentIndex >= radiosLength - 1) {
          $radios.first().attr("checked", true);
        } else {
          $activeRadio.next('input[class*="slide-radio"]').attr("checked", true);
        }
      }
    });
  </script>



</body>

</html>