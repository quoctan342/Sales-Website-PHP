<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE sanpham SET BiXoa = 0 WHERE MaSanPham = '$id'";
    $result = mysqli_query($connection, $sql);
}
ChangeURL("../qlySanPham");
?>