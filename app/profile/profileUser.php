<?php session_start();
if (!$_SESSION['userName']) header('Location: ../index.php'); ?>
<?php require_once "../include/header.php" ?>
<div>
    <h1>Hello <?= $_SESSION['userName'] ?></h1>
    <button id="logout">Выйти</button>
</div>
<?php require_once "../include/footer.php" ?>
