<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE hangsanxuat SET BiXoa = 1 WHERE MaHangSanXuat = '$id'";
    $result = mysqli_query($connection, $sql);
}
ChangeURL("../qlyHangSX");
?>