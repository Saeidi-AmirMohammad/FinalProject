<?php


require '../layout/haeder.php';

$connect = DBConnection();
$id=$_GET['edit'];
$presentation= presentation_Get_id($id,$connect);
$classRoomData = getAllClassRoom($conn);
?>



<form role="form" action="../../app/Controll/Presentation/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه درس ارائه شده در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $presentation->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $presentation->id?>">
                </div>
                <div class="form-group">
                    <label for="lessonCourse_id">نام درس</label>
                    <select class="form-control" id="lessonCourse_id" name="lessonCourse_id">

                    </select>
                </div>
                <div class="form-group">
                    <label for="educationalGroup_id">نام گروه درسی</label>
                    <select class="form-control" id="educationalGroup_id" name="educationalGroup_id">

                    </select>
                </div>
                <div class="form-group">
                    <label for="teacher_id">نام استاد</label>
                    <select class="form-control" id="teacher_id" name="teacher_id">

                    </select>
                </div>
                <div class="form-group">
                    <label for="classRoom_id">شماره کلاس</label>
                    <select class="form-control" id="classRoom_id" name="classRoom_id">
                        <?php foreach ($classRoomData as $key):?>
                            <option value="<?= $presentation->classRoom_id?>" <?= $presentation->classRoom_id===$presentation->classRoom_id ? 'selected' :'' ?> >استاد</option>
                        <?php endforeach;?>
                    </select>
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
                        <option value="1" <?= $user->type_id==='1' ? 'selected' :'' ?> >استاد</option>
                        <option value="2" <?= $user->type_id==='2' ? 'selected' :'' ?> >کارمند</option>
                        <option value="3" <?= $user->type_id==='3' ? 'selected' :'' ?> >دانشجو</option>
                        <option value="4" <?= $user->type_id==='4' ? 'selected' :'' ?> >ادمین</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">ویرایش</button>
    </div>
</form>



<?php
require __DIR__.'/../../view/layout/footer.php';
?>
