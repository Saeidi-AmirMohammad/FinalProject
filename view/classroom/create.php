<?php


require '../layout/haeder.php';
if (!isset($_SESSION['user'])) {
    header('Location: /index.php ');
}

?>



<form role="form" action="../../app/Controll/ClassRoom/classRoomController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره کلاس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره کلاس را وارد کنید"
                           name="class_code" value="">
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
