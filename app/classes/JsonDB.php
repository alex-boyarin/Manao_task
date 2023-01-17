<?php

namespace App\classes;

use App\message\ErrMessage;
use App\message\Message;

class JsonDB
{
    private $arrUsers;
    private array $errWriteUser = [];
    private array $errSignInUser = [];
    private array $message = [];

    public function __construct()
    {
        $this->arrUsers = $this->readDB();
    }

    private function readDB()
    {
        if (file_exists('../usersDB.json')) {
            $users = file_get_contents('../usersDB.json');
            return json_decode($users, true);
        }
    }

    public function checkUserReg(User $user)
    {
        if (!empty($this->arrUsers)) {
            foreach ($this->arrUsers as $usersValue) {
                foreach ($usersValue as $key => $value) {
                    if (UtilClass::compare($value, $user->getLogin()) ||
                        UtilClass::compare($value, $user->getEmail())) {
                        $this->errWriteUser[$key] = ErrMessage::SIGN_UP[$key];
                        break;
                    }
                }
            }
        }
    }

    public function checkUserSignIn(array $arrParam)
    {
        if (!empty($this->arrUsers)) {
            $result="";
            foreach ($this->arrUsers as $usersValue) {
                if (UtilClass::compare($usersValue['login'], $arrParam['login']) &&
                    UtilClass::compare($usersValue['password'], UtilClass::passEncrypt($arrParam['password']))) {
                    $result = $usersValue;
                    $this->message['authUser'] = Message::SIGN_IN['authUser'] . " " . $result['name'];
                    break;
                }
            }
            if (empty($result)) {
                $this->errSignInUser['error'] = ErrMessage::SIGN_IN['error'];
            }
        } else {
            $this->errSignInUser['error'] = ErrMessage::SIGN_IN['emptyDB'];
        }
    }

    function insertInDB(User $user)
    {
        $this->arrUsers[] = $user;
        file_put_contents('../usersDB.json', json_encode($this->arrUsers));
        $this->message['authUser'] = Message::SIGN_IN['authUser'] . " " . $user->getName();
    }

    public function getErrWriteUser(): array
    {
        return $this->errWriteUser;
    }

    public function getErrSignInUser(): array
    {
        return $this->errSignInUser;
    }

    public function getMessage(): array
    {
        return $this->message;
    }
}
