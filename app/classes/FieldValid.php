<?php

namespace App\classes;

use App\message\ErrMessage;

class FieldValid
{
    private array $errFieldValid = [];
    private array $arrParam;
    private array $arrResult;

    public function __construct(array $arrParam)
    {
        $this->arrParam = $arrParam;
    }

    public function checkRegFields()
    {
        foreach ($this->arrParam as $key => $value) {
            if ($key !== 'confPass') {
                if (preg_match(RegExpression::REG_EXP[$key], UtilClass::sanitizeString($value))) {
                    if ($key === 'password') {
                        $confPass = UtilClass::sanitizeString($this->arrParam['confPass']);
                        if (UtilClass::compare($value, $confPass)) {
                            $value = UtilClass::passEncrypt($value);
                        } else {
                            $this->errFieldValid['confPass'] = ErrMessage::FIELDS['confPass'];
                            $value = "";
                        }
                    }
                    $this->arrResult[$key] = $value;
                } else {
                    $this->errFieldValid[$key] = ErrMessage::FIELDS[$key];
                    $this->arrResult[$key] = "";
                }
            }
        }
    }

    public function checkSignInFields()
    {
        $this->arrResult['login'] = UtilClass::sanitizeString($this->arrParam['login']);
        $this->arrResult['password'] = UtilClass::sanitizeString($this->arrParam['password']);
    }

    public function getErrFieldValid(): array
    {
        return $this->errFieldValid;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}