<?php
require __DIR__."/../../bootstrap/autoload.php";
$conn = DBConnection();
$EducationalGroupData = getAllEducationalGroup($conn);
?>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">کد مدرسی</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                       placeholder="کد مدرسی را وارد کنید"
                       name="codeModares" value="">
            </div>
            <div class="form-group">
                <label for="martabeElmi_id">مرتبه علمی</label>
                <select class="form-control" id="martabeElmi_id" name="martabeElmi_id">
                    <option  selected >لطفا انتخاب کنید</option>
                    <option value="1">استادیار</option>
                    <option value="2">مربی</option>
                    <option value="3">دانشیار</option>
                    <option value="4">استاد</option>
                    <option value="5">مربی آموزشیار</option>
                </select>
            </div>

            <div class="form-group">
                <label for="employmentType_id">نوع استخدامی</label>
                <select class="form-control" id="employmentType_id" name="employmentType_id">
                    <option  selected >لطفا انتخاب کنید</option>
                    <option value="1">پیمانی</option>
                    <option value="2">رسمی</option>
                </select>
            </div>

            <div class="form-group">
                <label for="teachingType_id">نوع تدریس</label>
                <select class="form-control" id="teachingType_id" name="teachingType_id">
                    <option  selected >لطفا انتخاب کنید</option>
                    <option value="1">کادر آموزشی موظف</option>
                    <option value="2">حق التدریس رسمی مرکز</option>
                    <option value="3">حق التدریس رسمی سایر مراکز</option>
                    <option value="4">حق التدریس آزاد</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="madrak_id">مدرک تحصیلی</label>
                <select class="form-control" id="madrak_id" name="madrak_id">
                    <option  selected >لطفا انتخاب کنید</option>
                    <option value="1">دیپلم</option>
                    <option value="2">فوق دیپلم</option>
                    <option value="3">لیسانس</option>
                    <option value="4">فوق لیسانس</option>
                    <option value="5">دکتری</option>
                </select>
            </div>


            <div class="form-group">
                <label for="educationalGroup_id">گروه آموزشی</label>
                <select class="form-control" id="educationalGroup_id" name="educationalGroup_id">
                    <option  selected >لطفا انتخاب کنید</option>
                    <?php foreach ($EducationalGroupData as $key):?>
                    <option value="<?= $key->id?>"><?= $key->name?></option>
            <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label for="hozeDoroos_id">حوزه دروس</label>
                <select class="form-control" id="hozeDoroos_id" name="hozeDoroos_id">
                    <option  selected >لطفا انتخاب کنید</option>
                    <option value="1">درس های آموزشی شش گانه</option>
                    <option value="2">دروس علوم پایه</option>
                    <option value="3">دروس عمومی</option>
                    <option value="4">دروس معارف</option>
                </select>
            </div>
        </div>
    </div>