<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'db_connection.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';


$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);


$mail->setFrom('dkasapov@mail.ru', 'Тестовое');
// Кому отправить
$mail->addAddress("dkasapov@mail.ru");
$mail->addAddress('dima.site-uper@yandex.ru');

$mail->Subject = 'Форма: Дмитрий Касапов.';

//Тело письма
$body = '<h1>Тестовое задание</h1>';

if(trim(!empty($_POST['name']))){
    $body .='<p><strong>ФИО:</strong> ' . $_POST['name'] . '</p>';
}
if(trim(!empty($_POST['adress']))){
    $body .='<p><strong>Адрес:</strong> ' . $_POST['adress'] . '</p>';
}
if(trim(!empty($_POST['tel']))){
    $body .='<p><strong>Телефон:</strong> ' . $_POST['tel'] . '</p>';
}
if(trim(!empty($_POST['email']))){
    $body .='<p><strong>E-mail:</strong> ' . $_POST['email'] . '</p>';
}

$mail->Body = $body;

$name = $_POST['name'];
$adress = $_POST['adress'];
$tel = $_POST['tel'];
$email = $_POST['email'];
if (!$mail->send()) {
    $message = 'Ошибка отправки!';
} else {
    $query = "INSERT INTO `contacts` (`id`, `name`, `adress`, `tel`, `email`)  VALUES (NULL, '$name', '$adress', '$tel', '$email')";
    $result = mysqli_query($link, $query) or die ('Error in query to database');
    mysqli_close($link);
    $message = 'Данные отправлены!';
}
$response = [$name, $adress, $tel, $email];

header('Content-type: application/json');
echo json_encode($response);

?>