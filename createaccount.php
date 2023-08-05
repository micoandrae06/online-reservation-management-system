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
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tropical Breeze | Create account</title>
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
          <li><a class="nav-link " href="login.php">Log-in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  

  <main id="main">
      <div class="container col-sm-5" style="margin-bottom: 20px;margin-top: 100px;padding: 20px 20px 20px 20px;" data-aos="fade-up">
         <div class="row">
           <div class="col-sm-12" style="padding: 20px 20px 0px 20px; background-color: whitesmoke;border-radius: 15px;box-shadow: 20px 20px 50px lightgrey;">
               <div class=" section-title">
                  <h2>Create an account</h2>
                  <p>Register</p>
                <div class="row">
                 <div class="form-group mt-3">
                    <span>E-mail address:</span>
                    <input type="email" class="form-control" placeholder="Your e-mail address..." required id="email">
                  </div>
                  <div class="form-group mt-3">
                    <span>First name:</span>
                    <input type="text" class="form-control" placeholder="Your first name..." required id="firstname">
                  </div>

                  <div class="form-group mt-3">
                    <span>Middle name:</span>
                    <input type="text" class="form-control" placeholder="Your middle name..." required id="middlename">
                  </div>

                 <div class="form-group mt-3">
                    <span>Surname:</span>
                    <input type="text" class="form-control"  placeholder="Your surname/family name..."  id="surname">
                  </div>

                  <div class="form-group mt-3">
                    <span>Birthday:</span>
                    <input type="date" class="form-control" placeholder="Your birthday..."  id="birthday">
                  </div>

                  <div class="form-group mt-3">
                    <span>Contact:</span>
                    <input type="phone" class="form-control" placeholder="Your contact number..." maxlength="11"  id="contact">
                  </div>

                 <div class="form-group mt-3">
                    <span>Address:</span>
                    <input type="phone" class="form-control"  placeholder="Your address..."  id="address">
                  </div>
                  <div class="form-group mt-3">
                    <span>Password:</span>
                    <input type="password" class="form-control"  placeholder="Your password..." required id="password">
                  </div>
                  <div class="form-group mt-3">
                    <span>Confirm password:</span>
                    <input type="password" class="form-control"   placeholder="Re-type your password..." required id="confirmpassword">
                  </div>

                   <div class="form-group mt-3">
                    <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_create">Create</a>
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

<script type="text/javascript" language="javascript">
 $(document).on("click", "#btn_create", function() {
    var email = document.getElementById("email").value.trim();
    var firstname = document.getElementById("firstname").value.trim();
    var middlename = document.getElementById("middlename").value.trim();
    var surname = document.getElementById("surname").value.trim();
    var birthday = document.getElementById("birthday").value.trim();
    var contact = document.getElementById("contact").value.trim();
    var address = document.getElementById("address").value.trim();
    var password = document.getElementById("password").value.trim();
    var confirmpassword = document.getElementById("confirmpassword").value.trim();
   
    var age = _calculateAge();

    if (firstname=='') {
     var element = document.getElementById("firstname");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("firstname");
      element.classList.remove("required-fields");
    }

    if (surname=='') {
     var element = document.getElementById("surname");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("surname");
      element.classList.remove("required-fields");
    }

    if (birthday=='') {
     var element = document.getElementById("birthday");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("birthday");
      element.classList.remove("required-fields");
    }

    if (contact=='') {
     var element = document.getElementById("contact");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("contact");
      element.classList.remove("required-fields");
    }

    if (address=='') {
     var element = document.getElementById("address");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("address");
      element.classList.remove("required-fields");
    }

    if (password=='') {
     var element = document.getElementById("password");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("password");
      element.classList.remove("required-fields");
    }

    if (confirmpassword=='') {
     var element = document.getElementById("confirmpassword");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("confirmpassword");
      element.classList.remove("required-fields");
    }

    if (age<18) {
       swal({title:"Warning!",text: "You are not allowed to create an account with Tropical Breeze Hotel Reservations.", type:"error"}); 
       return;
    }

    if (email=='' || !email.includes('@') || !email.includes('.com')) {
     var element = document.getElementById("email");
     element.classList.add("required-fields");
     return;
    }else{
      var element = document.getElementById("email");
      element.classList.remove("required-fields");
    }


    if (email=='' || firstname=='' || surname=='' || birthday=='' || contact=='' || address=='' || password=='' || confirmpassword=='') {
       swal({title:"Warning!",text: "Please complete the required fields for registration.", type:"error"}); 
       return;
    }

    if (password != confirmpassword) {
       swal({title:"Warning!",text: "Password didn't match!", type:"error"}); 
       return;
    }

    var other_data = 'email='+email+
                     '&firstname='+firstname+
                     '&middlename='+middlename+
                     '&surname='+surname+
                     '&birthday='+birthday+
                     '&contact='+contact+
                     '&address='+address+
                     '&password='+password;

     $.ajax({

                  url:"functions/register.php?"+other_data, 
                  type:"POST",  
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                  if (data.includes('200')) { 
                      clearFields();
                      swal({title:"Success!",text: "Your account has been successfully created! Please check your email for verification.", type:"success"}).then(okay => {
                              if (okay) {
                                     window.location="login.php";                 
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: "Unable to register right now! Maybe your account already exist.", type:"error"}); 

                  }
              } 

        });
  
 });

 function _calculateAge() {
    event.preventDefault();
    var birthday = document.getElementById("birthday").value;
    birthday = new Date(birthday);
    
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);  
 }

 function clearFields(){
  document.getElementById("email").value='';
  document.getElementById("firstname").value='';
  document.getElementById("middlename").value='';
  document.getElementById("surname").value='';
  document.getElementById("birthday").value='';
  document.getElementById("contact").value='';
  document.getElementById("address").value='';
  document.getElementById("password").value='';
  document.getElementById("confirmpassword").value='';  
 }

</script>