<?php

require '../layout/haeder.php';
//var_dump($_SESSION);die;

$conn = DBConnection();
$presentaion = getAllPresentaion($conn);
$lesson_course = getAllLessonCourse($conn);
$educationalgroup = getAllEducationalGroup($conn);
$datateacher= getAllUserDataTeacher($conn);
$classroom = getAllClassRoom($conn);
$dataPresentaio=getAllPresentaion($conn);
$get= getpresentation_id();
$getAllchoose_lesson_info_all= getAllchoose_lesson_info_all($conn);
//echo  "<pre>";
//var_dump($getAllchoose_lesson_info_all);die;
//echo  "</pre>";
?>

<?php
if ( $_SESSION["user_type"]==1):
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">انتخاب واحد</h3>
                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>شناسه انتخاب واحد</th>
                        <th>نام دانشجو </th>
                        <th>نام خانوادگی دانشجو </th>
                        <th>شماره دانشجویی </th>
                        <th>نام استاد</th>
                        <th>نام خانوادگی استاد</th>
                        <th>کد مدرسی</th>
                        <th>نام درس</th>
                        <th>نام گروه درسی</th>
                        <th>شماره کلاس</th>
                        <th>ظرفیت کلاس </th>
                        <th>ظرفیت رزرو شده </th>
                        <th>روز برگزاری کلاس </th>
                        <th>ساعت برگزاری کلاس</th>
                        <th>کد ارائه</th>
                    </tr>
                    <tr>

                        <?php
                        $get_now=getchoose_lesson_info_all_id($_SESSION["user_id"],$conn);

                        foreach ($get_now
                        as $key):
                        ?>
                        <td><?= $key->choose_lesson_id ?>

                        </td>


                        <td><?= $key->studen_fname?></td>
                        <td><?= $key->student_lname?></td>
                        <td><?= $key->codeDaneshjo?></td>
                        <td><?= $key->teacher_lname?></td>
                        <td><?= $key->teacher_fname?></td>
                        <td><?= $key->codeModares?></td>
                        <td><?= $key->lesson_course_name?></td>
                        <td><?= $key->educational_group_name?></td>
                        <td><?= $key->class_code?></td>
                        <td><?= $key->capacity?></td>
                        <td><?= $key->count_capacity?></td>
                        <td><?= $key->day?></td>
                        <td><?= $key->class_time?></td>
                        <td><?= $key->presentation_code?></td>


                    </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<?php
endif;
?>

<?php
if ( $_SESSION["user_type"]==4 || $_SESSION["user_type"]==2 ):
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">انتخاب واحد</h3>
                    <div class="card-tools">
                        <div class="d-flex">
                            <a href="create.php" class="btn btn-primary text-white mx-1 ">انتخاب واحد</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>شناسه انتخاب واحد</th>
                            <th>نام دانشجو </th>
                            <th>نام خانوادگی دانشجو </th>
                            <th>شماره دانشجویی </th>
                            <th>نام استاد</th>
                            <th>نام خانوادگی استاد</th>
                            <th>کد مدرسی</th>
                            <th>نام درس</th>
                            <th>نام گروه درسی</th>
                            <th>شماره کلاس</th>
                            <th>ظرفیت کلاس </th>
                            <th>ظرفیت رزرو شده </th>
                            <th>روز برگزاری کلاس </th>
                            <th>ساعت برگزاری کلاس</th>
                            <th>کد ارائه</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($getAllchoose_lesson_info_all
                            as $key):
                            ?>
                            <td><?= $key->choose_lesson_id ?>
                                <div class="d-flex mt-3">
                                    <form action="/view/chooselesson/edit.php" id="edit-form-<?= $key->choose_lesson_id ?>">
                                        <input type="hidden" name="edit" value="<?= $key->choose_lesson_id ?>">
                                    </form>
                                    <a onclick="document.getElementById('edit-form-<?= $key->choose_lesson_id ?>').submit()"
                                       class="btn btn-warning  mx-1 ">ویرایش</a>
                                    <form action="/app/Controll/ChooseLesson/deleteController.php" method="post">
                                        <input type="hidden" name="delete[<?= $key->choose_lesson_id ?>]" value="<?= $key->choose_lesson_id ?>">
                                        <button type="submit" class="btn btn-danger text-white">حذف</button>
                                    </form>
                                </div>
                            </td>


                            <td><?= $key->studen_fname?></td>
                            <td><?= $key->student_lname?></td>
                            <td><?= $key->codeDaneshjo?></td>
                            <td><?= $key->teacher_lname?></td>
                            <td><?= $key->teacher_fname?></td>
                            <td><?= $key->codeModares?></td>
                            <td><?= $key->lesson_course_name?></td>
                            <td><?= $key->educational_group_name?></td>
                            <td><?= $key->class_code?></td>
                            <td><?= $key->capacity?></td>
                            <td><?= $key->count_capacity?></td>
                            <td><?= $key->day?></td>
                            <td><?= $key->class_time?></td>
                            <td><?= $key->presentation_code?></td>


                        </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php
endif;
?>

<?php
if ( $_SESSION["user_type"]==3):
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">انتخاب واحد</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>شناسه انتخاب واحد</th>
                            <th>نام دانشجو </th>
                            <th>نام خانوادگی دانشجو </th>
                            <th>شماره دانشجویی </th>
                            <th>نام استاد</th>
                            <th>نام خانوادگی استاد</th>
                            <th>کد مدرسی</th>
                            <th>نام درس</th>
                            <th>نام گروه درسی</th>
                            <th>شماره کلاس</th>
                            <th>ظرفیت کلاس </th>
                            <th>ظرفیت رزرو شده </th>
                            <th>روز برگزاری کلاس </th>
                            <th>ساعت برگزاری کلاس</th>
                            <th>کد ارائه</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($getAllchoose_lesson_info_all
                            as $key):
                            ?>
                            <td><?= $key->choose_lesson_id ?>

                            </td>


                            <td><?= $key->studen_fname?></td>
                            <td><?= $key->student_lname?></td>
                            <td><?= $key->codeDaneshjo?></td>
                            <td><?= $key->teacher_lname?></td>
                            <td><?= $key->teacher_fname?></td>
                            <td><?= $key->codeModares?></td>
                            <td><?= $key->lesson_course_name?></td>
                            <td><?= $key->educational_group_name?></td>
                            <td><?= $key->class_code?></td>
                            <td><?= $key->capacity?></td>
                            <td><?= $key->count_capacity?></td>
                            <td><?= $key->day?></td>
                            <td><?= $key->class_time?></td>
                            <td><?= $key->presentation_code?></td>


                        </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php
endif;
?>



<?php
require __DIR__ . '/../../view/layout/footer.php';
?>
