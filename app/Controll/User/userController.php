<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");


/*---------------------------teacher--------------------------------*/
function teacher_func()
{
    extract($_POST);
    teacher_All_ispost($type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university,
        $codeModares,
        $martabeElmi_id, $employmentType_id,
        $teachingType_id, $madrak_id,
        $educationalGroup_id, $hozeDoroos_id
    );

    reDirect("../../../view/user/all.php");
}

function teacher_All_ispost($type, $fname,
                            $lname, $email,
                            $tell, $m_code,
                            $address, $serial_number,
                            $jender, $father_name,
                            $birthday_place, $mazhab,
                            $university, $codeModares,
                            $martabeElmi_id, $employmentType_id,
                            $teachingType_id, $madrak_id,
                            $educationalGroup_id, $hozeDoroos_id)
{
    $out_date = convert($_POST["birthday"]);
    if (isPost()) {
        extract($_POST);
        teacher_validation_and_create($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university, $out_date, $codeModares,
            $martabeElmi_id, $employmentType_id,
            $teachingType_id, $madrak_id,
            $educationalGroup_id, $hozeDoroos_id);

    }
}


function teacher_validation_and_create($type, $fname, $lname, $email,
                                       $tell, $m_code, $address, $serial_number,
                                       $jender, $father_name, $birthday_place,
                                       $mazhab, $university, string $out_date, $codeModares,
                                       $martabeElmi_id, $employmentType_id,
                                       $teachingType_id, $madrak_id,
                                       $educationalGroup_id, $hozeDoroos_id)
{
    if (validate_data(
        $type, $fname, $lname, $email, $tell, $m_code,
        $address, $serial_number, $jender, $father_name, $birthday_place,
        $mazhab, $university, $out_date, $codeModares,
        $martabeElmi_id, $employmentType_id,
        $teachingType_id, $madrak_id,
        $educationalGroup_id, $hozeDoroos_id)) {
        $connect = DBConnection();
        $_POST['birthday'] = $out_date;
        $out = createUser_Common($connect, $_POST);
        $lastest_user = getlastestUserData($connect);
        $id_userNew = $lastest_user[0]->id;
        $teacher_user_id = $id_userNew;
        $out2 = createTeacher_un_commonality($connect, $teacher_user_id, $codeModares,
            $martabeElmi_id, $employmentType_id,
            $teachingType_id, $madrak_id,
            $educationalGroup_id, $hozeDoroos_id);

        if (!($out) || !($out2)) {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'عملیات ناموفق لطفا برسی کنید';
            $_SESSION['type'] = 'danger';
            reDirect("../../../view/user/all.php");
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'با موفقیت ایجاد شد';
            $_SESSION['type'] = 'success';
        }
    } else {
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'عملیات ناموفق لطفا برسی کنید';
        $_SESSION['type'] = 'danger';
        reDirect("../../../view/user/all.php");
    }
}

function validate_data($type, $fname, $lname, $email,
    $tell, $m_code, $address, $serial_number,
    $jender, $father_name, $birthday_place, $mazhab, $university,
                       string $out_date,
    $martabeElmi_id, $employmentType_id,
    $teachingType_id, $madrak_id,
    $educationalGroup_id, $hozeDoroos_id
): bool
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
        htmlspecialchars($university),
        htmlspecialchars($martabeElmi_id),
        htmlspecialchars($employmentType_id),
        htmlspecialchars($teachingType_id),
        htmlspecialchars($madrak_id),
        htmlspecialchars($educationalGroup_id),
        htmlspecialchars($hozeDoroos_id)
    ]);
}

/*---------------------------teacher--------------------------------*/

/*---------------------------employee--------------------------------*/
function employee_func()
{
    extract($_POST);
    all_employ_ispost(
        $type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university, $codeStandard
    );
    reDirect("../../../view/user/all.php");
}

function all_employ_ispost($type, $fname,
                           $lname, $email,
                           $tell, $m_code,
                           $address, $serial_number,
                           $jender, $father_name,
                           $birthday_place, $mazhab,
                           $university, $codeStandard)
{
    $out_date = convert($_POST["birthday"]);
    if (isPost()) {
        extract($_POST);
        validate_and_Create_employ(
            $type, $fname,
            $lname, $email,
            $tell, $m_code,
            $address, $serial_number,
            $jender, $father_name,
            $birthday_place, $mazhab,
            $university, $out_date,
            $codeStandard);

    }
}

function validate_and_Create_employ(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university, $out_date,
    $codeStandard
)
{
    if (validate_user_employ(
        $type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university, $out_date,
        $codeStandard
    )) {
        $connect = DBConnection();
        $_POST['birthday'] = $out_date;
        $out = createUser_Common($connect, $_POST);
        $lastest_user = getlastestUserData($connect);
        $id_userNew = $lastest_user[0]->id;
        $employ_user_id = $id_userNew;
        $out2 = createEmploy_un_commonality(
            $connect,
            $employ_user_id,
            $codeStandard
        );

        if (!($out) || !($out2)) {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'عملیات ناموفق لطفا برسی کنید';
            $_SESSION['type'] = 'danger';
            reDirect("../../../view/user/all.php");
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'با موفقیت ایجاد شد';
            $_SESSION['type'] = 'success';
        }
    }
}

function validate_user_employ(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university, string $out_date,
    $codeStandard
): bool
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
        htmlspecialchars($university),
        htmlspecialchars($codeStandard)
    ]);
}


/*---------------------------employee--------------------------------*/

/*---------------------------student--------------------------------*/

function student_func()
{
    extract($_POST);

    all_student(
        $type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university, $codeDaneshjo,
        $maghtae_id, $reshteTahsili_id,
        $termVorod_id, $nobatePaziresh_id,
        $vazeiateNezamVazife_id
    );
    reDirect("../../../view/user/all.php");
}

function all_student(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university, $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id
)
{
    $out_date = convert($_POST["birthday"]);
    if (isPost()) {
        extract($_POST);
        validate_and_create_student(
            $type, $fname,
            $lname, $email,
            $tell, $m_code,
            $address, $serial_number,
            $jender, $father_name,
            $birthday_place, $mazhab,
            $university, $out_date, $codeDaneshjo,
            $maghtae_id, $reshteTahsili_id,
            $termVorod_id, $nobatePaziresh_id,
            $vazeiateNezamVazife_id
        );
    }
}


function validate_and_create_student(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university, $out_date, $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id

)
{
    if (validate_student(
        $type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university, $out_date, $codeDaneshjo,
        $maghtae_id, $reshteTahsili_id,
        $termVorod_id, $nobatePaziresh_id,
        $vazeiateNezamVazife_id

    )) {
        $connect = DBConnection();
        $_POST['birthday'] = $out_date;
        $out = createUser_Common($connect, $_POST);
        $lastest_user = getlastestUserData($connect);
        $id_userNew = $lastest_user[0]->id;
        $student_user_id = $id_userNew;
        $out2 = createStudent_un_commonality(
            $connect,
            $student_user_id,
            $codeDaneshjo,
            $maghtae_id, $reshteTahsili_id,
            $termVorod_id, $nobatePaziresh_id,
            $vazeiateNezamVazife_id
        );
        if (!($out) || !($out2)) {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'عملیات ناموفق لطفا برسی کنید';
            $_SESSION['type'] = 'danger';
            reDirect("../../../view/user/all.php");
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'با موفقیت ایجاد شد';
            $_SESSION['type'] = 'success';
        }
    }
}

function validate_student(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university, string $out_date, $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id

): bool
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
        htmlspecialchars($university),
        htmlspecialchars($codeDaneshjo),
        is_numeric(htmlspecialchars($maghtae_id)),
        is_numeric(htmlspecialchars($reshteTahsili_id)),
        is_numeric(htmlspecialchars($termVorod_id)),
        is_numeric(htmlspecialchars($nobatePaziresh_id)),
        is_numeric(htmlspecialchars($vazeiateNezamVazife_id))
    ]);
}

function validate_student_(
    $student_user_id,
    $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id
): bool
{
    return validation_requre([
        htmlspecialchars($student_user_id),
        htmlspecialchars($codeDaneshjo),
        htmlspecialchars($maghtae_id),
        htmlspecialchars($reshteTahsili_id),
        htmlspecialchars($termVorod_id),
        htmlspecialchars($nobatePaziresh_id),
        htmlspecialchars($vazeiateNezamVazife_id),
    ]);
}

/*---------------------------student--------------------------------*/

switch (true) {
    case $_POST['type'] == '1':
        teacher_func();
        break;
    case $_POST['type'] == '2':
        employee_func();
        break;
    case $_POST['type'] == '3':
        student_func();
        break;
    default:
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'عملیات ناموفق لطفا برسی کنید';
        $_SESSION['type'] = 'danger';
        reDirect("../../../view/user/all.php");
}


