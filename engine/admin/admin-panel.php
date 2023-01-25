<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: adm-lgn.php');
        exit;
    } else {
        echo 'hi';
    }
