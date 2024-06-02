<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yoshi Tournament - Home </title>
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
              <a class="nav-link" href="index.php">Home</a>
            </li>



            <li class="nav-item">
              <a class="nav-link active" href="about.php">Tournament</a>
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
            <!-- <li class="nav-item">
    <a class="nav-link " href="shop.php">Shop</a>
  </li> -->

            <li class="nav-item">
              <a class="nav-link " href="contact.php">Contact</a>
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
        <h1 class="text-center"> Matches Details</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Matches Details</li>
          </ol>
        </nav>
      </div>
    </div>



    <div class="cart-sec-ban">
      <ul class="list-unstyled">
        <li>
          <a href="#" class="btn side_btn" data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal">
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

    <div class="matech-div-details-main my-5">
      <div class="mn-next-part">
        <div class="container">


          <div class="d-lg-flex align-items-start">
            <div class="col-lg-6">
              <h2 class="comon-heading m-0 "> About Match Details </h2>
              <p class="mt-3 pe-lg-3"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                a galley of type and scrambled it to make a type specimen book.</p>

              <button type="button" class="buy-now-btn" name="button"> Read More
              </button>
            </div>

            <div class="col-lg-6">
              <div class="items-matchs py-5 mt-5 mt-lg-0">
                <figure class="m-0 bg-mc-1">
                  <img src="images/bg-ms2.jpeg" alt="bg-ms">
                </figure>
                <div class="matches-div-home">

                  <div class="d-flex align-items-center justify-content-between ">

                    <figure>
                      <img src="images/team_3.png" alt="cl2" class="match-team-logo">
                      <figcaption>Kano FC </figcaption>
                    </figure>
                    <h4>VS</h4>
                    <figure>
                      <img src="images/team_4.png" alt="cl2" class="match-team-logo">
                      <figcaption>Kwara FC.</figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="datails-table mt-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="first">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">League</th>
                  <th scope="col">Season</th>
                  <th scope="col" class="last">Full Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Aug 28, 2024</td>
                  <td>19:25</td>
                  <td>Tournament 1</td>
                  <td>2024</td>
                  <td>90</td>
                </tr>
                <tr>
                  <td>Aug 28, 2024</td>
                  <td>19:25</td>
                  <td>Tournament 1</td>
                  <td>2024</td>
                  <td>90</td>
                </tr>
                <tr>
                  <td>Aug 28, 2024</td>
                  <td>19:25</td>
                  <td>Tournament 1</td>
                  <td>2024</td>
                  <td>90</td>
                </tr>

              </tbody>
            </table>
          </div>


        </div>
      </div>

      <div class="st-dtadium-part mt-5">
        <div class="container">
          <h2 class="comon-heading m-0"> Yoshi Football Academy Location </h2>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.3953026045897!2d55.37223197372947!3d25.290919527901313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d6a554bb84d%3A0x98a3a204daa7be43!2sYoshi%20Football%20Academy%20(Dubai)!5e0!3m2!1sen!2smy!4v1709824238897!5m2!1sen!2smy"
            width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>
      </div>

      <div class="both-players-div mt-5">
        <div class="container">
          <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
            <div class="col">
              <div class="tem-payers">
                <h3 class="comon-heading mt-0 mb-3"> Gombe FC </h3>

                <div class="comon-tema-n">
                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">09</span>
                      <h5 class="m-0 ms-4"> Abdu Skipper
                        <span class="d-block"> goalkeeper</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-mitten"></i> </span>
                  </div>

                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">30</span>
                      <h5 class="m-0 ms-4"> Umar Tugga
                        <span class="d-block"> Defernder</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>

                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">60</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>



                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">11</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">89</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">40</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">20</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">32</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">15</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">99</span>
                      <h5 class="m-0 ms-4"> Admas Smith
                        <span class="d-block"> forward</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">21</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Forward</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                </div>

              </div>
            </div>

            <div class="col">
              <div class="tem-payers mt-5 mt-lg-0">
                <h3 class="comon-heading mt-0 mb-3"> Abuja FC </h3>

                <div class="comon-tema-n">
                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">99</span>
                      <h5 class="m-0 ms-4"> Petter Luka
                        <span class="d-block"> goalkeeper</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-mitten"></i> </span>
                  </div>

                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">50</span>
                      <h5 class="m-0 ms-4"> Adams James
                        <span class="d-block"> Defernder</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>

                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">60</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>



                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">11</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">89</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">40</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">20</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">32</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">15</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Striker</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">99</span>
                      <h5 class="m-0 ms-4"> Admas Smith
                        <span class="d-block"> forward</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                  <div class="playssm">
                    <div class="d-flex align-items-start">
                      <span class="js-no1">21</span>
                      <h5 class="m-0 ms-4"> Musa Lawal
                        <span class="d-block"> Forward</span>
                      </h5>
                    </div>

                    <span> <i class="fas fa-futbol"></i> </span>
                  </div>


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="official-div mt-4">
      <div class="container">
        <h2 class="comon-heading mt-0 mb-3"> Official</h2>

        <div class="datails-table mt-4">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="first">Referee</th>
                <th scope="col">Assistant Referree</th>
                <th scope="col" class="last">Timekeepers</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Auwal Ishaq Yobe</td>
                <td>Elkana Gajere</td>
                <td>
                  <span class="d-block"> Mustapha Boti </span>
                  <span class="d-block"> Musa Musawa </span>
                </td>
              </tr>


            </tbody>
          </table>
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