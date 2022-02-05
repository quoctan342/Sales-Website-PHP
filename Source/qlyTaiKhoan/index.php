<?php
require "../adminpanel/header.php";
$mod = "list";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    
$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
switch ($mod) {
    case 'list': 
        include "../qlyTaiKhoan/list.php";
        break;
    case 'sua': 
        include "../qlyTaiKhoan/sua.php";
        break;
    case 'xoa': 
        include "../qlyTaiKhoan/xoa.php";
        break;
    case 'khoiphuc': 
        include "../qlyTaiKhoan/khoiphuc.php";
        break;
    default:
        include "../qlyTaiKhoan/error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>