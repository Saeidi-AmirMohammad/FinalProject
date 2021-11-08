<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
if (ispost()) {
    extract($_POST);
    if (validation_requre([
           is_numeric( htmlspecialchars($m_code)),
            is_numeric( htmlspecialchars($serial_number))]
    )) {
        $connect = DBConnection();
        $user = getLoginUser($connect, $_POST['m_code']);
        if ($user) {
            if ($_POST['serial_number'] == $user->serial_number) {
                $_SESSION['user'] = $user->m_code;

                $_SESSION['error'] = true;
                $_SESSION['massage'] = $user->fname . " " . $user->lname . " " . "خوش آمدید";
                $_SESSION['type'] = 'success';
                reDirect("../../../view/home.php");

            } else {
                $_SESSION['error'] = true;
                $_SESSION['massage'] = 'سریال شناسنامه اشتباه است';
                $_SESSION['type'] = 'danger';
                reDirect('../../../index.php');
            }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کاربری با کد ملی وارد شده یافت نشد';
            $_SESSION['type'] = 'danger';
            reDirect('../../../index.php');
        }
    }else{
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا مقدیر صحیح وارد نمایید یا فیلد ها را پر کنید';
        $_SESSION['type'] = 'danger';
        reDirect('../../../index.php');
    }
}




