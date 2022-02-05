<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // bang chi tiet don hang
    $sql = "SELECT * FROM chitietdondathang WHERE MaDonDatHang = '$id'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query);
    // bang don hang
    $sql1 = "SELECT * FROM dondathang WHERE MaDonDatHang = '$id'";
    $query1 = mysqli_query($connection, $sql1);
    $row1 = mysqli_fetch_array($query1);
    // bang tai khoang
    $sql2 = "SELECT * FROM taikhoan WHERE MaTaiKhoan = '".$row1['MaTaiKhoan']."'";
    $query2 = mysqli_query($connection, $sql2);
    $row2 = mysqli_fetch_array($query2);
    // bang tinhtrang
    $sql5 = "SELECT * FROM tinhtrang WHERE MaTinhTrang = '".$row1['MaTinhTrang']."'";
    $query5 = mysqli_query($connection, $sql5);
    $row5 = mysqli_fetch_array($query5);

    echo'<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <font color="#008744">Chi tiết đơn hàng mã '.$row['MaDonDatHang'].'</font>
        </div>
    </div>
</div>';
    echo'<div class="list"><div class="ban"><h2>Chi tiết đơn hàng</h2></div></div>';
    echo '<div class="center"><div class="list">';
    echo 'Mã đơn đặt hàng: '.$row['MaDonDatHang'].'';
    echo '</div><div class="list">';
    echo 'Ngày đặt hàng: '.$row1['NgayLap'].'';
    echo '</div><div class="list">';
    echo 'Tên khách hàng: '.$row2['HoTen'].'';
    echo '</div><div class="list">';
    echo 'Số điện thoại: '.$row2['DienThoai'].'';
    echo '</div><div class="list">';
    echo 'Địa chỉ giao hàng : '.$row2['DiaChi'].'';
    echo '</div><div class="list">';
    echo 'Tổng tiền: ';
    echo number_format($row1['TongThanhTien'], 0).' đ   ';
    echo '</div><div class="list">';
    echo 'Tình trạng: '.$row5['TenTinhTrang'].'';
    echo '</div><div class="list">';
    echo '<a class="submit" href="../qlyDonhang/index.php?mod=giaohang&id='.$row['MaDonDatHang'].'">Giao hàng</a>';
    echo ' <a class="submit" href="../qlyDonhang/index.php?mod=danggiao&id='.$row['MaDonDatHang'].'">Đang giao hàng</a>';
    echo ' <a class="submit" href="../qlyDonhang/index.php?mod=chuagiaohang&id='.$row['MaDonDatHang'].'">Chưa giao hàng</a>';
    echo ' <a class="submit1" href="../qlyDonhang/index.php?mod=thanhtoan&id='.$row['MaDonDatHang'].'">Thanh toán</a>';
    echo ' <a class="submit1" href="../qlyDonhang/index.php?mod=chuathanhtoan&id='.$row['MaDonDatHang'].'">Chưa thanh toán</a>';
    echo ' <a class="submit2" href="../qlyDonhang/index.php?mod=huy&id='.$row['MaDonDatHang'].'">Hủy đơn hàng</a>';
    echo ' <a class="submit3" href="../qlyDonhang/index.php?mod=in&id='.$row['MaDonDatHang'].'">In hóa đơn</a>';
    echo '</div><div class="list">';
    echo 'Các sản phẩm: ';
    $stt = 1;
    // cac san pham trong don hang
    $sql4 = "SELECT * FROM chitietdondathang WHERE MaDonDatHang = '$id'";
    $query4 = mysqli_query($connection, $sql4);
    while ($row4 = mysqli_fetch_array($query4)) {
        $sql3 = "SELECT * FROM sanpham WHERE MaSanPham = '".$row4['MaSanPham']."'";
        $query3 = mysqli_query($connection, $sql3);
        $row3 = mysqli_fetch_array($query3);
        echo '<p>';
        echo ''.$stt.'. '.$row3['TenSanPham'].' - Số lượng: '.$row4['SoLuong'].' - Giá bán: '.$row4['GiaBan'].'';
        echo '</p>';
        $stt = $stt + 1;
    }
    echo '</div>';




}