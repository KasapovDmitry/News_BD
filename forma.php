<?php
include("./db_connection.php");

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Форма для связи</title>
		<link rel="stylesheet" href="./assets/css/normalize.css" />
		<link rel="stylesheet" href="./assets/css/style.css" />
        <script src="./assets/js/jquery-3.6.4.min.js"></script>
	</head>
	<body>
		<header class="header">
		</header>
		<main class="main main__form">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="/testy2">Главная</a>
                    <span> / </span>
                    <span>Форма</span>
                </div> 
            </div>
            <div class="container container__form">
                <div id="callback" class="form-body">
                    <div class="form-dialog">
                        <div class="form-header">
                            <div class="form-title form-title-primary">Мы перезвоним Вам</div> 
                        </div> 
                        <div class="modal-body">
                            <form id="amoforms_form" class="modal__form form" method="post">
                                <div class="form-row">
                                    <label class="block-hidden styled__input">
                                        <span class="input__text">ФИО<span class="input__req"> *</span></span>
                                        <input class="form__input" name="name" type="text" required="required">
                                    </label>
                                </div>
                                <div class="form-row">
                                    <label class="styled__input">
                                        <span class="input__text">Адрес<span class="input__req"> *</span></span> 
                                        <input class="form__input" name="adress" type="text" required="required"> 
                                    </label>
                                </div>
                                <div class="form-row">
                                    <label class="styled__input">
                                        <span class="input__text">Контактный телефон<span class="input__req"> *</span></span> 
                                        <input class="form__input form__input_tel" name="tel" type="tel" required="required">
                                        <span class="input_tel-message"></span> 
                                    </label>
                                </div>
                                <div class="form-row">
                                    <label class="styled__input">
                                        <span class="input__text">E-mail<span class="input__req"> *</span></span>
                                        <input class="form__input form__input_email" name="email" type="text" required="required">
                                        <span class="input_email-message"></span> 
                                    </label>
                                </div>
                                <div class="form-row form-agreement">
                                    <label>
                                        <input type="checkbox" name="agreement" required="required">
                                        <span class="form__agreement">Нажимая кнопку, я даю согласие на <a href="#">обработку персональных данных</a> и соглашаюсь с <a href="#">политикой конфиденциальности</a>.</span>
                                    </label></div> <div class="form-row">
                                    <div class="btn__wrap">
                                        <button class="btn">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="message"></div>
                <div class="total"></div>
            </div>
		</main>
		<footer class="footer">
		</footer>
		<script src="./assets/js/scrypt.js"></script>
	</body>
</html>
