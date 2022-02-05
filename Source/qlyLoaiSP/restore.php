<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE loaisanpham SET BiXoa = 0 WHERE MaLoaiSanPham = '$id'";
    $result = mysqli_query($connection, $sql);
}
ChangeURL("../qlyLoaiSP");
?>