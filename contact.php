<?php


//####### Importing database connections and EngineFile

require 'auth.php';





?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact - Yoshi Tournament </title>
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
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightmobile">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="tournaments.php">Tournament</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="matches.php">Events</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="registration.php">Registration</a>
            </li>

            <!-- <li class="nav-item">
          <a class="nav-link " href="schedule.php">Schedule</a>
        </li> -->

            <li class="nav-item">
              <a class="nav-link " href="news.php">News</a>
            </li>

            <!-- <li class="nav-item">
          <a class="nav-link " href="players.php">Players</a>
        </li> -->

            <li class="nav-item">
              <a class="nav-link " href="media.php">Media</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="about.php">About us</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link " href="shop.php">Shop</a>
          </li> -->

            <li class="nav-item">
              <a class="nav-link active" href="contact.php">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn join-btn animate__animated animate__zoomIn" data-bs-toggle="modal"
                class="regster-bn" data-bs-target="#loginModal">

                Sign Up</a>
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
        <h1 class="text-center"> Contact</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
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


    <div class="contact-us-page my-5">
      <div class="top-contact-div">
        <div class="container">
          <div class="row row-cols-1 row-cols-lg-3 gy-5 g-lg-5">
            <div class="col">
              <div class="comon-div-cont">
                <h5> Tournament enquiries </h5>
                <ul class="list-unstyled mt-4">
                  <li>
                    <span class="icm"> <i class="fas fa-phone-alt"></i> </span>
                    <span> +234 8167913802</span>
                  </li>
                  <li>
                    <span class="icm"> <i class="fas fa-envelope"></i> </span>
                    <span> abmusadeeq@gmail.com</span>
                  </li>
                  <li>
                    <span class="icm"> <i class="fas fa-map-marker-alt"></i> </span>
                    <span> 508 Flat A3 Nuri, Johor, Malaysia </span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col">
              <div class="comon-div-cont">
                <h5> Media enquiries </h5>
                <ul class="list-unstyled mt-4">
                  <li>
                    <span class="icm"> <i class="fas fa-phone-alt"></i> </span>
                    <span> +234 817 516 0704</span>
                  </li>
                  <li>
                    <span class="icm"> <i class="fas fa-envelope"></i> </span>
                    <span> halilumuaz@gmail.com</span>
                  </li>
                  <li>
                    <span class="icm"> <i class="fas fa-map-marker-alt"></i> </span>
                    <span> No 45 Ivy Apartment, Abuja, Nigeria </span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col">
              <div class="comon-div-cont">
                <h5> Head Office </h5>
                <ul class="list-unstyled mt-4">
                  <li>
                    <span class="icm"> <i class="fas fa-phone-alt"></i> </span>
                    <span> +971525171104 </span>
                  </li>
                  <li>
                    <span class="icm"> <i class="fas fa-envelope"></i> </span>
                    <span> infor@yoshi.com</span>
                  </li>
                  <li>
                    <span class="icm"> <i class="fas fa-map-marker-alt"></i> </span>
                    <span>
                      MSB Al Nahda 2, United Arab Emirates </span>
                  </li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="blog-page comon-services-pge mt-5">

        <div class="container">

          <div class="row g-lg-5">

            <div class="col-md-7">
              <div class="conatct-form-div mb-5">

                <h2 class="comon-heading m-0"> Leave Us for Your Info </h2>
                <form method="PSOT">
                  <div class="row mt-4">
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Phone" required>
                    </div>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="col-lg-12">
                      <textarea class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <div class="col-lg-12">
                      <input type="submit" class="btn subimt-message" value="Submit">
                    </div>
                  </div>
                </form>

              </div>
            </div>

            <div class="col-md-5 cm-text-n">

              <h2 class="comon-heading m-0"> Locantion </h2>

              <div class="map-div1 mt-4">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.3953026045897!2d55.37223197372947!3d25.290919527901313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d6a554bb84d%3A0x98a3a204daa7be43!2sYoshi%20Football%20Academy%20(Dubai)!5e0!3m2!1sen!2smy!4v1709824238897!5m2!1sen!2smy"
                  width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>

              </div>

            </div>
          </div>

        </div>

      </div>
    </div>


  </section>


  <?php include 'footer.php'; ?>


  <!-- login Modal -->
  <?php include 'loginModal.php'; ?>

  <!-- register Modal -->

  <?php include 'registerModal.php'; ?>

  <!-- lost password -->

  <?php include 'lostPassword.php'; ?>

  <!--right silde-bar-->
  <?php include 'sidebar.php'; ?>



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
              <a href="about.php"> The Club </a>
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
            <li>
              <a href="shop.php"> Shop </a>
            </li>
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