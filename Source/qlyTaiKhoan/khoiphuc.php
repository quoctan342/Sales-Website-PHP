<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE taikhoan SET Xoa = 0 WHERE MaTaiKhoan = '$id'";
    $result = mysqli_query($connection, $sql);
}
    ChangeURL('../qlyTaiKhoan');
?>