<?php require_once('strings.php');

echo '<h3>Текущие настройки:</h3>
<p>Название сайта:'.$site_name.'</p>
<p>Имя владельца:'.$author.'</p>'
?>

<form action="update-settings.php" method="post" enctype="multipart/form-data">
    Название сайта: <input type="text" placeholder="Мой сайт"><br>
    Имя владельца: <input type="text" placeholder="Админ"><br>
    <input type="submit" value="Сохранить">
</form>