<?php
require '../layout/haeder.php';
?>

<form role="form" action="../../app/Controll/User/userController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید"
                           name="fname" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام خانوادگی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="نام خانوادگی را وارد کنید"
                           name="lname" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل را وارد کنید"
                           name="email" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره همراه</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="شماره همراه را وارد کنید"
                           name="tell" maxlength="11" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد ملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="کد ملی را وارد کنید"
                           name="m_code" maxlength="10" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">آدرس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="آدرس را وارد کنید"
                           name="address" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">شماره شناسنامه</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           placeholder="شماره شناسنامه را وارد کنید" name="serial_number" value="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>تاریخ تولد</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                        </div>
                        <input name="birthday" class="normal-example form-control pwt-datepicker-input-element">
                    </div>
                    <!-- /.input group -->
                </div>
                <!--            -->
                <div class="form-group">
                    <label for="jender">جنسیت</label>
                    <select class="form-control" id="jender" name="jender">
                        <option value="1">مرد</option>
                        <option value="0">زن</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام پدر</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام پدر را وارد کنید"
                           name="father_name" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مکان تولد</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="مکان تولد را وارد کنید"
                           name="birthday_place" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مذهب</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="مذهب را وارد کنید"
                           name="mazhab" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">دانشگاه</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="دانشگاه را وارد کنید"
                           name="university" value="">
                </div>
                <div class="form-group">
                    <label for="type">نوع کاربر</label>

                    <select class="form-control" id="type" name="type">
                        <option  selected >لطفا انتخاب کنید</option>
                        <option id="teacher" value="1">استاد</option>
                        <?php
                        if ( $_SESSION["user_type"]!=2):

                        ?>
                        <option id="employee" value="2">کارمند</option>
                        <?php
                        endif;
                        ?>
                        <option id="student" value="3">دانشجو</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="form2"></div>
    </div>
    <!-- /.card-body -->
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" >ثبت</button>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $( "select#type" ).change(function () {
                $( "select#type option#teacher:selected" ).each(function() {
                    return  $('div#form2').load('../teacher/create.php div.row');
                });
            $( "select#type option#employee:selected" ).each(function() {
                return  $('div#form2').load('../employee/create.php div.row');
            });
            $( "select#type option#student:selected" ).each(function() {
                return  $('div#form2').load('../student/create.php div.row');
            });
            })
            .change();
    })
</script>

<?php
require __DIR__ . '/../../view/layout/footer.php';
?>
