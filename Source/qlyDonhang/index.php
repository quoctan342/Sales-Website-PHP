<?php
require "../adminpanel/header.php";
$mod = "panel";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];

$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='".$_SESSION['username']."'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
switch ($mod) {
    case 'panel': 
        include "../qlyDonHang/panel.php";
        break;
    case 'giaohang': 
        include "../qlyDonHang/giaohang.php";
        break;
    case 'chuagiaohang': 
        include "../qlyDonHang/chuagiaohang.php";
        break;
    case 'thanhtoan': 
        include "../qlyDonHang/thanhtoan.php";
        break;
    case 'chuathanhtoan': 
        include "../qlyDonHang/chuathanhtoan.php";
        break;
    case 'huy': 
        include "../qlyDonHang/huy.php";
        break;
    case 'in': 
        include "../qlyDonHang/in.php";
        break;
    case 'chitiet': 
        include "../qlyDonHang/chitiet.php";
        break;
    case 'danggiao': 
        include "../qlyDonHang/danggiao.php";
        break;
    default:
        include "../qlyDonHang/error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>