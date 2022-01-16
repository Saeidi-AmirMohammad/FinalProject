<?php


require '../layout/haeder.php';
//var_dump( $_GET);

$conn = DBConnection();
$data=getgrade_id($_GET['choose_lesson_id'],$conn);
echo "<pre>";
//var_dump($data);
echo "</pre>";

?>



<form role="form" action="../../app/Controll/Grade/editController.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">نمره نهایی درس</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="نمره را وارد کنید"
                           name="grade" value="<?=$data[0]->grade_value?>">
                    <input type="hidden" name="id_grade" value="<?=$data[0]->id?>">
                    <input type="hidden" name="choose_lesson_id" value="<?=$_GET['choose_lesson_id']?>">
                    <input type="hidden" name="student_id" value="<?=$_GET['student_id'] ?>">
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
