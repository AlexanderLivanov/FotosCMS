<?php
            $tz = 'Europe/Moscow';
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz));
            $dt->setTimestamp($timestamp);
            session_start();
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            global $Juila;
            global $a;
            $a = $_SESSION['curr_post_edit_id'];
            $db_name = 'photos_engine';
            $link = mysqli_connect($host, $user, $pass, $db_name);
            $restricted_chars = ["'"];
            $date = $dt->format('d.m.Y H:i:s');
            if (isset($_SESSION['curr_post_edit_id'])) {
                $_POST['text-name'] = str_replace($restricted_chars, '`', $_POST["text-name"]);
                $_POST['text-text'] = str_replace($restricted_chars, '`', $_POST["text-text"]);
                echo 'good job';
                $sql = mysqli_query($link, "DELETE FROM `posts` WHERE `id` = " . $a);
                $sql = mysqli_query($link, "INSERT INTO `posts` (`id`, `name`, `text`, `date`) VALUES ('$a', '{$_POST['text-name']}', '{$_POST['text-text']}', '$date')");
                if ($sql) {
                    echo '<p>Запись обновлена</p>';
                    header("Location: " . basename(__DIR__) . "/../admin-panel.php");
                    die();
                } else {
                    echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
                    header("Location: /engine/admin/admin-panel.php");
                }
            }
