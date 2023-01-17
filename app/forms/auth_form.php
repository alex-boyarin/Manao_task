<?php require_once "../include/header.php" ?>

<div>
    <form id="auth">
        <input type="text" name="login" placeholder="Введите логин" required>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <span id="error"></span>
        <input type="submit" id="btn" value="Войти">
        <p>Нет аккаунта? Нажми <a href="reg_form.php">Регистрация</a>!</p>
    </form>
</div>
<?php require_once "../include/footer.php" ?>
