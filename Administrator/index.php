<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
   
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type!='Administrator') {
    header("Location: ../index.php");
  }
  if(empty($_GET["_year"])){
  $_year='2022';
}else{
  $_year=$_GET['_year'];
}

if(empty($_GET["_datefrom"])){
  
}else{
  $datefrom=$_GET['_datefrom'];
}

if(empty($_GET["_dateto"])){
  
}else{
  $dateto=$_GET['_dateto'];
}
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
  <link href="../assets/img/icon_transparent.png" rel="icon">
  <link href="../assets/img/icon_transparent.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: Dewi - v4.9.1
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top " style="background-color: rgba(0,44,87,0.9);">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo"><img src="../assets/img/icon_transparent.png" alt="" class="img-fluid"></a>
      <h1 class="logo" style="margin-left: -100px;"><a href="index.php">Tropical Breeze</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="index.php">Home</a></li>
          <li><a class="nav-link" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <li><a class="nav-link" href="lodging.php">Lodging</a></li>
          <li><a class="nav-link " href="reservations.php">Reservations</a></li> 
          <li><a class="nav-link " href="cancellations.php">Cancellations</a></li>     
          <li><a class="nav-link " href="tropi.php">Tropi</a></li>   
          <li><a class="nav-link " href="report.php">Report</a></li>  
          <?php
            if ($user_type=='Administrator') {
             $output=' <li class="dropdown"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="system_settings.php">System</a></li>
              <li><a href="account.php">Account</a></li>
              <li><a href="../logout.php">Log-out</a></li>
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
 
  <main id="main" >

    <div class="row" style="margin-top: 150px;margin-bottom: 50px;">
      <div class=" section-title" >
        <center>
        <h2>Tropical Breeze Hotel & Resort</h2>
        <p>Statistics</p>
        </center>
      </div>
        <div class="col-sm-12">
          <div class="container">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-3">
                <h3>Guest Lodging </h3></div>
                <div class="col-sm-6">
                 <div class="input-group">
                 <select class="form-control" style="font-style: italic;" id="opt_year">
                  <optgroup style="color:black;">
                    <option selected="" hidden="" value="<?php echo $_year; ?>">as of year <?php echo $_year; ?></option>
                    <option value="2022">as of year 2022</option>
                    <option value="2023">as of year 2023</option>
                    <option value="2024">as of year 2024</option>
                    <option value="2025">as of year 2025</option>
                    <option value="2026">as of year 2026</option>
                    <option value="2027">as of year 2027</option>
                    <option value="2028">as of year 2028</option>
                    <option value="2029">as of year 2029</option>
                    <option value="2030">as of year 2030</option>
              </optgroup>
            </select>
               <a class="form-control btn btn-primary col-sm-2" href="#"  id="btn_generate">Generate</a>
              </div>
              </div>
            </div>
            </div>
              <div class="card-body">
                <canvas id="lodgingChart"></canvas>
              </div>
            </div>
          </div>
      </div>
      <div class="col-sm-12">
        <div class="container" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="card" style="padding : 20px 20px 20px 20px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <span>Date | from:</span>
                       <input type="date" class="form-control" name="" id="date_from" value="<?php echo $datefrom; ?>">
                    </div>
                     <div class="col-sm-3">
                      <span>to:</span>
                       <input type="date" class="form-control" name="" id="date_to" value="<?php echo $dateto; ?>">
                    </div>
                    <div class="col-sm-3">
                      <a  class="btn btn-primary" style="margin-top: 24px;color:white;" id="btn_generate_2">Generate</a>
                    </div>
                  </div>
                
               
              </div>
            </div>
      </div>
      <div class="row">
      <div class=" col-sm-6">
          <div class="container">
            <div class="card">
              <div class="card-header">
                <h4>Cancellation and Reservation</h4>
            </div>
              <div class="card-body">
                <canvas id="reservationChart"></canvas>
              </div>
            </div>
          </div>
      </div>

      <div class="col-sm-6">
          <div class="container">
            <div class="card">
              <div class="card-header">
                <h4>Guest Origin</h4>
            </div>
              <div class="card-body">
                <canvas id="originChart"></canvas>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
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
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- AJAX page will not work offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    fetchLodging();
    fetchReservation();
    fetchOrigin();
  });
function fetchLodging(){
  var chartdata='';
  var _year = document.getElementById("opt_year").value
   $.ajax({

                    url:"functions/select_lodging_chart.php?_year="+_year, 
                    type:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   

                      const ctx = document.getElementById('lodgingChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN','JUL','AUG','SEP','OCT','NOV','DEC'],
        datasets: [{
            label: 'Guest Lodging',
            data: JSON.parse(data),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
                    } 

          }); //end ajax


}

function fetchReservation(){
  var _datefrom = document.getElementById("date_from").value;
   var _dateto = document.getElementById("date_to").value;
   var other_data = "_datefrom="+_datefrom+"&_dateto="+_dateto;
   $.ajax({

                    url:"functions/select_reservation_chart.php?"+other_data, 
                    type:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   

                      const ctx = document.getElementById('reservationChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Reservation', 'Cancellation'],
        datasets: [{
            label: 'Reservation/Cancellation',
            data: JSON.parse(data),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
                    } 

          }); //end ajax


}

function fetchOrigin(){
  var _datefrom = document.getElementById("date_from").value;
   var _dateto = document.getElementById("date_to").value;
   var other_data = "_datefrom="+_datefrom+"&_dateto="+_dateto;
   $.ajax({

                    url:"functions/select_origin_chart.php?"+other_data, 
                    type:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   

                      const ctx = document.getElementById('originChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Walk-in', 'Online'],
        datasets: [{
            label: 'Guest origin',
            data: JSON.parse(data),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
                    } 

          }); //end ajax


}

$(document).on("click", "#btn_generate", function() {
  var _year = document.getElementById("opt_year").value;
    var _datefrom = document.getElementById("date_from").value;
      var _dateto = document.getElementById("date_to").value;
    window.location="index.php?_year="+_year+"&_datefrom="+_datefrom+"&_dateto="+_dateto;
  });

$(document).on("click", "#btn_generate_2", function() {
  var _year = document.getElementById("opt_year").value;
    var _datefrom = document.getElementById("date_from").value;
      var _dateto = document.getElementById("date_to").value;
    window.location="index.php?_year="+_year+"&_datefrom="+_datefrom+"&_dateto="+_dateto;
  });
</script>