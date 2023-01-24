<?php
session_start();
unset($_SESSION["userName"]);
var_dump($_SESSION);
header('Location: ../index.php');