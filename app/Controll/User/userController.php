<?php
require __DIR__ . '/../../../bootstrap/autoload.php';

//\Carbon\Carbon::now();
$date = jdate();

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($type),
        htmlspecialchars($fname),
        htmlspecialchars($lname),
        htmlspecialchars($email),
        htmlspecialchars($tell),
        htmlspecialchars($m_code),
        htmlspecialchars($address),
        htmlspecialchars($serial_number),
        htmlspecialchars($birthday),
        htmlspecialchars($jender),
        htmlspecialchars($father_name),
        htmlspecialchars($birthday_place),
        htmlspecialchars($mazhab),
        htmlspecialchars($university)
    ])) {
        $connect = DBConnection();
        $user = createUser($connect, $_POST);
        if ($user){
            $error=true;
        }else{
            $error=false;
        }
    }else{
        $error=false;
    }
}else{
    $error=false;
}
if ($error == true) {
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'باموفقیت ثبت شد';
    $_SESSION['type'] = 'success';
} else {
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'خطایی رخ داده است لطفا برسی نمایید';
    $_SESSION['type'] = 'danger';
}
reDirect("../../../View/user/create.php");
//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";
