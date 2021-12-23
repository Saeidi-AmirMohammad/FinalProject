<?php
require __DIR__."/../../bootstrap/autoload.php";
$conn = DBConnection();
$ReshteTahsiliData = getAllReshteTahsili($conn);
$TermVorodData = getAllTermVorod($conn);

$id = $_SESSION['edit'];
$user = user_Get_id($id, $conn);
$id = $user->id;
$teacher = getAllstudent($id, $conn);
foreach ($teacher as $key):

?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">کد دانشجویی</label>
                    <input type="text" class="form-control" id="codeDaneshjo"
                           placeholder="کد دانشجویی را وارد کنید"
                           name="codeDaneshjo" value="<?= $key->codeDaneshjo ?>">
                </div>
                <div class="form-group">
                    <label for="maghtae_id">مقطع تحصیلی</label>
                    <select class="form-control" id="maghtae_id" name="maghtae_id">
                        <option value="1" <?= $key->maghtae_id === '1' ? 'selected' : '' ?> >کاردانی پیوسته</option>
                        <option value="2" <?= $key->maghtae_id === '2' ? 'selected' : '' ?> >کاردانی ناپیوسته</option>
                        <option value="3" <?= $key->maghtae_id === '3' ? 'selected' : '' ?> >کارشناسی پیوسته</option>
                        <option value="4" <?= $key->maghtae_id === '4' ? 'selected' : '' ?> >کارشناسی ناپیوسته</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="reshteTahsili_id">رشته تحصیلی</label>
                    <select class="form-control" id="reshteTahsili_id" name="reshteTahsili_id">
                        <?php foreach ($ReshteTahsiliData as $keyo):?>
                            <option value="<?= $keyo->id?>"   <?= $key->reshteTahsili_id === $keyo->id ? 'selected' : '' ?> ><?php if( $keyo->status === '1'){echo 'فعال';} else{echo 'غیر فعال';}?> - <?= $keyo->name?> - <?= $keyo->code?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="termVorod_id">ترم ورود</label>
                    <select class="form-control" id="termVorod_id" name="termVorod_id">
                        <?php foreach ($TermVorodData as $keyo):?>
                            <option value="<?= $keyo->id?>"  <?= $key->termVorod_id === $keyo->id ? 'selected' : '' ?>   ><?= $keyo->number?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nobatePaziresh_id">نوبت پذیرش</label>
                    <select class="form-control" id="nobatePaziresh_id" name="nobatePaziresh_id">
                        <option value="1" <?= $key->nobatePaziresh_id === '1' ? 'selected' : '' ?>>روزانه</option>
                        <option value="2" <?= $key->nobatePaziresh_id === '2' ? 'selected' : '' ?> >شبانه</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vazeiateNezamVazife_id">وضعیت نظام وظیفه</label>
                    <select class="form-control" id="vazeiateNezamVazife_id" name="vazeiateNezamVazife_id">
                        <option value="1"  <?= $key->vazeiateNezamVazife_id === '1' ? 'selected' : '' ?>   >معاف دائم</option>
                        <option value="2"  <?= $key->vazeiateNezamVazife_id === '2' ? 'selected' : '' ?> >پایان خدمت</option>
                        <option value="3"  <?= $key->vazeiateNezamVazife_id === '3' ? 'selected' : '' ?> >معاف پزشکی</option>
                        <option value="4"  <?= $key->vazeiateNezamVazife_id === '4' ? 'selected' : '' ?> >معاف تکفل</option>
                        <option value="5"  <?= $key->vazeiateNezamVazife_id === '5' ? 'selected' : '' ?>  >درحین خدمت</option>
                    </select>
                </div>
            </div>
        </div>

<?php
endforeach;
?>