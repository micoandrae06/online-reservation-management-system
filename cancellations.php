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

  <title>Cancellations | Tropical Breeze</title>
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
<style>
.required-fields { /* Chrome, Firefox, Opera, Safari 10.1+ */
  border-color:  red;
}

</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="background-color: rgba(0,44,87,0.9);">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo"><img src="assets/img/icon_transparent.png" alt="" class="img-fluid"></a>
      <h1 class="logo" style="margin-left: -150px;"><a href="index.php">Tropical Breeze</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <<?php
            if ($user_type=='Guest') {
              $output='<li><a class="nav-link" href="reservations.php">Reservations</a></li>
                       <li><a class="nav-link  active" href="cancellations.php">Cancellations</a></li>';
              echo $output;
            }

          ?>
               
          <li><a class="nav-link" href="tropi.php">Chat with Tropi</a></li>   
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


  <main style="margin-bottom: 100px;">
    <div class="container" style="margin-top: 100px;">
      <div class=" section-title" >
        <center>
        <h2>Tropical Breeze Hotel & Resort</h2>
        <p>Your Cancellations</p>
        </center>
      </div>
      <ul class="nav nav-tabs">
        <li class="nav-link active" id="room_link"><a href="#room" onclick="opentab1();fetchReservations();">Room</a></li>
        <li class="nav-link" id="resort_link"><a href="#resort" onclick="opentab2();fetchResortReservations();">Resort</a></li>
      </ul>
<div class="tab-content">
      <div class="container" id="room" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_reservations">
                      <thead class="">
                          <tr> 
                            <th class="text-center">
                              Reason
                            </th>  
                            <th class="text-center">
                             Transaction#
                            </th>
                            <th class="text-center">
                             Date
                            </th>             
                            <th class="text-center">
                             Arrival
                            </th>
                            <th class="text-center">
                              Room ID
                            </th>
                            <th class="text-center">
                             Room Type
                            </th>

                            <th class="text-center">
                             Hours
                            </th>

                            <th class="text-center">
                             Rate
                            </th>

                            <th class="text-center">
                             Extra Person
                            </th>

                            <th class="text-center">
                             Extra Bed
                            </th>

                            <th class="text-center">
                             Total
                            </th>

                            <th class="text-center">
                             Payment
                            </th>

                            <th class="text-center">
                             Balance
                            </th>

                            <th class="text-center">
                             G-cash code
                            </th>
                            
                          </tr>
                      </thead>                      
                    </table>
                 </div>

                 <div class="container" id="resort" style="display: none; background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_reservations_resort">
                      <thead class="">
                          <tr> 
                            <th class="text-center">
                              Reason
                            </th>  
                            <th class="text-center">
                             Transaction#
                            </th>
                            <th class="text-center">
                             Date
                            </th>             
                         
                            <th class="text-center">
                              Resort ID
                            </th>
                            <th class="text-center">
                             Tour Type
                            </th>

                            <th class="text-center">
                             Rate
                            </th>

                            <th class="text-center">
                             Total
                            </th>

                            <th class="text-center">
                             Payment
                            </th>

                            <th class="text-center">
                             Balance
                            </th>

                            <th class="text-center">
                             G-cash code
                            </th>
                            
                          </tr>
                      </thead>                      
                    </table>
                 </div>
      
    </div>
  </div>

  </main>
  


  <div id="preloader"></div>
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
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/sweetalert2.all.min.js"></script>
  <!-- AJAX page will not work offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Datatable layout -->
  <script src="datatables/jquery.dataTables.min.js" type="text/javascript" language="javascript"></script>
  <script type="text/javascript" src="datatables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

</body>

</html>

<script type="text/javascript">
  
  $(document).ready(function() {
   fetchReservations();
   fetchResortReservations();
  });

  function fetchReservations(){
    $('#tbl_reservations').DataTable().destroy();
  
   var dataTable1 = $('#tbl_reservations').DataTable({

    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l>f<"pull-right"><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    "processing" : true,
    "bStateSave": true, //stay on this page
    "responsive": true,
    "serverSide" : true,
    "order" : [],
    "drawCallback": function(settings) {
    //console.log(settings.json);
   
    },
    "ajax" : {
     url:"functions/select_room_cancellation.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}

function fetchResortReservations(){
    $('#tbl_reservations_resort').DataTable().destroy();
  
   var dataTable1 = $('#tbl_reservations_resort').DataTable({

    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l>f<"pull-right"><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    "processing" : true,
    "bStateSave": true, //stay on this page
    "responsive": true,
    "serverSide" : true,
    "order" : [],
    "drawCallback": function(settings) {
    //console.log(settings.json);
   
    },
    "ajax" : {
     url:"functions/select_resort_cancellation.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}
 
 function opentab1(){
  document.getElementById("room").style.display='inline-block';
  document.getElementById("resort").style.display='none';
  document.getElementById("room_link").classList.add('active');
  document.getElementById("resort_link").classList.remove('active');
 }
 function opentab2(){
  document.getElementById("room").style.display='none';
  document.getElementById("resort").style.display='inline-block';
  document.getElementById("room_link").classList.remove('active');
  document.getElementById("resort_link").classList.add('active');
 }
</script>