<?php


require '../layout/haeder.php';

$connect = DBConnection();

$id=$_GET['edit'];
$classroom= classroom_Get_id($id,$connect);
if (!isset($_SESSION['user'])) {
    header('Location: /index.php ');
}
?>



<form role="form" action="../../app/Controll/ClassRoom/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه کلاس در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $classroom->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $classroom->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره کلاس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره کلاس را وارد کنید"
                           name="class_code" value="<?= $classroom->class_code?>">
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
