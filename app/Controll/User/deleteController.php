<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
$conn=DBConnection();
//$data= user_Get_id($key,$conn);
foreach ($_POST['delete'] as $key){
        user_delete_id($key,$conn);
}
$error = true;
$_SESSION['error'] = true;
$_SESSION['massage'] = 'باموفقیت حذف شد';
$_SESSION['type'] = 'success';
reDirect('../../../view/user/all.php');



