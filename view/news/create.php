<?php


require '../layout/haeder.php';


?>



<form role="form" action="../../app/Controll/News/newsController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputEmail1"
                           name="author" value="<?=$_SESSION['user_id']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="عنوان خبر را وارد کنید"
                           name="title" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">متن خبر</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"
                              placeholder="متن خبر را وارد کنید"></textarea>
                </div>

                <div class="form-group">
                    <label>انتخاب تاریخ:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                        </div>
                        <input name="date" class="normal-example form-control pwt-datepicker-input-element">
                    </div>
                    <!-- /.input group -->
                </div>
<!--            -->
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
