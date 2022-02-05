<?php
require "../header.php";
$mod = "giohang";


if($_SESSION['username'] == TRUE) {
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];

switch ($mod) {
    case 'giohang': 
        include "../giohang/giohang.php";
        break;
    case 'update': 
        include "../giohang/update.php";
        break;
    case 'them': 
        include "../giohang/them.php";
        break;
    case 'xoa': 
        include "../giohang/xoa.php";
        break;
    case 'thanhtoan': 
        include "../giohang/thanhtoan.php";
        break;        
    default:
        include "../error.php";
        break;
}
} else {
    ChangeURL('/dangnhap.php');
}

?>