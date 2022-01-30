<?php

require '../layout/haeder.php';

$conn = DBConnection();
$classRoomData = getAllClassRoom($conn);
$lessonCourseData = getAllLessonCourse($conn);
$EducationalGroupData = getAllEducationalGroup($conn);
$getAllusersTypeData = getAllusersType('student',$conn);
$getAllchose = getAllChooseLesson($conn);
$getpersentation=getAllPresentaion($conn);
echo "<pre>";
//var_dump($getpersentation);die;
//$get= getpresentation_id(23 , $conn);
//var_dump($get[0]);die;
echo "</pre>";
if (!isset($_SESSION['user'])) {
    header('Location: /index.php ');
}
?>
<?php
if ($_SESSION['user_type']==3):
?>
<form role="form" action="../../app/Controll/ChooseLesson/chooseLessonController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <label for="educationalGroup_id">درس ارائه شده</label>
                    <select class="form-control" id="educationalGroup_id" name="presentation_id">
                        <?php
                           $get= getpresentation_id();
                        //   $getlesson= getlesson_id( ,$conn);
                      //  var_dump($get);die;
                        $uu= getid_student_all_end($conn,$_SESSION['user_id']);
                        $e=getstudentreshteTahsili_id_2($uu[0]->reshteTahsili_id,$conn);
                         foreach ($e as $keyo):
                            ?>
                            <option value="<?= $keyo->id?>"><?= $keyo->lesson_course_name  . ' ' .'-نام استاد :  '.' '. $keyo->teacher_lname. $keyo->teacher_fname . ' ' .'-نام گروه درسی : '.' '.  $keyo->educational_group_name . ' ' .'-شماره کلاس: '.' '.  $keyo->class_code . ' ' .'- '.  $keyo->day . ' ' .' - زمان برگزاری: '.' '.  $keyo->class_time . ' ' .'-ظرفیت:'.' '.  $keyo->capacity . ' ' .' -کد ارائه:'.' '.  $keyo->presentation_code   ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="stuednt_id" value="<?=$_SESSION['user_id']?>">
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
endif;
?>

<?php
if ($_SESSION['user_type']==2 || $_SESSION['user_type']==4):
?>
<form role="form" action="../../app/Controll/ChooseLesson/chooseLessonController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <label for="educationalGroup_id">درس ارائه شده</label>
                    <select class="form-control" id="educationalGroup_id" name="presentation_id">
                        <?php
                           $get= getpresentation_id();
                        //   $getlesson= getlesson_id( ,$conn);
                      //  var_dump($get);die;
                         foreach ($get as $keyo):
                            ?>
                            <option value="<?= $keyo->id?>"><?= $keyo->lesson_course_name  . ' ' .'-نام استاد :  '.' '. $keyo->teacher_lname. $keyo->teacher_fname . ' ' .'-نام گروه درسی : '.' '.  $keyo->educational_group_name . ' ' .'-شماره کلاس: '.' '.  $keyo->class_code . ' ' .'- '.  $keyo->day . ' ' .' - زمان برگزاری: '.' '.  $keyo->class_time . ' ' .'-ظرفیت:'.' '.  $keyo->capacity . ' ' .' -کد ارائه:'.' '.  $keyo->presentation_code   ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="educationalGroup_id">دانشجو</label>
                    <select class="form-control" id="educationalGroup_id" name="stuednt_id">
                        <?php
                        $get= getAllUserDataStudent($conn);

                        foreach ($get as $keyo):
                            ?>
                            <option value="<?= $keyo->user_id_student?>"><?= 'نام دانشجو: ' . $keyo->lname .' '. $keyo->fname. $keyo->teacher_fname   ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
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
endif;
?>
<?php
require __DIR__ . '/../../view/layout/footer.php';
?>
