<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql2 = "SELECT * FROM dondathang WHERE MaTaiKhoan = '$id'";
    $dsdh = mysqli_query($connection, $sql2);

    while($dsdonhang = mysqli_fetch_array($dsdh)) {
        echo '<div class="list">';
        echo 'Mã đơn hàng: '.$dsdonhang['MaDonDatHang'].'';
        echo 'Ngày đặt: '.$dsdonhang['NgayLap'].'';
        echo 'Tổng tiền: '.$dsdonhang['TongThanhTien'].'';
        echo 'Tình trạng:';
        if ($dsdonhang['MaTinhTrang'] == 1) {
            echo 'Chưa thanh toán';
        } else if ($dsdonhang['MaTinhTrang'] == 2) {
            echo 'Thanh toán';
        } else if ($dsdonhang['MaTinhTrang'] == 3) {
            echo 'Đã giao';
        } else if ($dsdonhang['MaTinhTrang'] == 4) {
            echo 'Chưa giao';
        } else if ($dsdonhang['MaTinhTrang'] == 5) {
            echo 'Đã hủy';
        }
        }
        




}