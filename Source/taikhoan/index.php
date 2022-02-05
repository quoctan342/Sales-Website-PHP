<?php
require "../header.php";
$mod = "taikhoan";
if($_SESSION['username'] == TRUE) {

if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    

switch ($mod) {
    case 'taikhoan': 
        include "../taikhoan/taikhoan.php";
        break;
    case 'capnhat': 
        include "../taikhoan/capnhat.php";
        break;        
    default:
        include "../error.php";
        break;
}
} else {
    ChangeURL('/dangnhap.php');
}
?>