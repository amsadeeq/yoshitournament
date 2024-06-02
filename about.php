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
              <a class="nav-link active" href="about.php">About us</a>
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
                <img src="images/Yoshi_10.jpg" alt="pic">
              </figure>
              <figure class="small-img">
                <img src="images/pexels-photo-12460951.jfif" alt="pic2">
              </figure>
            </div>
            <div class="col">
              <h5 class="samll-sub mb-1 mt-0"> The Story </h5>
              <h2 class="comon-heading m-0"> About Yoshi FA World Wide Tournament </h2>
              <p class="mt-3"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is
                a long established fact that a
                reader will be distracted by the readable content of a page when looking at its layout. The point of
                using Lorem Ipsum
              </p>

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
              <h5 class="samll-sub mb-1 mt-0"> Vision </h5>
              <h2 class="comon-heading m-0"> Vision of Yoshi Tournament </h2>
              <p class="mt-3"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is
                a long established fact that a
                reader will be distracted by the readable content of a page when looking at its layout. The point of
                using Lorem Ipsum
              </p>

            </div>
            <div class="col position-relative">
              <figure class="big-img">
                <img src="images/Yoshi_10.jpg" alt="pic">
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
                <img src="images/Yoshi_10.jpg" alt="pic">
              </figure>
              <figure class="small-img">
                <img src="images/pexels-photo-12460951.jfif" alt="pic2">
              </figure>
            </div>
            <div class="col">
              <h5 class="samll-sub mb-1 mt-0"> Mission </h5>
              <h2 class="comon-heading m-0"> Mission of Yoshi Tournament </h2>
              <p class="mt-3"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is
                a long established fact that a
                reader will be distracted by the readable content of a page when looking at its layout. The point of
                using Lorem Ipsum
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
                    <h2>It is a long established fact that a reader </h2>
                    <p> It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                      distribution of letters, as opposed to using 'Content here, content here', making it look like
                      readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                      their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                      their infancy. Various versions have evolved over the years, sometimes by
                      accident, sometimes on purpose (injected humour and the like).</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom2" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Yoshi_banner_1.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>It is a long established fact that a reader </h2>
                    <p> It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                      distribution of letters, as opposed to using 'Content here, content here', making it look like
                      readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                      their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                      their infancy. Various versions have evolved over the years, sometimes by
                      accident, sometimes on purpose (injected humour and the like).</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom3" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Yoshi_11.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>It is a long established fact that a reader </h2>
                    <p> It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                      distribution of letters, as opposed to using 'Content here, content here', making it look like
                      readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                      their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                      their infancy. Various versions have evolved over the years, sometimes by
                      accident, sometimes on purpose (injected humour and the like).</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom4" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/Yoshi_10.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>It is a long established fact that a reader </h2>
                    <p> It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                      distribution of letters, as opposed to using 'Content here, content here', making it look like
                      readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                      their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                      their infancy. Various versions have evolved over the years, sometimes by
                      accident, sometimes on purpose (injected humour and the like).</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yd-hom5" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comon-fild-ads1 d-lg-flex align-items-center">
                  <figure>
                    <img src="images/wine2.jpg" alt="bg" />
                  </figure>

                  <div class="left-history">
                    <h2>It is a long established fact that a reader </h2>
                    <p> It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                      distribution of letters, as opposed to using 'Content here, content here', making it look like
                      readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                      their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                      their infancy. Various versions have evolved over the years, sometimes by
                      accident, sometimes on purpose (injected humour and the like).</p>
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


    <div class="our-mangent-sft py-5">
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
    </div>


    <div class="achivement-div py-5">

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
    </div>


    <div class="our-triners py-5">
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
    </div>

    <div class="our-sponcer py-5">
      <div class="container">
        <h2 class="comon-heading m-0"> Our Sponsors </h2>
        <div class="sponcer-slide owl-carousel owl-theme mt-5">
          <div class="itesm-sp">
            <figure>
              <img src="images/Sponsors.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp">
            <figure>
              <img src="images/Sponsor_2.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp">
            <figure>
              <img src="images/sponsor_4.png" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp">
            <figure>
              <img src="images/sponsor_6.jpeg" alt="sp" />
            </figure>
          </div>
          <div class="itesm-sp">
            <figure>
              <img src="images/sponsor_7.png" alt="sp" />
            </figure>
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