<?php
// var_dump($_POST);

require_once "../../Model/dataBase.php";
$connect = DBConnection();
$uGet = getAll($connect);
echo "<pre>";
var_dump($uGet);
echo "</pre>";
$user = userGet($connect, $_POST['m_code']);

if ($user) {
    if ($_POST['serial_number'] == $user->serial_number) {
        $_SESSION['m_code'] = $user->m_code;
    }
}

var_dump($_SESSION);