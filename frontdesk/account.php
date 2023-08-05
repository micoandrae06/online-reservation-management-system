<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
    header("Location: ../logout.php");
}else{
  $user_type =$_SESSION['_usertype']; 
 if ($user_type!='Frontdesk') {
    header("Location: ../logout.php");
  }
    $password = $_SESSION['_password'];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cancellations | Administrator</title>
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
   <!-- AJAX page will not work offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <!-- Datatable layout -->
  <script src="../datatables/jquery.dataTables.min.js" type="text/javascript" language="javascript"></script>
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>


  <!-- =======================================================
  * Template Name: Dewi - v4.9.1
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
.required-fields { /* Chrome, Firefox, Opera, Safari 10.1+ */
  border-color:  red;
}
</style>
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
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="lodging.php">Lodging</a></li>
          <li><a class="nav-link" href="reservations.php">Reservations</a></li> 
          <li><a class="nav-link" href="cancellations.php">Cancellations</a></li>     
  
          <?php
            if ($user_type=='Frontdesk') {
             $output=' <li class="dropdown"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
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

  
 <main style="margin-bottom: 100px;">
    <div class="container" style="margin-top: 140px;">
      <center>
      <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Change Password</h5>
     
              
              </div>
              <div class="card-body">
                
               <h4>Password</h4>
                <span>Current password:</span>
                <input class="form-control" type="password" name="" id="current_password">
               <span>New password:</span>
               <input class="form-control" type="password" name="" id="new_password">
               <span>Re-type password:</span>
               <input class="form-control" type="password" name="" id="confirm_password">
                  
                   </div>
             
              <div class="card-footer">
                
               <a  class="btn btn-danger" id="btn_save_password"  style="color:white;float: right;margin-bottom: 20px;" data-password="<?php echo $password; ?>"> Update</a>
                              </div>
            </div>
          </div>
        </center>
        </div>

  </main>
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
  <script src="../assets/js/sweetalert2.all.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

   <!-- AJAX page will not work offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <!-- Datatable layout -->
  <script src="../datatables/jquery.dataTables.min.js" type="text/javascript" language="javascript"></script>
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>


</body>

</html>

<script type="text/javascript">
 $(document).on("click", "#btn_save_password", function() {
     event.preventDefault();
      var current_password = document.getElementById("current_password").value;
      var new_password = document.getElementById("new_password").value;
      var confirm_password = document.getElementById("confirm_password").value;
      var oldpass = $(this).data('password');

      if (confirm_password!= new_password) {
          swal({title:"Warning!",text: "Password mismatch!", type:"warning"});
        return;
      }

      if (confirm_password=='' || new_password=='' || current_password=='') {
        swal({title:"Warning!",text: "Please complete the password fields!", type:"warning"});
        return;
      }

      if (current_password!=oldpass) {
        swal({title:"Warning!",text: "Password mismatch!", type:"warning"});
        return;
      }
     

      var other_data = "new_password="+new_password;    
     swal({
                            customClass: 'swal-wide',
                            title: "Do you want update your password?", 
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

                                            url:'functions/update_password.php?'+other_data, 
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
                                                                    
                                              swal({title:"Success!",text: "Your password has been updated. You will be redirected to login page for security purposes.", type:"success"}).then(okay => {
                                                       if (okay) {
                                                        window.location.href = "../logout.php";
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
});
</script>