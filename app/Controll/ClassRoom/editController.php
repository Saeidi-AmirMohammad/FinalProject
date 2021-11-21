<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);

$connect = DBConnection();

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        is_numeric(htmlspecialchars($class_code))
    ])) {
        $data = [
            'class_code' => $class_code
        ];
        $_POST['class_code'] = intval($_POST['class_code']);
        $classroom = classroom_update($id, $data, $connect);
        if ($classroom) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        } else {
            $error = false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'شماره کلاس نمی تواند تکراری باشد';
            $_SESSION['type'] = 'danger';
        }
    } else {
        $error = false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد نمایید.';
        $_SESSION['type'] = 'danger';
    }
} else {
    $error = false;
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
    $_SESSION['type'] = 'danger';
}

reDirect("../../../view/classroom/all.php");
