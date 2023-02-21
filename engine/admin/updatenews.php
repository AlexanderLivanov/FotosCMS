<?php session_start(); 
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Редактировать запись <?php  ?></title>
</head>

<body>
    <style>
        #zatemnenie {
            background: rgba(102, 102, 102, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }

        #okno {
            width: 70%;
            height: 90%;
            text-align: center;
            padding: 15px;
            border: 3px solid #0000cc;
            border-radius: 10px;
            color: #0000cc;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            background: #fff;
        }

        #zatemnenie:target {
            display: block;
        }

        .close {
            display: inline-block;
            border: 1px solid #0000cc;
            color: #0000cc;
            padding: 0 12px;
            margin: 10px;
            text-decoration: none;
            background: #f2f2f2;
            font-size: 14pt;
            cursor: pointer;
        }

        .close:hover {
            background: #e6e6ff;
        }
    </style>
    <div id="zatemnenie">
        <div id="okno">
            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db_name = 'photos_engine';
            $link = mysqli_connect($host, $user, $pass, $db_name);
            $restricted_chars = ["'"];
            $a = $_SESSION['curr_post_edit_id'];
            $sql = mysqli_query($link, 'SELECT `id`, `name`, `text`, `date` FROM `posts` WHERE `id` = ' . $a);
            global $a;
            while ($result = mysqli_fetch_array($sql)) {
                echo "{$result['id']}) [{$result['date']}] - {$result['name']} <br>";
                $upd_text =  "[Обновлено] " . $result['name'];
                //echo $upd_text;
                echo "
                <div>
                    <h3>Редактировать запись:</h3>
                    <form action='upd.php' method='POST'>
                        <p>Название записи:</p>
                        <input type='text' name='text-name' value='$upd_text'><br>
                        <p>Текст записи:</p>
                        <textarea name='text-text' id='text-text' cols='50' rows='20'>" . $result['text'] . "</textarea>
                        <br>
                        <p></p>
                        <input type='submit' value='Сохранить'>
                    </form>
                </div>
                ";
            }
            ?>
            <a href="#" class="close">Закрыть окно</a>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_SESSION['curr_post_edit_id'])) {
    echo '<a href="#zatemnenie">Вызвать всплывающее окно</a>';
    global $a;
} else {
    echo 'Ошибка: система не получила ID редактируемого поста. <input type="button" onclick="history.back();" value="К админке"/>';
}
?>