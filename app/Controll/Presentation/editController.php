<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);
$_POST['lessonCourse_id'] = intval($_POST['lessonCourse_id']);
$_POST['educationalGroup_id'] = intval($_POST['educationalGroup_id']);
$_POST['teacher_id'] = intval($_POST['teacher_id']);
$_POST['classRoom_id'] = intval($_POST['classRoom_id']);

$connect = DBConnection();
if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($lessonCourse_id),
        htmlspecialchars($educationalGroup_id),
        htmlspecialchars($teacher_id),
        htmlspecialchars($classRoom_id),
        is_numeric(htmlspecialchars($capacity)),
        htmlspecialchars($day),
        htmlspecialchars($class_time),
        is_numeric( htmlspecialchars($presentation_code))
    ])) {
        $data = [
            'type_id' => $lessonCourse_id,
            'fname' => $educationalGroup_id,
            'lname' => $teacher_id,
            'email' => $classRoom_id,
            'tell' => $capacity,
            'm_code' => $day,
            'birthday' => $class_time,
            'address' => $presentation_code
        ];

        $user = presentation_update($id, $data, $connect);
        if ($user) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        } else {
            $error = false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کدارائه نمی تواند تکراری باند';
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

reDirect("../../../view/presentation/all.php");
