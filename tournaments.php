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
    <title>Tournaments - Yoshi Tournament </title>
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

    <?php require 'header.php'; ?>

    <section class="sub-main-banner float-start w-100">


        <div class="sub-banner">
            <div class="container">
                <h1 class="text-center"> The Tournaments</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tournament</li>
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
                    <div class="card rounded-5 shadow-lg animate-onload" data-bs-toggle="modal"
                        data-bs-target="#registerModal" style="cursor:pointer; border-radius:10px 10px;">
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
                                        <a data-bs-toggle="modal" data-bs-target="#registerModal"
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




        <div class="about-page-main comon-sub-page-main">

            <div class="about-club-top">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
                        <div class="col position-relative">
                            <figure class="big-img">
                                <img src="images/Banner 01.jpeg" alt="pic">
                            </figure>
                            <figure class="small-img">
                                <img src="images/Yoshi_9.jpg" alt="pic2">
                            </figure>
                        </div>
                        <div class="col">
                            <h5 class="samll-sub mb-1 mt-0"> Why We Started </h5>
                            <h2 class="comon-heading m-0"> About Yoshi FA World Wide Tournament </h2>
                            <p class="mt-3" style="text-align:justify !important;">We founded Yoshi Tournaments out of a
                                deep-rooted passion for football and a
                                clear vision to bridge the gap in player development within Abuja. Recognizing the
                                limited competitive opportunities available to local players, we understood the urgent
                                need for a platform that would challenge and nurture talent at all levels. Yoshi
                                Tournaments was born from this determination to provide players with the in-game
                                experience essential for their growth and progression.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-page-main comon-sub-page-main">

            <div class="about-club-top">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
                        <div class="col">
                            <h5 class="samll-sub mb-1 mt-0"> Benefits and Key Differentiators </h5>
                            <h2 class="comon-heading m-0"> About Yoshi FA World Wide Tournament </h2>
                            <p class="mt-3" style="text-align:justify !important;"> Yoshi Tournaments offers players
                                unparalleled opportunities to shine. Our
                                tournaments provide a platform for players to test their abilities against diverse
                                competition, fostering growth and development. We believe in inclusivity and offer free
                                participation to all Abuja Private School students. For top performers, we have exciting
                                rewards including trophies, medals, and potential scouting opportunities. All
                                participants will receive a certificate of recognition. Our commitment to international
                                standards ensures a competitive, fair, and professionally managed tournament experience
                                for everyone involved. Join us and be part of the next generation of football stars.
                            </p>
                        </div>
                        <div class="col position-relative">
                            <figure class="big-img">
                                <img src="images/Banner 02.jpg" alt="pic">
                            </figure>
                            <figure class="small-img">
                                <img src="images/Yoshi_8.jpg" alt="pic2">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="about-page-main comon-sub-page-main">

            <div class="about-club-top">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
                        <div class="col position-relative">
                            <figure class="big-img">
                                <img src="images/Banner 03.jpg" alt="pic">
                            </figure>
                            <figure class="small-img">
                                <img src="images/yoshi_banner_3.jpg" alt="pic2">
                            </figure>
                        </div>
                        <div class="col">
                            <h5 class="samll-sub mb-1 mt-0"> The Story </h5>
                            <h2 class="comon-heading m-0"> Our Vision </h2>
                            <p class="mt-3" style="text-align:justify !important;"> Having successfully launched our
                                inaugural tournament, we are committed to
                                expanding our reach and impact. Our goal is to host multiple tournaments in 2025,
                                catering to a wider audience including public sector, corporate, and school communities.
                                Beyond the matches, Yoshi Tournaments offers a holistic football experience. Players and
                                teams have the opportunity to network, collaborate, and benefit from the expertise of
                                our Yoshi FA coaching team. We believe in fostering a strong football community where
                                everyone can grow and succeed.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- <div class="our-mangent-sft py-5">
            <div class="container">
                <h2 class="comon-heading m-0"> Coordinators </h2>
                <div class="mangemnet-sf owl-carousel owl-theme mt-4">
                    <div class="items-man">
                        <figure>
                            <img src="images/Yoshi_1.jpg" alt="pmg" class="management-pic" />
                        </figure>
                        <div class="name">
                            <h5> Ahmed Gaidam
                                <span class="d-block"> President </span>
                            </h5>
                        </div>
                    </div>

                    <div class="items-man">
                        <figure>
                            <img src="images/Yoshi_2.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block"> Vice President (House & Admin)</span>
                            </h5>
                        </div>
                    </div>


                    <div class="items-man">
                        <figure>
                            <img src="images/Yoshi_3.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block"> Hony. Treasurer & Sponsorship</span>
                            </h5>
                        </div>
                    </div>

                    <div class="items-man">
                        <figure>
                            <img src="images/Yoshi_4.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block"> Member - Entertainment</span>
                            </h5>
                        </div>
                    </div>




                </div>
            </div>
        </div> -->


        <!-- <div class="achivement-div py-5">

            <div class="container">
                <h2 class="comon-heading m-0"> Achievement </h2>
                <div class="achivent-slide owl-carousel owl-theme mt-5">
                    <div class="items-achiv">
                        <figure>
                            <img src="images/award-img1.png" alt="ad1" />
                        </figure>
                        <div class="achiv-titel">
                            <h5> 2010 world FC cup champion </h5>
                        </div>
                    </div>

                    <div class="items-achiv">
                        <figure>
                            <img src="images/award-img3.png" alt="ad1" />
                        </figure>
                        <div class="achiv-titel">
                            <h5> 2012 United CD cup champion </h5>
                        </div>
                    </div>

                    <div class="items-achiv">
                        <figure>
                            <img src="images/award-img4.png" alt="ad1" />
                        </figure>
                        <div class="achiv-titel">
                            <h5> 2014 world cup champion </h5>
                        </div>
                    </div>

                    <div class="items-achiv">
                        <figure>
                            <img src="images/award-img1.png" alt="ad1" />
                        </figure>
                        <div class="achiv-titel">
                            <h5> 2015 FC cup champion </h5>
                        </div>
                    </div>

                    <div class="items-achiv">
                        <figure>
                            <img src="images/award-img4.png" alt="ad1" />
                        </figure>
                        <div class="achiv-titel">
                            <h5> 2014 world cup champion </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="our-triners py-5">
            <div class="container">
                <h2 class="comon-heading m-0"> Tournament Officials </h2>
                <figure class="achive-div1">
                    <img src="images/bg-6.webp" style="opacity: 0.1;" alt="bg" />
                </figure>
                <div class="coaching-slide owl-carousel owl-theme mt-5">

                    <div class="items-coach-man">
                        <figure>
                            <img src="images/Yoshi_1.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block">Trainer</span>
                            </h5>
                        </div>
                    </div>


                    <div class="items-coach-man">
                        <figure>
                            <img src="images/Yoshi_1.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block">Trainer</span>
                            </h5>
                        </div>
                    </div>

                    <div class="items-coach-man">
                        <figure>
                            <img src="images/Yoshi_1.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block">Trainer</span>
                            </h5>
                        </div>
                    </div>


                    <div class="items-coach-man">
                        <figure>
                            <img src="images/Yoshi_1.jpg" alt="pmg" />
                        </figure>
                        <div class="name">
                            <h5> Abubakar Sadiq
                                <span class="d-block">Trainer</span>
                            </h5>
                        </div>
                    </div>





                </div>
            </div>
        </div>

        <!---- ###### Our Partners ##########-->

        <?php require 'partners.php'; ?>


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