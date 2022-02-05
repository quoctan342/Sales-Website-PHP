<?php
require "../header.php";
$mod = "donhang";
if($_SESSION['username'] == TRUE) {

if(isset($_GET["mod"]))
    $mod = $_GET["mod"];

switch ($mod) {
    case 'dsdh': 
        include "../donhang/dsdh.php";
        break;
    case 'chitiet': 
        include "../donhang/chitiet.php";
        break;
    default:
        include "../error.php";
        break;
}
} else {
    ChangeURL('/dangnhap.php');
}

?>