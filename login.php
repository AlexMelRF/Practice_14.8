<?php

require_once ('process_data.php');
session_start();
if (!empty($_POST)) {
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    if (userCheck($login, $password)) 
        header('Location: index.php');
    else 
        $error = 'Пароль и/или логин неверный!';
}
$auth = $_SESSION['auth'] ?? null;
?>
<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
    <?php 
    if (isset($error)) { ?>
    <span style="color: red;"><?php echo $error ?></span>
    <?php } 
    if (!$auth) { ?>
    <form action="login.php" method="post">
        <label for="login">Логин: </label><input type="text" name="login" id="login">
        <br>
        <label for="password">Пароль: </label><input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Вход">
    </form>
    <?php } else 
                // No way to login.php! We are logged in alredy
                header ('Location: index.php'); ?>    
</body>
</html>



