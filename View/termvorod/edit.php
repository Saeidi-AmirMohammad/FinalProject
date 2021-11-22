<?php


require '../layout/haeder.php';

$connect = DBConnection();

$id=$_GET['edit'];
$termvorod= termvorod_Get_id($id,$connect);
?>



<form role="form" action="../../app/Controll/TermVorod/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">شناسه ترم در سیستم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="id_view" value="<?= $termvorod->id?>" disabled>
                    <input type="hidden" class="form-control"
                           name="id" value="<?= $termvorod->id?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره ترم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره ترم را وارد کنید"
                           name="number" value="<?= $termvorod->number?>">
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
