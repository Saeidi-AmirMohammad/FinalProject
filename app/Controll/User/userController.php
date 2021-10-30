<?php
require_once "../../../app/Model/dataBase.php";
require __DIR__.'/../../../bootstrap/autoload.php';
require __DIR__."/../../../function/function.php";
$connect = DBConnection();
$user = createUser($connect, $_POST);
\Carbon\Carbon::now();
$date=jdate();
echo "<pre>";
//var_dump($date);
echo "</pre>";
if($user == true){
    $_SESSION['error'] = true;
}
reDirect("../../../View/home.php");
//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";
