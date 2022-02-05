<?php
require "../adminpanel/header.php";
$mod = "panel";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    
$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
switch ($mod) {
    case 'panel': 
        include "../qlyLoaiSP/panel.php";
        break;
    case 'add': 
        include "../qlyLoaiSP/add.php";
        break;
    case 'update': 
        include "../qlyLoaiSP/update.php";
        break;
    case 'del': 
        include "../qlyLoaiSP/del.php";
        break;
    case 'restore': 
        include "../qlyLoaiSP/restore.php";
        break;
    default:
        include "../error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>