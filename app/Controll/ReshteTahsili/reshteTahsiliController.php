<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($name),
        is_numeric(htmlspecialchars($code)),
        is_numeric(htmlspecialchars($status))
    ])) {

        $connect = DBConnection();
        $reshteTahsili = createReshteTahsili($connect, $_POST);
        if ($reshteTahsili){
            $error=true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
        }else{
            $error=false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کد رشته تحصیلی نمی تواند تکراری باشند';
            $_SESSION['type'] = 'danger';
        }
    }else{
        $error=false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا فیلد را پر نمایید یا مقادیر صحیح وارد کنید.';
        $_SESSION['type'] = 'danger';
    }
}else{
    $error=false;
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
    $_SESSION['type'] = 'danger';
}
reDirect("../../../view/reshtetahsili/all.php");