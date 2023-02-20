<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'photos_engine';

$link_db = mysqli_connect($host, $user, $pass, $db_name);

function UploadThumbsToDatabase($name, $sqli_path){
    global $link_db;
    $sqli_req_to_upload_imgs = 'INSERT INTO photos(name, photo) VALUES($name, LOAD_FILE(' . $sqli_path . '))';
    mysqli_query($link_db, $sqli_req_to_upload_imgs);
}
echo 'Я закончил'; 
?>