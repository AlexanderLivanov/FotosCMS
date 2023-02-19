<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'photos_engine';
$date = date('Y-m-d H:i:s');
$link = mysqli_connect($host, $user, $pass, $db_name);
if (isset($_POST["text-name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `posts` (`name`, `text`, `date`) VALUES ('{$_POST['text-name']}', '{$_POST['text-text']}', '$date')");
    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>Данные успешно добавлены в таблицу.</p>';
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
    echo "{$result['id']}) - [{$result['date']}] - {$result['name']} - <a href='?del={$result['id']}'>Удалить</a><br>";
}

if (isset($_GET['del'])) {
    $sql = mysqli_query($link, "DELETE FROM `posts` WHERE `id` = {$_GET['del']}");
    if ($sql) {
        echo "<p>Товар удален.</p>";
        header("Location: " . basename(__DIR__) . "/../admin-panel.php");
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        header("Location: " . basename(__DIR__) . "/../admin-panel.php");
    }
}

?>