<?php
// var_dump($_POST);
require_once "../../Model/dataBase.php";
require "../../function/function.php";
$connect = DBConnection();
$getAllUser = getAllUserData($connect);
echo "<pre>";
var_dump($getAllUser);
echo "</pre>";
$user = getLoginUser($connect, $_POST['m_code']);

if ($user) {
    if ($_POST['serial_number'] == $user->serial_number) {
        $_SESSION['m_code'] = $user->m_code;
        reDirect("../../View/home.php");
        echo $user->fname . " " . $user->lname . " " . "خوش آمدید";

    } else {
        echo "سریال شناسنامه اشتباه است*";
    }
} else {
    echo "کاربری با کد ملی وارد شده یافت نشد*";
}

var_dump($_SESSION);