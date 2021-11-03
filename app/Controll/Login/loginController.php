<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
if (ispost()) {
    extract($_POST);
    if (validation_requre([
            htmlspecialchars($m_code),
            htmlspecialchars($serial_number)]
    )) {
        $connect = DBConnection();
        $user = getLoginUser($connect, $_POST['m_code']);
        if ($user) {
            if ($_POST['serial_number'] == $user->serial_number) {
                $_SESSION['m_code'] = $user->m_code;
                reDirect("../../../View/home.php");
                echo $user->fname . " " . $user->lname . " " . "خوش آمدید";

            } else {
                $_SESSION['error'] = true;
                $_SESSION['massage'] = 'سریال شناسنامه اشتباه است';
                $_SESSION['type'] = 'danger';
            }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کاربری با کد ملی وارد شده یافت نشد';
            $_SESSION['type'] = 'danger';
        }
    }
}
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'باموفقیت ثبت شد';
    $_SESSION['type'] = 'success';

reDirect("../../../View/home.php");

