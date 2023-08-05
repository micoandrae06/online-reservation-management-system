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

$hours=0;
$person=0;
$bed=0;

  require ("../db_connection/myConn.php");
  $sql = "SELECT `_id`, `_exceeding_hour`, `_extra_person`, `_extra_bed` FROM `tbl_rates`";
  $result= $con_str->query($sql);
  $output='';
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $hours = $row["_exceeding_hour"];
        $person = $row["_extra_person"];
        $bed = $row["_extra_bed"];
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>System Settings | Administrator</title>
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
          <li><a class="nav-link " href="tropi.php">Tropi</a></li>   
          <li><a class="nav-link " href="report.php">Report</a></li>  
          <?php
            if ($user_type=='Administrator') {
             $output=' <li class="dropdown active"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="active"><a href="system_settings.php">System</a></li>
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
      

      <div class="container" style="margin-bottom: 50px;">
        <div class="row">
          <div class="col-sm-4" style="padding: 15px 15px 15px 15px;">

            <div class=" section-title" >
                    <h2>Room Settings</h2>
                    <p>Room Type</p>
            </div>
            <span><strong>Room type:</strong></span>
            <input type="text" class="form-control" placeholder="Room type..." id="roomtype" style="margin-bottom: 20px;">

            <span><strong>3 hour rate:</strong></span>
            <input type="number" min="0" class="form-control" placeholder="Price for 3 hours" id="_3_hr" style="margin-bottom: 20px;">

            <span><strong>6 hour rate:</strong></span>
            <input type="number" min="0" class="form-control" placeholder="Price for 6 hours" id="_6_hr" style="margin-bottom: 20px;">

            <span><strong>12 hour rate:</strong></span>
            <input type="number" min="0" class="form-control" placeholder="Price for 12 hours" id="_12_hr" style="margin-bottom: 20px;">

            <span><strong>24 hour rate:</strong></span>
            <input type="number" min="0" class="form-control" placeholder="Price for 24 hours" id="_24_hr" style="margin-bottom: 20px;">

            <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_save">Save</a>
          </div>
          <div class="col-sm-8">
            <div class="container" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_room_type">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             Type
                            </th>             
                            <th class="text-center">
                             3 hour rate
                            </th>
                            <th class="text-center">
                             6 hour rate
                            </th>
                            <th class="text-center">
                             12 hour rate
                            </th>
                            <th class="text-center">
                             24 hour rate
                            </th>
                          </tr>
                      </thead>                      
                    </table>
                 </div>
          </div>
        </div>
        <hr style="margin-left: 50px;margin-right: 50px;">
      </div>

      <div class="container" style="margin-bottom: 50px;">
        <div class="row">
          <div class="col-sm-4" style="padding: 15px 15px 15px 15px;">

            <div class=" section-title" >
                    <h2>Resort Settings</h2>
                    <p>Tour Type</p>
            </div>
            <span><strong>Tour type:</strong></span>
            <input type="text" class="form-control" placeholder="Tour type..." id="tourtype" style="margin-bottom: 20px;">

            <span><strong>Description:</strong></span>
            <input type="text" class="form-control" placeholder="Description" id="tourdescription" style="margin-bottom: 20px;">

            <span><strong>PAX:</strong></span>
            <input type="number" min="0" class="form-control" placeholder="PAX..." id="pax" style="margin-bottom: 20px;">

            <span><strong>Rate:</strong></span>
            <input type="number" min="0" class="form-control" placeholder="Rate..." id="rate" style="margin-bottom: 20px;">

            <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_save_resort">Save</a>
          </div>
          <div class="col-sm-8">
            <div class="container" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_tour_type">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             Tour
                            </th>             
                            <th class="text-center">
                             Description
                            </th>
                            <th class="text-center">
                             PAX
                            </th>
                            <th class="text-center">
                             Rate
                            </th>
                            
                          </tr>
                      </thead>                      
                    </table>
                 </div>
          </div>
        </div>
        <hr style="margin-left: 50px;margin-right: 50px;">
      </div>

      <div class="container" style="margin-bottom: 50px;">
        <div class="row">
          <div class="col-sm-12">
            <div class=" section-title" >
                    <h2>Additional Settings</h2>
                    <p>Excess Fees</p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-header">
                <h6>Exceeding Hour</h6>
              </div>
              <div class="card-body">
                <input class="form-control" type="number" id="exceedinghour" min="0" name="" placeholder="Rate for exceeding hour" value="<?php echo $hours; ?>">
              </div>
              <div class="card-footer">
                <a style="color:white;float: right;" class="btn btn-success" id="btn_update_hour">Update</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-header">
                <h6>Extra Person</h6>
              </div>
              <div class="card-body">
                <input class="form-control" type="number" id="extraperson" min="0" name="" placeholder="Rate for extra person" value="<?php echo $person; ?>">
              </div>
              <div class="card-footer">
                <a style="color:white;float: right;" class="btn btn-success" id="btn_update_person">Update</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-header">
                <h6>Extra Bed</h6>
              </div>
              <div class="card-body">
                <input class="form-control" type="number" id="extrabed" min="0" name="" placeholder="Rate for extra bed" value="<?php echo $bed; ?>">
              </div>
              <div class="card-footer">
                <a style="color:white;float: right;" class="btn btn-success" id="btn_update_bed">Update</a>
              </div>
            </div>
          </div>

        </div>
         <hr style="margin-left: 50px;margin-right: 50px;margin-top: 50px;">
      </div>

      <div class="container"  data-aos="fade-up">
         <div class="row">
           <div class="col-sm-4" style="padding: 20px 20px 0px 20px; background-color: whitesmoke;border-radius: 15px;box-shadow: 20px 20px 50px lightgrey;">
               <div class=" section-title">
                  <h2>Create frontdesk account</h2>
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
                    <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_create">Save</a>
                  </div>
                </div>
              </div>
           </div>

           <div class="col-sm-8">
            <div class="container" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_frontdesk">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             E-mail address
                            </th>             
                            <th class="text-center">
                             Name
                            </th>
                            <th class="text-center">
                             Birthday
                            </th>
                            <th class="text-center">
                             Contact
                            </th>

                            <th class="text-center">
                             Address
                            </th>
                            
                          </tr>
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
  var room_edit_id=0;
  var tour_edit_id=0;
  var commandStrRoom = '';
  var commandStrResort = '';
  var commandStrUser='';
  $(document).ready(function() {
    fetchRoomType();
    fetchResortTour();
    commandStrRoom = 'insert';
    commandStrResort = 'insert';
    commandStrUser='insert';
    fetchFrontDesk();
  });

  function fetchFrontDesk(){
    $('#tbl_frontdesk').DataTable().destroy();
  
   var dataTable1 = $('#tbl_frontdesk').DataTable({

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
     url:"functions/select_frontdesk.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}
  function fetchRoomType(){
    $('#tbl_room_type').DataTable().destroy();
  
   var dataTable1 = $('#tbl_room_type').DataTable({

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
     url:"functions/select_room_type_table.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}

function fetchResortTour(){
    $('#tbl_tour_type').DataTable().destroy();
  
   var dataTable1 = $('#tbl_tour_type').DataTable({

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
     url:"functions/select_tour_type.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}

$(document).on("click", "#btn_save", function() {
    if (commandStrRoom=='insert') {
      insertRoomType();
    }else if (commandStrRoom=='update'){
      updateRoomType();
    }
});

$(document).on("click", "#btn_edit", function() {
  room_edit_id = $(this).data('id');
  document.getElementById("roomtype").value = $(this).data('roomtype');
  document.getElementById("_3_hr").value = $(this).data('_3_hr');
  document.getElementById("_6_hr").value = $(this).data('_6_hr');
  document.getElementById("_12_hr").value = $(this).data('_12_hr');
  document.getElementById("_24_hr").value = $(this).data('_24_hr');
  commandStrRoom='update';
});

$(document).on("click", "#btn_delete", function() {
    var id = $(this).data('id');
    
    var other_data = 'id='+id;

     swal({
                    title: "Continue?",
                    text: "Do you want to delete this room type?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/delete_room_type.php?"+other_data, 
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
                            commandStrRoom='insert';
                            swal({title:"Success!",text: "Room type has been deleted.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchRoomType();             
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
function insertRoomType(){
    var roomtype = document.getElementById("roomtype").value.trim();
    var _3_hr = document.getElementById("_3_hr").value;
    var _6_hr = document.getElementById("_6_hr").value;
    var _12_hr = document.getElementById("_12_hr").value;
    var _24_hr = document.getElementById("_24_hr").value;
    

    if (roomtype =='' || _3_hr < 1 || _6_hr < 1 || _12_hr < 1 || _24_hr < 1) {
       swal({title:"Warning!",text: "Please complete the fields!", type:"error"}); 
       return;
    }

    var other_data = 'roomtype='+roomtype+
                     '&_3_hr='+_3_hr+
                     '&_6_hr='+_6_hr+
                     '&_12_hr='+_12_hr+
                     '&_24_hr='+_24_hr;

     swal({
                    title: "Continue?",
                    text: "Do you want to save this room type?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/insert_room_type.php?"+other_data, 
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
                            commandStrRoom='insert';
                            fetchRoomType();
                            swal({title:"Success!",text: "New room type has been saved.", type:"success"}).then(okay => {
                                    if (okay) {
                                                     
                                  }
                                    });
                        }else{
                           swal({title:"Warning!",text: "Room type already exist!", type:"error"});
                        }
                } 

          }); //end ajax
      } //end msg result
     }); // end swal
}

function updateRoomType(){
    var roomtype = document.getElementById("roomtype").value.trim();
    var _3_hr = document.getElementById("_3_hr").value;
    var _6_hr = document.getElementById("_6_hr").value;
    var _12_hr = document.getElementById("_12_hr").value;
    var _24_hr = document.getElementById("_24_hr").value;
    

    if (roomtype =='' || _3_hr < 1 || _6_hr < 1 || _12_hr < 1 || _24_hr < 1) {
       swal({title:"Warning!",text: "Please complete the fields!", type:"error"}); 
       return;
    }

    var other_data = 'roomtype='+roomtype+
                     '&_3_hr='+_3_hr+
                     '&_6_hr='+_6_hr+
                     '&_12_hr='+_12_hr+
                     '&_24_hr='+_24_hr+
                     '&id='+room_edit_id;

     swal({
                    title: "Continue?",
                    text: "Do you want to update this room type?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_room_type.php?"+other_data, 
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
                            fetchRoomType();
                            swal({title:"Success!",text: "Room type has been updated.", type:"success"}).then(okay => {
                                    if (okay) {
                                                    
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
  document.getElementById("roomtype").value='';
  document.getElementById("_3_hr").value=0;
  document.getElementById("_6_hr").value=0;
  document.getElementById("_12_hr").value=0;
  document.getElementById("_24_hr").value=0;
  commandStrRoom = 'insert';
  room_edit_id = 0;
}

$(document).on("click", "#btn_save_resort", function() {
  if (commandStrResort=='insert') {
    insertTourType();
  }else if(commandStrResort=='update'){
    updateTourType();
  }
});


function insertTourType(){
    var tourtype = document.getElementById("tourtype").value.trim();
    var tourdescription = document.getElementById("tourdescription").value.trim();
    var pax = document.getElementById("pax").value;
    var rate = document.getElementById("rate").value;
    

    if (tourtype =='' || tourdescription =='' || pax < 1 || rate < 1) {
       swal({title:"Warning!",text: "Please complete the fields!", type:"error"}); 
       return;
    }

    var other_data = 'tourtype='+tourtype+
                     '&tourdescription='+tourdescription+
                     '&pax='+pax+
                     '&rate='+rate;

     swal({
                    title: "Continue?",
                    text: "Do you want to save this resort tour type?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/insert_resort_tour.php?"+other_data, 
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
                            clearResortFields();
                            commandStrResort='insert';
                            fetchResortTour();
                            swal({title:"Success!",text: "New resort tour type has been saved.", type:"success"}).then(okay => {
                                    if (okay) {
                                                     
                                  }
                                    });
                        }else{
                           swal({title:"Warning!",text: "Tour type already exist!", type:"error"});
                        }
                } 

          }); //end ajax
      } //end msg result
     }); // end swal
}

function updateTourType(){
    var tourtype = document.getElementById("tourtype").value.trim();
    var tourdescription = document.getElementById("tourdescription").value.trim();
    var pax = document.getElementById("pax").value;
    var rate = document.getElementById("rate").value;
    

    if (tourtype =='' || tourdescription =='' || pax < 1 || rate < 1) {
       swal({title:"Warning!",text: "Please complete the fields!", type:"error"}); 
       return;
    }

    var other_data = 'tourtype='+tourtype+
                     '&tourdescription='+tourdescription+
                     '&pax='+pax+
                     '&rate='+rate+
                     '&id='+tour_edit_id;

     swal({
                    title: "Continue?",
                    text: "Do you want to update this resort tour type?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_resort_tour.php?"+other_data, 
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
                            clearResortFields();
                            commandStrResort='insert';
                            fetchResortTour();
                            swal({title:"Success!",text: "Resort tour type has been updated.", type:"success"}).then(okay => {
                                    if (okay) {
                                                     
                                  }
                                    });
                        }else{
                           swal({title:"Warning!",text: "Tour type already exist!", type:"error"});
                        }
                } 

          }); //end ajax
      } //end msg result
     }); // end swal
}

function clearResortFields(){
  document.getElementById("tourtype").value='';
  document.getElementById("tourdescription").value='';
  document.getElementById("pax").value=0;
  document.getElementById("rate").value=0; 
  commandStrResort='insert';
}

$(document).on("click", "#btn_edit_tour", function() {
  tour_edit_id = $(this).data('id');
  document.getElementById("tourtype").value = $(this).data('tourtype');
  document.getElementById("tourdescription").value = $(this).data('description');
  document.getElementById("pax").value = $(this).data('pax');
  document.getElementById("rate").value = $(this).data('price');
  commandStrResort='update';
});

$(document).on("click", "#btn_delete_tour", function() {
    var id = $(this).data('id');
    
    var other_data = 'id='+id;

     swal({
                    title: "Continue?",
                    text: "Do you want to delete this tour type?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/delete_tour_type.php?"+other_data, 
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
                            commandStrResort='insert';
                            fetchResortTour();
                            swal({title:"Success!",text: "Tour type has been deleted.", type:"success"}).then(okay => {
                                    if (okay) {
                                                      
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


$(document).on("click", "#btn_update_hour", function() {
   var exceedinghour = document.getElementById("exceedinghour").value;
    
    var other_data = 'exceedinghour='+exceedinghour;

     swal({
                    title: "Continue?",
                    text: "Do you want to update the rate of exceeding hour?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_exceeding_hour.php?"+other_data, 
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
                            
                            swal({title:"Success!",text: "Rate for exceeding hour has been successfully updated.", type:"success"}).then(okay => {
                                    if (okay) {
                                       window.location='system_settings.php';               
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


$(document).on("click", "#btn_update_person", function() {
   var extraperson = document.getElementById("extraperson").value;
    
    var other_data = 'extraperson='+extraperson;

     swal({
                    title: "Continue?",
                    text: "Do you want to update the rate of extra person?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_extra_person.php?"+other_data, 
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
                            
                            swal({title:"Success!",text: "Rate for extra person has been successfully updated.", type:"success"}).then(okay => {
                                    if (okay) {
                                       window.location='system_settings.php';               
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

$(document).on("click", "#btn_update_bed", function() {
   var extrabed = document.getElementById("extrabed").value;
    
    var other_data = 'extrabed='+extrabed;

     swal({
                    title: "Continue?",
                    text: "Do you want to update the rate of extra bed?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_extra_bed.php?"+other_data, 
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
                            
                            swal({title:"Success!",text: "Rate for extra bed has been successfully updated.", type:"success"}).then(okay => {
                                    if (okay) {
                                       window.location='system_settings.php';               
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

$(document).on("click", "#btn_create", function() {
   if(commandStrUser=='insert'){
    insertUser();
   }else if(commandStrUser=='update'){
    updatetUser();
   }
 });

function insertUser(){
   var email = document.getElementById("email").value.trim();
    var firstname = document.getElementById("firstname").value.trim();
    var middlename = document.getElementById("middlename").value.trim();
    var surname = document.getElementById("surname").value.trim();
    var birthday = document.getElementById("birthday").value.trim();
    var contact = document.getElementById("contact").value.trim();
    var address = document.getElementById("address").value.trim();
   
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

    if (age<18) {
       swal({title:"Warning!",text: "Under-age not allowed to create an account with Tropical Breeze Hotel Reservations.", type:"error"}); 
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


    if (email=='' || firstname=='' || surname=='' || birthday=='' || contact=='' || address=='' ) {
       swal({title:"Warning!",text: "Please complete the required fields for registration.", type:"error"}); 
       return;
    }

   

    var other_data = 'email='+email+
                     '&firstname='+firstname+
                     '&middlename='+middlename+
                     '&surname='+surname+
                     '&birthday='+birthday+
                     '&contact='+contact+
                     '&address='+address;

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
                      clearFieldsUser();
                      swal({title:"Success!",text: "Frontdesk account has been successfully created!", type:"success"}).then(okay => {
                              if (okay) {
                                    fetchFrontDesk();               
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: "Unable to register right now! Maybe your account already exist.", type:"error"}); 

                  }
              } 

        });
  
}

function updatetUser(){
    var email = document.getElementById("email").value.trim();
    var firstname = document.getElementById("firstname").value.trim();
    var middlename = document.getElementById("middlename").value.trim();
    var surname = document.getElementById("surname").value.trim();
    var birthday = document.getElementById("birthday").value.trim();
    var contact = document.getElementById("contact").value.trim();
    var address = document.getElementById("address").value.trim();
   
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

    if (age<18) {
       swal({title:"Warning!",text: "Under-age not allowed to create an account with Tropical Breeze Hotel Reservations.", type:"error"}); 
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


    if (email=='' || firstname=='' || surname=='' || birthday=='' || contact=='' || address=='' ) {
       swal({title:"Warning!",text: "Please complete the required fields for registration.", type:"error"}); 
       return;
    }

   

    var other_data = 'email='+email+
                     '&firstname='+firstname+
                     '&middlename='+middlename+
                     '&surname='+surname+
                     '&birthday='+birthday+
                     '&contact='+contact+
                     '&address='+address;
swal({
                    title: "Continue?",
                    text: "Do you want to update the information of this frontdesk?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/update_frontdesk.php?"+other_data, 
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
                      clearFieldsUser();
                      swal({title:"Success!",text: "Frontdesk account has been successfully updated!", type:"success"}).then(okay => {
                              if (okay) {
                                   fetchFrontDesk();                
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: "Unable to register right now! Maybe your account already exist.", type:"error"}); 

                  }
              } 

        });

      } //end msg result
     }); // end swal
  
}

 function _calculateAge() {
    event.preventDefault();
    var birthday = document.getElementById("birthday").value;
    birthday = new Date(birthday);
    
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);  
 }

$(document).on("click", "#btn_edit_user", function() {
  document.getElementById("email").value=$(this).data('email');
  document.getElementById("firstname").value=$(this).data('firstname');
  document.getElementById("middlename").value=$(this).data('middlename');
  document.getElementById("surname").value=$(this).data('surname');
  document.getElementById("birthday").value=$(this).data('birthday');
  document.getElementById("contact").value=$(this).data('contact');
  document.getElementById("address").value=$(this).data('address'); 
  document.getElementById("email").disabled=true;
  commandStrUser='update';
});

 function clearFieldsclearFieldsUser(){
  document.getElementById("email").value='';
  document.getElementById("firstname").value='';
  document.getElementById("middlename").value='';
  document.getElementById("surname").value='';
  document.getElementById("birthday").value='';
  document.getElementById("contact").value='';
  document.getElementById("address").value=''; 
  document.getElementById("email").disabled=false;
 }


 $(document).on("click", "#btn_delete_user", function() {
    var id = $(this).data('id');
    
    var other_data = 'id='+id;

     swal({
                    title: "Continue?",
                    text: "Do you want to delete this frontdesk information?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/delete_user.php?"+other_data, 
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
                            clearFieldsUser();
                            commandStrUser='insert';
                            swal({title:"Success!",text: "Frontdesk information has been deleted.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchFrontDesk();             
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
</script>