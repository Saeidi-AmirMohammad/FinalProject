<?php


require '../layout/haeder.php';


?>



<form role="form" action="../../app/Controll/ReshteTahsili/reshteTahsiliController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">نام رشته تحصیلی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نام رشته تحصیلی را وارد کنید"
                               name="name" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد رشته تحصیلی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="کد رشته تحصیلی را وارد کنید"
                           name="code" value="">
                </div>
                <div class="form-group">
                    <label for="status">وضعیت رشته تحصیلی</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">ارسال</button>
    </div>
</form>



<?php
require __DIR__.'/../../View/layout/footer.php';
?>
