<?php
require __DIR__ . '/../../../bootstrap/autoload.php';

//echo '<pre>';
//
//var_dump($output = openssl_encrypt("hello", "AES-256-CBC", 'secret'));
//$o= $output;
//
//var_dump($output = openssl_decrypt($o, "AES-256-CBC", 'secret'));
////var_dump(base64_decode("This is really secret!"));
//echo '</pre>';

$out_seryal_hash=openssl_encrypt($_POST['serial_number'], "AES-256-CBC", 'secret');
if (ispost()) {
    extract($_POST);
    if (validation_requre([
           is_numeric( htmlspecialchars($m_code)),
            is_numeric( htmlspecialchars($serial_number))]
    )) {
        $connect = DBConnection();
        $user = getLoginUser($connect, $_POST['m_code']);
        if ($user) {
            if ($out_seryal_hash == $user->serial_number) {
                $_SESSION['user'] = $user->m_code;
                $_SESSION['user_type']=$user->type_id;
                $_SESSION['user_id']=$user->id;

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




