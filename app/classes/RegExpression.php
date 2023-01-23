<?php

namespace App\classes;

class RegExpression
{
    const REG_EXP = [
        "login" => "/^[a-zA-Z]+[a-zA-Z0-9-._]{5,}$/",
        "password" => "/^[0-9][a-zA-Z0-9]{4,}[a-zA-Z]+[a-zA-Z0-9]*|^[a-zA-Z][a-zA-Z0-9]{4,}[0-9]+[a-zA-Z0-9]*$/",
        "email" => "/^[a-zA-Z0-9]+[a-zA-Z0-9-_.]*[a-zA-Z0-9]+@[a-zA-Z]{2,}\.[a-zA-Z]{2,}/",
        "name" => "/^[a-zA-Zа-яА-Я]{2,}$/"
    ];
}


