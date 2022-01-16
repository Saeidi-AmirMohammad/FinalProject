<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

//var_dump($_POST);die;
if (isPost()) {
    extract($_POST);
    if (validation_requre([

        is_numeric(htmlspecialchars($choose_lesson_id)),
        is_numeric(htmlspecialchars($student_id)),
        is_numeric(htmlspecialchars($grade))
    ])) {
        $connect = DBConnection();
        $termvorod = createGrade($connect, $_POST);
        if ($termvorod){
            $error=true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
        }else{
            $error=false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'شماره ترم نمی تواند تکراری باشد';
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

reDirect("../../../view/grade/all.php");

