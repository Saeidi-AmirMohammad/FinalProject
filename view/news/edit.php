<?php


require '../layout/haeder.php';

$connect = DBConnection();

$id=$_GET['edit'];
$news= news_Get_id($id,$connect);
?>



<form role="form" action="../../app/Controll/News/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه خبر در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $news->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $news->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نویسنده</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نویسنده را وارد کنید"
                           name="author" value="<?= $news->author?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان خبر</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="عنوان خبر را وارد کنید"
                           name="title" value="<?= $news->title?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">متن خبر</label>
<!--                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="متن خبر را وارد کنید"-->
<!--                           name="description" >-->
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"
                              placeholder="متن خبر را وارد کنید"><?=$news->description?></textarea>
                </div>

                <div class="form-group">
                    <label>انتخاب تاریخ:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                        </div>
                        <input name="date" value="<?=$news->date?>" class="normal-example form-control pwt-datepicker-input-element">
                    </div>
                    <!-- /.input group -->
                </div>
<!--            -->
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
