

<?php


require '../layout/haeder.php';
$conn=DBConnection();
$data=getAllUserData($conn);
//echo  "<pre>";
//print_r($data);die;
//echo  "</pre>";
?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول ریسپانسیو</h3>

                <div class="card-tools">
               <div class="d-flex">
                   <div class="input-group input-group-sm" style="width: 150px;">
                       <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                       <div class="input-group-append">
                           <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                       </div>

                   </div>

                       <a href="create.php" class="btn btn-primary text-white mx-1 ">ایجاد کاربر</a>

               </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody><tr>
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
                    </tr>
                    <tr>
                        <?php
                        foreach ($data as $key):
                        ?>
                        <td><?= $key->id ?>
                            <div class="d-flex mt-3">
                                <a name=""  class="btn btn-warning  mx-1 ">ویرایش</a>
                                <form action="/app/Controll/User/deleteController.php" method="post">
                                    <input type="hidden" name="delete[<?=$key->id?>]" value="<?=$key->id?>" >
                                    <button type="submit" class="btn btn-danger text-white">حذف</button>
                                </form>
                            </div>

                        </td>
                        <td><?= $key->type_id ?></td>
                        <td><?= $key->fname ?></td>
                        <td><?= $key->lname ?></td>
                        <td><?= $key->email  ?></td>
                        <td><?= $key->tell  ?></td>
                        <td><?= $key->m_code  ?></td>
                        <td><?= $key->address  ?></td>
                        <td><?= $key->serial_number  ?></td>
                        <td><?= $key->birthday  ?></td>
                        <td><?= $key->jender  ?></td>
                        <td><?= $key->father_name  ?></td>
                        <td><?= $key->birthday_place  ?></td>
                        <td><?= $key->mazhab  ?></td>
                        <td><?= $key->university  ?></td>
                    </tr>
                    <?php
                           endforeach;
                    ?>
                    </tbody></table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>



<?php
require __DIR__.'/../../View/layout/footer.php';
?>
