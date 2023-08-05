<?php 

  $tz = 'Asia/Hong_Kong';
  $timestamp = time();
  $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
  $dt->setTimestamp($timestamp);
  $now = date_format($dt,"h:i a");


        require ("../db_connection/myConn.php");
        $keyword=$_GET['keyword'];
        $sql = "SELECT  `_reply` FROM `tbl_tropi` WHERE `_keyword` LIKE '%$keyword%'";
        $result= $con_str->query($sql);
        $output='';
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $_reply=$row["_reply"];
              $output.='<li class="you"><div class="entete"><span class="status green"></span><h2>Tropi</h2><h3>&nbsp;'.$now.', Today</h3></div><div class="triangle"></div><div class="message">'.$_reply.'</div></li>';
            }
        }else{
          $output.='<li class="you"><div class="entete"><span class="status green"></span><h2>Tropi</h2><h3>&nbsp;'.$now.', Today</h3></div><div class="triangle"></div><div class="message">Sorry, I do not know that word yet.</div></li>';
        }  
        echo $output;

       ?>