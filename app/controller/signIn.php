<?php
require_once '../../vendor/autoload.php';

use App\classes\FieldValid as FV;
use App\classes\JsonDB;

$field = new FV($_POST);
$field->checkSignInFields();
$data = new JsonDB();
$data->checkUserSignIn($field->getArrResult());
if (empty($data->getErrSignInUser())) {
    echo json_encode($data->getMessage());
} else {
    echo json_encode($data->getErrSignInUser());
}
