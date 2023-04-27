function windowOnload() {

    let phone_inputs = document.querySelector('.form__input_tel');
    let email_inputs = document.querySelector('.form__input_email');
    let allMessage = document.querySelector('.message');
    let emailMessage = document.querySelector('.input_email-message');
    let phoneMessage = document.querySelector('.input_tel-message');
    let totalTable = document.querySelector('.total');

    // Маска номера телефона
    phoneNumber();
    emailInput();

    const form = document.getElementById('amoforms_form');
    if(form) {
        form.addEventListener('submit', formSend);
    
        async function formSend(e) {
            e.preventDefault();
            let error = 0; 
            //formValidate();
            let formData = new FormData(form);
            if (error === 0) {
                let response = await fetch('mailer.php', {
                    method: 'POST',
                    body: formData
                });
                if(response.ok) {
                    let result = await response.json();
                    form.reset();
                    allMessage.innerHTML = " ";
                    allMessage.innerHTML = "Ваше письмо успешно отправлено!";
                    if(allMessage.classList.contains("red")) {
                        allMessage.classList.remove("red");
                    }
                    allMessage.classList.add("green");
                    userInfo(result);
                    deleteMessage();
                } else {
                    alert("Ошибка отправки. Попробуйте заново.");
                    allMessage.innerHTML = " ";
                    allMessage.innerHTML = "Ошибка отправки. Попробуйте заново!";
                    if(allMessage.classList.contains("green")) {
                        allMessage.classList.remove("green");
                    }
                    allMessage.classList.add("red");
                    deleteMessage();
                }
            } else {
                alert('Заполните обязательные поля');
                allMessage.innerHTML = " ";
                
                allMessage.innerHTML = "Заполните обязательные поля!";
                if(allMessage.classList.contains("green")) {
                    allMessage.classList.remove("green");
                }
                allMessage.classList.add("red");
            }
        }
    }
    // function formValidate() {
    //     return;
    // }
    // Маска номера телефона
    function phoneNumber() {
        const eventCallback = function (e) {
        let el = e.target,
            clearVal = el.dataset.phoneClear,
            pattern = el.dataset.phonePattern,
            matrix_def = "+7(___) ___-__-__",
            matrix = pattern ? pattern : matrix_def,
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = e.target.value.replace(/\D/g, "");
        if (clearVal !== 'false' && e.type === 'blur') {
            if (val.length < matrix.match(/([\_\d])/g).length) {
                 e.target.value = '';
                if(el.classList.contains("valid")) {
                    el.classList.remove("valid");
                }
                e.target.classList.add("not");
                phoneMessage.innerHTML = "Поле некорректно заполнено!";
                return;
            }
        }
        if (def.length >= val.length) {
            val = def;
        }
        if (val.length == matrix.match(/([\_\d])/g).length) {
            if(el.classList.contains("not")) {
                el.classList.remove("not");
            }
            el.classList.add("valid");
            phoneMessage.innerHTML = "";
        }
            e.target.value = matrix.replace(/./g, function (a) {
                return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
            });
        }
        for (let ev of ['input', 'blur', 'focus']) {
            phone_inputs.addEventListener(ev, eventCallback);
        }
    }
    // Маска номера email
    function emailInput() {
        const emailMask = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        function validateEmail() {
            if(emailMask.test(email_inputs.value)) {
                if(email_inputs.classList.contains("not")) {
                    email_inputs.classList.remove("not");
                    }
                    email_inputs.classList.add("valid");
                    emailMessage.innerHTML = "";
            } else {
                if(email_inputs.classList.contains("valid")) {
                    email_inputs.classList.remove("valid");
                }
                email_inputs.classList.add("not");
                emailMessage.innerHTML = "Поле некорректно заполнено!";
            }
        };
        for (let ev of ['input', 'blur', 'focus']) {
            email_inputs.addEventListener(ev, validateEmail);
        }
    }
    // Убираем сообщение об отправке
    function deleteMessage() {
        if(email_inputs.classList.contains("not")) {
            email_inputs.classList.remove("not");
        }
        if(email_inputs.classList.contains("valid")) {
            email_inputs.classList.remove("valid");
        }
        if(phone_inputs.classList.contains("valid")) {
            phone_inputs.classList.remove("valid");
        }
        function message() {
        let messageField = document.querySelector('.message');
            if (messageField) {
                    messageField.innerHTML = "";
            }
        }
        setTimeout(message, 3000);
    }

    // Создаем таблицу пользователя
    function userInfo(arr) {
        totalTable.innerHTML = `
        <h3 class="title__block">Нам пишет:</h3>
        <table class="iksweb">
            <tbody>
                <tr>
                    <th>Поля</th>
                    <th>Данные</th>
                </tr>
                <tr>
                    <td>ФИО</td>
                    <td>${arr[0]}</td>
                </tr>
                <tr>
                    <td>Адрес</td>
                    <td>${arr[1]}</td>
                </tr>
                <tr>
                    <td>Контактный телефон </td>
                    <td>${arr[2]}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>${arr[3]}</td>
                </tr>
            </tbody>
        </table>
        `;
    }
};
document.addEventListener("DOMContentLoaded", windowOnload);