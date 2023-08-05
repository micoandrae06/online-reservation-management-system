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
}
$person=0;
$bed=0;
$exceedinghour=0;

  require ("../db_connection/myConn.php");
  $sql = "SELECT `_id`, `_exceeding_hour`, `_extra_person`, `_extra_bed` FROM `tbl_rates`";
  $result= $con_str->query($sql);
  $output='';
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $person = $row["_extra_person"];
        $bed = $row["_extra_bed"];
        $exceedinghour = $row["_exceeding_hour"];
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lodging | Administrator</title>
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
          <li><a class="nav-link active" href="lodging.php">Lodging</a></li>
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
    <div class="container" style="margin-top: 100px;">
      <div class=" section-title" >
        <center>
        <h2>Tropical Breeze Hotel & Resort</h2>
        <p>Guest Lodging</p>
        </center>
      </div>
      <div>
      <ul class="nav nav-tabs">
        <li class="nav-link active" id="room_link"><a href="#"  onclick="opentab1();">Room</a></li>
        <li class="nav-link" id="resort_link"><a  href="#" onclick="opentab2(); fetchResortReservations();">Resort</a></li>
      </ul>
      <div class="" id="room" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
        <div class="row">
          <h6><strong>For walk-in</strong></h6>
          <div class="col-sm-4">
            <span>Choose room type:</span>
            <select class="form-control" style="margin-bottom: 20px;" id="opt_room_type" onchange="fetchRoomRate();fetchAvailableRoom();computeTotal();">
              <optgroup id="opt_container"></optgroup>
            </select>
            <span>Choose room:</span>
            <select class="form-control" style="margin-bottom: 20px;" id="room_id" onchange="computeTotal();">
              <optgroup id="opt_room_id"></optgroup>
            </select>
            <span>Room rate:</span>
            <div id="rate_container"></div>
          </div>
          <div class="col-sm-4">
            <span>Guest name:</span>
            <input class="form-control" type="text" name="" style="margin-bottom: 20px;" id="guest_name">
             <span>Guest address:</span>
            <input class="form-control" type="text" name="" style="margin-bottom: 20px;" id="guest_address">
             <span>Guest contact:</span>
            <input class="form-control" type="text" name="" style="margin-bottom: 20px;" id="guest_contact">
             <span>Guest email:</span>
            <input class="form-control" type="email" name="" style="margin-bottom: 20px;" id="guest_email">

          </div>

          <div class="col-sm-4">
            <span>Extra person:</span>
            <input class="form-control" min="0" value="0" type="number" name="" style="margin-bottom: 20px;" id="personqty" onchange="computeTotal();" onkeyup="computeTotal();">
            <span>Extra bed:</span>
            <input class="form-control" min="0" value="0" type="number" name="" style="margin-bottom: 20px;" id="bedqty" onchange="computeTotal();" onkeyup="computeTotal();">
            <span style="color:green;" ><strong id="total">Total:</strong></span><br>
            <a class="btn btn-success" style="float: right;" id="btn_room_checkin">Check-in</a>
          </div>
          
        </div>
        <hr style="margin-left: 50px;margin-right: 50px;">
                    <table class="table table-striped table-bordered" id="tbl_reservations">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             Transaction#
                            </th>
                            <th class="text-center">
                             Guest
                            </th>
                            <th class="text-center">
                             Date
                            </th>             
                            <th class="text-center">
                             Checked-in Time
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
                             Exceeding hour
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

                 <div class="" id="resort" style="display:none;background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                  <div class="row">
          <h6><strong>For walk-in</strong></h6>
          <div class="col-sm-4">
            <span>Choose tour type:</span>
            <select class="form-control" style="margin-bottom: 20px;" id="tour">
              <optgroup id="tour_container"></optgroup>
            </select>

            <span>Choose resort:</span>
            <select class="form-control" style="margin-bottom: 20px;" id="resortid">
              <optgroup id="resort_container"></optgroup>
            </select>

            <div id="pax_container"></div>
           
          </div>
          <div class="col-sm-4">
            <span>Guest name:</span>
            <input class="form-control" type="text" name="" style="margin-bottom: 20px;" id="resort_guest_name">
             <span>Guest address:</span>
            <input class="form-control" type="text" name="" style="margin-bottom: 20px;" id="resort_guest_address">
            

          </div>
          <div class="col-sm-4">
             <span>Guest contact:</span>
            <input class="form-control" type="text" name="" style="margin-bottom: 20px;" id="resort_guest_contact">
             <span>Guest email:</span>
            <input class="form-control" type="email" name="" style="margin-bottom: 20px;" id="resort_guest_email">
             <span style="color:green;" ><strong id="resort_total">Total:</strong></span><br>
            <a class="btn btn-success" style="float: right;" id="btn_checkin_resort">Check-in</a>
          </div>

          
          
        </div>
        <hr style="margin-left: 50px;margin-right: 50px;">
                    <table class="table table-striped table-bordered table-responsive" id="tbl_reservations_resort">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             Guest
                            </th>
                            <th class="text-center">
                             Transaction#
                            </th>
                            <th class="text-center">
                             Date
                            </th>             
                           <th class="text-center">
                             Checked-in Time
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
  

  </main>

  <div class="modal fade" tabindex="-1" role="dialog" id="modalExtra">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add extra fees?</h5>
        <button type="button" class="btn" data-dismiss="modal" aria-label="Close" onclick="hideModalExtra();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Extra person</h6>
        <input class="form-control" type="number" name="" id="add_extra_person" value="0" mins ="0">
        <h6>Extra hour</h6>
        <input class="form-control" type="number" name="" id="add_extra_hour" value="0" mins ="0">
        <h6>Extra bed</h6>
        <input class="form-control" type="number" name="" id="add_extra_bed" value="0" mins ="0">
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModalExtra();">Close</button>
        <button type="button" class="btn btn-primary" id="btn_submit_extra">Submit</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalRoomCheckout">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Check-out?</h5>
        <button type="button" class="btn" data-dismiss="modal" aria-label="Close" onclick="hideModalRoom();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 id="room_total">Total</h6>
        <h6 id="room_balance">Balance</h6>
        <h6>Payment</h6>
        <input class="form-control" type="number" name="" id="room_payment" onchange="computeRoomBalance();" onkeyup="computeRoomBalance();">
        <h6 id="room_change">Change</h6>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModalRoom();">Close</button>
        <button type="button" class="btn btn-primary" id="btn_checkout">Submit</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalResortCheckout">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Check-out?</h5>
        <button type="button" class="btn" data-dismiss="modal" aria-label="Close" onclick="hideModalResort();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 id="resort_total_checkout">Total</h6>
        <h6 id="resort_balance">Balance</h6>
        <h6>Payment</h6>
        <input class="form-control" type="number" name="" id="resort_payment" onchange="computeResortBalance();" onkeyup="computeResortBalance();">
        <h6 id="resort_change">Change</h6>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModalResort();">Close</button>
        <button type="button" class="btn btn-primary" id="btn_checkout_resort">Submit</button>
      </div>
    </div>
  </div>
</div>
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
  var room_rate=0;
  var extra_person = '<?=$person?>';
  var extra_bed = '<?=$bed?>';
  var exceedinghour = '<?=$exceedinghour?>';
  var total=0;
  $(document).ready(function() {
    fetchReservations();
    fetchRoomType();
    fetchTour();
    fetchResortID();
  });

   function fetchTour(){
    $.ajax({

             url:"functions/select_tour_type_opt.php", 
             type:"POST",  
             contentType:false,
             cache:false,
             processData:false,

             beforeSend:function() {

             },  
             error:function(data){
                                                     
             }, 
             success:function(data){   
                   document.getElementById("tour_container").innerHTML=data;
             } 

   }); //end ajax
  }

  function fetchRoomType(){
    $.ajax({

                    url:"functions/fecth_room_type.php", 
                    type:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   
                      document.getElementById("opt_container").innerHTML=data;                
                    } 

          }); //end ajax
  }

  function fetchResortID(){
    $.ajax({

                    url:"functions/fetch_resort_id.php", 
                    type:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   
                      document.getElementById("resort_container").innerHTML=data;                
                    } 

          }); //end ajax
  }

  function fetchRoomRate(){
    room_rate =0;
    hours = 0;
    var roomtype =document.getElementById("opt_room_type").value; 
    $.ajax({

             url:"functions/select_room_rate.php?roomtype="+roomtype, 
             type:"POST",  
             contentType:false,
             cache:false,
             processData:false,

             beforeSend:function() {

             },  
             error:function(data){
                                                     
             }, 
             success:function(data){   
                   document.getElementById("rate_container").innerHTML=data;
             } 

   }); //end ajax
  }

  function fetchAvailableRoom(){
    var roomtype =document.getElementById("opt_room_type").value;
    $.ajax({

                    url:"functions/fetch_available_room.php?roomtype="+roomtype, 
                    type:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){  
                      document.getElementById("opt_room_id").innerHTML=data;                
                    } 

          }); //end ajax
  }

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
     url:"functions/select_room_checkedin.php",
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
     url:"functions/select_resort_checkedin.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}
 


 function opentab1(){
  document.getElementById("room").style.display='inherit';
  document.getElementById("resort").style.display='none';
  document.getElementById("room_link").classList.add('active');
  document.getElementById("resort_link").classList.remove('active');
 }
 function opentab2(){
  document.getElementById("room").style.display='none';
  document.getElementById("resort").style.display='inherit';
  document.getElementById("room_link").classList.remove('active');
  document.getElementById("resort_link").classList.add('active');
 }

  

  $(document).on("click", "#btn_checkout_resort", function() {
  var id =$(this).data('id');
  

  var other_data = 'id='+id;

  swal({
                    title: "Continue?",
                    text: "Do you want to check-out this resort guest?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/resort_checkout.php?"+other_data, 
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
                            swal({title:"Success!",text: "Guest has been checked-out.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchResortReservations();             
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
 var hours =0;
  function getRoomrate(){
   hours = $('input[name="_hours"]:checked').val();
   room_rate =  $('input[name="_hours"]:checked').data('rate');
   computeTotal();
  }

  function computeTotal(){
    var personqty = document.getElementById("personqty").value;
    var bedqty = document.getElementById("bedqty").value;
    if(room_rate!=0){
    total = parseFloat(room_rate) + parseFloat(personqty*extra_person) + parseFloat(bedqty*extra_bed);

    document.getElementById("total").textContent='Total: ₱'+total;
  }else{
    total=0;
     document.getElementById("total").textContent='Total: ';
  }
}

$(document).on("click", "#btn_room_checkin", function() {
  
  var personqty = document.getElementById("personqty").value;
  var bedqty = document.getElementById("bedqty").value;
  var guest_name = document.getElementById("guest_name").value;
  var guest_email = document.getElementById("guest_email").value;
  var guest_address = document.getElementById("guest_address").value;
  var guest_contact = document.getElementById("guest_contact").value;
  var roomtype =document.getElementById("opt_room_type").value.trim();
  var room_id =document.getElementById("room_id").value.trim();
var other_data =  '_hours='+hours+
                  '&rate='+room_rate+
                  '&roomid='+room_id+
                  '&roomtype='+roomtype+
                  '&guest_email='+guest_email+
                  '&guest_name='+guest_name+
                  '&guest_contact='+guest_contact+
                  '&guest_address='+guest_address+
                  '&extra_person_rate='+extra_person+
                  '&extra_person='+personqty+
                  '&extra_bed_rate='+extra_bed+
                  '&extra_bed='+bedqty+
                  '&exceeding_hours_rate='+exceedinghour+
                  '&total_amount='+total;
  if (total<1  || room_rate<1 || roomtype=='' || room_id =='' ){
      swal({title:"Warning!",text: "Please complete the required fields!", type:"error"}); 
       return;
  }

  swal({
                    title: "Continue?",
                    text: "Do you want to confirm this Check-in?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/walkin_room_checkin.php?"+other_data, 
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
                            swal({title:"Success!",text: "Guest has been checked-in.", type:"success"}).then(okay => {
                                    if (okay) {
                                        window.location="lodging.php";           
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
  function fetchPax(tourtype){
    $.ajax({

             url:"functions/select_pax.php?tourtype="+tourtype, 
             type:"POST",  
             contentType:false,
             cache:false,
             processData:false,

             beforeSend:function() {

             },  
             error:function(data){
                                                     
             }, 
             success:function(data){   
                   document.getElementById("pax_container").innerHTML=data;
             } 

   }); //end ajax
  }
var resort_rate = 0;
  $(document).on("change", "#tour", function() {
    resort_rate=0;
    var tourtype = document.getElementById("tour").value;
    fetchPax(tourtype);
    computeTotalResort();

  });
var pax= 0;
var resort_total = 0;
   function checkRate(){
    resort_rate=0;
    resort_rate = $('input[name="_pax"]:checked').data('price');
    pax = $('input[name="_pax"]:checked').val() + " pax";
    computeTotalResort();
  }

  function computeTotalResort(){
   resort_total = 0;
  if(resort_rate!=0){
    resort_total = parseFloat(resort_rate);
   
    document.getElementById("resort_total").textContent='Total: ₱'+resort_total;
  
  }else{
    resort_total =0;
 
    document.getElementById("resort_total").textContent='Total:';
  }

}

$(document).on("click", "#btn_checkin_resort", function() {
  var tourtype = document.getElementById("tour").value;
  var resortid = document.getElementById("resortid").value;
  var guest_name = document.getElementById("resort_guest_name").value;
  var guest_email = document.getElementById("resort_guest_email").value;
  var guest_address = document.getElementById("resort_guest_address").value;
  var guest_contact = document.getElementById("resort_guest_contact").value;
  var roomtype =document.getElementById("opt_room_type").value.trim();
  var room_id =document.getElementById("room_id").value.trim();
  var other_data = 'rate='+resort_rate+
                  '&resortid='+resortid+
                  '&tourtype='+tourtype+
                  '&guest_email='+guest_email+
                  '&guest_name='+guest_name+
                  '&guest_contact='+guest_contact+
                  '&guest_address='+guest_address+
                  '&total_amount='+resort_total+
                  '&payment='+resort_total;
  if (tourtype==''  || resort_rate<1 || resortid == ''){
      swal({title:"Warning!",text: "Please complete the required fields!", type:"error"}); 
       return;
  }

  swal({
                    title: "Continue?",
                    text: "Do you want to confirm this resoryt check-in?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/walkin_resort_checkin.php?"+other_data, 
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
                            swal({title:"Success!",text: "Guest has been checked-in.", type:"success"}).then(okay => {
                                    if (okay) {
                                        window.location="lodging.php";           
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

function showModalExtra(){
  $('#modalExtra').modal('show');
 }
 function hideModalExtra(){
  $('#modalExtra').modal('hide');
 }

 function showModalRoom(){
  $('#modalRoomCheckout').modal('show');
  checkout_room_id = '';
  transaction_id=0;
  room_total_checkout =0;
  room_balance_checkout =0;
  room_payment_checkout = 0;
  document.getElementById("room_payment").value = 0;
 }
 function hideModalRoom(){
  $('#modalRoomCheckout').modal('hide');
 }

 function showModalResort(){
  transaction_id_resort = '';
  resort_total_checkout =0;
  resort_balance_checkout = 0;
  resort_payment_checkout = 0;      
  document.getElementById("resort_payment").value=0;
  $('#modalResortCheckout').modal('show');
 
  document.getElementById("resort_payment").value = 0;
 }
 function hideModalResort(){
  $('#modalResortCheckout').modal('hide');
 }

 var add_extra_id = 0;
 $(document).on("click", "#btn_add_extra", function() {
    add_extra_id = $(this).data('id');
 });
 $(document).on("click", "#btn_submit_extra", function() {
  
  var add_extra_hour = document.getElementById("add_extra_hour").value;
  var add_extra_bed = document.getElementById("add_extra_bed").value;
  var add_extra_person = document.getElementById("add_extra_person").value;

  var other_data = 'extra_hour='+add_extra_hour+
                  '&extra_bed='+add_extra_bed+
                  '&extra_person='+add_extra_person+
                  '&id='+add_extra_id+
                  '&extra_person_rate='+extra_person+
                  '&extra_bed_rate='+extra_bed+
                  '&exceeding_hours_rate='+exceedinghour;
  

if (add_extra_hour <1 && add_extra_bed <1 && add_extra_person <1){
      swal({title:"Warning!",text: "No changes!", type:"error"}); 
       return;
  }

  swal({
                    title: "Continue?",
                    text: "Do you want to confirm this additional fees?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/add_extra.php?"+other_data, 
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
                            swal({title:"Success!",text: "Additional fees has been successfully added.", type:"success"}).then(okay => {
                                    if (okay) {
                                      document.getElementById("add_extra_hour").value=0;
                                      document.getElementById("add_extra_bed").value=0;
                                      document.getElementById("add_extra_person").value=0;
                                      add_extra_id = 0;
                                      fetchReservations();    
                                      hideModalExtra();      
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

  var checkout_room_id = '';
  var transaction_id=0;
  var room_total_checkout =0;
  var room_balance_checkout =0;
  var room_payment_checkout=0;

  function computeRoomBalance(){
    room_payment_checkout = document.getElementById("room_payment").value;
    var change =room_payment_checkout -  room_balance_checkout ;
    if (change>=0){
      document.getElementById("room_change").textContent='Change: ₱'+change;
    }else{
      document.getElementById("room_change").textContent='Change';
    }
  }

 $(document).on("click", "#btn_modal_checkout", function() {
    checkout_room_id = $(this).data('roomid');
    transaction_id = $(this).data('id');
    room_total_checkout = $(this).data('total');
    room_balance_checkout = $(this).data('balance');
    document.getElementById("room_total").textContent='Total: ₱'+room_total_checkout;
    document.getElementById("room_balance").textContent='Balance: ₱'+room_balance_checkout;
 });

 $(document).on("click", "#btn_checkout", function() {
  room_payment_checkout = document.getElementById("room_payment").value;
  if (room_payment_checkout<room_balance_checkout) {
    swal({title:"Warning!",text: "Insufficient payment!", type:"error"}); 
       return;
  }

  var id = transaction_id;
  var roomid = checkout_room_id;
  
  var other_data = 'id='+id+'&roomid='+roomid;
 
  swal({
                    title: "Continue?",
                    text: "Do you want to check-out this guest?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/room_checkout.php?"+other_data, 
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
                            swal({title:"Success!",text: "Guest has been checked-out.", type:"success"}).then(okay => {
                                    if (okay) {
                                      checkout_room_id = '';
                                      transaction_id=0;
                                      room_total_checkout =0;
                                      room_balance_checkout =0;
                                      room_payment_checkout = 0;
                                      document.getElementById("room_payment").value = 0;
                                          fetchReservations(); 
                                           document.getElementById("room_total").textContent='Total';
                                          document.getElementById("room_balance").textContent='Balance';
                                          hideModalRoom();            
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

var transaction_id_resort = '';
var resort_total_checkout =0;
var resort_balance_checkout = 0;
var resort_payment_checkout = 0;
function computeResortBalance(){
    resort_payment_checkout = document.getElementById("resort_payment").value;
    var change =resort_payment_checkout -  resort_balance_checkout ;
    if (change>=0){
      document.getElementById("resort_change").textContent='Change: ₱'+change;
    }else{
      document.getElementById("resort_change").textContent='Change';
    }
  }
  $(document).on("click", "#btn_modal_resort", function() {

    transaction_id_resort = $(this).data('id');
    resort_total_checkout = $(this).data('total');
    resort_balance_checkout = $(this).data('balance');
    document.getElementById("resort_total_checkout").textContent='Total: ₱'+resort_total_checkout;
    document.getElementById("resort_balance").textContent='Balance: ₱'+resort_balance_checkout;
 });

 $(document).on("click", "#btn_checkout_resort", function() {
  resort_payment_checkout = document.getElementById("resort_payment").value;
  if (resort_payment_checkout<resort_balance_checkout) {
    swal({title:"Warning!",text: "Insufficient payment!", type:"error"}); 
       return;
  }
  var id =transaction_id_resort;
  

  var other_data = 'id='+id;

  swal({
                    title: "Continue?",
                    text: "Do you want to check-out this resort guest?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/resort_checkout.php?"+other_data, 
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
                            swal({title:"Success!",text: "Guest has been checked-out.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchResortReservations(); 
                                          transaction_id_resort = '';
                                          resort_total_checkout =0;
                                          resort_balance_checkout = 0;
                                          resort_payment_checkout = 0;      
                                          document.getElementById("resort_payment").value=0;document.getElementById("resort_total_checkout").textContent='Total';
                                          document.getElementById("resort_change").textContent='Change';  
                                           document.getElementById("resort_balance").textContent='Balance';
                                          hideModalRoom();
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