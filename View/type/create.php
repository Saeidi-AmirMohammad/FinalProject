<?php


require '../layout/haeder.php';


?>



<form role="form" action="../../app/Controll/Type/typeController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">نوع کاربر</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نوع کاربر را وارد کنید"
                           name="name" value="">
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
