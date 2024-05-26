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
  <link rel="preconnect" href="https://fonts.Abujaatic.com" crossorigin>
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
              <a class="nav-link " href="about.php">Tournament</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="matches.php">Events</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="schedule.php">Schedule</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="news.php">News</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="players.php">Players</a>
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
        <h1 class="text-center"> Tournament Schedule </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Schedule </li>
          </ol>
        </nav>
      </div>
    </div>




  </section>

  <section class="body-part-total float-start w-100">

    <div class="schedule-main-div my-5">

      <div class="container">
        <div class="table-div-left mt-4">


          <table id="seri3" class="display" style="width:100%">
            <thead>
              <tr>
                <th class="first">Date</th>
                <th>Event</th>
                <th>Time</th>
                <th>League</th>
                <th> Season </th>
                <th>Venue</th>
                <th class="last">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Nov 10, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>
                <td>12:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>


              <tr>
                <td>
                  Nov 15, 2024
                </td>

                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>


              <tr>
                <td>
                  Nov 05, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>



              <tr>
                <td>
                  Nov 12, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>24:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>


              <tr>
                <td>
                  Nov 18, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>Ro Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>


              <tr>
                <td>
                  Nov 16, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>


              <tr>
                <td>
                  Dec 01, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a data-bs-toggle="modal" data-bs-target="#bookModal" class="btn details-btn"> buy ticket <svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>

              <tr>
                <td>
                  Dec 01, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a data-bs-toggle="modal" data-bs-target="#bookModal" class="btn details-btn"> buy ticket <svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>
              <tr>
                <td>
                  Dec 01, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a data-bs-toggle="modal" data-bs-target="#bookModal" class="btn details-btn"> buy ticket <svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>

              <tr>
                <td>
                  Dec 05, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a data-bs-toggle="modal" data-bs-target="#bookModal" class="btn details-btn"> buy ticket <svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>

              <tr>
                <td>
                  Nov 28, 2024
                </td>
                <td>

                  <a href="matches-details.php" class="btn ms-ti">
                    <img src="images/team_3.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                    <span>&nbsp;&nbsp; VS &nbsp; &nbsp; </span>
                    <img src="images/team_5.png" alt="ft" class="schedule-team-logo" />
                    <span>
                      Abuja FC
                    </span>
                  </a>

                </td>

                <td>19:00</td>
                <td>FC Cup</td>
                <td>2024</td>
                <td>Abuja Stadium</td>
                <td>
                  <a href="booking.php" class="btn details-btn"> buy ticket <svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                      viewBox="0 0 16 16">
                      <path
                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z">
                      </path>
                    </svg> </a>
                </td>
              </tr>




            </tbody>
            <tfoot>
              <tr>
                <th>Date</th>
                <th>Event</th>
                <th>Time</th>
                <th>League</th>
                <th> Season </th>
                <th>Venue</th>
                <th>Action</th>
              </tr>
            </tfoot>
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