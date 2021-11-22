<?php


require '../layout/haeder.php';


?>



<form role="form" action="../../app/Controll/TermVorod/termVorodController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره ترم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره ترم را وارد کنید"
                           name="number" value="">
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
