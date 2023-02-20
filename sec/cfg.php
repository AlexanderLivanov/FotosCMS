<?php

// outdated SQLi request
// don`t touch pls :)
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'photos_engine');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }

// new SQLi request

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'photos_engine';

    $link_db = mysqli_connect($host, $user, $pass, $db_name);
?>