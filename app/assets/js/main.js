$(document).ready(function () {
    $('#signUp').on("click", function () {
        document.location.href = 'forms/reg_form.php'
    });

    $('#signIn').on("click", function () {
        document.location.href = 'forms/auth_form.php';
    });


    //Запрос на регистрацию
    $("#regForm").on("submit", function (e) {
        e.preventDefault();
        let login = $("input[name='login']").val();
        let password = $("input[name='password']").val();
        let confPass = $("input[name='confPass']").val();
        let email = $("input[name='email']").val();
        let name = $("input[name='name']").val();
        $.ajax({
            url: '../controller/signUp.php',
            method: 'post',
            data:
                {
                    login: login,
                    password: password,
                    confPass: confPass,
                    email: email,
                    name: name,
                },
            success: function (result) {
                $("input+span").text("");
                //перебираем вернувшийся массив
                JSON.parse(result, ((key, value) => {
                    if (key === "authUser") {
                        $("#regForm").remove();
                        $("div").append(`<h1>${value}</h1>`).append('<button id="logOut">Выйти</button>');
                    } else {
                        $(`input[name='${key}'] + span`).text(value);
                    }
                    //при успешной регистрации можно будет нажать на эту кнопку для выхода
                    $('#logOut').on("click", function () {
                        document.location.href = '../index.php';
                    });
                }));
            }
        });
    });


    //Запрос на авторизацию
    $("#auth").on("submit", function (e) {
        e.preventDefault();
        let login = $("input[name='login']").val();
        let password = $("input[name='password']").val();
        $.ajax({
            url: '../controller/signIn.php',
            method: 'post',
            data:
                {
                    login: login,
                    password: password,
                },
            success: function (result) {
                $("input+span").text("");
                //перебираем вернувшийся массив
                JSON.parse(result, ((key, value) => {
                    if (key === "authUser") {
                        $("#auth").remove();
                        $("div").append(`<h1>${value}</h1>`).append('<button id="logOut">Выйти</button>');
                    }
                    if (key === "error") {
                        $(`#${key}`).text(value);
                    }
                    //при успешной регистрации можно будет нажать на эту кнопку для выхода
                    $('#logOut').on("click", function () {
                        document.location.href = '../index.php';
                    });
                }));
            }
        });
    });
});


