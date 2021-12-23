<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");
echo "<pre>";
var_dump($_POST);die;
echo "</pre>";
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
        $connect = DBConnection();
        echo "<pre>";
        $data=[
            'lessonCourse_id'=> intval( $_POST['lessonCourse_id']),
            'educationalGroup_id'=> intval( $_POST['educationalGroup_id']),
            'teacher_id'=> intval( $_POST['teacher_id']),
            'classRoom_id'=> intval( $_POST['classRoom_id']),
            'capacity'=> intval( $_POST['capacity']),
            'day'=>  $_POST['day'],
            'class_time'=>  $_POST['class_time'],
            'presentation_code'=>$_POST['presentation_code'],
        ];
var_dump($data);
        echo "</pre>";
        $presentaion = createPresentaion($connect, $data);
        if ($presentaion){
            $error=true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
        }else{
            $error=false;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'کد ارائه نمی تواند تکراری باشد';
            $_SESSION['type'] = 'danger';
        }
    }else{
        $error=false;
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'لطفا فیلد ها را پر نمایید یا مقادیر صحیح وارد کنید.';
        $_SESSION['type'] = 'danger';
    }
}else{
    $error=false;
    $_SESSION['error'] = true;
    $_SESSION['massage'] = 'لطفا درخواست خود را به صورت post ارسال کیند';
    $_SESSION['type'] = 'danger';
}

reDirect("../../../view/presentation/all.php");

