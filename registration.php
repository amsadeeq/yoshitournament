<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yoshi Tournament - Registration </title>
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

    <style>
        .card {
            transition: transform .2s, box-shadow .2s, opacity 0.5s, transform 0.5s;
            opacity: 0;
            transform: translateY(20px);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .animate-onload {
            animation: fadeInUp 1s ease-in-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card:hover .hover-overlay {
            opacity: 1;
        }

        .hover-overlay .card-title,
        .hover-overlay .card-text,
        .hover-overlay .btn {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s, transform 0.5s;
        }

        .card:hover .hover-overlay .card-title,
        .card:hover .hover-overlay .card-text,
        .card:hover .hover-overlay .btn {
            opacity: 1;
            transform: translateY(0);
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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRightmobile">
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
                            <a class="nav-link active" href="registration.php">Registration</a>
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
                            <a class="nav-link btn bar-btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRightmobile"><i class="fas fa-bars"></i></a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

    </header>

    <section class="sub-main-banner float-start w-100">


        <div class="sub-banner">
            <div class="container">
                <h1 class="text-center"> Registration</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registration</li>
                    </ol>
                </nav>
            </div>
        </div>



        <div class="cart-sec-ban">
            <ul class="list-unstyled">
                <li>
                    <a href="#" class="btn side_btn" data-bs-toggle="modal" class="regster-bn"
                        data-bs-target="#loginModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="schedule.php" class="btn side_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-grid" viewBox="0 0 16 16">
                            <path
                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

    </section>

    <section class="body-part-total float-start w-100">
        <div class="container matech-div-main my-5">
            <div class="row g-4 align-items-center">
                <!-- Repeat the card for the remaining 2 columns -->
                <div class="col-sm-6 col-xs-6">
                    <div class="card rounded-5 shadow-lg btn-hover shadow animate-onload" data-bs-toggle="modal"
                        data-bs-target="#loginModal" style="cursor:pointer; border-radius:10px 10px;">
                        <div class="row g-0 align-items-center">
                            <div class="col-xs-6 col-sm-6">
                                <img src="images/yoshiStud.png" class="card-img-top d-none d-sm-block" alt="Gift Poster"
                                    style="border-radius: 10px 0px 0px 10px;">
                                <img src="images/yoshiStud.png" class="card-img-top d-sm-none" alt="Gift Poster"
                                    style="border-radius: 10px 10px 10px 10px;">
                            </div>
                            <div class="col-xs-6 col-lg-6 col-sm-6">
                                <div class="card-body text-center">
                                    <div class="px-4 animated-text">
                                        <h2>Yoshi Abuja Private School Tournament 2024</h2>
                                        <br />
                                        <!-- <p class="my-3 text-secondary">Yoshi Abuja Private Schools Tournaments 2024</p> -->
                                        <!-- <p class="mt-3 mb-4 text-success">Football Tournament</p> -->
                                        <a data-bs-toggle="modal" data-bs-target="#loginModal"
                                            class="btn mt-8 w-100 join-btn shadow-sm"
                                            style="border-radius: 15px 15px;">Register</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="matech-div-main my-5">
            <div class="mn-next-part">
                <div class="container">
                    <h2 class="comon-heading m-0"> Fixtures </h2>

                    <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">First Team</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                Under 21s</button>
                        </li>


                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="comon-mateches">
                                <h3 class="com-in-head"> Next Matches </h3>
                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 28
                                            <span class="d-block"> Aug </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="matches-details.php" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>
                            </div>


                            <div class="comon-mateches">
                                <h3 class="com-in-head"> Oct-Nov 2024 </h3>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 05
                                            <span class="d-block"> Oct </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 08
                                            <span class="d-block"> Oct </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 12
                                            <span class="d-block"> Oct </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                            </div>

                            <div class="comon-mateches">
                                <h3 class="com-in-head"> Jan-Mar 2023 </h3>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 05
                                            <span class="d-block"> Jan </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 12
                                            <span class="d-block"> Jan </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 20
                                            <span class="d-block"> Mar </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                            </div>


                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="comon-mateches">
                                <h3 class="com-in-head"> Next Matches </h3>
                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 28
                                            <span class="d-block"> Aug </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>
                            </div>


                            <div class="comon-mateches">
                                <h3 class="com-in-head"> Oct-Nov 2022 </h3>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 05
                                            <span class="d-block"> Oct </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 08
                                            <span class="d-block"> Oct </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 12
                                            <span class="d-block"> Oct </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="#" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                            </div>

                            <div class="comon-mateches">
                                <h3 class="com-in-head"> Jan-Mar 2023 </h3>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 05
                                            <span class="d-block"> Jan </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="matches-details.php" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 12
                                            <span class="d-block"> Jan </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="matches-details.php" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
                                </div>

                                <div class="cmimatch">
                                    <div class="m-date text-center">
                                        <h5> 20
                                            <span class="d-block"> Mar </span>
                                        </h5>
                                    </div>
                                    <div class="m-dal d-flex justify-content-between align-items-center">
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-1.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                        <span> VS </span>
                                        <figure class="d-flex align-items-center m-0">
                                            <img src="images/fc-2.jpg" alt="ft" />
                                            <figcaption class="ms-2">
                                                Abuja FC
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <p class="loct">
                                        <i class="fas fa-map-marker-alt"></i> Murtala Muhammad Stadium, Abuja
                                        /<span> 19:20</span>
                                    </p>


                                    <a href="matches-details.php" class="btn details-btn"> View Details <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-up-right-square-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
                                        </svg> </a>
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

    <script>
        $(document).ready(function () {
            // Add a class to the cards to trigger the animation on load
            setTimeout(function () {
                $('.card').each(function (index) {
                    $(this).addClass('animate-onload');
                });
            }, 500); // Adjust the delay as needed
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



</body>

</html>