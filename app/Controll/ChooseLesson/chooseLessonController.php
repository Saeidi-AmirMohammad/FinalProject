<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");



if (!isset($_SESSION['user'])) {
    header('Location: /index.php ');
}






//var_dump($_POST);die;
if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($stuednt_id),
        htmlspecialchars($presentation_id)
    ])) {
        $connect = DBConnection();

if (! getallper_choose_exist($presentation_id,$connect)){
       $ChooseLesson = CreateChooseLesson($connect, $_POST);
        }
     if (getallowCapacity_choose($presentation_id,$connect) ){
       if (! getallowuniq_row_choose($stuednt_id,$presentation_id, $connect)){
           $ChooseLesson = CreateChooseLesson($connect, $_POST);
       }else{
           $error=true;
           $_SESSION['error'] = true;
           $_SESSION['massage'] ='انتخاب انجام شده';
           $_SESSION['type'] = 'danger';
       }

     }else{
         $error=true;
         $_SESSION['error'] = true;
         $_SESSION['massage'] = 'ظرفیت کلاس پرشده است';
         $_SESSION['type'] = 'danger';
     }
        if ($ChooseLesson){
            $error=true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
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

reDirect("../../../view/chooselesson/all.php");

