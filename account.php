<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style/style_account.css">
</head>
<body>
    <a href="index.php">На главную</a>
    <a href="logout.php">Выйти</a>
    <form action="set_date.php" method="post">
        <label>Укажите нам дату Вашего дня рождения и мы предоставим вам дополнительные скидки!</label>
        <input type="date" name="date" id="date" value="2000-01-01" min="1950-01-01" max="2005-01-01">
        <input type="submit" value="Подтвердить">
    </form>
</body>
</html>

<?php

require_once ('process_data.php');
session_start();
$auth = $_SESSION['auth'] ?? null;
if (!$auth)                         // No way to login.php!
    header ('Location: index.php'); //

