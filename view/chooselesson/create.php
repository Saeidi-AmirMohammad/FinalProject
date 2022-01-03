<?php

require '../layout/haeder.php';

$conn = DBConnection();
$classRoomData = getAllClassRoom($conn);
$lessonCourseData = getAllLessonCourse($conn);
$EducationalGroupData = getAllEducationalGroup($conn);
$getAllusersTypeData = getAllusersType('student',$conn);
?>

<form role="form" action="../../app/Controll/ChooseLesson/chooseLessonController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lessonCourse_id">دانشجو</label>
                    <select class="form-control" id="lessonCourse_id" name="student">
                        <?php
                        foreach ($getAllusersTypeData as $key):
                        ?>
                            <option value="<?= $key->id?>"><?= $key->fname .' '.$key->lname .'-'. $key->m_code?></option>
                        <?php
                        endforeach;
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="educationalGroup_id">نام گروه درسی</label>
                    <select class="form-control" id="educationalGroup_id" name="educationalGroup_id">
                        <?php
                        foreach ($EducationalGroupData as $key):
                            ?>
                            <option value="<?= $key->id?>"><?= $key->name?></option>
                        <?php
                        endforeach;
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="teacher_id">نام استاد</label>
                    <select class="form-control" id="teacher_id" name="teacher_id">
                        <?php
                        foreach ($getAllusersTypeData as $key):
                            ?>
                            <option value="<?= $key->id?>"><?= $key->fname .' '.$key->lname .'-'. $key->m_code?></option>
                        <?php
                        endforeach;
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="classRoom_id">شماره کلاس</label>
                    <select class="form-control" id="classRoom_id" name="classRoom_id">
                        <?php foreach ($classRoomData as $key):?>
                            <option value="<?= $key->id?>"><?= $key->class_code?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">ظرفیت کلاس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ظرفیت کلاس را وارد کنید"
                           name="capacity" maxlength="3">
                </div>
                <div class="form-group">
                    <label for="day">روز هفته</label>
                    <select class="form-control" id="day" name="day">
                        <option value="شنبه">شنبه</option>
                        <option value="یک شنبه">یک شنبه</option>
                        <option value="دو شنبه">دو شنبه</option>
                        <option value="سه شنبه">سه شنبه</option>
                        <option value="چهار شنبه">چهار شنبه</option>
                        <option value="پنج شنبه">پنج شنبه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="class_time">ساعت برگزاری کلاس</label>
                    <select class="form-control" id="class_time" name="class_time">
                        <option value="۸تا۱۰">۸ تا ۱۰</option>
                        <option value="۸تا۱۲">۸ تا ۱۲</option>
                        <option value="۱۰تا۱۲">۱۰ تا ۱۲</option>
                        <option value="۱۰تا۱۴">۱۰ تا ۱۴</option>
                        <option value="۱۲تا۱۴">۱۲ تا ۱۴</option>
                        <option value="۱۲تا۱۶">۱۲ تا ۱۶</option>
                        <option value="۱۴تا۱۶">۱۴ تا ۱۶</option>
                        <option value="۱۴تا۱۸">۱۴ تا ۱۸</option>
                        <option value="۱۶تا۱۸">۱۶ تا ۱۸</option>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">کد ارائه</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                           placeholder="کد ارائه را وارد کنید" name="presentation_code">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">ثبت</button>
    </div>
</form>

<?php
require __DIR__ . '/../../view/layout/footer.php';
?>
