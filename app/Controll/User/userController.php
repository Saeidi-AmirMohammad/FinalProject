<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");
//$n=\Carbon\Carbon::now();
//$date = jdate();
echo "<pre>";
//var_dump($_POST);die;
echo "</pre>";

/**
 * @param $type
 * @param $fname
 * @param $lname
 * @param $email
 * @param $tell
 * @param $m_code
 * @param $address
 * @param $serial_number
 * @param $jender
 * @param $father_name
 * @param $birthday_place
 * @param $mazhab
 * @param $university
 */
function user_func()
{
    extract($_POST);
    commonality($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university);

    reDirect("../../../view/user/all.php");
}
function teacher_func()
{
    extract($_POST);
    commonality($type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university
    );
un_commonality_teacher($codeModares,
    $martabeElmi_id,$employmentType_id,
    $teachingType_id,$madrak_id,
    $educationalGroup_id,$hozeDoroos_id);
    reDirect("../../../view/user/all.php");
}
function student_func()
{
    extract($_POST);

    commonality($type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university, $codeDaneshjo,
        $maghtae_id,$reshteTahsili_id,
        $termVorod_id,$nobatePaziresh_id,
        $vazeiateNezamVazife_id
    );
    reDirect("../../../view/user/all.php");
}
function employee_func()
{
    extract($_POST);
    commonality($type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university,$codeStandard
    );
    reDirect("../../../view/user/all.php");
}





/**
 * @param $type
 * @param $fname
 * @param $lname
 * @param $email
 * @param $tell
 * @param $m_code
 * @param $address
 * @param $serial_number
 * @param $jender
 * @param $father_name
 * @param $birthday_place
 * @param $mazhab
 * @param $university
 */
function commonality($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university)
{
    $out_date = convert($_POST["birthday"]);
    if (isPost()) {
        extract($_POST);
        create_user_($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university, $out_date);
    } else {
        $error = false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
        $_SESSION['type'] = 'danger';
    }
}
function un_commonality_teacher($codeModares,
                                $martabeElmi_id,$employmentType_id,
                                $teachingType_id,$madrak_id,
                                $educationalGroup_id,$hozeDoroos_id)
{
    if (isPost()) {
        extract($_POST);
        create_Teacher_($codeModares,
            $martabeElmi_id,$employmentType_id,
            $teachingType_id,$madrak_id,
            $educationalGroup_id,$hozeDoroos_id);
    } else {
        $error = false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
        $_SESSION['type'] = 'danger';
    }
}
/**
 * @param $type
 * @param $fname
 * @param $lname
 * @param $email
 * @param $tell
 * @param $m_code
 * @param $address
 * @param $serial_number
 * @param $jender
 * @param $father_name
 * @param $birthday_place
 * @param $mazhab
 * @param $university
 * @param string $out_date
 */
function create_user_($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university, string $out_date)
{
    if (validate_user_($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university, $out_date)) {
        $connect = DBConnection();
        $_POST['birthday'] = $out_date;
        $user = createUser($connect, $_POST);
        if ($user) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
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
        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد کنید.';
        $_SESSION['type'] = 'danger';
    }
}
function create_Teacher_($codeModares,
                         $martabeElmi_id,$employmentType_id,
                         $teachingType_id,$madrak_id,
                         $educationalGroup_id,$hozeDoroos_id)
{
    if (validate_Teacer_($codeModares,
        $martabeElmi_id,$employmentType_id,
        $teachingType_id,$madrak_id,
        $educationalGroup_id,$hozeDoroos_id)) {
        $connect = DBConnection();
        $user = createTeacher_un_commonality($connect, $_POST);
        if ($user) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
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
        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد کنید.';
        $_SESSION['type'] = 'danger';
    }
}

/**
 * @param $type
 * @param $fname
 * @param $lname
 * @param $email
 * @param $tell
 * @param $m_code
 * @param $address
 * @param $serial_number
 * @param $jender
 * @param $father_name
 * @param $birthday_place
 * @param $mazhab
 * @param $university
 * @param string $out_date
 * @return bool
 */
function validate_user_($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university, string $out_date): bool
{
    return validation_requre([
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
    ]);
}
function validate_Teacer_($codeModares,
                          $martabeElmi_id,$employmentType_id,
                          $teachingType_id,$madrak_id,
                          $educationalGroup_id,$hozeDoroos_id): bool
{
    return validation_requre([
        htmlspecialchars($codeModares),
        htmlspecialchars($martabeElmi_id),
        htmlspecialchars($employmentType_id),
        htmlspecialchars($teachingType_id),
        is_numeric(htmlspecialchars($madrak_id)),
        is_numeric(htmlspecialchars($educationalGroup_id)),
        htmlspecialchars($hozeDoroos_id)
    ]);
}
//switch ($_POST['type']){
//    case $_POST['type']=='teacher':
//        teacher_func();
//        break;
//    case $_POST['type']=='student':
//            student_func();
//            break;
//    case $_POST['type']=='employee':
//        employee_func();
//        break;
//
//}
//user_func();
teacher_func();
//student_func();
//employee_func();
