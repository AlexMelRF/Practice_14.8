<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="style/style_index.css">
</head>
<body>
    <h1>Главная страница</h1>
    <?php

    require_once ('process_data.php');
    session_start();
    $auth = $_SESSION['auth'] ?? null;
    if(!$auth) { ?>
        <a href="login.php">Вход</a>
    <?php } else {
                ?>
                <a href="account.php">Привет, <?php echo getCurrentUser(); ?></a>
                <br>
                <?php
                if (!getPromo())
                    setPromo();
                else { ?> 
                    <p><?php echo getPromo(); ?></p>
                <?php } 
                if (getDateOfBirth()) ?>
                    <p><?php echo getDateOfBirth(); ?></p>
                <br>
                <a href="logout.php">Выйти</a>
            <?php } ?>
</body>
</html>