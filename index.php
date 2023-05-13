<?php
    require_once ('process_data.php');
    session_start(); 
	$auth = $_SESSION['auth'] ?? null; ?>
    
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
    <header>
        <div id="wrapper">
            <div id="head">
                <h1>SPA - центр</h1>
            </div>
            <div id="menu">
                <ul>
                    <li>
                        <?php if(!$auth) { ?>
							<a href="login.php">Вход</a>
						<?php } else { ?>
								    <a href="account.php">Вы вошли как: <?php echo getCurrentUser(); ?></a>
                                <?php } ?>
                    </li>
                    <li>
                    <?php if($auth) { ?>
                        <a href="logout.php">Выйти</a>
                    <?php } ?>    
                    </li>
                </ul>
            </div>     
        </div>
    </header>
    <main>
        <section>
            <div id="promo">
                <?php if($auth) {  
                    if (!getPromo())
                        setPromo();
                    else { ?> 
                        <p><?php echo getPromo(); ?></p>
                    <?php } 
                } ?>   
            </div>
            <article>
                <img src="images/look.com.ua-267366.jpg" alt="#">
            </article>
        </section>
        <aside id="list">
            <?php if($auth) {
                if (getDateOfBirth()) ?>
                    <p><?php echo getDateOfBirth(); ?></p>
                <?php } ?>
            <ul>
                <li>
                    <a href="#">Новинка! Массаж Русский на березовых поленьях!</a>
                </li>
                <li>
                    <a href="#">Скидка 30% на японский массаж</a>
                </li>
                <li>
                    <a href="#">У нас новая услуга - ароматерапия с использованием редчайших благовоний из Индии</a>
                </li>
                <li>
                    <a href="#">Напоминаем: при заказе услуги мексиканского массажа - сомбреро и кактус в подарок!</a>
                </li>
            </ul>
        </aside>
    </main>      
</body>
</html>