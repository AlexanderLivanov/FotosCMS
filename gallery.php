<?php
$directory = "images";    // Папка с изображениями
$allowed_types = array("jpg", "jpeg", "png", "gif");  //разрешеные типы изображений
$file_parts = array();
$ext = "";
$title = "";
$i = 0;
//пробуем открыть папку
$dir_handle = @opendir($directory) or die("Error opening folder!");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="light-gallery.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/gallery-script-1.0.0.js"></script>
  <script src="engine/js/highslide/highslide-full.js" type="text/javascript"></script>
  <link href="engine/js/highslide/highslide.css" rel="stylesheet" property="stylesheet" />
  <script type="text/javascript">
    hs.graphicsDir = 'engine/js/highslide/graphics/';
  </script>
  <title>Галерея</title>
</head>

<body>
  <div id="container" style="text-align: center;">
    <div id="heading">
      <h1><a href="index">Какой-то фотограф</a> / <a href="gallery">Галерея</a></h1>
    </div>
    <div id="gallery">
      <?php

      $directory = 'images';
      $allowed_types = array('jpg', 'jpeg', 'gif', 'png');
      $file_parts = array();
      $ext = '';
      $title = '';
      $i = 0;
      //пробуем открыть папку
      $dir_handle = @opendir($directory) or die("There is an error with your image directory!");
      while ($file = readdir($dir_handle)) {
        if ($file == '.' || $file == '..') continue;
        $file_parts = explode('.', $file);
        $ext = strtolower(array_pop($file_parts));
        $title = implode('.', $file_parts);
        $title = htmlspecialchars($title);
        $nomargin = '';
        if (in_array($ext, $allowed_types)) {

          if (($i + 1) % 4 == 0) $nomargin = 'nomargin';
          echo '
          <div style="width: 99%;">
            <div class="pic ' . $nomargin . '" style="background:url(' . $directory . '/' . $file . '); background-size: no-repeat; background-position: center; background-size: cover; width: 200px; height: auto; margin: 0px; border-radius: 0;">
              <a href="' . $directory . '/' . $file . '" class="highslide" onclick="return hs.expand(this)">' . $title . '</a>
            </div>
          </div>';
          $i++;
        }
      }
      closedir($dir_handle);

      ?>
      <div class="clear"></div>
    </div>
    <div id="footer" style="height: auto;">
      <div class="bottom-copyright" style="font-family: 'Courier New', Courier, monospace; text-align: center;">
        <p>FotosCMS &copy; 2019-2023 RedCrystal Studio</p>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.6.3.min.js"></script>
  <script src="js/lightgallery.min.js"></script>
  <script src="js/gallery-script-1.0.0.js"></script>
</body>

</html>

<?php
// fucking image gallery! I spend here more than 2 weeks! OK. Now(7th Feb 2023) it`s working :)
?>