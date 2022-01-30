<?php

require '../layout/haeder.php';
$conn = DBConnection();
$presentaion = getAllPresentaion($conn);
$lesson_course = getAllLessonCourse($conn);
$educationalgroup = getAllEducationalGroup($conn);
$datateacher= getAllUserDataTeacher($conn);
$classroom = getAllClassRoom($conn);
$dataPresentaio=getAllPresentaion($conn);
$get= getpresentation_id();
$getAllchoose_lesson_info_all= get_grade_all($conn);
//echo  "<pre>";
//var_dump($getAllchoose_lesson_info_all);die;
//echo  "</pre>";
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
                        <th>نمره نهایی</th>

                    </tr>
                    <tr>
                        <?php
                        $get_now=getgrade_all_student_id($_SESSION['user_id'],$conn);

                        foreach ($get_now
                        as $key):
                        ?>
                        <td><?= is_null( $key->grade_id) ? 'نمره ثبت نشده':$key->grade_id  ?>
                     </td>
                        
                        <td><?= $key->studen_fname?></td>
                        <td><?= $key->student_lname?></td>
                        <td><?= $key->codeDaneshjo?></td>
                        <td><?= $key->teacher_lname?></td>
                        <td><?= $key->teacher_fname?></td>
                        <td><?= $key->codeModares?></td>
                        <td><?= $key->lesson_course_name?></td>
                        <td><?= $key->educational_group_name?></td>
                        <td><?=is_null( $key->grade_value) ?'خالی':  $key->grade_value?></td>

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
if ( $_SESSION["user_type"]==1 ):
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
                            <th>نمره نهایی</th>

                        </tr>
                        <tr>
                            <?php
                            $get_now=getgrade_all_id($_SESSION['user_id'],$conn);
                            foreach ($get_now
                            as $key):
                            ?>
                            <td><?= is_null( $key->grade_id) ? 'نمره ثبت نشده':$key->grade_id  ?>

                                <div class="d-flex mt-3">
                                    <?php
                                    if  ( is_null( $key->created_at_grade)):
                                        ?>
                                        <form action="/view/grade/create.php"  id="create-form-<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="choose_lesson_id" value="<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="student_id" value="<?= $key->student_id ?>">
                                        </form>
                                        <a onclick="document.getElementById('create-form-<?= $key->choose_lesson_id ?>').submit()"
                                           class="btn btn-primary text-white  mx-1 ">ثبت نمره</a>

                                    <?php
                                    endif;
                                    ?>
                                    <?php
                                    if  (! is_null( $key->created_at_grade)):
                                        ?>
                                        <form action="/view/grade/edit.php" id="edit-form-<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="choose_lesson_id" value="<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="student_id" value="<?= $key->student_id ?>">

                                        </form>
                                        <a onclick="document.getElementById('edit-form-<?= $key->choose_lesson_id ?>').submit()"
                                           class="btn btn-warning  mx-1 ">ویرایش نمره</a>

                                        <form action="/app/Controll/Grade/deleteController.php" method="post">
                                            <input type="hidden" name="delete[<?= $key->grade_id ?>]" value="<?= $key->grade_id ?>">
                                            <button type="submit" class="btn btn-danger text-white" >حذف نمره</button>
                                        </form>
                                    <?php
                                    endif;
                                    ?>
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
                            <td><?=is_null( $key->grade_value) ?'خالی':  $key->grade_value?></td>






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
                            <th>نمره نهایی</th>

                        </tr>
                        <tr>
                            <?php
                            foreach ($getAllchoose_lesson_info_all
                            as $key):
                            ?>
                            <td><?= is_null( $key->grade_id) ? 'نمره ثبت نشده':$key->grade_id  ?>

                                <div class="d-flex mt-3">
                                    <?php
                                    if  ( is_null( $key->created_at_grade)):
                                        ?>
                                        <form action="/view/grade/create.php"  id="create-form-<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="choose_lesson_id" value="<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="student_id" value="<?= $key->student_id ?>">
                                        </form>
                                        <a onclick="document.getElementById('create-form-<?= $key->choose_lesson_id ?>').submit()"
                                           class="btn btn-primary text-white  mx-1 ">ثبت نمره</a>

                                    <?php
                                    endif;
                                    ?>
                                    <?php
                                    if  (! is_null( $key->created_at_grade)):
                                        ?>
                                        <form action="/view/grade/edit.php" id="edit-form-<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="choose_lesson_id" value="<?= $key->choose_lesson_id ?>">
                                            <input type="hidden" name="student_id" value="<?= $key->student_id ?>">

                                        </form>
                                        <a onclick="document.getElementById('edit-form-<?= $key->choose_lesson_id ?>').submit()"
                                           class="btn btn-warning  mx-1 ">ویرایش نمره</a>

                                        <form action="/app/Controll/Grade/deleteController.php" method="post">
                                            <input type="hidden" name="delete[<?= $key->grade_id ?>]" value="<?= $key->grade_id ?>">
                                            <button type="submit" class="btn btn-danger text-white" >حذف نمره</button>
                                        </form>
                                    <?php
                                    endif;
                                    ?>
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
                            <td><?=is_null( $key->grade_value) ?'خالی':  $key->grade_value?></td>






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
