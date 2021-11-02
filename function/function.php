<?php
function reDirect($location = "../index.php")
{
    header("Location:{$location}");
    die;
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

//function alertMe($error = false , $title = "عمليات موفقيت آميز بود" , $type = "info"){
//    if ($error == false){
//        return "";
//    }
//echo "<script type=\"text/javascript\">$(document).ready(function(){
//  swal({
//    position: \"top-end\",
//    type: '{$type}',
//    title: '{$title}',
//    showConfirmButton: false,
////    timer: 1500
//  })
//});</script>";
//}
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
