<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");
//$n=\Carbon\Carbon::now();
//$date = jdate();
$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);
$_POST['jender'] = intval($_POST['jender']);
$_POST['type'] = intval($_POST['type']);
$out_date = convert($_POST["birthday"]);
$connect = DBConnection();
$_POST['birthday'] = $out_date;
if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($type),
        htmlspecialchars($fname),
        htmlspecialchars($lname),
        htmlspecialchars($email),
        is_numeric(htmlspecialchars($tell)),
        is_numeric(htmlspecialchars($m_code)),
        htmlspecialchars($address),
        is_numeric(htmlspecialchars($serial_number)),
        htmlspecialchars($out_date),
        is_numeric(htmlspecialchars($jender)),
        htmlspecialchars($father_name),
        htmlspecialchars($birthday_place),
        htmlspecialchars($mazhab),
        htmlspecialchars($university)
    ])) {
        $data = [
            'type_id' => $type,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'tell' => $tell,
            'm_code' => $m_code,
            'birthday' => $birthday,
            'address' => $address,
            'serial_number' => $serial_number,
            'father_name' => $father_name,
            'jender' => $jender,
            'birthday_place' => $birthday_place,
            'mazhab' => $mazhab,
            'university' => $university
        ];

        $user = user_update($id, $data, $connect);
        if ($user) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        } else {
            $error = false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کد ملی ، ایمیل ، شماره شناسنامه و تلفن همراه نمی توانند تکراری باشند';
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


reDirect("../../../view/user/all.php");
