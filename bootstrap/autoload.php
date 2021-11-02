<?php
session_start();
require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../function/function.php';
date_default_timezone_set('Asia/Tehran');
\Morilog\Jalali\Jalalian::now();
