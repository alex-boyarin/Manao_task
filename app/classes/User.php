<?php

namespace App\classes;

class User implements \JsonSerializable
{
    private $login;
    private $password;
    private $email;
    private $name;

    public function __construct($arrResult)
    {
        $this->login = $arrResult['login'];
        $this->password = $arrResult['password'];
        $this->email = $arrResult['email'];
        $this->name = $arrResult['name'];
    }

    public function jsonSerialize(): array
    {
        return array(
            "login" => $this->login,
            "password" => $this->password,
            "email" => $this->email,
            "name" => $this->name
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }
}