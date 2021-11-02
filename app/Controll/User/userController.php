<?php
require_once "../../../app/Model/dataBase.php";
require __DIR__.'/../../../bootstrap/autoload.php';

$connect = DBConnection();
$user = createUser($connect, $_POST);
\Carbon\Carbon::now();
$date=jdate();
echo "<pre>";
//var_dump($date);
echo "</pre>";
if($user == true){
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'باموفقیت ثبت شد';
    $_SESSION['type'] = 'success';
}else{
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'اشتباه میباشد در خواست لطفا بررسی نمایید';
    $_SESSION['type'] = 'danger';
}
reDirect("../../../View/home.php");
//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";
