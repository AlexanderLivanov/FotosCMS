<?php
$input_name = 'file';

// Разрешенные расширения файлов.
$allow = array('jpg', 'jpeg', 'png', 'gif');

// Запрещенные расширения файлов.
$deny = array(
    'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp',
    'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html',
    'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
);

$path = __DIR__ . '../../../images/';

if (isset($_FILES[$input_name])) {
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $files = array();
    $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
    if ($diff == 0) {
        $files = array($_FILES[$input_name]);
    } else {
        foreach ($_FILES[$input_name] as $k => $l) {
            foreach ($l as $i => $v) {
                $files[$i][$k] = $v;
            }
        }
    }

    foreach ($files as $file) {
        $error = $success = '';

        if (!empty($file['error']) || empty($file['tmp_name'])) {
            switch (@$file['error']) {
                case 1:
                case 2:
                    $error = 'Превышен размер загружаемого файла.';
                    break;
                case 3:
                    $error = 'Файл был получен только частично.';
                    break;
                case 4:
                    $error = 'Файл не был загружен.';
                    break;
                case 6:
                    $error = 'Файл не загружен - отсутствует временная директория.';
                    break;
                case 7:
                    $error = 'Не удалось записать файл на диск.';
                    break;
                case 8:
                    $error = 'PHP-расширение остановило загрузку файла.';
                    break;
                case 9:
                    $error = 'Файл не был загружен - директория не существует.';
                    break;
                case 10:
                    $error = 'Превышен максимально допустимый размер файла.';
                    break;
                case 11:
                    $error = 'Данный тип файла запрещен.';
                    break;
                case 12:
                    $error = 'Ошибка при копировании файла.';
                    break;
                default:
                    $error = 'Файл не был загружен - неизвестная ошибка.';
                    break;
            }
        } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
            $error = 'Не удалось загрузить файл.';
        } else {
            $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
            $name = mb_eregi_replace($pattern, '-', $file['name']);
            $name = mb_ereg_replace('[-]+', '-', $name);
            $converter = array(
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
                'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
                'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
                'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '',
                'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
                'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K',
                'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R',
                'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ь' => '', 'Ы' => 'Y', 'Ъ' => '',
                'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
            );

            $name = strtr($name, $converter);
            $parts = pathinfo($name);

            if (empty($name) || empty($parts['extension'])) {
                $error = 'Недопустимое тип файла';
            } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                $error = 'Недопустимый тип файла';
            } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                $error = 'Недопустимый тип файла';
            } else {
                $i = 0;
                $prefix = '';
                while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                    $prefix = '(' . ++$i . ')';
                }
                $name = $parts['filename'] . $prefix . '.' . $parts['extension'];

                if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                    $success = 'Файл «' . $name . '» успешно загружен.';
                } else {
                    $error = 'Не удалось загрузить файл.';
                }
            }
        }

        // Выводим сообщение о результате загрузки.
        if (!empty($success)) {
            echo '<p>' . $success . '</p>';
            echo '<p><a href="admin-panel.php">Назад, в админку</a></p>';
        } else {
            echo '<p>' . $error . '</p>';
        }
    }
}
