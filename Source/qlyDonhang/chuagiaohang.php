<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE dondathang SET MaTinhTrang = 4 WHERE MaDonDatHang = '$id'";
    $result = mysqli_query($connection, $sql);

    ChangeURL("../qlyDonhang/index.php?mod=chitiet&id=$id");
}
    
?>