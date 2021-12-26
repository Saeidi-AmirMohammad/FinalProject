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
//function user_func()
//{
//    extract($_POST);
//    commonality_student($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university);
//
//    reDirect("../../../view/user/all.php");
//}
//
//



/*---------------------------teacher------------------------------------------------------------------------------------------*/


function teacher_func()
{


    extract($_POST);


    commonality($type, $fname,
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
function commonality($type, $fname,
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
        create_user_($type, $fname, $lname, $email, $tell, $m_code, $address, $serial_number, $jender, $father_name, $birthday_place, $mazhab, $university, $out_date, $codeModares,
            $martabeElmi_id, $employmentType_id,
            $teachingType_id, $madrak_id,
            $educationalGroup_id, $hozeDoroos_id);

    } else {
        $error = false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
        $_SESSION['type'] = 'danger';
    }
}

function un_commonality_teacher(
    $teacher_user_id,
    $codeModares,
    $martabeElmi_id, $employmentType_id,
    $teachingType_id, $madrak_id,
    $educationalGroup_id, $hozeDoroos_id)
{
    if (isPost()) {
        //  extract($_POST);
        create_Teacher_($teacher_user_id, $codeModares,
            $martabeElmi_id, $employmentType_id,
            $teachingType_id, $madrak_id,
            $educationalGroup_id, $hozeDoroos_id);
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
function create_user_($type, $fname, $lname, $email,
                      $tell, $m_code, $address, $serial_number,
                      $jender, $father_name, $birthday_place,
                      $mazhab, $university, string $out_date, $codeModares,
                      $martabeElmi_id, $employmentType_id,
                      $teachingType_id, $madrak_id,
                      $educationalGroup_id, $hozeDoroos_id)
{
    if (validate_user_(
        $type, $fname, $lname, $email, $tell, $m_code,
        $address, $serial_number, $jender, $father_name, $birthday_place,
        $mazhab, $university, $out_date, $codeModares,
        $martabeElmi_id, $employmentType_id,
        $teachingType_id, $madrak_id,
        $educationalGroup_id, $hozeDoroos_id)) {
        $connect = DBConnection();
        $birthday= $_POST['birthday'] = $out_date;
        $i=$_POST['id'] = intval($_POST['id']);
        $_POST['type'] = intval($_POST['type']);
//        echo "<pre>";
//        var_dump($_POST);die;
//        echo "</pre>";
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
        user_update($i, $data, $connect);
        $id_userNew = $i;
        $teacher_user_id = $id_userNew;
//        echo "<pre>";
//        var_dump($_POST);die;
//        echo "</pre>";


        un_commonality_teacher(
            $teacher_user_id,
            $codeModares,
            $martabeElmi_id, $employmentType_id,
            $teachingType_id, $madrak_id,
            $educationalGroup_id, $hozeDoroos_id);
        reDirect("../../../view/user/all.php");

    }
}

function create_Teacher_(
    $teacher_user_id,
    $codeModares,
    $martabeElmi_id, $employmentType_id,
    $teachingType_id, $madrak_id,
    $educationalGroup_id,
    $hozeDoroos_id)
{
    if (validate_Teacer_($teacher_user_id, $codeModares,
        $martabeElmi_id, $employmentType_id,
        $teachingType_id, $madrak_id,
        $educationalGroup_id, $hozeDoroos_id)) {
        $connect = DBConnection();
        // return $_POST;

        updateTeacher_un_commonality(
            $connect, $teacher_user_id, $codeModares,
            $martabeElmi_id, $employmentType_id,
            $teachingType_id, $madrak_id,
            $educationalGroup_id, $hozeDoroos_id);

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
function validate_user_($type, $fname, $lname, $email,
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

function validate_Teacer_(
    $teacher_user_id,
    $codeModares,
    $martabeElmi_id, $employmentType_id,
    $teachingType_id, $madrak_id,
    $educationalGroup_id, $hozeDoroos_id): bool
{
    return validation_requre([
        htmlspecialchars($teacher_user_id),
        htmlspecialchars($codeModares),
        htmlspecialchars($martabeElmi_id),
        htmlspecialchars($employmentType_id),
        htmlspecialchars($teachingType_id),
        is_numeric(htmlspecialchars($madrak_id)),
        is_numeric(htmlspecialchars($educationalGroup_id)),
        htmlspecialchars($hozeDoroos_id)
    ]);
}



/*---------------------------teacher------------------------------------------------------------------------------------------*/


/*---------------------------------------------employ------------------------------------------------------------------------*/

function employee_func()
{
    extract($_POST);
    commonality_employ(
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

function commonality_employ(   $type, $fname,
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

        create_user_employ(
            $type, $fname,
            $lname, $email,
            $tell, $m_code,
            $address, $serial_number,
            $jender, $father_name,
            $birthday_place, $mazhab,
            $university,$out_date,
            $codeStandard);

    }
}

function un_commonality_employ(
    $employ_user_id,
    $codeStandard
)
{
    if (isPost()) {
        create_employ_(
            $employ_user_id,
            $codeStandard
        );
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
function create_user_employ(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university,$out_date,
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
        $university,$out_date,
        $codeStandard
    )) {

        $connect = DBConnection();
        $_POST['birthday'] = $out_date;
        $user = createUser($connect, $_POST);
        $lastest_user = getlastestUserData($connect);
        $id_userNew = $lastest_user[0]->id;
        $employ_user_id = $id_userNew;
        echo "<pre>";
        var_dump(  $type, $fname,
            $lname, $email,
            $tell, $m_code,
            $address, $serial_number,
            $jender, $father_name,
            $birthday_place, $mazhab,
            $university,$out_date,
            $codeStandard, $employ_user_id

        );
        echo "</pre>";
        un_commonality_employ(
            $employ_user_id,
            $codeStandard
        );
    }
}

function create_employ_(
    $employ_user_id,
    $codeStandard
)
{
    if (validate_employ_(
        $employ_user_id,
        $codeStandard
    )) {
        $connect = DBConnection();
        // return $_POST;
        $user = createEmploy_un_commonality(
            $connect,
            $employ_user_id,
            $codeStandard
        );

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
function validate_user_employ(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university,string $out_date,
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

function validate_employ_(
    $employ_user_id,
    $codeStandard): bool
{
    return validation_requre([
        htmlspecialchars($employ_user_id),
        htmlspecialchars($codeStandard),
    ]);
}



/*---------------------------------employ------------------------------------------------------------------------------------*/

/*---------------------------------student------------------------------------------------------------------------------------*/



function student_func()
{
    extract($_POST);

    commonality_student(
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

function commonality_student(
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

        create_user_student(
            $type, $fname,
            $lname, $email,
            $tell, $m_code,
            $address, $serial_number,
            $jender, $father_name,
            $birthday_place, $mazhab,
            $university,$out_date, $codeDaneshjo,
            $maghtae_id, $reshteTahsili_id,
            $termVorod_id, $nobatePaziresh_id,
            $vazeiateNezamVazife_id


        );

    }
}

function un_commonality_student(
    $student_user_id,
    $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id
)
{
    if (isPost()) {
        create_student_(
            $student_user_id,
            $codeDaneshjo,
            $maghtae_id, $reshteTahsili_id,
            $termVorod_id, $nobatePaziresh_id,
            $vazeiateNezamVazife_id
        );
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
function create_user_student(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university,$out_date, $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id

)
{
    if (validate_user_student(
        $type, $fname,
        $lname, $email,
        $tell, $m_code,
        $address, $serial_number,
        $jender, $father_name,
        $birthday_place, $mazhab,
        $university,$out_date, $codeDaneshjo,
        $maghtae_id, $reshteTahsili_id,
        $termVorod_id, $nobatePaziresh_id,
        $vazeiateNezamVazife_id

    )) {

        $connect = DBConnection();
        $_POST['birthday'] = $out_date;
        createUser($connect, $_POST);
        $lastest_user = getlastestUserData($connect);
        $id_userNew = $lastest_user[0]->id;
        $student_user_id = $id_userNew;

        un_commonality_student(
            $student_user_id,
            $codeDaneshjo,
            $maghtae_id, $reshteTahsili_id,
            $termVorod_id, $nobatePaziresh_id,
            $vazeiateNezamVazife_id
        );
    }
}

function create_student_(
    $student_user_id,
    $codeDaneshjo,
    $maghtae_id, $reshteTahsili_id,
    $termVorod_id, $nobatePaziresh_id,
    $vazeiateNezamVazife_id
)
{
    if (validate_student_(
        $student_user_id,
        $codeDaneshjo,
        $maghtae_id, $reshteTahsili_id,
        $termVorod_id, $nobatePaziresh_id,
        $vazeiateNezamVazife_id
    )) {
        $connect = DBConnection();
        // return $_POST;
        createStudent_un_commonality(
            $connect,
            $student_user_id,
            $codeDaneshjo,
            $maghtae_id, $reshteTahsili_id,
            $termVorod_id, $nobatePaziresh_id,
            $vazeiateNezamVazife_id
        );

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
function validate_user_student(
    $type, $fname,
    $lname, $email,
    $tell, $m_code,
    $address, $serial_number,
    $jender, $father_name,
    $birthday_place, $mazhab,
    $university,string $out_date, $codeDaneshjo,
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






/*----------------------------------student-----------------------------------------------------------------------------------*/

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
}
//user_func();
//teacher_func();
//student_func();
//employee_func();





