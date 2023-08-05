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

  <title>Lodging Report | Administrator</title>
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

     <main>
      <center><h6><img src="../assets/img/icon_transparent.png" style="width: 35px;">Tropical Breeze Hotel and Resort</h6></center>

            <center><h5>Resort Lodging Report</h5></center>
            <?php
            $date_from=$_GET["date_from"];
      $date_to=$_GET["date_to"];
            if ($date_from!='' && $date_to !='') {
        echo '<center><h6> for '.$date_from . ' to ' . $date_to .'</h6></center>';
      }else if ($date_from!='' && $date_to =='') {
        echo '<center><h6> for '.$date_from.'</h6></center>';
      }else if ($date_from=='' && $date_to !='') {
        echo '<center><h6> for '. $date_to.'</h6></center>';
      }else{
        
      }

            ?>
        <table class="table table-striped table-bordered" id="tbl_reservations">
                      <thead class="">
                          <tr> 
                              
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
                             Checked-out Time
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
                             Origin
                            </th>

                        
                            
                          </tr>
                      </thead> 
                      <?php
                        require ("../db_connection/myConn.php");

                        $date_from=$_GET["date_from"];
                        $date_to=$_GET["date_to"];

                        $date_filter='';
                        if ($date_from!='' && $date_to !='') {
                          $date_filter = "AND (`_date` BETWEEN '".$date_from."' AND '".$date_to."')";
                        }else if ($date_from!='' && $date_to =='') {
                          $date_filter = "AND (`_date` LIKE '".$date_from."')";
                        }else if ($date_from=='' && $date_to !='') {
                          $date_filter = "AND (`_date` BETWEEN '%%%%-%%-%%' AND '".$date_to."')";
                        }else{
                          $date_filter="AND (`_date` LIKE '%')";
                        }
                         $query = "SELECT `_id`, `_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code` FROM `tbl_resort_lodging` WHERE (`_status`  LIKE 'checked-out')".$date_filter;
                        $result= $con_str->query($query);

                        $output='';
                        if($result->num_rows > 0) {
                          
                          while($row = $result->fetch_assoc()) {
                            $output.= '<tr>';  
                           
                             $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_transaction_num"].'</center></td>';
                            $output.= '<td id="td_name'.$row["_id"].'"><center>Name: '.$row["_guest_name"].'<br>Contact#: '.$row["_guest_contact"].'<br>Address: '.$row["_guest_address"].'<br>Email: '.$row["_guest_email"].' </center></td>';
                           
                           $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_date"].'</center></td>';
                            $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_checkedin_time"].'</center></td>';
                             $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_checkedout_time"].'</center></td>';
                           $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_resort_id"].'</center></td>';
                           $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_tour_type"].'</center></td>';

                           $output.= '<td id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_rate"],2).'</center></td>';

                           $output.= '<td id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_total_amount"],2).'</center></td>';

                           $output.= '<td id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_payment"],2).'</center></td>';
                           
                           $output.= '<td id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_balance"],2).'</center></td>';
                          $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_guest_origin"].'</center></td>';
                         
                            
             
                            $output.= '</tr>';
                            echo $output;
                          }
                        }

                        ?>                     
                    </table>
     </main>


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
  
   $(document).ready(function() {
      window.print();
    });
</script>