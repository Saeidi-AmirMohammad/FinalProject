<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($name),
        is_numeric(htmlspecialchars($code)),
        htmlspecialchars($type),
        is_numeric(htmlspecialchars($saat_amali)),
        is_numeric(htmlspecialchars($saat_teori)),
        is_numeric(htmlspecialchars($vahed_amali)),
        is_numeric(htmlspecialchars($vahed_teori))
    ])) {
        htmlspecialchars($pishniaz);
        is_numeric(htmlspecialchars($code_pishniaz));
        $connect = DBConnection();
        $lessonCourse = createLessonCourse($connect, $_POST);
        if ($lessonCourse) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
        } else {
            $error = false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کد درس و کد پیشنیاز درس نمی توانند تکراری باشند';
            $_SESSION['type'] = 'danger';
        }
    } else {
        $error = false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد کنید.';
        $_SESSION['type'] = 'danger';
    }
} else {
    $error = false;
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
    $_SESSION['type'] = 'danger';
}

reDirect("../../../view/lessoncourse/all.php");

