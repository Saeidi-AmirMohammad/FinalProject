<?php
require __DIR__."/../../bootstrap/autoload.php";
$conn = DBConnection();
$ReshteTahsiliData = getAllReshteTahsili($conn);
$TermVorodData = getAllTermVorod($conn);
?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">کد دانشجویی</label>
                    <input type="text" class="form-control" id="codeDaneshjo"
                           placeholder="کد دانشجویی را وارد کنید"
                           name="codeDaneshjo" value="">
                </div>
                <div class="form-group">
                    <label for="maghtae_id">مقطع تحصیلی</label>
                    <select class="form-control" id="maghtae_id" name="maghtae_id">
                        <option value="1">کاردانی پیوسته</option>
                        <option value="2">کاردانی ناپیوسته</option>
                        <option value="3">کارشناسی پیوسته</option>
                        <option value="4">کارشناسی ناپیوسته</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="reshteTahsili_id">رشته تحصیلی</label>
                    <select class="form-control" id="reshteTahsili_id" name="reshteTahsili_id">
                        <?php foreach ($ReshteTahsiliData as $key):?>
                            <option value="<?= $key->id?>"><?php if( $key->status === '1'){echo 'فعال';} else{echo 'غیر فعال';}?> - <?= $key->name?> - <?= $key->code?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="termVorod_id">ترم ورود</label>
                    <select class="form-control" id="termVorod_id" name="termVorod_id">
                        <?php foreach ($TermVorodData as $key):?>
                            <option value="<?= $key->id?>"><?= $key->number?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nobatePaziresh_id">نوبت پذیرش</label>
                    <select class="form-control" id="nobatePaziresh_id" name="nobatePaziresh_id">
                        <option value="1">روزانه</option>
                        <option value="2">شبانه</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vazeiateNezamVazife_id">وضعیت نظام وظیفه</label>
                    <select class="form-control" id="vazeiateNezamVazife_id" name="vazeiateNezamVazife_id">
                        <option value="1">معاف دائم</option>
                        <option value="2">پایان خدمت</option>
                        <option value="3">معاف پزشکی</option>
                        <option value="4">معاف تکفل</option>
                        <option value="5">درحین خدمت</option>
                    </select>
                </div>
            </div>
        </div>