<?php

require '../layout/haeder.php';
$conn = DBConnection();
$presentaion = getAllPresentaion($conn);
$lesson_course = getAllLessonCourse($conn);
$educationalgroup = getAllEducationalGroup($conn);
$datateacher= getAllUserDataTeacher($conn);
$classroom = getAllClassRoom($conn);
$dataPresentaio=getAllPresentaion($conn);

//echo  "<pre>";
//var_dump($dataPresentaio);die;
//echo  "</pre>";
?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول دروس ارائه شده</h3>
                <div class="card-tools">
                    <div class="d-flex">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <a href="create.php" class="btn btn-primary text-white mx-1 ">ایجاد ارائه</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>شناسه ارائه</th>
                        <th>نام درس</th>
                        <th>نام گروه درسی</th>
                        <th>نام استاد</th>
                        <th>شماره کلاس</th>
                        <th>ظرفیت کلاس</th>
                        <th>روز هفته</th>
                        <th>ساعت برگزاری کلاس</th>
                        <th>کد ارائه</th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($presentaion
                        as $key):
                        ?>
                        <td><?= $key->id ?>
                            <div class="d-flex mt-3">
                                <form action="/view/presentation/edit.php" id="edit-form-<?= $key->id ?>">
                                    <input type="hidden" name="edit" value="<?= $key->id ?>">
                                </form>
                                <a onclick="document.getElementById('edit-form-<?= $key->id ?>').submit()"
                                   class="btn btn-warning  mx-1 ">ویرایش</a>
                                <form action="/app/Controll/Presentation/deleteController.php" method="post">
                                    <input type="hidden" name="delete[<?= $key->id ?>]" value="<?= $key->id ?>">
                                    <button type="submit" class="btn btn-danger text-white">حذف</button>
                                </form>
                            </div>
                        </td>


                        <?php
                      $data_=  getidlesson_course($conn,$key->lessonCourse_id);
                        foreach ($data_
                        as $keyo):
                        ?>
                        <td><?= $keyo->name ?></td>
                        <?php
                        endforeach;
                        ?>


                        <?php
                        $data_=  getideducational_group($conn,$key->educationalGroup_id);
                        foreach ($data_
                                 as $keyo):
                            ?>
                            <td><?= $keyo->name ?></td>
                        <?php
                        endforeach;
                        ?>

                        <?php
                    // $data_=  getid_teacher_user_group($conn);
                     $user= getid_user_end($conn,$key->teacher_id );
                        foreach ($user as $o):
                            ?>
                            <td><?= $o->fname.' '.$o->lname ?></td>
                        <?php
                        endforeach;
                        ?>

                        <?php
                        $data_=  getid_classroom_group($conn,$key->classRoom_id);
                        foreach ($data_
                                 as $keyo):
                            ?>
                            <td><?= $keyo->class_code ?></td>
                        <?php
                        endforeach;
                        ?>
                        <td><?= $key->capacity?></td>
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
require __DIR__ . '/../../view/layout/footer.php';
?>
