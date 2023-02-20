<form action="upload.php" method="post" enctype="multipart/form-data">
    <h3>Загрузить медиа:</h3>
    <input type="file" name="file[]" multiple>
    <input type="submit" value="Отправить">
</form>

<?php require_once('cfg.php'); ?>

<div id="gallery">
    <?php

    $directory = '../../images';
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
            

            // if (($i + 1) % 4 == 0) $nomargin = 'nomargin';
            // echo '<a href="' . $directory . '/' . $file . '" class="highslide" onclick="return hs.expand(this)">' . $title . '</a><br>';
            // $i++;
        }
    }
    closedir($dir_handle);

    ?>
    <div class="clear"></div>
</div>
