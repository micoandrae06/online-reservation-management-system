<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
   
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type=='Administrator') {
    header("Location: Administrator/index.php");
  }else if ($user_type=='Guest') {
    header("Location: index.php");
  }else if ($user_type=='Frontdesk') {
    header("Location: frontdesk/index.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tropical Breeze | Login</title>
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
      <h1 class="logo" style="margin-left: -250px;"><a href="index.php">Tropical Breeze</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <li><a class="nav-link " href="tropi.php">Chat with Tropi</a></li>
          <li><a class="nav-link active " href="">Log-in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  

  <main id="main">
      <div class="container" style="margin-bottom: 30px;margin-top: 120px;padding: 20px 20px 20px 20px;" data-aos="fade-up">
      
              <div class="container col-sm-6" style="background-color: rgba(0,44,87,0.8);padding : 30px 30px 30px 30px;border-radius: 10px;box-shadow: 20px 20px 50px grey;">
                 <div class=" section-title">
                    <h2>Welcome to Tropical Breeze Hotel & Resort</h2>
                    <p style="color:white">Log-in</p>
                    <center><img  style="width: 180px;" src="assets/img/icon_transparent.png"></center>
                  </div>
                  <span style="color:white;">E-mail address:</span>
                  <input type="email" class="form-control" id="email" placeholder="E-mail address" required style="margin-bottom: 20px;">
                  <span style="color:white;">Password:</span>
                  <input type="password" name="name" class="form-control" id="password" placeholder="Password" required style="margin-bottom: 20px;"> 
                  <input type="checkbox" name="forgot" id="forgot_pass">  
                  <label for="forgot" style="color: white;" >Forgot password?</label><br>
                  <label style="color: white;">Don't have an account?</label> 
                  <a href="createaccount.php">create</a>      
                    <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_login">Log-in</a>
                  
                
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

</body>

</html>

<script type="text/javascript">
$(document).on("click", "#btn_login", function() {

    var forgot_pass = document.getElementById("forgot_pass");

    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    if (forgot_pass.checked==true){
      if (email =='') {
       swal({title:"Warning!",text: "Please input your email!", type:"error"}); 
       return;
    }
       swal({
                            customClass: 'swal-wide',
                            title: "Do you want reset your password?", 
                            text: "", 
                            type: "question",
                            showCancelButton: true,
                            confirmButtonColor: "#5cb85c", 
                            cancelButtonColor: "#d9534f",
                            confirmButtonText: '<span class="glyphicon glyphicon-ok"></span>&nbspProceed',
                            cancelButtonText: '<span class="glyphicon glyphicon-remove"></span>&nbspDecline',
                            confirmButtonClass: "btn",
                            cancelButtonClass: "btn"
                            }).then((result) => {

                                if (result.value) {
                                $.ajax({

                                            url:'functions/reset_password.php?email='+email, 
                                            method:"POST",                                            
                                            contentType:false,
                                            cache:false,
                                            processData:false,

                                            beforeSend:function() {

                                            },  
                                            error:function(data){
                                                   
                                            }, 
                                            success:function(data){   

                                             if(data.includes('200')){
                                                                    
                                              swal({title:"Success!",text: "We sent you a new password.Please check your email.", type:"success"}).then(okay => {
                                                       if (okay) {
                                                        window.location.href = "login.php";
                                                      }
                                                       });                                                                
                                            }else{
                                               swal({title:"Warning!",text: data, type:"warning"}); 

                                            }
                                        } 

                                 });
    
                      // else result
                 }
                      });

    }else{
    if (password=='') {
     var element = document.getElementById("password");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("password");
      element.classList.remove("required-fields");
    }
     if (email ==''  || password == '') {
       swal({title:"Warning!",text: "Please complete your login credentials!", type:"error"}); 
       return;
    }

    if (email=='') {
     var element = document.getElementById("email");
     element.classList.add("required-fields");
     return;
    }else{
      var element = document.getElementById("email");
      element.classList.remove("required-fields");
    }

    var other_data = 'email='+email+
                     '&password='+password;

     $.ajax({

                  url:"functions/login.php?"+other_data, 
                  type:"POST",  
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                      if (data.includes('Guest')) { 
                          clearFields();
                          swal({title:"Hello!",text: "Welcome to Tropical Breeze Hotel and Resort reservation.", type:"success"}).then(okay => {
                                  if (okay) {
                                         window.location="index.php";                 
                                }
                                  });
                      }else if (data.includes('Administrator')) { 
                          clearFields();
                          swal({title:"Hello!",text: "Welcome administrator!", type:"success"}).then(okay => {
                                  if (okay) {
                                         window.location="Administrator/index.php";                 
                                }
                                  });
                      }else if (data.includes('Frontdesk')) { 
                          clearFields();
                          swal({title:"Hello!",text: "Welcome frontdesk!", type:"success"}).then(okay => {
                                  if (okay) {
                                         window.location="frontdesk/index.php";                 
                                }
                                  });
                      }else{
                         swal({title:"Warning!",text: data, type:"error"});
                      }
              } 

        });
   }
});

function clearFields(){
  document.getElementById("email").value='';
  document.getElementById("password").value=''; 
}
</script>