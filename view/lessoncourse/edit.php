<?php


require '../layout/haeder.php';

$connect = DBConnection();

$id=$_GET['edit'];
$lessonCourse= lessonCourse_Get_id($id,$connect);
?>



<form role="form" action="../../app/Controll/LessonCourse/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه درس در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $lessonCourse->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $lessonCourse->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام درس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام درس را وارد کنید"
                           name="name" value="<?= $lessonCourse->name?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد درس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="کد درس را وارد کنید"
                           name="code" value="<?= $lessonCourse->code?>">
                </div>

                <div class="form-group">
                    <label for="type">نوع درس</label>
                    <select class="form-control" id="type" name="type"  >
                        <option value="اختصاصي" <?= $lessonCourse->type=='اختصاصي' ? 'selected':'' ?>  >اختصاصي</option>
                        <option value="اصلي" <?= $lessonCourse->type=='اصلي' ? 'selected' :'' ?>>اصلي</option>
                        <option value="جبراني" <?= $lessonCourse->type=='جبراني' ? 'selected':'' ?>  >جبراني</option>
                        <option value="اختياري" <?= $lessonCourse->type=='اختياري' ? 'selected' :'' ?>>اختياري</option>
                        <option value="عمومي" <?= $lessonCourse->type=='عمومي' ? 'selected':'' ?>  >عمومي</option>
                        <option value="پایه" <?= $lessonCourse->type=='پایه' ? 'selected' :'' ?>>پایه</option>
                        <option value="کارآموزی" <?= $lessonCourse->type=='کارآموزی' ? 'selected':'' ?>  >کارآموزی</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ساعت عملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="ساعت عملی درس را وارد کنید"
                           name="saat_amali" value="<?= $lessonCourse->saat_amali?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ساعت تئوری</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="کد درس را وارد کنید"
                           name="saat_teori" value="<?= $lessonCourse->saat_teori?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">پیشنیاز</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="پیشنیاز درس را وارد کنید"
                           name="pishniaz" value="<?= $lessonCourse->pishniaz?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">کد پیشنیاز</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="کد پیشنیاز درس را وارد کنید"
                           name="code_pishniaz" value="<?= $lessonCourse->code_pishniaz?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">واحد عملی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="واحد عملی درس را وارد کنید"
                           name="vahed_amali" value="<?= $lessonCourse->vahed_amali?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">واحد تئوری</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="واحد تئوری درس را وارد کنید"
                           name="vahed_teori" value="<?= $lessonCourse->vahed_teori?>">
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
require __DIR__.'/../../view/layout/footer.php';
?>
