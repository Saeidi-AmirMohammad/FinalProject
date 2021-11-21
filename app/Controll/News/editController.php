<?php
require __DIR__ . '/../../../bootstrap/autoload.php';
login_before("../../../index.php");
//$n=\Carbon\Carbon::now();
//$date = jdate();

$connect = DBConnection();

$_POST['id'] = intval($_POST['id']);
$out_date = convert($_POST["date"]);
$connect = DBConnection();
$_POST['date'] = $out_date;
if (isPost()) {
    extract($_POST);
    if (validation_requre([
        htmlspecialchars($author),
        htmlspecialchars($title),
        htmlspecialchars($description)
    ])) {
        $data = [
            'author' => $author,
            'title' => $title,
            'description' => $description,
            'date' => $date
        ];
        $news = news_update($id, $data, $connect);
        if ($news) {
            $error = true;
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ویرایش شد';
            $_SESSION['type'] = 'success';
        }
//        } else {
//            $error = false;
//            $_SESSION['error'] = true;
//            $_SESSION['massage'] = 'کد ملی ، ایمیل ، شماره شناسنامه و تلفن همراه نمی توانند تکراری باشند';
//            $_SESSION['type'] = 'danger';
//        }
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

reDirect("../../../view/news/all.php");
