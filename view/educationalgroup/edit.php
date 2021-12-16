<?php


require '../layout/haeder.php';

$connect = DBConnection();

$id=$_GET['edit'];
$type= educationalgroup_Get_id($id,$connect);
?>



<form role="form" action="../../app/Controll/EducationalGroup/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه گروه آموزشی در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $type->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $type->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">گروه آموزشی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نوع کاربر را وارد کنید"
                           name="name" value="<?= $type->name?>">
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
