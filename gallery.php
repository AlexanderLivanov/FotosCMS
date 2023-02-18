<?php
$directory = "images";    // Папка с изображениями
$allowed_types = array("jpg", "jpeg", "png", "gif");  //разрешеные типы изображений
$file_parts = array();
$ext = "";
$title = "";
$i = 0;
//пробуем открыть папку
$dir_handle = @opendir($directory) or die("Error opening folder!");

// echo '<ul id="lightgallery" class="gallery">';
// while ($file = readdir($dir_handle))    //поиск по файлам
// {
//   if ($file == "." || $file == "..") continue;  //пропустить ссылки на другие папки
//   $file_parts = explode(".", $file);          //разделить имя файла и поместить его в массив
//   $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение


//   if (in_array($ext, $allowed_types)) {
//     echo '<li>
//             <img src="' . $directory . '/' . $file . '" class="pimg" style="width: 120%; height: auto; margin: 15px;" title="' . $file . '" ></img>
//           </li>';
//     $i++;
//   }
// }

// closedir($dir_handle);  //закрыть папку
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="light-gallery.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/gallery-script-1.0.0.js"></script>
  <title>Галерея</title>
</head>

<body>
  <div id="container">
    <div id="heading"> <!-- Заголовок -->
      <h1><a href="index">Какой-то фотограф</a> / <a href="gallery">Галерея</a></h1>
    </div>
    <div id="gallery"> <!-- это блок для изображений -->
      <?php

      $directory = 'images';  //название папки с изображениями
      $allowed_types = array('jpg', 'jpeg', 'gif', 'png');  //разрешеные типы изображений
      $file_parts = array();
      $ext = '';
      $title = '';
      $i = 0;
      //пробуем открыть папку
      $dir_handle = @opendir($directory) or die("There is an error with your image directory!");
      while ($file = readdir($dir_handle))  //поиск по файлам
      {
        if ($file == '.' || $file == '..') continue;  //пропустить ссылки на другие папки
        $file_parts = explode('.', $file);  //разделить имя файла и поместить его в массив
        $ext = strtolower(array_pop($file_parts));  //последний элеменет - это расширение
        $title = implode('.', $file_parts);
        $title = htmlspecialchars($title);
        $nomargin = '';
        if (in_array($ext, $allowed_types)) {

          if (($i + 1) % 4 == 0) $nomargin = 'nomargin';  //последнему изображению в ряде присваевается CSS класс "nomargin"
          echo '
  <div class="pic ' . $nomargin . '" style="background:url(' . $directory . '/' . $file . '); background-size: no-repeat; background-position: center; background-size: cover; width: 200px; height: auto;">
  <a href="' . $directory . '/' . $file . '" target="_blank">' . $title . '</a>
  </div>';
          $i++;
        }
      }
      closedir($dir_handle);  //закрыть папку


      ?>
      <div class="clear"></div> <!-- using clearfix -->
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