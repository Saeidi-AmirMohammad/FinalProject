<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);
$_POST['stuednt_id'] = intval($_POST['stuednt_id']);
$_POST['presentation_id'] = intval($_POST['presentation_id']);
$connect = DBConnection();
if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($stuednt_id),
        htmlspecialchars($presentation_id)
    ])) {
        $data = [
            'stuednt_id' => $stuednt_id,
            'presentation_id' => $presentation_id
        ];

        $ChooseLesson = chooselesson_update($id, $data, $connect);
        if ($ChooseLesson) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        }
//        else {
//            $error = false;
//            $_SESSION['error'] = true;
//            $_SESSION['massage'] = 'کد ملی ، ایمیل ، شماره شناسنامه و تلفن همراه نمی توانند تکراری باشند';
//            $_SESSION['type'] = 'danger';
//        }
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

reDirect("../../../view/chooselesson/all.php");
