<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);
$_POST['code'] = intval($_POST['code']);
$_POST['status'] = intval($_POST['status']);
$connect = DBConnection();
if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($name),
        is_numeric(htmlspecialchars($code)),
        is_numeric(htmlspecialchars($status))
    ])) {
        $data = [
            'name' => $name,
            'code' => $code,
            'status' => $status
        ];
        $reshteTahsili = reshteTahsili_update($id, $data, $connect);
        if ($reshteTahsili) {
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

reDirect("../../../View/reshtetahsili/all.php");
