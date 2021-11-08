<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
$conn=DBConnection();
//$data= user_Get_id($key,$conn);
foreach ($_POST['delete'] as $key){
        user_delete_id($key,$conn);
}
reDirect('../../../view/user/all.php');



