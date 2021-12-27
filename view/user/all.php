<?php


require '../layout/haeder.php';
$conn = DBConnection();
$data = getAllUserData($conn);
$datateacher= getAllUserDataTeacher($conn);
$datastudent=getAllUserDataStudent($conn);
$dataemploy=getAllUserDataemploee($conn);

//echo  "<pre>";
//print_r($datateacher);die;
//echo  "</pre>";

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول اساتید</h3>
                <div class="card-tools">
                    <div class="d-flex">
                        <div class="input-group input-group-sm" style="width: 150px;">
<!--                            <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">-->
<!--                            <div class="input-group-append">-->
<!--                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>-->
<!--                            </div>-->
                        </div>
                        <a href="create.php" class="btn btn-primary text-white mx-1 ">ایجاد کاربر</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>شناسه کاربر</th>
                        <th>نوع کاربر</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>تلفن همراه</th>
                        <th>کد ملی</th>
                        <th>ادرس</th>
                        <th>شماره شناسنامه</th>
                        <th>تاریخ تولد</th>
                        <th>جنسیت</th>
                        <th>نام پدر</th>
                        <th>مکان تولد</th>
                        <th>مذهب</th>
                        <th>دانشگاه</th>
                        <th>کدمدرس</th>
                        <th>مرتبه علمی</th>


                        <th>کد پرسنلی</th>
                        <th>نوع استاد</th>
                        <th>مدرک</th>
                        <th>گروه</th>
                        <th>حوزه دروس</th>



                    </tr>
                    <tr>
                        <?php
                        foreach ($datateacher

                        as $key):
                        ?>
                        <td><?= $key->teacher_user_id ?>
                            <div class="d-flex mt-3">
                                <form action="/view/user/edit.php" id="edit-form-<?= $key->teacher_user_id ?>">
                                    <input type="hidden" name="edit" value="<?= $key->teacher_user_id ?>">
                                </form>
                                <a onclick="document.getElementById('edit-form-<?= $key->teacher_user_id ?>').submit()"
                                   class="btn btn-warning  mx-1 ">ویرایش</a>
                                <form action="/app/Controll/User/deleteController.php" method="post">
                                    <input type="hidden" name="delete[<?= $key->teacher_user_id ?>]" value="<?= $key->teacher_user_id ?>">
                                    <button type="submit" class="btn btn-danger text-white">حذف</button>
                                </form>
                            </div>
                        </td>
                        <?php
                        switch (true) {
                            case $key->type_id === '1':
                                echo " <td>استاد</td>";
                                break;
                            case $key->type_id === '2':
                                echo " <td>کارمند</td>";
                                break;
                            case $key->type_id === '3':
                                echo " <td>دانشجو</td>";
                                break;
                            case $key->type_id === '4':
                                echo " <td>ادمین</td>";
                                break;
                        }
                        ?>
                        <td><?= $key->fname ?></td>
                        <td><?= $key->lname ?></td>
                        <td><?= $key->email ?></td>
                        <td><?= $key->tell ?></td>
                        <td><?= $key->m_code ?></td>
                        <td><?= $key->address ?></td>
                        <td><?= $key->serial_number ?></td>
                        <td>
                            <?php
                            convert_to_Jalali($key->birthday)
                            ?>
                        </td>

                        <?php
                        switch (true) {
                            case $key->jender === '1':
                                echo " <td>مرد</td>";
                                break;
                            case $key->jender === '0':
                                echo " <td>زن</td>";
                                break;
                        }

                        ?>

                        <td><?= $key->father_name ?></td>
                        <td><?= $key->birthday_place ?></td>
                        <td><?= $key->mazhab ?></td>
                        <td><?= $key->university ?></td>
                        <td><?= $key->codeModares ?></td>

                        <?php
                        $id = $key->martabeElmi_id;
                        $martabeh_elmi=getmartabe_elmi($id,$conn);
                        foreach ($martabeh_elmi as $keyy):
                        ?>
                        <td><?= $keyy->name ?></td>

                        <?php
                        endforeach;
                        ?>
                        <?php
                        $id= $key->employmentType_id;
                        $employmentType_id=getemployment_type($id,$conn);
                        foreach ($employmentType_id as $keyy):
                        ?>
                        <td><?= $keyy->name ?></td>

                        <?php
                        endforeach;
                        ?>
                        <?php
                        $id= $key->teachingType_id;
                        $getteaching_type=getteaching_type($id,$conn);
                        foreach ($getteaching_type as $keyy):
                            ?>
                            <td><?= $keyy->name ?></td>
                        <?php
                        endforeach;
                        ?>

                        <?php
                        $id= $key->madrak_id;
                        $getgetmadrak_type=getmadrak_type($id,$conn);
                        foreach ($getgetmadrak_type as $keyy):
                            ?>
                            <td><?= $keyy->name ?></td>
                        <?php
                        endforeach;
                        ?>



                        <?php
                        $id= $key->educationalGroup_id;
                        $geteducational_group=geteducational_group($id,$conn);
                        foreach ($geteducational_group as $keyy):
                            ?>
                            <td><?= $keyy->name ?></td>
                        <?php
                        endforeach;
                        ?>


                        <?php
                        $id= $key->hozeDoroos_id;
                        $gethoze_doroos=gethoze_doroos($id,$conn);
                        foreach ($gethoze_doroos as $keyy):
                            ?>
                            <td><?= $keyy->name ?></td>
                        <?php
                        endforeach;
                        ?>
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



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول دانشجویان</h3>
                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>شناسه کاربر</th>
                            <th>نوع کاربر</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>تلفن همراه</th>
                            <th>کد ملی</th>
                            <th>ادرس</th>
                            <th>شماره شناسنامه</th>
                            <th>تاریخ تولد</th>
                            <th>جنسیت</th>
                            <th>نام پدر</th>
                            <th>مکان تولد</th>
                            <th>مذهب</th>
                            <th>دانشگاه</th>
                            <th>کد دانشجویی</th>
                            <th>مقطع</th>
                            <th>رشته تحصیلی</th>
                            <th>ترم ورود</th>
                            <th>نوبت پذیرش</th>
                            <th>وضعیت نظام وظیفه</th>


                        </tr>
                        <tr>
                            <?php
                            foreach ($datastudent

                            as $key):
                            ?>
                            <td><?= $key->user_id_student ?>
                                <div class="d-flex mt-3">
                                    <form action="/view/user/edit.php" id="edit-form-<?= $key->user_id_student?>">
                                        <input type="hidden" name="edit" value="<?= $key->user_id_student ?>">
                                    </form>
                                    <a onclick="document.getElementById('edit-form-<?= $key->user_id_student ?>').submit()"
                                       class="btn btn-warning  mx-1 ">ویرایش</a>
                                    <form action="/app/Controll/User/deleteController.php" method="post">
                                        <input type="hidden" name="delete[<?= $key->user_id_student ?>]" value="<?= $key->user_id_student ?>">
                                        <button type="submit" class="btn btn-danger text-white">حذف</button>
                                    </form>
                                </div>
                            </td>
                            <?php
                            switch (true) {
                                case $key->type_id === '1':
                                    echo " <td>استاد</td>";
                                    break;
                                case $key->type_id === '2':
                                    echo " <td>کارمند</td>";
                                    break;
                                case $key->type_id === '3':
                                    echo " <td>دانشجو</td>";
                                    break;
                                case $key->type_id === '4':
                                    echo " <td>ادمین</td>";
                                    break;
                            }
                            ?>
                            <td><?= $key->fname ?></td>
                            <td><?= $key->lname ?></td>
                            <td><?= $key->email ?></td>
                            <td><?= $key->tell ?></td>
                            <td><?= $key->m_code ?></td>
                            <td><?= $key->address ?></td>
                            <td><?= $key->serial_number ?></td>
                            <td>
                                <?php
                                convert_to_Jalali($key->birthday)
                                ?>
                            </td>

                            <?php
                            switch (true) {
                                case $key->jender === '1':
                                    echo " <td>مرد</td>";
                                    break;
                                case $key->jender === '0':
                                    echo " <td>زن</td>";
                                    break;
                            }

                            ?>

                            <td><?= $key->father_name ?></td>
                            <td><?= $key->birthday_place ?></td>
                            <td><?= $key->mazhab ?></td>
                            <td><?= $key->university ?></td>




                            <td><?= $key->codeDaneshjo ?></td>




                            <?php
                            $id= $key->maghtae_id;
                            $getmaghtae=getmaghtae($id,$conn);
                            foreach ($getmaghtae as $keyy):
                                ?>
                                <td><?= $keyy->name ?></td>
                            <?php
                            endforeach;
                            ?>

                            <?php
                            $id= $key->reshteTahsili_id;
                            $getreshte_tahsili=getreshte_tahsili($id,$conn);
                            foreach ($getreshte_tahsili as $keyy):
                                ?>
                                <td><?= $keyy->name ?></td>
                            <?php
                            endforeach;
                            ?>

                             <?php
                            $id= $key->termVorod_id;
                            $getterm_vorod=getterm_vorod($id,$conn);
                            foreach ($getterm_vorod as $keyy):
                                ?>
                                <td><?= $keyy->number ?></td>
                            <?php
                            endforeach;
                            ?>

                            <?php
                            $id= $key->nobatePaziresh_id;
                            $getnobate_paziresh=getnobate_paziresh($id,$conn);
                            foreach ($getnobate_paziresh as $keyy):
                                ?>
                                <td><?= $keyy->name ?></td>
                            <?php
                            endforeach;
                            ?>

                            <?php
                            $id= $key->vazeiateNezamVazife_id;
                            $getvazeiate_nezam_vazifeh=getvazeiate_nezam_vazife($id,$conn);
                            foreach ($getvazeiate_nezam_vazifeh as $keyy):
                                ?>
                                <td><?= $keyy->name ?></td>
                            <?php
                            endforeach;
                            ?>



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


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول کارمندان</h3>
                <div class="card-tools">
                    <div class="d-flex">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>شناسه کاربر</th>
                        <th>نوع کاربر</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>تلفن همراه</th>
                        <th>کد ملی</th>
                        <th>ادرس</th>
                        <th>شماره شناسنامه</th>
                        <th>تاریخ تولد</th>
                        <th>جنسیت</th>
                        <th>نام پدر</th>
                        <th>مکان تولد</th>
                        <th>مذهب</th>
                        <th>دانشگاه</th>
                        <th>کد استاندارد</th>


                    </tr>
                    <tr>
                        <?php
                        foreach ($dataemploy

                        as $key):
                        ?>
                        <td><?= $key->user_id_employ ?>
                            <div class="d-flex mt-3">
                                <form action="/view/user/edit.php" id="edit-form-<?= $key->user_id_employ?>">
                                    <input type="hidden" name="edit" value="<?= $key->user_id_employ ?>">
                                </form>
                                <a onclick="document.getElementById('edit-form-<?= $key->user_id_employ ?>').submit()"
                                   class="btn btn-warning  mx-1 ">ویرایش</a>
                                <form action="/app/Controll/User/deleteController.php" method="post">
                                    <input type="hidden" name="delete[<?= $key->user_id_employ ?>]" value="<?= $key->user_id_employ ?>">
                                    <button type="submit" class="btn btn-danger text-white">حذف</button>
                                </form>
                            </div>
                        </td>
                        <?php
                        switch (true) {
                            case $key->type_id === '1':
                                echo " <td>استاد</td>";
                                break;
                            case $key->type_id === '2':
                                echo " <td>کارمند</td>";
                                break;
                            case $key->type_id === '3':
                                echo " <td>دانشجو</td>";
                                break;
                            case $key->type_id === '4':
                                echo " <td>ادمین</td>";
                                break;
                        }
                        ?>
                        <td><?= $key->fname ?></td>
                        <td><?= $key->lname ?></td>
                        <td><?= $key->email ?></td>
                        <td><?= $key->tell ?></td>
                        <td><?= $key->m_code ?></td>
                        <td><?= $key->address ?></td>
                        <td><?= $key->serial_number ?></td>
                        <td>
                            <?php
                            convert_to_Jalali($key->birthday)
                            ?>
                        </td>

                        <?php
                        switch (true) {
                            case $key->jender === '1':
                                echo " <td>مرد</td>";
                                break;
                            case $key->jender === '0':
                                echo " <td>زن</td>";
                                break;
                        }

                        ?>

                        <td><?= $key->father_name ?></td>
                        <td><?= $key->birthday_place ?></td>
                        <td><?= $key->mazhab ?></td>
                        <td><?= $key->university ?></td>



                        <td><?= $key->codeStandard ?></td>


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
