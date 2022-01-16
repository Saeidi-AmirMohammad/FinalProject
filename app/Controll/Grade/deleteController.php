<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
$conn=DBConnection();

//var_dump($_POST);die;
foreach ($_POST['delete'] as $key){
    grade_delete_id($key,$conn);
}
$error = true;
$_SESSION['error'] = true;
$_SESSION['massage'] = 'باموفقیت حذف شد';
$_SESSION['type'] = 'success';
reDirect('../../../view/grade/all.php');



