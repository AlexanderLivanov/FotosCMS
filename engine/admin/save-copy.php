<?php

$copyright = $_POST['copyright-name'];
session_start();
$_SESSION['copyrigth-name'] = $_POST['copyright-name'];

header("Location: " . basename(__DIR__) . "/../admin-panel.php");
?>