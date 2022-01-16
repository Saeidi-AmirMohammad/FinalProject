<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");

$connect = DBConnection();

$_POST['id_grade'] = intval($_POST['id_grade']);
//var_dump($_POST);
$connect = DBConnection();

if (isPost()) {
    extract($_POST);
    if (validation_requre([
        is_numeric(htmlspecialchars($choose_lesson_id)),
        is_numeric(htmlspecialchars($student_id)),
        is_numeric(htmlspecialchars($grade))
    ])) {
        $data = [
            'grade' => $grade
        ];
       // var_dump($id_grade);die;
        $termvorod = grade_update($id_grade, $data, $connect);
        if ($termvorod) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        } else {
            $error = false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'شماره ترم نمی تواند تکراری باشد';
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

reDirect("../../../view/grade/all.php");
