<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
    header("Location: ../logout.php");
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type!='Administrator') {
    header("Location: ../logout.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tropi | ChatBot</title>
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
          <li><a class="nav-link" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <li><a class="nav-link" href="lodging.php">Lodging</a></li>
          <li><a class="nav-link" href="reservations.php">Reservations</a></li> 
          <li><a class="nav-link" href="cancellations.php">Cancellations</a></li>     
          <li><a class="nav-link active" href="tropi.php">Tropi</a></li> 
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

  

  <main id="main" style="margin-bottom: 30px;margin-top: 120px;">
      

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4" style="padding: 15px 15px 15px 15px;">

            <div class=" section-title" >
                    <h2>ChatBot</h2>
                    <p>Configure Tropi</p>
            </div>
            <span><strong>Keyword / question:</strong></span>
            <textarea class="form-control" id="keyword" style="margin-bottom: 20px;" placeholder="Type a keyword or a question..."></textarea>

            <span><strong>Chatbot reply:</strong></span>
            <textarea class="form-control" id="reply" style="margin-bottom: 20px;" placeholder="Type a reply..."></textarea>

            <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_save">Save</a>
          </div>
          <div class="col-sm-8">
            <div class="container" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_tropi">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center" width="49%">
                             Keyword / Question
                            </th>             
                            <th class="text-center" width="50%">
                             Reply
                            </th>                                                                          </tr>
                          </thead>
                        
                       </table>
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
  var edit_id=0;
  var commandStr = '';
  $(document).ready(function() {
    fetchTropi();
    commandStr = 'insert';
  });
  function fetchTropi(){
    $('#tbl_tropi').DataTable().destroy();
  
   var dataTable1 = $('#tbl_tropi').DataTable({

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
     url:"functions/select_tropi.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}

$(document).on("click", "#btn_save", function() {
    if (commandStr=='insert') {
      insertConfiguration();
    }else if (commandStr=='update'){
      updateConfiguration();
    }
});

$(document).on("click", "#btn_edit", function() {
  edit_id = $(this).data('id');
  document.getElementById("keyword").value = $(this).data('keyword');
  document.getElementById("reply").value = $(this).data('reply');
  commandStr='update';
});

$(document).on("click", "#btn_delete", function() {
    var id = $(this).data('id');
    
    var other_data = 'id='+id;

     swal({
                    title: "Continue?",
                    text: "Do you want to delete this configuation?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/delete_configuration.php?"+other_data, 
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
                            commandStr='insert';
                            swal({title:"Success!",text: "Configuration has been deleted.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchTropi();             
                                  }
                                    });
                        }else{
                           swal({title:"Warning!",text: data, type:"error"});
                        }
                } 

          }); //end ajax
      } //end msg result
     }); // end swal
});
function insertConfiguration(){
    var keyword = document.getElementById("keyword").value.trim();
    var reply = document.getElementById("reply").value.trim();
    
    if (keyword=='') {
     var element = document.getElementById("keyword");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("keyword");
      element.classList.remove("required-fields");
    }

    if (reply=='') {
     var element = document.getElementById("reply");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("reply");
      element.classList.remove("required-fields");
    }

     if (keyword ==''  || reply == '') {
       swal({title:"Warning!",text: "Please complete your configuration!", type:"error"}); 
       return;
    }

    var other_data = 'keyword='+keyword+
                     '&reply='+reply;

     swal({
                    title: "Continue?",
                    text: "Do you want to save this configuation?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/insert_configuration.php?"+other_data, 
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
                            commandStr='insert';
                            swal({title:"Success!",text: "New configuration has been saved.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchTropi();             
                                  }
                                    });
                        }else{
                           swal({title:"Warning!",text: data, type:"error"});
                        }
                } 

          }); //end ajax
      } //end msg result
     }); // end swal
}

function updateConfiguration(){
    var keyword = document.getElementById("keyword").value.trim();
    var reply = document.getElementById("reply").value.trim();
    
    if (keyword=='') {
     var element = document.getElementById("keyword");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("keyword");
      element.classList.remove("required-fields");
    }

    if (reply=='') {
     var element = document.getElementById("reply");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("reply");
      element.classList.remove("required-fields");
    }

     if (keyword ==''  || reply == '') {
       swal({title:"Warning!",text: "Please complete your configuration!", type:"error"}); 
       return;
    }

    var other_data = 'keyword='+keyword+
                     '&reply='+reply+
                     '&id='+edit_id;

     swal({
                    title: "Continue?",
                    text: "Do you want to update this configuation?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_configuration.php?"+other_data, 
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
                            swal({title:"Success!",text: "Configuration has been updated.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchTropi();             
                                  }
                                    });
                        }else{
                           swal({title:"Warning!",text: data, type:"error"});
                        }
                } 

          }); //end ajax
      } //end msg result
     }); // end swal
}

function clearFields(){
  document.getElementById("keyword").value='';
  document.getElementById("reply").value=''; 
  edit_id = 0;
}
</script>