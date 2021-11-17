<?php


require '../layout/haeder.php';

$connect = DBConnection();

$id=$_GET['edit'];
$reshteTahsili= reshteTahsili_Get_id($id,$connect);
?>



<form role="form" action="../../app/Controll/ReshteTahsili/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه رشته تحصيلي در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $reshteTahsili->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $reshteTahsili->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام رشته تحصيلی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام رشته تحصيلی را وارد کنید"
                           name="name" value="<?= $reshteTahsili->name?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد رشته تحصيلی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="کد رشته تحصيلی را وارد کنید"
                           name="code" value="<?= $reshteTahsili->code?>">
                </div>

                <div class="form-group">
                    <label for="status">وضعیت رشته تحصیلی</label>
                    <select class="form-control" id="status" name="status"  >
                        <option value="1" <?= $reshteTahsili->status=='1' ? 'selected':'' ?>  >فعال</option>
                        <option value="0" <?= $reshteTahsili->status=='0' ? 'selected' :'' ?>>غیر فعال</option>
                    </select>
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
require __DIR__.'/../../View/layout/footer.php';
?>
