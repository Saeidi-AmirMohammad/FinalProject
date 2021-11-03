<?php
session_start();
require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../function/function.php';
require_once __DIR__."/../app/Model/dataBase.php";

date_default_timezone_set('Asia/Tehran');
\Morilog\Jalali\Jalalian::now();
