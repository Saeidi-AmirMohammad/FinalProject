<?php
require "./Section/index/header.php";
session_start();
?>
<body class="img js-fullheight" style="background-image: url(./Public/IndexAssist/Image/login_bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">فرم ورود کاربر</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form action="./Controll/Login/loginController.php" method="POST" class="signin-form">
                        <div class="form-group">
                            <input type="text" name="m_code" class="form-control" placeholder="کد ملی" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" name="serial_number" class="form-control"
                                   placeholder="سریال شناسنامه" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">وارد شوید</button>
                        </div>
                        <div class="form-group d-flex">
                            <div class="w-50 text-md-left">
                                <a href="#" style="color: #fff">فراموشی رمز عبور</a>
                            </div>
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">مرا به خاطر بسپار
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            *کاربری با کد ملی وارد شده یافت نشد
                        </div>
                    </form>
                    <!-- <p class="w-100 text-center">وارد شوید با</p>
                    <div class="social d-flex text-center">
                        <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                        <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php
require "./Section/index/footer.php";
?>
