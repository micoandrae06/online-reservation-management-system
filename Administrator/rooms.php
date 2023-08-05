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

  <title>Rooms | Administrator</title>
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
          <li><a class="nav-link active" href="rooms.php">Rooms</a></li>
          <li><a class="nav-link" href="resort.php">Resort</a></li>
          <li><a class="nav-link" href="lodging.php">Lodging</a></li>
          <li><a class="nav-link" href="reservations.php">Reservations</a></li> 
          <li><a class="nav-link" href="cancellations.php">Cancellations</a></li>     
          <li><a class="nav-link " href="tropi.php">Tropi</a></li>  
          <li><a class="nav-link " href="report.php">Report</a></li>   
          <?php
            if ($user_type=='Administrator') {
             $output=' <li class="dropdown"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down"></i></a>
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
                    <h2>Rooms</h2>
                    <p>Room Information</p>
            </div>
            <center>  
                <img class="" id="image_add" src="../assets/img/no-img.png" style="height: 200px; width: 200px;border-radius: 15px;box-shadow: 20px 20px 50px lightgrey;" >
                 <div class="col-sm-12" style="margin-left: 0px; margin-top: 15px; margin-bottom: 15px;">
                      <label class="btn btn-secondary" style="color:#fff; border-radius:8px;">
                      <input class="form-control" type="hidden" name="size" value="10000000">
                      <center>Browse<input type="file" id="file_add" name="image" style="display: none;"></center>
                      </label>
                  </div>
            </center>

            <span><strong>Room id / name:</strong></span>
            <input type="text" class="form-control" placeholder="Room id / name..." id="roomid" style="margin-bottom: 20px;">

            <span><strong>Type of room:</strong></span>
            <select class="form-control" style="margin-bottom: 20px;" id="roomtype">
              <optgroup id="opt_container">
                <option selected="" hidden="" value="">Please select room type...</option>
              </optgroup>
            </select>

            <span><strong>Description:</strong></span>
            <textarea class="form-control" style="margin-bottom: 20px;" id="description"></textarea>


            <a class="btn btn-secondary col-sm-3" style="float: right;background-color: rgb(255,74,23);" id="btn_save">Save</a>
          </div>
          <div class="col-sm-8">
            <div class="container" style="background-color: whitesmoke;padding: 15px 15px 15px 15px; border-radius: 10px;">
                    <table class="table table-striped table-bordered" id="tbl_rooms">
                      <thead class="">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             Image
                            </th>
                            <th class="text-center">
                             Room ID
                            </th>             
                            <th class="text-center">
                             Room Type
                            </th>
                            <th class="text-center">
                             Description
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
  var commandStr = '';
  var edit_id=0;
  $(document).ready(function() {
    fetchRooms();
    fetchRoomType();
    commandStr = 'insert';
  });
  $(document).on("change", "#file_add", function() {
    event.preventDefault();
 
    //get file details
      var property = this.files[0];
      var image_name = property.name;
      var image_extension = image_name.split('.').pop().toLowerCase();
      var image_size = property.size;

    //filter extension
    if(jQuery.inArray(image_extension, ['gif','png','jpg','jpeg'])==-1) {

            swal({
                  title: "Invalid File Type!",
                  text: "Image must be in 'gif','png','jpg','jpeg' format!",
                  type: "error",
                  showCancelButton: false,
                  confirmButtonColor: "#5cb85c",
                  confirmButtonText: '<span class="glyphicon glyphicon-ok"></span>&nbspProceed',
                  confirmButtonClass: "btn"
                  }).then((result) => {
                  if (result.value) {
                      this.value="";
                      document.getElementById("image_add").src="../assets/img/no-img.png";
                  }
                  });

    }

    //filter size
    else if(image_size>2000000) {

            swal({
                  title: "Invalid File Size!",
                  text: "Please select an image with size lower than 2MB!",
                  type: "error",
                  showCancelButton: false,
                  confirmButtonColor: "#5cb85c",
                  confirmButtonText: '<span class="glyphicon glyphicon-ok"></span>&nbspProceed',
                  confirmButtonClass: "btn"
                  }).then((result) => {
                  if (result.value) {

                      this.value="";
                      document.getElementById("image_add").src="../assets/img/no-img.png";

                  }
                  });
      
    } 

    else if(this.files && this.files[0]) {
      document.getElementById("image_add").classList.remove("required-fields");
      var obj = new FileReader();
      obj.onload = function(data) { document.getElementById("image_add").src = data.target.result; }
      obj.readAsDataURL(this.files[0]);
    }

   }); 

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

  function insertRoom(){
    var roomid = document.getElementById("roomid").value.trim();
    var roomtype = document.getElementById("roomtype").value.trim();
    var description = document.getElementById("description").value.trim();
    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add",file_property);

    if (roomid =='' || roomtype =='' || description =='' || image =='') {
       swal({title:"Warning!",text: "Please complete the fields!", type:"error"}); 
       return;
    }

    var other_data = 'roomid='+roomid+
                     '&roomtype='+roomtype+
                     '&description='+description+
                     '&image_name='+new Date().getTime();

     swal({
                    title: "Continue?",
                    text: "Do you want to save this room?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/insert_room.php?"+other_data, 
                    type:"POST",  
                    data:fd,
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   
                        if (data.includes('200')) { 
                            commandStr='insert';
                            clearFields();
                            fetchRooms();
                            swal({title:"Success!",text: "New room type has been saved.", type:"success"}).then(okay => {
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

function updateRoom(){
    var roomid = document.getElementById("roomid").value.trim();
    var roomtype = document.getElementById("roomtype").value.trim();
    var description = document.getElementById("description").value.trim();
    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add",file_property);

    if (roomid =='' || roomtype =='' || description =='') {
       swal({title:"Warning!",text: "Please complete the fields!", type:"error"}); 
       return;
    }

    var other_data = 'roomid='+roomid+
                     '&roomtype='+roomtype+
                     '&description='+description+
                     '&image_name='+new Date().getTime();

     swal({
                    title: "Continue?",
                    text: "Do you want to update this room?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/update_room.php?"+other_data, 
                    type:"POST",  
                    data:fd,
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {

                    },  
                    error:function(data){
                                                     
                    }, 
                    success:function(data){   
                        if (data.includes('200')) { 
                            commandStr='insert';
                            clearFields();
                            fetchRooms();
                            swal({title:"Success!",text: "Room information has been successfully updated.", type:"success"}).then(okay => {
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
  document.getElementById("roomid").value = '';
  document.getElementById("roomtype").value = '';
  document.getElementById("description").value = '';
  document.getElementById("image_add").src="../assets/img/no-img.png";
  document.getElementById("roomid").disabled=false;
  commandStr = 'insert';
}

$(document).on("click", "#btn_save", function() {
    if (commandStr=='insert') {
      insertRoom();
    }else if (commandStr=='update'){
      updateRoom();
    }
});

$(document).on("click", "#btn_edit", function() {
  edit_id = $(this).data('id');
  document.getElementById("roomid").value = $(this).data('roomid');
  document.getElementById("roomtype").value = $(this).data('roomtype');
  document.getElementById("description").value = $(this).data('description');
  document.getElementById("image_add").src="../img-room/"+$(this).data('img');
  document.getElementById("roomid").disabled=true;
  commandStr='update';
});

function fetchRooms(){
    $('#tbl_rooms').DataTable().destroy();
  
   var dataTable1 = $('#tbl_rooms').DataTable({

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
     url:"functions/select_rooms.php",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}

$(document).on("click", "#btn_delete", function() {
    var id = $(this).data('id');
    
    var other_data = 'id='+id;

     swal({
                    title: "Continue?",
                    text: "Do you want to delete this room?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {

       $.ajax({

                    url:"functions/delete_room.php?"+other_data, 
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
                            swal({title:"Success!",text: "Room has been deleted.", type:"success"}).then(okay => {
                                    if (okay) {
                                          fetchRooms();             
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