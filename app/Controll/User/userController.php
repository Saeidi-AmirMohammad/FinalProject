<?php
require_once "../../../app/Model/dataBase.php";
require __DIR__.'/../../../bootstrap/autoload.php';
$connect = DBConnection();
createUser($connect, $_POST);
$date=jdate();
echo "<pre>";
var_dump($date);
echo "</pre>";

//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";
