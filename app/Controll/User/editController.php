<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");
//$n=\Carbon\Carbon::now();
//$date = jdate();

$connect = DBConnection();
//$_POST['birthday']=$out_date;
echo "<pre>";
print_r(getAllUserData($connect))   ;
echo "</pre>";

//
//
//
//$out_date= convert($_POST["birthday"]);
//if (isPost()) {
//    extract($_POST);
//    if (validation_requre([
//        htmlspecialchars($type),
//        htmlspecialchars($fname),
//        htmlspecialchars($lname),
//        htmlspecialchars($email),
//        is_numeric(htmlspecialchars($tell)),
//        is_numeric( htmlspecialchars($m_code)),
//        htmlspecialchars($address),
//        is_numeric(htmlspecialchars($serial_number)),
//        htmlspecialchars($out_date),
//        htmlspecialchars($jender),
//        htmlspecialchars($father_name),
//        htmlspecialchars($birthday_place),
//        htmlspecialchars($mazhab),
//        htmlspecialchars($university)
//    ])) {
//
//        if ($user){
//            $error=true;
//            $_SESSION['error'] = true;
//            $_SESSION['massage'] = 'باموفقیت ثبت شد';
//            $_SESSION['type'] = 'success';
//        }else{
//            $error=false;
//            $_SESSION['error'] = true;
//            $_SESSION['massage'] = 'کد ملی ، ایمیل ، شماره شناسنامه و تلفن همراه نمی توانند تکراری باشند';
//            $_SESSION['type'] = 'danger';
//        }
//    }else{
//        $error=false;
//        $_SESSION['error'] = true;
//        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد نمایید.';
//        $_SESSION['type'] = 'danger';
//    }
//}else{
//    $error=false;
//    $_SESSION['error'] = true;
//    $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
//    $_SESSION['type'] = 'danger';
//}

//reDirect("../../../View/user/edit.php");
