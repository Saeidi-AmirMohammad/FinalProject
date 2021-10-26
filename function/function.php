<?php
function reDirect($location="../index.php"){
    header("Location:{$location}");
    die;
}