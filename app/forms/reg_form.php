<?php require_once "../include/header.php"; ?>
<div>
    <form id="regForm">
        <input type="text" name="login" placeholder="Введите логин" required>
        <span></span>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <span></span>
        <input type="password" name="confPass" placeholder="Подтвердите пароль" required>
        <span></span>
        <input type="email" name="email" placeholder="Введите email" required>
        <span></span>
        <input type="text" name="name" placeholder="Введите имя" required>
        <span class="name"></span>
        <input type="submit" id="btn" value="Регистрация">
        <p>Есть аккаунт? Нажми <a href="auth_form.php">Войти</a>!</p>
    </form>
</div>
<?php require_once "../include/footer.php"; ?>

