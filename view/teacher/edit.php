<?php
require __DIR__ . "/../../bootstrap/autoload.php";
$conn = DBConnection();
$EducationalGroupData = getAllEducationalGroup($conn);


?>

<?php
$id = $_SESSION['edit'];
$user = user_Get_id($id, $conn);
$id = $user->id;
$teacher = getAllteacher($id, $conn);
foreach ($teacher as $key):

    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">کد مدرسی</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                       placeholder="کد مدرسی را وارد کنید"
                       name="codeModares" value="<?= $key->codeModares ?>">
            </div>

            <div class="form-group">
                <label for="martabeElmi_id">مرتبه علمی</label>
                <select class="form-control" id="martabeElmi_id" name="martabeElmi_id">
                    <option value="1" <?= $key->martabeElmi_id === '1' ? 'selected' : '' ?>>استادیار</option>
                    <option value="2" <?= $key->martabeElmi_id === '2' ? 'selected' : '' ?> >مربی</option>
                    <option value="3" <?= $key->martabeElmi_id === '3' ? 'selected' : '' ?> >دانشیار</option>
                    <option value="4" <?= $key->martabeElmi_id === '4' ? 'selected' : '' ?> >استاد</option>
                    <option value="5">مربی آموزشیار</option>
                </select>

            </div>

            <div class="form-group">
                <label for="employmentType_id">نوع استخدامی</label>
                <select class="form-control" id="employmentType_id" name="employmentType_id">
                    <option value="1" <?= $key->employmentType_id === '1' ? 'selected' : '' ?>>پیمانی</option>
                    <option value="2" <?= $key->employmentType_id === '2' ? 'selected' : '' ?> >رسمی</option>
                </select>
            </div>

            <div class="form-group">
                <label for="teachingType_id">نوع تدریس</label>
                <select class="form-control" id="teachingType_id" name="teachingType_id">
                    <option value="1" <?= $key->teachingType_id === '1' ? 'selected' : '' ?> >کادر آموزشی موظف</option>
                    <option value="2" <?= $key->teachingType_id === '2' ? 'selected' : '' ?> >حق التدریس رسمی مرکز
                    </option>
                    <option value="3" <?= $key->teachingType_id === '3' ? 'selected' : '' ?> >حق التدریس رسمی سایر
                        مراکز
                    </option>
                    <option value="4" <?= $key->teachingType_id === '4' ? 'selected' : '' ?> >حق التدریس آزاد</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="madrak_id">مدرک تحصیلی</label>
                <select class="form-control" id="madrak_id" name="madrak_id">
                    <option value="1" <?= $key->madrak_id === '1' ? 'selected' : '' ?> >دیپلم</option>
                    <option value="2" <?= $key->madrak_id === '2' ? 'selected' : '' ?> >فوق دیپلم</option>
                    <option value="3" <?= $key->madrak_id === '3' ? 'selected' : '' ?> >لیسانس</option>
                    <option value="4" <?= $key->madrak_id === '4' ? 'selected' : '' ?> >فوق لیسانس</option>
                    <option value="5" <?= $key->madrak_id === '5' ? 'selected' : '' ?> >دکتری</option>
                </select>
            </div>


            <div class="form-group">
                <label for="educationalGroup_id">گروه آموزشی</label>
                <select class="form-control" id="educationalGroup_id" name="educationalGroup_id">
                    <?php foreach ($EducationalGroupData as $keyo): ?>
                        <option value="<?= $keyo->id ?>"  <?= $key->educationalGroup_id === $keyo->id ? 'selected' : '' ?> ><?= $keyo->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hozeDoroos_id">حوزه دروس</label>
                <select class="form-control" id="hozeDoroos_id" name="hozeDoroos_id">
                    <option value="1" <?= $key->hozeDoroos_id === '1' ? 'selected' : '' ?> >درس های آموزشی شش گانه</option>
                    <option value="2" <?= $key->hozeDoroos_id === '2' ? 'selected' : '' ?> >دروس علوم پایه</option>
                    <option value="3" <?= $key->hozeDoroos_id === '3' ? 'selected' : '' ?> >دروس عمومی</option>
                    <option value="4" <?= $key->hozeDoroos_id === '4' ? 'selected' : '' ?>  >دروس معارف</option>
                </select>
            </div>

        </div>
    </div>

<?php
endforeach;
?>