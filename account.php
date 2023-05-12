<?php

require_once ('process_data.php');
session_start();
$auth = $_SESSION['auth'] ?? null;
if (!$auth)                         // No way to login.php!
    header ('Location: index.php'); //
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style_account.css">
</head>
<body>
    <a href="index.php">На главную</a>
    <a href="logout.php">Выйти</a>
    <?php

    if (!isset($_COOKIE['date_of_birth'])) {?>
        <form action="set_date.php" method="post">
            <label>Укажите нам дату Вашего дня рождения и мы предоставим вам дополнительные скидки!</label>
            <input type="date" class="form-control" name="date" id="date" value="2000-01-01" min="1950-01-01" max="2005-01-01">
            <input type="submit" value="Подтвердить">
        </form>
    <?php } ?>
</body>
</html>



