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
        header ('Location: account.php');
    else 
        $error = 'Пароль и/или логин неверный!';
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style_login.css">
</head>
<body>
    <?php 
    
    if (!$auth) { ?>
    <div id="wrapper">
        <div id="form">
            <?php if (isset($error)) { ?>
                <span style="color: red;"><?php echo $error ?></span>
            <?php } ?>
            <form action="login.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Логин</label>
                  <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="loginHelp" placeholder="Введите логин">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Пароль</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ведите пароль">
                </div>
                <button type="submit" class="btn btn-primary">Вход</button>
              </form>   
        </div>
    </div>
    <?php } ?>    
</body>
</html>



