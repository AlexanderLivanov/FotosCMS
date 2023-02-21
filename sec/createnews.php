<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'photos_engine';
$tz = 'Europe/Moscow';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$date = $dt->format('d.m.Y H:i:s');

//$date = date('Y-m-d H:i:s');

$restricted_chars = ["'"];

$link = mysqli_connect($host, $user, $pass, $db_name);
if (isset($_POST["text-name"])) {
    //Вставляем данные, подставляя их в запрос
    $_POST['text-name'] = str_replace($restricted_chars, '`', $_POST["text-name"]);
    $_POST['text-text'] = str_replace($restricted_chars, '`', $_POST["text-text"]);
    $sql = mysqli_query($link, "INSERT INTO `posts` (`name`, `text`, `date`) VALUES ('{$_POST['text-name']}', '{$_POST['text-text']}', '$date')");
    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>Запись создана</p>';
        header("Location: " . basename(__DIR__) . "/../admin-panel.php");
        die();
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        header("Location: /engine/admin/admin-panel.php");
    }
}

?>

<html>
<div>
    <h3>Создать новую запись на стене:</h3>
    <form action="" method="POST">
        <input type="text" name="text-name" placeholder="Название записи..."><br>
        <p></p>
        <textarea name="text-text" id="text-text" cols="30" rows="10" placeholder="Текст записи..."></textarea>
        <br>
        <p></p>
        <input type="submit" value="Сохранить">
    </form>
</div>
<p></p>
<div>
    <h3>Текущие записи на сайте:</h3>
</div>    
</html>

<?php

$sql = mysqli_query($link, 'SELECT `id`, `name`, `date` FROM `posts`');
while ($result = mysqli_fetch_array($sql)) {
    echo "{$result['id']}) [{$result['date']}] - {$result['name']} - <a href='?del={$result['id']}'>Удалить</a> <b>/</b> <a href='?edit={$result['id']}'> Изменить</a><br>";
}

if (isset($_GET['del'])) {
    $sql = mysqli_query($link, "DELETE FROM `posts` WHERE `id` = {$_GET['del']}");
    if ($sql) {
        echo "<p>Запись удалена</p>";
        header("Location: " . basename(__DIR__) . "/../admin-panel.php");
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        header("Location: " . basename(__DIR__) . "/../admin-panel.php");
    }
}

if (isset($_GET['edit'])) {
    $_SESSION['curr_post_edit_id'] = $_GET['edit'];
    header("Location: " . basename(__DIR__) . "/../updatenews");
}

?>