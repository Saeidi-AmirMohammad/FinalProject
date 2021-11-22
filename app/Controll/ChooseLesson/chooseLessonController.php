<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($stuednt_id),
        htmlspecialchars($presentation_id)
    ])) {
        $connect = DBConnection();
        $ChooseLesson = CreateChooseLesson($connect, $_POST);
        if ($ChooseLesson){
            $error=true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
        }
//        else{
//            $error=false;
//            $_SESSION['error'] = true;
//            $_SESSION['massage'] = 'کد ملی ، ایمیل ، شماره شناسنامه و تلفن همراه نمی توانند تکراری باشند';
//            $_SESSION['type'] = 'danger';
//        }
    }else{
        $error=false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد کنید.';
        $_SESSION['type'] = 'danger';
    }
}else{
    $error=false;
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
    $_SESSION['type'] = 'danger';
}

reDirect("../../../view/chooselesson/all.php");

