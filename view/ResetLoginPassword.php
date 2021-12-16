<?php
require "../Section/index/header.php";
//session_start();
?>
<body class="img js-fullheight" style="background-image: url(../Public/IndexAssist/Image/login_bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">فرم بازيابی رمز عبور</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form action="./Controll/Login/loginController.php" method="POST" class="signin-form">
                        <div class="form-group">
                            <input type="text" name="m_code" class="form-control" placeholder="کد ملی" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="tell" class="form-control" maxlength="11"
                                   placeholder="شماره همراه" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">دريافت رمز عبور</button>
                        </div>
                        <div class="form-group d-flex">
                            <div class="w-50 text-md-left">
                                <a href="../index.php" style="color: #fff">برگشت به فرم ورود</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php
require "../Section/index/footer.php";
?>
