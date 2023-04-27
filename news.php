<?php
include("./db_connection.php");
$sql = mysqli_query($link, 'SELECT `id`, `title`, `description`, `date` FROM `news` ORDER BY `date` DESC');
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Новости</title>
        <link rel="stylesheet" href="./assets/css/normalize.css" />
        <link rel="stylesheet" href="./assets/css/style.css" />
        <script src="./assets/js/jquery-3.6.4.min.js"></script>
    </head>
    <body>
        <header></header>
        <main class="main main__page">
            <div class="hero">
                <div class="container">
                    <div class="hero__wrapper">
                        <h1 class="title__main">Новости</h1>
                    </div>
                </div>
            </div>
            <div class="container"> 
                <div class="breadcrumbs">
                    <a href="/testy2">Главная</a>
                    <span> / </span>
                    <span>Новости</span>
                </div>   
                <div class="news">
                    <ul class="news__list">
                        <?php
                            while ($result = mysqli_fetch_array($sql)) {
                                ?>
                                <li class="news__item">
                                    <h3 class="news__item_title"><?php 
                                    $result['title'] = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $result['title']);
                                    echo $result['title'];
                                    ?></h3>
                                    <p class="news__item_descr">
                                        <?php
                                        $result["description"] = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $result["description"]);
                                        echo $result["description"]; ?>
                                    </p>
                                    <p class="news__item_date"><?php echo $result["date"]; ?></p>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </main>
        <footer></footer>
        <script src="./assets/js/scrypt.js"></script>
    </body>
</html>