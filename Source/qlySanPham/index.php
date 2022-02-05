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
        include "../qlySanPham/panel.php";
        break;
    case 'add': 
        include "../qlySanPham/add.php";
        break;
    case 'update': 
        include "../qlySanPham/update.php";
        break;
    case 'del': 
        include "../qlySanPham/del.php";
        break;
    case 'restore': 
        include "../qlySanPham/restore.php";
        break;
    default:
        include "../qlySanPham/error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>