<?php
  $host = 'localhost';     // Хост
  $user = 'greed_test';    // Имя пользователя
  $pass = '123';           // Пароль пользователя
  $db_name = 'greed_test'; // Имя базы данных
  
  $link = mysqli_connect($host, $user, $pass, $db_name, $charset);
  if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
?>