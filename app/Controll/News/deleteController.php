<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
$conn=DBConnection();
foreach ($_POST['delete'] as $key){
        news_delete_id($key,$conn);
}
$error = true;
$_SESSION['error'] = true;
$_SESSION['massage'] = 'باموفقیت حذف شد';
$_SESSION['type'] = 'success';
reDirect('../../../view/news/all.php');



