<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($lessonCourse_id),
        htmlspecialchars($educationalGroup_id),
        htmlspecialchars($teacher_id),
        htmlspecialchars($classRoom_id),
        is_numeric(htmlspecialchars($capacity)),
        htmlspecialchars($day),
        htmlspecialchars($class_time),
        is_numeric( htmlspecialchars($presentation_code))
    ])) {
        $connect = DBConnection();
        $presentaion = createPresentaion($connect, $_POST);
        if ($presentaion){
            $error=true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
        }else{
            $error=false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کدارائه نمی تواند تکراری باند';
            $_SESSION['type'] = 'danger';
        }
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

reDirect("../../../view/presentation/all.php");

