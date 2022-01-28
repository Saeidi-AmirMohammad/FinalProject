<?php


require '../layout/haeder.php';

$conn= DBConnection();
$data=getAllReshteTahsili($conn);
//var_dump($data);die;
?>



<form role="form" action="../../app/Controll/LessonCourse/lessonCourseController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">نام درس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام درس را وارد کنید"
                               name="name" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد درس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="کد درس را وارد کنید"
                           name="code" maxlength="5">
                </div>
                <div class="form-group">
                    <label for="type">نوع درس</label>
                    <select class="form-control" id="type" name="type">
                        <option value="اختصاصي">اختصاصي</option>
                        <option value="اصلي">اصلي</option>
                        <option value="جبراني">جبراني</option>
                        <option value="اختياري">اختياري</option>
                        <option value="عمومي">عمومي</option>
                        <option value="پایه">پایه</option>
                        <option value="کارآموزی">کارآموزی</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">رشته تحصیلی</label>
                    <select class="form-control" id="type" name="resteh_tahsili_id">
                        <?php
                        foreach ($data as $key):
                        ?>
                        <option value="<?=$key->id ?>"><?= $key->name ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ساعت عملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ساعت عملی درس را وارد کنید"
                           name="saat_amali" maxlength="5">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ساعت تئوری</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ساعت تئوری درس را وارد کنید"
                           name="saat_teori" maxlength="5">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">پیشنیاز</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="پیشنیاز درس را وارد کنید"
                           name="pishniaz" value="">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">کد پیشنیاز</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="کد پیشنیاز درس را وارد کنید"
                           name="code_pishniaz" maxlength="5">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">واحد عملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="واحد عملی درس را وارد کنید"
                           name="vahed_amali" maxlength="5">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">واحد تئوری</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="واحد تئوری درس را وارد کنید"
                           name="vahed_teori" maxlength="5">
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
require __DIR__.'/../../view/layout/footer.php';
?>
