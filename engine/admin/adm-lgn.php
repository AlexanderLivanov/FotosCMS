<html xmlns="//www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="login.css">
    <title>Вход</title>
</head>

<body>
    <form method="post" action="" name="signin-form">
        <div class="form-element">
            <label>Логин</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Пароль</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="login" value="login">Войти</button>
    </form>
</body>

</html>

<?php
session_start();
include('../../sec/cfg.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Неверные пароль или имя пользователя!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
            header("Location: admin-panel.php");
            die();
        } else {
            echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
        }
    }
}
// if you uncomment the line below, you will can see a password hash on the login page
//echo password_hash($_POST['password'], PASSWORD_BCRYPT);
?>
