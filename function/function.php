<?php

function reDirect($location = __DIR__."/../index.php")
{
    header("Location:{$location}");
    die;
}

function login_after($location= "../view/home.php"){
    if(isset($_SESSION['user'])){
        reDirect($location);
    }
}

function login_before($location=__DIR__."/../index.php"){
    if(! isset($_SESSION['user'])){
        reDirect($location);
    }
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function input($field, $post = true)
{
    if (isPost() && $post) {
    return isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : "";
}
return isset($_GET[$field]) ? htmlspecialchars($_GET[$field]) : "";
}

function all($post = true)
{
    if (isPost() && $post) {

        return isset($_POST) ? array_map('htmlspecialchars', $_POST) : null;
    }
    return isset($_GET) ? array_map('htmlspecialchars', $_GET) : null;

}

function request($field=null)
{
    if (is_null($field))
        return false;
    return input($field);
}

function old($field)
{
    $a= request($field);
    return  $a;
}

function alertMe($error = false , $title  , $type){
    if ($error == false){
        return "";
    }
    if (empty($title) ){
        $title = "عمليات موفقيت آميز بود";
    }
    if (empty($type)){
        $type='success';
    }
echo "
   <div class=\"alert alert-{$type} alert-dismissible fade show\" role=\"alert\">
  {$title}
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>
";
}

function convert($in_post_date){
    //شمسی به میلادی
    if (str_contains($in_post_date,'/')){
        $re =str_replace( '/', '', $in_post_date);
        $n4 =str_split( $re , 4) ;
        $Y=$n4[0] . $n4[1];
        $M=$n4[2];
        $D=$n4[3];
        $e =\Morilog\Jalali\CalendarUtils::toGregorian(toEnNumber($Y), toEnNumber($M), toEnNumber($D));
        return  $e[0].'/'.$e[1].'/'.$e[2];
    }
}

function convert_to_Jalali($in_post_date){
    //میلادی به شمسی
  // return var_dump(toEnNumber($in_post_date));
    if (str_contains($in_post_date,'-')){
        $re =str_replace( '-', '', $in_post_date);
        $n4 =str_split( $re , 4);
        $n2 =str_split( $n4[1] , 2);

        $Y=$n4[0];
        $M=$n2[0];
        $D=$n2[1];
       // return  var_dump(intval($D));
        $e =  \Morilog\Jalali\CalendarUtils::toJalali(intval($Y), intval($M), intval($D)); // [1395, 2, 18]
       //echo $e[0] ;
       echo  $e[0] . "/"  . $e[1] . "/" .$e[2];
    }
}

function toEnNumber($input) {
    $replace_pairs = array(
        '۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
        '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'
    );

    return strtr( $input, $replace_pairs );
}

function validation_requre($item){
    $counter_error=0;
    foreach ($item as $item){
        if(empty($item)){
            $counter_error++;
        }
    }
    return $counter_error==0;
}
