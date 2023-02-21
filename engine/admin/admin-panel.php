<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: adm-lgn');
        exit;
    } else {
        require_once('../../sec/admin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
</head>
<body>
    
</body>
</html>