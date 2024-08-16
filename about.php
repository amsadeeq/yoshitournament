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
  <title>About - Yoshi Tournament </title>
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
        <h1 class="text-center"> About Us</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
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

    <div class="about-page-main comon-sub-page-main">

      <div class="about-club-top">
        <div class="container">
          <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
            <div class="col position-relative">
              <figure class="big-img">
                <img src="images/about_Banner 01.jpg" alt="pic">
              </figure>
              <figure class="small-img">
                <img src="images/pexels-photo-12460951.jfif" alt="pic2">
              </figure>
            </div>
            <div class="col">
              <h5 class="samll-sub mb-1 mt-0"> Our Story </h5>
              <h2 class="comon-heading m-0"> About Yoshi FA World Wide Tournament </h2>
              <p class="mt-3" style="text-align: justify !important;"> Born from a deep-rooted passion for football,
                Yoshi Tournaments emerged to address a critical gap in player development within Abuja. We recognized
                the limited competitive opportunities available to local players and saw an urgent need to create a
                platform that would challenge and nurture talent at all levels. Our journey began with modest
                competitions among schools, but our unwavering commitment to quality and unforgettable experiences
                quickly established Yoshi Tournaments as a beacon of excellence in the football community</p>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="about-page-main comon-sub-page-main">

      <div class="about-club-top">
        <div class="container">
          <div class="row row-cols-1 row-cols-lg-2 g-lg-5">
            <div class="col position-relative d-sm-none">
              <figure class="big-img">
                <img src="images/about_Banner 02.jpg" alt="pic">
              </figure>
              <figure class="small-img">
                <img src="images/pexels-photo-12460951.jfif" alt="pic2">
              </figure>
            </div>
            <div class="col">
              <h5 class="samll-sub mb-1 mt-0"> Our Vision </h5>
              <h2 class="comon-heading m-0"> Vision of Yoshi Tournament </h2>
              <p class="mt-3" style="text-align: justify;">
                Our vision is to create a dynamic platform that empowers aspiring football players of all backgrounds to
                showcase their extraordinary abilities. We strive to be the catalyst for unlocking hidden potential,
                providing a stage where talent can flourish and dreams can take flight. By offering a diverse range of
                competitive opportunities, we aim to inspire and nurture the next generation of football stars while
                fostering a vibrant and inclusive football community
              </p>

            </div>
            <div class="col position-relative d-none d-sm-block">
              <figure class="big-img">
                <img src="images/about_Banner 02.jpg" alt="pic">
              </figure>
              <figure class="small-img">
                <img src="images/pexels-photo-12460951.jfif" alt="pic2">
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
                <img src="images/about_img.JPG" alt="pic">
              </figure>
              <figure class="small-img">
                <img src="images/pexels-photo-12460951.jfif" alt="pic2">
              </figure>
            </div>
            <div class="col">
              <h5 class="samll-sub mb-1 mt-0"> Our Mission </h5>
              <h2 class="comon-heading m-0"> Mission of Yoshi Tournament </h2>
              <p class="mt-3" style="text-align: justify !important;"> We are dedicated to designing and executing
                exceptional tournament and league formats that provide a level playing field for all aspiring
                footballers. Our mission is to create opportunities for players to compete, learn, and grow, regardless
                of their experience or background. Through meticulous planning and execution, we aim to deliver
                unforgettable experiences that leave a lasting impact on the lives of participants and contribute to the
                overall development of the sport.
              </p>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="our-history-div">


      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
              role="tab" aria-controls="home" aria-selected="true"> Timeline </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
              role="tab" aria-controls="profile" aria-selected="false"> * </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
              role="tab" aria-controls="contact" aria-selected="false"> * </button>
          </li>
        </ul>
      </div>
      <div class="tab-content mna-bg" id="myTabContent">
        <div class="container">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#yd-hom1"
                  type="button" role="tab" aria-controls="pills-home" aria-selected="true"> 2020</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#yd-hom2"
                  type="button" role="tab" aria-controls="pills-profile" aria-selected="false">2021</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#yd-hom3"
                  type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                  2022</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#yd-hom4"
                  type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                  2023</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#yd-hom5"
                  type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                  2024</button>
              </li>


            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="yd-hom1" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Yoshi_8.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>Building Dreams: Yoshi FA's Evolution in Dubai </h2>
                    <p style="text-align: justify !important;"> Yoshi FA was established in Dubai, UAE in July 2020 and
                      officially began operations in December 2020. Ahmed's (Founder and CEO) strong commitment and
                      passion for player development along with a practical and empathetic approach led to the growth of
                      the academy in Dubai. During the initial phase of operations - the approach and coaching
                      methodology was developed based on the planer categories across varying capability levels. The
                      Yoshi family has ever since been growing across Dubai.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom2" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Yoshi_banner_1.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>Building a Legacy: Yoshi FA's Commitment to Grass-Root Coaching </h2>
                    <p style="text-align: justify !important;"> The first contract for long term pitch rental was signed
                      with a private school in Dubai - allowing Yoshi FA to call Dubai its home. This year saw the first
                      official employee for the academy allowing Yoshi FA to scale coaching operations. With a keen eye
                      for detail and learnings from courses for football development - the Yoshi FA coaching methodology
                      is cemented and refined on a continuous basis with the core element revolving around grass-root
                      coaching. The first Yoshi FA strategic plan was established in 2021 with a mission to
                      revolutionize Football across the Middle East and Africa.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom3" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Timeline 2022 Image.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>Expanding Horizons: Yoshi FA's International and Local Growth </h2>
                    <p style="text-align: justify !important;"> Yoshi FA held its first international project in 2022 -
                      the Abuja Summer Camp. The camp was an astounding success with over 50 players training with Yoshi
                      FA over a span of 2 weeks in Abuja, Nigeria. The camp concluded with a historic win against the
                      official AS Roma U-23 team - proving Yoshi FA's coaching methodology and prowess. Along the same
                      time frame Yoshi FA established its second branch in Sharjah, UAE expanding its services to cater
                      to the growing need for grassroots coaching in the UAE. 2022 was a stepping stone for Yoshi FA
                      from a media perspective - with International media recognition (Vanguard - Nigeria).</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom4" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Yoshi_10.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>Reaching New Heights: Yoshi FA's Community and Player Engagement </h2>
                    <p style="text-align: justify !important;"> Building on its successes, Yoshi FA expanded its reach
                      in 2023. The Dubai Summer Camp offered players a fun and engaging football experience in a
                      controlled indoor environment by hosting sessions over 2 weeks in an indoor football dome in Dubai
                      in the summer to beat the heat and included fun activities for players. The Gombe Run in Nigeria
                      was a highlight, demonstrating Yoshi FA's commitment to community well-being and promoting an
                      active lifestyle. With over 1,000 participants, the event showcased the academy's ability to
                      create impactful community initiatives.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom5" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/yoshiStud.png" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>Yoshi Tournaments Abuja: Unveiling a New Era in Football Competitions 2024 </h2>
                    <p style="text-align: justify !important;"> 2024 marks a pivotal year for Yoshi FA as we embark on
                      establishing our first football academy in Abuja, Nigeria. This ambitious project is a testament
                      to our commitment to nurturing young talent and revolutionizing player development in the region.
                      By leveraging our international expertise and partnerships, we aim to create a world-class academy
                      that provides unparalleled opportunities for aspiring footballers.
                      Building upon our successful track record, Yoshi Tournaments will launch in 2024, offering a
                      platform for players of all levels to compete, showcase their skills, and experience the thrill of
                      competitive football. Our tournaments will be characterized by fair play, intense competition, and
                      a focus on player development. We are excited to create a vibrant tournament ecosystem that
                      fosters a love for the game and inspires future football stars.
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
      </div>

    </div>


    <!-- <div class="our-mangent-sft py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> Tournament Management Staff </h2>
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


    <!-- <div class="our-triners py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> Yoshi Management </h2>
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
    </div> -->

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