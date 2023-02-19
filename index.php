<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@300&display=swap" rel="stylesheet">
    <title>FOTOS CMS</title>
    <style>
        .header-container {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            padding: 10px;
            text-align: center;
        }

        #header-item {
            width: 24%;
            height: auto;
            border-right: 0px;
            font-size: 20px;
        }

        #header-item a {
            text-decoration: none;
            color: blue;
            transition: 0.6s all;

        }

        #header-item a:hover {
            text-decoration: none;
            color: black;
            transition: 0.6s all;
        }
    </style>
</head>

<body style="background-color: aliceblue; font-family:'Shantell Sans', cursive;">
    <div class="main-header" style="text-align: center;">
        <h1>Fotos CMS</h1>
        <hr>
    </div>
    <div class="header-container" style="text-align:center;">
        <div id="header-item">
            <a href="index">Лента</a>
        </div>
        <div id="header-item">
            <a href="gallery">Галерея</a>
        </div>
        <div id="header-item">
            <a href="">Посты</a>
        </div>
        <div id="header-item">
            <a href="">Контакты</a>
        </div>
    </div>
    <hr>
    <div class="feed-container" style="text-align: center; margin: 0 auto; width: 100%; border:1px solid gray; border-radius: 15px;">
        <?php require_once('sec/feed.php'); ?>
    </div>
</body>

</html>