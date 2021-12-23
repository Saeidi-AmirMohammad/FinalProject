<?php


require '../layout/haeder.php';

$connect = DBConnection();
//$_POST['birthday']=$out_date;
//$user=getAllUserData($connect);
//var_dump($_GET['edit']);die;
$id=$_GET['edit'];
$_SESSION['edit']=$_GET['edit'];
$user= user_Get_id($id,$connect);
?>



<form role="form" action="../../app/Controll/User/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه کاربر در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $user->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $user->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید"
                           name="fname" value="<?= $user->fname?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام خانوادگی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="نام خانوادگی را وارد کنید"
                           name="lname" value="<?= $user->lname?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل را وارد کنید"
                           name="email" value="<?=$user->email?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره همراه</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="شماره همراه را وارد کنید"
                           name="tell" maxlength="11" value="<?=$user->tell?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد ملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="کد ملی را وارد کنید"
                           name="m_code" maxlength="10" value="<?=$user->m_code?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">آدرس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="آدرس را وارد کنید"
                           name="address" value="<?=$user->address?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">شماره شناسنامه</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           placeholder="شماره شناسنامه را وارد کنید" name="serial_number" value="<?=$user->serial_number?>">
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>انتخاب تاریخ:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                        </div>
                        <input name="birthday" value="<?=$user->birthday?>" class="normal-example form-control pwt-datepicker-input-element">
                    </div>
                    <!-- /.input group -->
                </div>
<!--            -->
                <div class="form-group">
                    <label for="jender">جنسیت</label>
                    <select class="form-control" id="jender" name="jender"  >
                        <option value="1" <?= $user->jender=='1' ? 'selected':'' ?>  >مرد</option>
                        <option value="0" <?= $user->jender=='0' ? 'selected' :'' ?>>زن</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام پدر</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام پدر را وارد کنید"
                           name="father_name" value="<?=$user->father_name?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مکان تولد</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="مکان تولد را وارد کنید"
                           name="birthday_place" value="<?=$user->birthday_place?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مذهب</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="مذهب را وارد کنید"
                           name="mazhab" value="<?=$user->mazhab?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">دانشگاه</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="دانشگاه را وارد کنید"
                           name="university" value="<?=$user->university?>">
                </div>
                <div class="form-group">
                    <label for="type">نوع کاربر</label>
                    <select class="form-control" id="type" name="type">
                        <option id="teacher"  value="1" <?= $user->type_id==='1' ? 'selected' :'' ?> >استاد</option>
                        <option id="employee"  value="2" <?= $user->type_id==='2' ? 'selected' :'' ?> >کارمند</option>
                        <option id="student"  value="3" <?= $user->type_id==='3' ? 'selected' :'' ?> >دانشجو</option>
                        <option id="admin"   value="4" <?= $user->type_id==='4' ? 'selected' :'' ?> >ادمین</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="form2"></div>
    </div>

    <!-- /.card-body -->

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">ویرایش</button>
    </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $( "select#type" ).change(function () {
            $( "select#type option#teacher:selected" ).each(function() {
                return  $('div#form2').load('../teacher/edit.php div.row');
            });
            $( "select#type option#employee:selected" ).each(function() {
                return  $('div#form2').load('../employee/edit.php div.row');
            });
            $( "select#type option#student:selected" ).each(function() {
                return  $('div#form2').load('../student/edit.php div.row');
            });
            $( "select#type option#admin:selected" ).each(function() {
                return  $('div#form2').load('../admin/create.php div.row');
            });
        })
            .change();
    })
</script>


<?php
require __DIR__.'/../../view/layout/footer.php';
?>
