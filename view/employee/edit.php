<?php
require __DIR__."/../../bootstrap/autoload.php";
$connect = DBConnection();

$id = $_SESSION['edit'];
$user= user_Get_id($id,$connect);
$id = $user->id;
$employee = getAllemploy($id, $connect);
if (!isset($_SESSION['user'])) {
    header('Location: /index.php ');
}
foreach ($employee as $key):
?>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">کد استاندارد</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                       placeholder="کد استاندارد را وارد کنید"
                       name="codeStandard" value="<?=$key->codeStandard?>">
            </div>
        </div>
    </div>

<?php
  endforeach;

?>