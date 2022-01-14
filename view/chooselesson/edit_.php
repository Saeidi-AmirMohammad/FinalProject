<?php

require '../layout/haeder.php';

$conn = DBConnection();
$classRoomData = getAllClassRoom($conn);
$lessonCourseData = getAllLessonCourse($conn);
$EducationalGroupData = getAllEducationalGroup($conn);
$getAllusersTypeData = getAllusersType('teacher', $conn);
$id = $_GET['edit'];
//var_dump($id);
$_SESSION['edit'] = $_GET['edit'];
$presentation = presentation_Get_id($id, $conn);
//$get=getAllPresentaion($conn);
//var_dump($presentation);
?>
<?php
//var_dump($presentation);


?>
<form role="form" action="../../app/Controll/ChooseLesson/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $presentation->id ?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $presentation->id ?>">
                    <label for="lessonCourse_id">نام درس</label>
                    <select class="form-control" id="lessonCourse_id" name="lessonCourse_id"
                    >
                        <?php
                        foreach ($lessonCourseData as $keyo):
                            ?>
                            <option value="<?= $keyo->id ?>" <?= $presentation->lessonCourse_id === $keyo->id ? 'selected' : '' ?> ><?= $keyo->name . ' - ' . $keyo->code ?></option>
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
                            <option value="<?= $key->id ?>" <?= $presentation->educationalGroup_id === $key->id ? 'selected' : '' ?> ><?= $key->name ?></option>
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
                            <option value="<?= $key->id ?>" <?= $presentation->teacher_id === $key->id ? 'selected' : '' ?> ><?= $key->fname . ' ' . $key->lname . '-' . $key->m_code ?></option>
                        <?php
                        endforeach;
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="classRoom_id">شماره کلاس</label>
                    <select class="form-control" id="classRoom_id" name="classRoom_id">
                        <?php foreach ($classRoomData as $key): ?>
                            <option value="<?= $key->id ?>" <?= $presentation->classRoom_id === $key->id ? 'selected' : '' ?> ><?= $key->class_code ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">ظرفیت کلاس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="ظرفیت کلاس را وارد کنید"
                           name="capacity" maxlength="3"  value=" <?=  $presentation->capacity  ?>" >
                </div>
                <div class="form-group">
                    <label for="day">روز هفته</label>
                    <select class="form-control" id="day" name="day">
                        <option value="شنبه" <?= $presentation->day === 'شنبه' ? 'selected' : '' ?> >شنبه</option>
                        <option value="یک شنبه" <?= $presentation->day === 'یک شنبه' ? 'selected' : '' ?> >یک شنبه</option>
                        <option value="دو شنبه"   <?= $presentation->day === 'دو شنبه' ? 'selected' : '' ?> >دو شنبه</option>
                        <option value="سه شنبه"   <?= $presentation->day === 'سه شنبه' ? 'selected' : '' ?>   >سه شنبه</option>
                        <option value="چهار شنبه"  <?= $presentation->day === 'چهار شنبه' ? 'selected' : '' ?>  >چهار شنبه</option>
                        <option value="پنج شنبه"   <?= $presentation->day === 'پنج شنبه' ? 'selected' : '' ?>     >پنج شنبه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="class_time">ساعت برگزاری کلاس</label>
                    <select class="form-control" id="class_time" name="class_time">
                        <option value="۸تا۱۰"       <?= $presentation->class_time === '۸تا۱۰' ? 'selected' : '' ?>     >۸ تا ۱۰</option>
                        <option value="۸تا۱۲"      <?= $presentation->class_time === '۸تا۱۲' ? 'selected' : '' ?>      >۸ تا ۱۲</option>
                        <option value="۱۰تا۱۲"     <?= $presentation->class_time === '۱۰تا۱۲' ? 'selected' : '' ?>           >۱۰ تا ۱۲</option>
                        <option value="۱۰تا۱۴"        <?= $presentation->class_time === '۱۰تا۱۴' ? 'selected' : '' ?>      >۱۰ تا ۱۴</option>
                        <option value="۱۲تا۱۴"       <?= $presentation->class_time === '۱۲تا۱۴' ? 'selected' : '' ?>  >۱۲ تا ۱۴</option>
                        <option value="۱۲تا۱۶"       <?= $presentation->class_time === '۱۲تا۱۶' ? 'selected' : '' ?>   >۱۲ تا ۱۶</option>
                        <option value="۱۴تا۱۶"       <?= $presentation->class_time === '۱۴تا۱۶' ? 'selected' : '' ?>    >۱۴ تا ۱۶</option>
                        <option value="۱۴تا۱۸"        <?= $presentation->class_time === '۱۴تا۱۸' ? 'selected' : '' ?>  >۱۴ تا ۱۸</option>
                        <option value="۱۶تا۱۸"       <?= $presentation->class_time === '۱۶تا۱۸' ? 'selected' : '' ?>  >۱۶ تا ۱۸</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">کد ارائه</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           placeholder="کد ارائه را وارد کنید"     name="presentation_code"   value=" <?= $presentation->presentation_code ?>  "  >
                </div>
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

?>

<?php
require __DIR__ . '/../../view/layout/footer.php';
?>
