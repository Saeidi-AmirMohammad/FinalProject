<?php
// var_dump($_POST);
require_once "../../Model/dataBase.php";

$connect = DBConnection();
$uGet = userGet($connect);
echo "<pre>";
var_dump($uGet);
echo "</pre>";
?>

