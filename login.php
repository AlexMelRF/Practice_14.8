<?php

require_once ('process_data.php');
session_start();
$auth = $_SESSION['auth'] ?? null;
if ($auth)                          // No way to login.php!
    header ('Location: index.php'); //
if (!empty($_POST)) {
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    if (userCheck($login, $password)) 
        header('Location: account.php');
    else 
        $error = 'Пароль и/или логин неверный!';
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в аккаунт</title>
    <link rel="stylesheet" href="style/style_login.css">
</head>
<body>
    <?php 
    if (isset($error)) { ?>
        <span style="color: red;"><?php echo $error ?></span>
    <?php } 
    if (!$auth) { ?>
    <form action="login.php" method="post">
        <label for="login">Логин: </label>
        <input type="text" name="login" id="login">
        <br>
        <label for="password">Пароль: </label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Вход">
    </form>
    <?php } ?>    
</body>
</html>



