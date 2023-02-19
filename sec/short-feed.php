<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'photos_engine';
$link = mysqli_connect($host, $user, $pass, $db_name);
if (!$link) {
    echo 'Error: ' . mysqli_connect_errno() . ', Error: ' . mysqli_connect_error();
    exit;
}

$sql = mysqli_query($link, 'SELECT * FROM posts ORDER BY id DESC LIMIT 5');
while ($result = mysqli_fetch_array($sql)) {
    echo "
    <div class='new-post' style='margin: 0% 20% 0% 20%;'>
        <h4>[{$result['date']}] {$result['name']}</h4><p>{$result['text']}</p><br>
    
    <hr>
    </div>
    ";
}
