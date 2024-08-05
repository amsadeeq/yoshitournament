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
  <title> Yoshi Tournament - Home </title>
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


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/animate.css" />

  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- Include eye icon image for showing and hiding passwords -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    .modal-content {
      padding: 20px;
      background-color: #f8f9fa;
    }

    .carousel-item img {
      max-width: 150px;
      border-radius: 5px;
    }

    .modal-body .animated-text {
      opacity: 0;
      transition: opacity 1s ease-in-out 1s;
    }

    .modal-body h4 {
      font-weight: bold;
      color: #333;
    }

    #registerBtn {
      background-color: #007bff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
    }

    .show .animated-text {
      opacity: 1;
    }

    .justify-text {
      text-align: justify;
    }

    .countdown-timer {
      font-size: 1rem;
      font-weight: bold;
      margin-bottom: 1rem;
      animation: glow 1s ease-in-out infinite alternate;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes glow {
      from {
        text-shadow: 0 0 10px #ffd700, 0 0 20px #ffd700, 0 0 30px #ffd700, 0 0 40px #ffd700;
      }

      to {
        text-shadow: 0 0 20px #ffd700, 0 0 30px #ffd700, 0 0 40px #ffd700, 0 0 50px #ffd700;
      }
    }
  </style>

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
              <a class="nav-link active" href="index.php">Home</a>
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

  <section class="banner float-start w-100">
    <div class="container">


      <!-- banner part start  -->


      <div class="banner-part">
        <div class="css-slider-wrapper">
          <input type="radio" name="slider" class="slide-radio1" checked id="slider_1" />
          <input type="radio" name="slider" class="slide-radio2" id="slider_2" />
          <input type="radio" name="slider" class="slide-radio3" id="slider_3" />


          <!-- Slider Pagination -->
          <div class="slider-pagination">
            <label for="slider_1" class="page1">

            </label>
            <label for="slider_2" class="page2">

            </label>
            <label for="slider_3" class="page3">

            </label>



          </div>

          <!-- Slider #1 -->
          <div class="slider slide-1">

            <div class="slider-content">
              <h3> Welcome To Yoshi Tournaments </h3>
              <h2>YOSHI TOURNAMENTS
                <span class="d-block"> NOW IN ABUJA! </span>
              </h2>
              <p style="text-align: justify !important; font-size:16px;"> An epic showdown awaits you in Abuja! Yoshi
                Tournaments has been officially launched in Abuja,
                Nigeria.
                After careful Planning and consideration to provide a world-class experience along with a host of
                opportunities for players and teams</p>
              <button class="buy-now-btn" onclick="window.location.href = 'about.php';" name="button">

                Tournament
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                  </path>
                </svg> </button>
            </div>
            <div class="number-pagination">
              <span>1</span>
            </div>
          </div>

          <!-- Slider #2 -->
          <div class="slider slide-2">




            <div class="slider-content">
              <h2>Yoshi National <br>Tournament <?php echo date("Y"); ?>
                <span class="d-block"> Season Begins</span>
              </h2>
              <p> Football is not just about scoring goals; it's about winning together, losing together, and giving
                everything for the team. </p>
              <button type="button" class="buy-now-btn" name="button" data-bs-target='#registerModal'
                data-bs-toggle='modal'> Register </button>
            </div>
            <div class="number-pagination">
              <span>2</span>
            </div>
          </div>

          <!-- Slider #3 -->
          <div class="slider slide-3">


            <div class="slider-content">
              <h2> Upcoming Match <span class="d-block">For the Tournament </span></h2>
              <p> An epic showdown awaits! Join us as we cheer our teams to victory and create memories that will last a
                lifetime!</p>
              <button onclick="window.location.href = 'matches.php';" type="button" class="buy-now-btn" name="button">
                Matches
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                  </path>
                </svg> </button>
            </div>
            <div class="number-pagination">
              <span>3</span>
            </div>
          </div>



        </div>
      </div>

      <!-- silder ends -->

      <div class="next-match-banner">
        <a class="top-next-mc text-center  animate__animated animate__zoomIn">
          <h5 class="mn-mc-titel"> Next Match </h5>
          <hr class="next_match_line" />
          <h4> YAPS Tournament 2024</h4>
          <div class="d-flex align-items-center justify-content-center mt-2">

            <figure>
              <img src="images/team_3.png" class="next_match_logo" alt="cl1" />
            </figure>
            <div class="mc-details-top text-center">

              <p class="time"> 10:20am </p>
              <h5 class="date">
                21/ 09/ 2024
              </h5>
              <p class="location-mc">Abuja Stadium</p>
            </div>

            <figure>
              <img src="images/team_4.png" class="next_match_logo" alt="cl2" />
            </figure>

          </div>
        </a>

        <a class="top-mc-starts mt-4  animate__animated animate__zoomIn">
          <h5 class="mn-mc-titel text-center"> YAPS 2024 Stats </h5>
          <hr />

          <ul class="list-unstyled d-flex flex-column justify-content-center w-100">
            <li class="d-flex align-items-center justify-content-between w-100">
              <span class="ct-2"> <i class="fa fa-soccer-ball-o"></i> Goals </span>
              <span class="counter" data-target="12">12 </span>
            </li>

            <li class="d-flex align-items-center justify-content-between">
              <span class="ct-2"> <i class="fas fa-mitten"></i> Assists </span>
              <span class="counter" data-target="54">54 </span>
            </li>

            <li class="d-flex align-items-center justify-content-between">
              <span class="ct-2"> <i class="fas fa-running"></i> Team Participating</span>
              <span class="counter" data-target="200">200+ </span>
            </li>


          </ul>

        </a>

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
    <div class="latest-news-div">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="py-3"> News Update </h2>
          </div>
          <div class="col-lg-9">
            <div class="latest-news owl-carousel owl-theme mt-3 py-3">
              <!-- <a href="#" class="comon-news-links">
                <i class="far fa-dot-circle"></i> Gombe Untd 1 - 0 Defeat to Kwara Untd
              </a> -->

              <a href="#" class="comon-news-links">
                <i class="far fa-dot-circle"></i> Yoshi Abuja Private Schools coming on 14 August
              </a>

              <a href="#" class="comon-news-links">
                <i class="far fa-dot-circle"></i> Live Football Scores, Fixtures & Results
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="result-div1 mt-5">
      <div class="container">

        <div class="row gx-lg-5">
          <div class="col-lg-7 col-xl-8">
            <div class="d-flex justify-content-between align-items-center">
              <h2 class="comon-heading m-0">Matches</h2>
              <a href="matches.php" class="btn all-cm-btn  animate__animated animate__zoomIn"> All Matches <svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg> </a>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 gy-5 g-lg-4 mt-0 mt-lg-0">
              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-mc.jpg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Next Match
                      <span class="d-block"> Coming Soon! </span>
                    </h5>
                    <!-- <h5> Pantami Stadium, Gombe
                      <span class="d-block"> June 02, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_3.png" alt="cl2" />
                        <figcaption>Kano Pillars </figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_4.png" alt="cl2" />
                        <figcaption>Yobe Untd</figcaption>
                      </figure>
                    </div> -->
                  </div>
                </a>
              </div>

              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-ms2.jpeg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Next Match
                      <span class="d-block"> Coming Soon! </span>
                    </h5>
                    <!-- <h5> Abuja Central Stadium
                      <span class="d-block"> June 03, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_5.png" alt="cl2" />
                        <figcaption>Lobi Stars </figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_7.png" alt="cl2" />
                        <figcaption>Jos Untd</figcaption>
                      </figure>
                    </div> -->
                  </div>
                </a>
              </div>

              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-mc3.jpeg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Next Match
                      <span class="d-block"> Coming Soon! </span>
                    </h5>
                    <!-- <h5> Abuja Central Stadium
                      <span class="d-block"> June 03, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_5.png" alt="cl2" />
                        <figcaption>DC Unfo.</figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_2.jpg" alt="cl2" />
                        <figcaption>Italy FC.</figcaption>
                      </figure>
                    </div> -->
                  </div>
                </a>
              </div>


              <div class="col  animate__animated animate__zoomIn">
                <a href="#" class="items-matchs">
                  <figure class="m-0 bg-mc-1">
                    <img src="images/bg-mc.jpg" alt="bg-ms" />
                  </figure>
                  <div class="matches-div-home">
                    <h5> Next Match
                      <span class="d-block"> Coming Soon! </span>
                    </h5>
                    <!-- <h5> Yobe Central Stadium
                      <span class="d-block"> June 03, 2024 </span>
                    </h5>
                    <div class="d-flex align-items-center justify-content-between">

                      <figure>
                        <img src="images/team_3.png" alt="cl2" />
                        <figcaption>Kano P.</figcaption>
                      </figure>
                      <h4>VS</h4>
                      <figure>
                        <img src="images/team_5.png" alt="cl2" />
                        <figcaption>Italy FC.</figcaption>
                      </figure>
                    </div> -->
                  </div>
                </a>
              </div>

            </div>

          </div>
          <div class="col-lg-5 col-xl-4 ">
            <div class="latest-result-div mt-5 mt-lg-0">
              <div class="d-flex align-items-center justify-content-between">
                <h2 class="comon-heading m-0"> Results</h2>
                <a href="matches.php" class="btn viw-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg>
                </a>
              </div>

              <div class="ltest-divbm mt-4">
                <a href="#" class="comon-items-div">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5> Match Results
                      <span class="d-block"> Updating... </span>
                    </h5>

                    <!-- <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Gombe Utd</figcaption>
                        <img src="images/fc-1.jpg" alt="cl2" />

                      </figure>

                    </div>
                    <h5 class="m-0"> 1 - 2 </h5>
                    <div class="cm-culb">
                      <figure class="d-flex align-items-center">
                        <figcaption class="me-2">Abuja FC.</figcaption>
                        <img src="images/fc-2.jpg" alt="cl2" />

                      </figure>

                    </div> -->
                  </div>
                  <!-- <p class="text-center"> <i class="fas fa-map-marker-alt"></i> Dec 2, 2023/ Abuja Stadium</p> -->
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="home-about-part">
      <div class="container">
        <h5> Our History </h5>
        <h2 class="comon-heading m-0"> About the
          Yoshi Tournament</h2>

        <p class="col-lg-7 my-4 justify-text text-justify"> At <a href="https://www.yoshifa.com"
            class="text-decoration-none" target="_blank">Yoshi
            Football Academy</a>, Having completed projects and based on our experience in Nigeria - Yoshi Tournaments
          has been established to cater to the growing number of Amateur, Semipro and Professional players. The key aim
          of the tournaments is to provide a platform for players from all backgrounds and experience levels to
          experience competitive gameplay and gain exposure with the opportunity to level up continuously. The
          tournaments are much more than football matches - offering players and teams opportunities to network,
          collaborate and benefit from the Yoshi FA coaching methodology. </p>
        <a href="about.php" class="btn all-cm-btn animate__animated animate__zoomIn"> About More <svg
            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
            </path>
          </svg> </a>
      </div>
    </div>

    <div class="table-ag-div py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> League Table & Schedule </h2>

        <div class="row g-lg-5">
          <div class="col-lg-5">
            <div class="table-div-left mt-4">
              <h4> Batch A </h4>


              <table id="seri1" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Club</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>

                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>

                    </td>
                    <td>13</td>
                    <td>01</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-2.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>12</td>
                    <td>20</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>25</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>

                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>25</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>

                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>12</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="comon-ft-cl">
                        <figure class="d-flex align-items-center">
                          <img src="images/fc-1.jpg" alt="fbn" />
                          <figcaption>
                            Abuja FC.
                          </figcaption>
                        </figure>
                      </div>
                    </td>
                    <td>12</td>
                    <td>36</td>
                    <td>61</td>
                  </tr>




                </tbody>
                <tfoot>
                  <tr>
                    <th>Club</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                  </tr>
                </tfoot>
              </table>

            </div>
          </div>
          <div class="col-lg-7">
            <div class="table-div-left mt-4">
              <h4> Batch A </h4>


              <table id="seri2" class="display " style="width:100%">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Time</th>
                    <th>Venue</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                  <tr>
                    <td>
                      June 10, 2024
                    </td>
                    <td> Abuja FC <span>vs</span> Gombe FC</td>
                    <td>4:00pm</td>
                    <td>Murtala Mohammmed Stadium</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Time</th>
                    <th>Venue</th>
                  </tr>
                </tfoot>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team-div-1">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <h2 class="comon-heading m-0"> Players Squad </h2>
          <a href="#" class="btn all-cm-btn"> Show All <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
              </path>
            </svg> </a>
        </div>

        <div class="team-slid owl-carousel owl-theme mt-5">
          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> STRIKER</span>
              </h5>
              <span class="num"> 10 </span>
            </div>
          </a>

          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> Defender</span>
              </h5>
              <span class="num"> 32 </span>
            </div>
          </a>

          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> Forward </span>
              </h5>
              <span class="num"> 99 </span>
            </div>
          </a>

          <a href="#" class="comon-plyaers">
            <figure>
              <img src="images/Yoshi_1.png" alt="team1" />
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                  <path
                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                </svg>
              </figcaption>
            </figure>
            <div class="name d-flex align-items-center justify-content-between">
              <h5> Ahmed Gaidam
                <span class="d-block"> STRIKER</span>
              </h5>
              <span class="num"> 15 </span>
            </div>
          </a>


        </div>
      </div>
    </div>

    <div class="join-us-div">
      <div class="container">
        <div class="d-lg-flex justify-content-between">
          <h1 class="comon-heading m-0"> Become part of a Great Team </h1>
          <a href="registration.php" class="btn all-cm-btn mt-4 mt-lg-0 "> Join Us <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
            </svg> </a>
        </div>
      </div>
    </div>

    <div class="our-sponcer py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> Our Partners </h2>
        <div class="sponcer-slide owl-carousel owl-theme mt-5">
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/Sponsors.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/Sponsor_2.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/sponsor_4.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/sponsor_6.jpeg" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp animate__animated animate__zoomIn">
            <figure>
              <img src="images/sponsor_7.png" alt="sp" />
            </figure>
          </div>
        </div>
      </div>
    </div>

    <div class="newd-blogs-div py-5">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">

          <h2 class="comon-heading m-0"> News </h2>

          <a href="news.php" class="btn all-cm-btn animate__animated animate__zoomIn"> View All <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
              </path>
            </svg> </a>

        </div>


        <div class="row g-lg-5 mt-5 mt-lg-0">
          <div class="col-lg-8">
            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_8.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-4">
                <h5> Yoshi Tournament in Gombe... </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2024
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>
                <p class="mt-2"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  the printing and typesetting industry.
                </p>
                <h4 class="btn mt-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg> </h4>
              </div>
            </a>

            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_6.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-4">
                <h5> Abuja Matches was a success... </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2024
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>
                <p class="mt-2"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. the printing
                  and typesetting industry.
                </p>
                <h4 class="btn mt-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path
                      d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                  </svg> </h4>
              </div>
            </a>


          </div>

          <div class="col-lg-4 right-home-blogs">
            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_9.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-1">
                <h5 class="mt-0">Gombe FC Team is disqualified </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2024
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>

              </div>
            </a>

            <a href="#" class="left-cm-blogs">
              <figure class="m-0">
                <img src="images/Yoshi_10.jpg" alt="blogs" />
              </figure>
              <div class="blogs-ps-right ps-lg-4 pt-lg-1">
                <h5 class="mt-0"> Yobe FC is signed new contract with.... </h5>
                <ul class="list-unstyled d-flex align-items-center mt-2">
                  <li>
                    <i class="fas fa-calendar-alt"></i> 27 June, 2020
                  </li>
                  <li>
                    <i class="far fa-comment-dots"></i> 89 Comments
                  </li>
                </ul>

              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="newd-blogs-div py-5">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">

          <h2 class="comon-heading m-0"> Media Gallery </h2>

          <a href="media.php" class="btn all-cm-btn animate__animated animate__zoomIn"> View All <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
              </path>
            </svg> </a>

        </div>


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-0 mt-lg-0 g-4 g-lg-4">


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_5.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_5.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_6.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_6.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_11.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_11.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_banner_2.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_banner_2.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>



          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_2.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_2.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_7.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_7.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/yoshi_founder.png" class="gallery-div">
                <figure>
                  <img src="images/yoshi_founder.png" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="comongallery">
              <a data-fancybox="gallery" href="images/Yoshi_9.jpg" class="gallery-div">
                <figure>
                  <img src="images/Yoshi_9.jpg" alt="gallery1" />
                  <figcaption>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </figcaption>
                </figure>
              </a>
              <div class="photo-details">
                <h5>Gombe United Fc Win 2024 </h5>
                <h6> <i class="far fa-clock"></i> 1years Ago</h6>
              </div>
            </div>
          </div>


          <!-- Onload Popup Modal -->
          <!-- <div class="modal fade" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-body d-flex align-items-center">
                  <div id="carouselExampleIndicators" class="carousel slide me-3" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/front.png" class="d-block w-100" alt="Abuja Main Gate 1">
                      </div>
                      <div class="carousel-item">
                        <img src="images/0001side.png" class="d-block w-100" alt="Abuja Main Gate 2">
                      </div>
                      <div class="carousel-item">
                        <img src="images/front.png" class="d-block w-100" alt="Abuja Main Gate 3">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  <div class="animated-text">
                    <h4>Yoshi Tournament 2024 for Abuja Private Schools</h4>
                    <button class="btn btn-primary mt-3" id="registerBtn">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <div class="modal fade" tabindex="-1" role="dialog" id="onloadModal" tabindex="-1"
            aria-labelledby="onloadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

              <div class="modal-content">

                <div class="modal-body d-flex align-items-center p-0 m-0">
                  <div class="row g-0 align-items-center">
                    <div class="col-sm-6 col-xs-12">
                      <!-- Close button for small screens -->
                      <button type="button" data-bs-dismiss="modal"
                        class="btn-close position-absolute top-0 end-0 m-2 d-sm-none" aria-label="Close"></button>

                      <img src="images/yoshiStud.png" alt="Gift Poster" style="border-radius: 10px 10px;"
                        class="img-fluid" id="leftImg">

                    </div>
                    <div class="col-sm-6 col-xs-12 text-center">
                      <!-- Close button for large screens -->
                      <button type="button" data-bs-dismiss="modal" class="btn-close float-end d-none d-sm-block -mt-8"
                        aria-label="Close"></button>

                      <div class="px-4 animated-text">
                        <h2>Welcome to!</h2>
                        <br class="d-none d-sm-block" />
                        <h1>Yoshi Abuja Private Schools Tournaments 2024</h1>
                        <p class="countdown-timer my-3" id="countdown"></p>
                        <!-- <p class="my-3 text-secondary">Yoshi Abuja Private Schools Torunaments 2024</p>
                        <p class="mt-3 mb-4 text-success">Football Tournament</p> -->

                        <br class="d-none d-sm-block" /><br class="d-none d-sm-block" />

                        <a type="button" href="registration.php" class="btn mt-8 w-100 join-btn"
                          style="border-radius: 15px 15px;">Register</a>
                      </div>
                      <a data-bs-toggle='modal' -bs-target='#loginModal' type="button"
                        class="text-secondary mt-3 text-decoration-none animated-text d-none d-sm-block"
                        data-bs-dismiss='modal'><small>Read more</small></a>
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
  <script src="js/jquery.fancybox.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- Include SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




  <?php

  // Echo the JavaScript code
  echo $login_error_notify;

  // Echo the JavaScript code
  echo $error_notify;

  echo $logout_message;

  ?>

  <!-- Custom JavaScript -->
  <script>
    // Set the date we're counting down to
    var countDownDate = new Date("August 21, 2024 00:00:00").getTime();

    // Update the countdown every second
    var x = setInterval(function () {

      // Get the current date and time
      var now = new Date().getTime();

      // Calculate the distance between now and the countdown date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="countdown"
      document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

      // If the countdown is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "EXPIRED";
      }
    }, 1000);
  </script>

  <script>
    const counters = document.querySelectorAll(".counter");

    counters.forEach((counter) => {
      counter.innerText = "0";
      const updateCounter = () => {
        const target = +counter.getAttribute("data-target");
        const count = +counter.innerText;
        const increment = target / 1000;
        if (count < target) {
          counter.innerText = `${Math.ceil(count + increment)}`;
          setTimeout(updateCounter, 1);
        } else counter.innerText = target;
      };
      updateCounter();
    });
  </script>

  <script>
    $(document).ready(function () {
      $('#onloadModal').modal('show');

      $('#onloadModal').on('shown.bs.modal', function () {
        $('.animated-text').addClass('show');
      });
    });
  </script>


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




  <script>
    function login() {
      var email = document.getElementById('login-email').value;
      var password = document.getElementById('login-password').value;

      // Send login credentials to PHP file for authentication via AJAX
      $.ajax({
        url: 'authenticate.php',
        type: 'POST',
        data: {
          email: email,
          password: password
        },
        success: function (response) {
          // Check the response from the server
          if (response === 'success_manager' || response === 'success_player') {
            // Display success notification
            new Noty({
              theme: 'metroui',
              text: 'Login successful!',
              type: 'success',
              timeout: 2000 // 2 seconds
            }).show();

            // Redirect user to the appropriate dashboard
            if (response === 'success_manager') {
              window.location.href = 'dashboard.php';
            } else if (response === 'success_player') {
              window.location.href = 'player_dashboard.php';
            }
          } else if (response === 'error_not_registered') {
            // Display error notification for unregistered user
            new Noty({
              theme: 'metroui',
              text: 'User not registered. Please sign up first.',
              type: 'error',
              timeout: 3000 // 3 seconds
            }).show();
          } else if (response === 'error_wrong_credentials') {
            // Display error notification for wrong credentials
            new Noty({
              theme: 'metroui',
              text: 'Incorrect email or password. Please try again.',
              type: 'error',
              timeout: 3000 // 3 seconds
            }).show();
          }
        },
        error: function (xhr, status, error) {
          // Display error notification for AJAX request failure
          console.error('AJAX Error:', error);
          new Noty({
            theme: 'metroui',
            text: 'An error occurred. Please try again later.',
            type: 'error',
            timeout: 3000 // 3 seconds
          }).show();
        }
      });
    }
  </script>








</body>

</html>