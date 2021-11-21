<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);

$connect = DBConnection();
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
        $data = [
            'name' => $name,
            'code' => $code,
            'type' => $type,
            'saat_amali' => $saat_amali,
            'saat_teori' => $saat_teori,
            'vahed_amali' => $vahed_amali,
            'vahed_teori' => $vahed_teori,
            'pishniaz' => $pishniaz,
            'code_pishniaz' => $code_pishniaz,
        ];
        $_POST['saat_amali'] = intval($_POST['saat_amali']);
        $_POST['saat_teori'] = intval($_POST['saat_teori']);
        $_POST['vahed_amali'] = intval($_POST['vahed_amali']);
        $_POST['vahed_teori'] = intval($_POST['vahed_teori']);
        $_POST['code_pishniaz'] = intval($_POST['code_pishniaz']);
        $lessonCourse = lessonCourse_update($id, $data, $connect);
        if ($lessonCourse) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        } else {
            $error = false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کد رشته تحصیلی نمی تواند تکراری باشند';
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

reDirect("../../../view/lessoncourse/all.php");
