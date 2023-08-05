<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
   
}else{
  $user_type =$_SESSION['_usertype']; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tropical Breeze</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon_transparent.png" rel="icon">
  <link href="assets/img/icon_transparent.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi - v4.9.1
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo"><img src="assets/img/icon_transparent.png" alt="" class="img-fluid"></a>
      <h1 class="logo" style="margin-left: -150px;"><a href="index.php">Tropical Breeze</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#hero">Home</a></li>
          <li><a class="nav-link" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <?php
            if ($user_type=='Guest') {
              $output='<li><a class="nav-link " href="reservations.php">Reservations</a></li>
                       <li><a class="nav-link " href="cancellations.php">Cancellations</a></li>';
              echo $output;
            }

          ?>
               
          <li><a class="nav-link " href="tropi.php">Chat with Tropi</a></li>   
          <?php
            if ($user_type=='Guest') {
             $output=' <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="account.php">Settings</a></li>
              <li><a href="logout.php">Log-out</a></li>
            </ul>
          </li>';
            }else{
              $output='<li><a class="nav-link " href="login.php">Log-in</a></li>';
            }
            echo $output;
          ?> 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
      <h1>Plan. Book. Relax.</h1>
      <h2>Looking for a place to stay? Make your self at home only at Tropical Breeze.</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="assets/img/welcome_video.mp4" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="padding-top: 15px;">

        
        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/bg.jpeg" class="img-fluid" alt="">
            <a href="assets/img/welcome_video.mp4" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>Welcome to The Tropical Breeze Hotel and Resort.</h3>
            <p class="fst-italic" align="justify">
              
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The hotel and resort located at 469 A. Mabini Avenue Sambat Tanauan City, Batangas. We are offering hotel room accommodations and designed for family outings, Weddings, Parties, Corporate Seminars, and Conferences. Comfort, personalized service, and exceptional value are all combined here. We pride ourselves on our friendly, personal, and attentive service that provides a clean, safe, and exclusive environment for our guests and our team.
    Tropical Breeze Hotel and Resort is committed to deliver the highest quality of service and guest experience from your arrival to departure. Trust that, as always, we will delight you and look after you during your stay. Tropical Breeze is implementing a program that includes cleaning, safety protocols and responsible service.
    Hotel rooms come with better than standard amenities that go above and beyond the ordinary chain hotel including fully queen-sized beds, double-sized beds and stylish decor. The Tropical Breeze Resort has parking for guests and great things to do on the resort grounds. Over the past few years, the resort has received major renovations to provide quality stays for each guest and increase the amenities our resort could provide. Guests can explore and relax by the pool in cottages. We make it easy to relax and have fun. From the pool to the hotel rooms, you will love your stay at the Tropical Breeze Hotel and Resort.
    Our purpose is to give our guests a complete experience and a perfect stay. Our staff to have a culture of mutual respect, trust and integrity. Tropical Breeze is a place that is relaxing and gives you satisfaction. What we do is always genuine, honest, and mindful of the fact that less is often so much more.
            </p>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Testimonials Section ======= -->
  

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Hotel Rooms and Resort</h2>
          <p>Check our Facilities</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Room</h4>
              <p>Room</p>
              <a href="assets/img/Rooms/1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>
             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Room</h4>
              <p>Room</p>
              <a href="assets/img/Rooms/2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Room</h4>
              <p>Room</p>
              <a href="assets/img/Rooms/3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Room</h4>
              <p>Room</p>
              <a href="assets/img/Rooms/4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Comfort Room</h4>
              <p>Comfort Room</p>
              <a href="assets/img/Rooms/5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Comfort Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Room</h4>
              <p>Room</p>
              <a href="assets/img/Rooms/6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>


             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Room</h4>
              <p>Room</p>
              <a href="assets/img/Rooms/7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Room"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>


             <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Pool</h4>
              <p>Pool</p>
              <a href="assets/img/Rooms/8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Pool"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

           <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Outside View</h4>
              <p>Outside View</p>
              <a href="assets/img/Rooms/9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Outside View"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

           <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/Rooms/10.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Garage</h4>
              <p>Garage</p>
              <a href="assets/img/Rooms/10.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Garage"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

    <div class=" section-title">
        <h2>Virtual Tour</h2>
        <p>Take a look</p>
      </div>

      <div class="row">
        <div class="col-sm-4" style="background-image: url('VR/received_1157173061817006.webp');background-repeat: no-repeat;background-attachment: fixed; background-size: 420px 350px; height: 370px;">
          <div style="margin-left:-7px;margin-top: 49px;"><button onclick="loadVR('VR1.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>

          <div style="margin-left:0px;margin-top: 45px;"><button onclick="loadVR('VR2.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>

          <div style="margin-left:78px;margin-top: 69px;"><button onclick="loadVR('VR3.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>

          <div style="margin-left:118px;margin-top: -150px;"><button onclick="loadVR('VR4.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>

          <div style="margin-left:145px;margin-top: 15px;"><button onclick="loadVR('VR5.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>

           <div style="margin-left:145px;margin-top: 25px;"><button onclick="loadVR('VR6.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>



           <div style="margin-left:285px;margin-top: -95px;"><button onclick="loadVR('VR8.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>

            <div style="margin-left:385px;margin-top: -15px;"><button onclick="loadVR('VR7.jpg');" class="btn btn-success" style="border-radius: 50%;height:35px;width: 15px;" ></button></div>
           


        </div>





        <div class="col-sm-8">
          <iframe id="vrview" src="VR/VR-view.php?img=VR4.jpg" style="width: 100%;height: 500px;border-radius: 15px;box-shadow: 20px 20px 50px grey;"></iframe>
        </div>
      </div>

    </div>

  </section>
  

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up"">

    <div class=" section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>Barangay Sambat, Tanauan City, Batangas</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>tropicalbreezehotelandresort@yahoo.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>0927 955 6242</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2022 <strong><span>Tropical Breeze</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/ -->
        Designed by <a href="#">BatStateU - BSIT</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<script type="text/javascript">
  function loadVR(img){
    document.getElementById("vrview").src='VR/VR-view.php?img='+img;
  }
</script>