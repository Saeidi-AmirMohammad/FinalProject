<?php
?>
<form role="form" action="../../app/Controll/User/userController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید"
                           name="fname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام خانوادگی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="نام خانوادگی را وارد کنید"
                           name="lname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل را وارد کنید"
                           name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره همراه</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="شماره همراه را وارد کنید"
                           name="tell" maxlength="11">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد ملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="کد ملی را وارد کنید"
                           name="m_code" maxlength="10">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">آدرس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="آدرس را وارد کنید"
                           name="address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">شماره شناسنامه</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           placeholder="شماره شناسنامه را وارد کنید" name="serial_number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">تاریخ تولد</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="تاریخ تولد را وارد کنید"
                           name="birthday">
                    <span class="text-muted small">فرمت تاریخ تولد : ۱۳۷۹/۵/۱۱</span>
                </div>
                <div class="form-group">
                    <label for="jender">جنسیت</label>
                    <select class="form-control" id="jender" name="jender" >
                        <option value="1">مرد</option>
                        <option value="0">زن</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام پدر</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام پدر را وارد کنید"
                           name="father_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مکان تولد</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="مکان تولد را وارد کنید"
                           name="birthday_place">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مذهب</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="مذهب را وارد کنید"
                           name="mazhab">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">دانشگاه</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="دانشگاه را وارد کنید"
                          name="university">
                </div>
                <div class="form-group">
                    <label for="type">نوع کاربر</label>
                    <select class="form-control" id="type" name="type">
                        <option value="1">استاد</option>
                        <option value="2">کارمند</option>
                        <option value="3">دانشجو</option>
                        <option value="4">ادمین</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">ارسال</button>
    </div>
</form>
