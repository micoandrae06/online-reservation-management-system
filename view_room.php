<?php
session_start();
$user_type='';
$guest_email='';
$guest_name='';
$guest_contact ='';
$guest_address ='';
if(empty($_SESSION['_usertype'])) {  
}else{
  $user_type =$_SESSION['_usertype']; 
  $guest_email=$_SESSION['_email'];
  $guest_name=$_SESSION['_first_name'] . ' ' .$_SESSION['_middle_name']. ' ' .$_SESSION['_surname'];
  $guest_contact =$_SESSION['_contact'];
  $guest_address =$_SESSION['_address'];
}
$roomid = $_GET["roomid"];
$img = $_GET["img"];
$roomtype = $_GET["roomtype"];
$description = $_GET["description"];
$_3_hr = $_GET["_3_hr"];
$_6_hr = $_GET["_6_hr"];
$_12_hr = $_GET["_12_hr"];
$_24_hr = $_GET["_24_hr"];

$person=0;
$bed=0;
$exceedinghour=0;

  require ("db_connection/myConn.php");
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

  <title>View Room | Tropical Breeze</title>
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
          <li><a class="nav-link active" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <?php
            if ($user_type=='Guest') {
              $output='<li><a class="nav-link " href="reservations.php">Reservations</a></li>
                       <li><a class="nav-link " href="cancellations.php">Cancellations</a></li>';
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
    <div class="container" style="margin-top: 95px;">
      <div class=" section-title" >
       
        <h2>Reserve a room</h2>
        <p><?php echo $roomid; ?></p>
      
      </div>
      <div class="row" id="room_container">
          <div class="col-sm-4" style="margin-bottom: 20px;">
            <img style="width: 100%;box-shadow: 20px 20px 50px grey;border-radius: 5px;" src="img-room/<?php echo $img;?>">
          </div>

          <div class="col-sm-4">
            <div class="card" style="padding: 20px 20px 20px 20px;margin-bottom: 20px;">
                <h5><strong><i><?php echo $roomtype; ?></i></strong></h5>
                <p>Description: <?php echo $description; ?></p>
                <h6>Room rates:</h6>
                <label>3 Hours <strong><i>(₱<?php echo number_format($_3_hr,2) ?>)</i></strong></label><br>
                <label>6 Hours <strong><i>(₱<?php echo number_format($_6_hr,2) ?>)</i></strong></label><br>
                <label>12 Hours <strong><i>(₱<?php echo number_format($_12_hr,2) ?>)</i></strong></label><br>
                <label>24 Hours <strong><i>(₱<?php echo number_format($_24_hr,2) ?>)</i></strong></label><br>
              </div>
          </div>

          <div class="col-sm-4">
            <div class="card" style="padding: 20px 20px 20px 20px;">
              <h5><strong>Reservation details</strong></h5>
              <span>Choose date:</span>
              <input class="form-control" type="date" name="" id="reservation_date" style="margin-bottom: 20px;" onkeydown="return false" onchange="checkHour();">
              <div style="margin-bottom: 20px;">
                <input type="radio" name="_hours" id="_3_hr" value="3" onchange="checkHour();">
                <label for="_3_hr">3 Hours <strong><i>(₱<?php echo number_format($_3_hr,2) ?>)</i></strong></label><br>
                <input type="radio" name="_hours" id="_6_hr" value="6" onchange="checkHour();">
                <label for="_6_hr">6 Hours <strong><i>(₱<?php echo number_format($_6_hr,2) ?>)</i></strong></label><br>
                <input type="radio" name="_hours" id="_12_hr" value="12" onchange="checkHour();">
                <label for="_12_hr">12 Hours <strong><i>(₱<?php echo number_format($_12_hr,2) ?>)</i></strong></label><br>
                <input type="radio" name="_hours" id="_24_hr" value="24" onchange="checkHour();">
                <label for="_24_hr">24 Hours <strong><i>(₱<?php echo number_format($_24_hr,2) ?>)</i></strong></label><br>
              </div>
              <span>Set the time of arrival:</span>
              <input class="form-control" type="time" name="" id="reservation_time" style="margin-bottom: 20px;" onkeydown="return false">
              
              <span>Extra person(₱<?php echo number_format($person,2) ?>)</span>
              <input id="personqty" class="form-control" type="number" style="margin-bottom: 20px;" min="0" onkeyup="computeTotal();" value="0">
              <span>Extra bed(₱<?php echo number_format($bed,2) ?>)</span>
              <input id="bedqty" class="form-control" type="number" style="margin-bottom: 20px;" min="0" onkeyup="computeTotal();" value="0">

              <span style="color:green;" ><strong id="total">Total:</strong></span><br>
              <span style="color:green;"><strong id="dp">Downpayment:</strong></span><br>
              <span>Paymenth method: <strong class="text-primary">G-cash</strong></span><br>
               <div style="margin-bottom:20px;"">
              <input type="checkbox" id="terms" onchange="checkEnable();">
              <label for="terms"> I have read the terms and condition</label> <strong style="cursor: pointer;" onclick="viewTerms();">(?)</strong>
              </div>
              <?php
                  if ($user_type=='Guest') {
                    $output=' <a class="btn btn-primary" style="font-style: bold;" id="btn_reserve">Reserve</a>';
                  }else{
                    $output=' <a href="login.php" class="btn btn-primary" style="font-style: bold;" >Reserve</a>';
                  }
                  echo $output;
              ?>
             
            </div>
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

</body>

</html>

<script type="text/javascript">
  var room_rate=0;
  var roomid = '<?=$roomid?>';
  var roomtype = '<?=$roomtype?>';
  var extra_person = '<?=$person?>';
  var extra_bed = '<?=$bed?>';
  var exceedinghour = '<?=$exceedinghour?>';
  var total=0;
  var downpayment = 0;
  var balance = 0;
  $(document).ready(function() {
    checkEnable();
    setMinDate();
  });

  function setMinDate(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

   
    $('#reservation_date').attr('min', maxDate);
}
$(document).on("change", "#reservation_time", function() {
   var _date = document.getElementById("reservation_date").value;
   if (_date=='') {
     this.value='';
    swal({title:"Warning!",text: "Please set the date before setting the time!", type:"error"}); 
       return;
  }
  checkHour();
});
$(document).on("click", "#btn_reserve", function() {

  var guest_email = '<?=$guest_email?>';
  var guest_name = '<?=$guest_name?>';
  var guest_contact = '<?=$guest_contact?>';
  var guest_address = '<?=$guest_address?>';
  var hours = $('input[name="_hours"]:checked').val();
  var _date = document.getElementById("reservation_date").value;
  var _time = document.getElementById("reservation_time").value;
  var personqty = document.getElementById("personqty").value;
  var bedqty = document.getElementById("bedqty").value;
  if (_date=='' || _time=='' || hours==0){
    swal({title:"Warning!",text: "Please set the date and time and set how long you will stay!", type:"error"}); 
       return;
  }
  
 swal({
                    title: "Continue?",
                    text: "Do you want to reserve this room?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
var data = new FormData();
data.append("x-public-key", "pk_5865b7af3b2cb754791c8b02c2d83f67");
data.append("amount", downpayment);
data.append("description", "Payment for room reservation");
data.append("customername", guest_name);
data.append("customeremail", guest_email);
data.append("customermobile", guest_contact);
data.append("redirectsuccessurl", "http://localhost/Tropical Breeze/room_reservation_success.php");
var xhr = new XMLHttpRequest();
xhr.withCredentials = false;

xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
    console.log(this.responseText);
   var tayte = JSON.parse(this.responseText);
   var other_data ='transaction_num='+tayte.data.hash+
                  '&_date='+_date+
                  '&_time='+_time+
                  '&_hours='+hours+
                  '&rate='+room_rate+
                  '&roomid='+roomid+
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
                  '&total_amount='+total+
                  '&payment='+downpayment+
                  '&balance='+balance+
                  '&gcash_code='+tayte.data.code;
               
             $.ajax({

             url:"functions/insert_reservation.php?"+other_data, 
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
                      window.location=tayte.data.checkouturl;
                   }        
             } 

   }); //end ajax     
   // window.location=tayte.data.checkouturl;

  }
});

xhr.open("POST", "https://g.payx.ph/payment_request");

xhr.send(data);
  } //end msg result
     }); // end swal
});

function checkHour(){
  var hours = $('input[name="_hours"]:checked').val();
  var _date = document.getElementById("reservation_date").value;
  var _time = document.getElementById("reservation_time").value;
  if (hours==undefined){
    document.getElementById("reservation_time").value='';
    swal({title:"Warning!",text: "Please choose an hour before setting the time!", type:"error"}); 
       return;
  }
  if (hours==3) {
    room_rate = '<?=$_GET["_3_hr"]?>';
  }else if (hours==6) {
    room_rate = '<?=$_GET["_6_hr"]?>';
  }else if (hours==12) {
    room_rate = '<?=$_GET["_12_hr"]?>';
  }else if (hours==24) {
    room_rate = '<?=$_GET["_24_hr"]?>';
  }
  if (_date !='' && _time !='') {
  var other_data = '_date='+_date+'&_time='+_time+'&_hours='+hours+'&roomid='+roomid;

   $.ajax({

             url:"functions/check_room_availability.php?"+other_data, 
             type:"POST",  
             contentType:false,
             cache:false,
             processData:false,

             beforeSend:function() {

             },  
             error:function(data){
                                                     
             }, 
             success:function(data){   
                   if (data.includes('available')) {
                      computeTotal();
                   }else{
                    swal({title:"Warning!",text: "Date/time is already taken! Choose another date or time.", type:"error"}); 
                    document.getElementById("reservation_time").value='';
                   }         
             } 

   }); //end ajax
 }

}

function computeTotal(){
    var personqty = document.getElementById("personqty").value;
    var bedqty = document.getElementById("bedqty").value;
    if(room_rate!=0){
    total = parseFloat(room_rate) + parseFloat(personqty*extra_person) + parseFloat(bedqty*extra_bed);
    downpayment = total/2;
    balance = total - downpayment;
    document.getElementById("total").textContent='Total: ₱'+total;
    document.getElementById("dp").textContent='Downpayment: ₱'+downpayment;
  }
}

function viewTerms(){

    swal({title:"Terms and conditions",text: "Tropical Breeze Hotel and Resort has a goal to provide our guests with a clean and fully functional accommodations. The terms and conditions are provided to ensure that these services are kept in this condition for all of our guests. Please read them carefully, and understand that Payment of the booking will be the acceptance of the terms and conditions. CANCELLATION: The 50% down-payment for the reservation is non-refundable. Cancellations before the day of arrival, no shows or early departures after check-in will result in a 100% loss of all funds remitted to Tropical Breeze Hotel and Resort. If guest has to shorten their stay or change their unit after the final payment due date, normal payment transaction apply, whether hotel room was accommodated or not.  If guest shortens their stay resulting in an early departure after they have checked in, no refunds will be provided for the hours not used. If a non-arrival, late arrival, early departure, cancellation, or alteration results in a loss of revenue to Tropical Breeze Hotel and Resort, it will be charged.  The loss can be avoided if the recommended stay hours in the reservation will be reserved and there is an exceeding payment for every hour of staying. In the event such as adverse weather, typhoon, fire, flood, etc., the management and owners are not responsible for any refunds from monies which have been paid to Tropical Breeze Hotel and Resort, or for providing lodging elsewhere.", type:"info"}); 

  }
function checkEnable(){
 var terms =  document.getElementById("terms");
 if (terms.checked==true) {
  document.getElementById("btn_reserve").disabled=false;
 }else{
   document.getElementById("btn_reserve").disabled=true;
 }
}
</script>