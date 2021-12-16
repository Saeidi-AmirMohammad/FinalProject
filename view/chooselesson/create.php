<?php


require '../layout/haeder.php';


?>



<form role="form" action="../../app/Controll/ChooseLesson/chooseLessonController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">دانشجو</label>
                    <select class="form-control" id="type" name="type">
                        <?php foreach ($data as $key): ?>
                            <option value='<?= $key->id?>'><?= $key->name?></option>
                        <?php endforeach;?>
                    </select>
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
