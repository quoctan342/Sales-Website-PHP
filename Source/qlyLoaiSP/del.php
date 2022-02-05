<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE loaisanpham SET BiXoa = 1 WHERE MaLoaiSanPham = '$id'";
    $result = mysqli_query($connection, $sql);
}
ChangeURL("../qlyLoaiSP");
?>