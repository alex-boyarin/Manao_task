<?php
require_once '../../vendor/autoload.php';

use App\classes\FieldValid as FV;
use App\classes\JsonDB;
use App\classes\User;

$formField = new FV($_POST);
$formField->checkRegFields();
if (empty($formField->getErrFieldValid())) {
    $user = new User($formField->getArrResult());
    $data = new JsonDB();
    $data->checkUserReg($user);
    if (empty($data->getErrWriteUser())) {
        $data->insertInDB($user);
        echo json_encode($data->getMessage());
    } else {
        echo json_encode($data->getErrWriteUser());
    }
} else {
    echo json_encode($formField->getErrFieldValid());
}
