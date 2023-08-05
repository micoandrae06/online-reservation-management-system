

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>VR-MODE</title>
    <script src="aframe-master.js"></script>
  </head>
  <body>
    <a-scene style="width:100px;" >
      <?php
      $img = $_GET['img'];
      $output='';
      $output.='<a-sky src="'.$img.'"></a-sky>';
      echo $output;
      ?>
    
    </a-scene>
  </body>
</html>
