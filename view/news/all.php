<?php


require '../layout/haeder.php';
$conn = DBConnection();
$data = getAllNews($conn);
?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول اخبار</h3>
                <div class="card-tools">
                    <div class="d-flex">
<!--                        <div class="input-group input-group-sm" style="width: 150px;">-->
<!--                            <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">-->
<!--                            <div class="input-group-append">-->
<!--                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>-->
<!--                            </div>-->
<!--                        </div>-->
                        <a href="create.php" class="btn btn-primary text-white mx-1 ">ایجاد خبر</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>شناسه خبر</th>
                        <th>نویسنده</th>
                        <th>عنوان خبر</th>
                        <th>متن خبر</th>
                        <th>تاریخ</th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($data
                        as $key):
                        ?>
                        <td><?= $key->id ?>
                            <div class="d-flex mt-3">
                                <form action="/view/news/edit.php" id="edit-form-<?= $key->id ?>">
                                    <input type="hidden" name="edit" value="<?= $key->id ?>">
                                </form>
                                <a onclick="document.getElementById('edit-form-<?= $key->id ?>').submit()"
                                   class="btn btn-warning  mx-1 ">ویرایش</a>
                                <form action="/app/Controll/News/deleteController.php" method="post">
                                    <input type="hidden" name="delete[<?= $key->id ?>]" value="<?= $key->id ?>">
                                    <button type="submit" class="btn btn-danger text-white">حذف</button>
                                </form>
                            </div>
                        </td>

                        <td><?= $key->author ?></td>
                        <td><?= $key->title ?></td>
                        <td><?= $key->description ?></td>
                        <td>
                            <?php
                            convert_to_Jalali($key->date)
                            ?>
                        </td>
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
