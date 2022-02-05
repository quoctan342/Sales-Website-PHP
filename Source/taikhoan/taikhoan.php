<?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan = '$id'";
$query = mysqli_query($connection, $sql);
$user = mysqli_fetch_array($query);
echo'
<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <font color="#008744">Trang khách hàng</font>
        </div>
    </div>
</div>
<div class="list"><div class="ban"><h2>TRANG KHÁCH HÀNG</h2>
<p><b>Xin chào <font color="008744">'.$user['HoTen'].'</font>! </div></div><div class="mainmenu">';
$sql2 = "SELECT * FROM dondathang WHERE MaTaiKhoan = '$id'";
$dsdh = mysqli_query($connection, $sql2);
echo '<table style="display: inline-block; font-size: 14px;"><tr>
<th colspan="1" style="border:1px solid black; text-align: center;">Mã đơn hàng</th>
<th colspan="1" style="border:1px solid black; text-align: center;">Ngày đặt</th>
<th colspan="1" style="border:1px solid black; text-align: center;">Tổng tiền</th>
<th colspan="1" style="border:1px solid black; text-align: center;">Tình trạng thanh toán</th>
<th colspan="1" style="border:1px solid black; text-align: center;">Chi tiết đơn hàng</th>
';
while($dsdonhang = mysqli_fetch_array($dsdh)) {
    echo '<tr><td style="border:1px solid black; text-align: center;">';
    echo ''.$dsdonhang['MaDonDatHang'].'</td>';
    echo '<td style="border:1px solid black; text-align: center;">'.$dsdonhang['NgayLap'].'</td>';
    echo '<td style="border:1px solid black; text-align: center;">'.$dsdonhang['TongThanhTien'].'</td>';
    echo '<td style="border:1px solid black; text-align: center;">';
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
    echo '<td style="border:1px solid black; text-align: center;"><a href="../donhang/index.php?mod=chitiet&id='.$dsdonhang['MaDonDatHang'].'">Nhấp vào xem</a></td>';
    echo'</tr></td>';
    }
echo'</table>';
echo '<div class="info"><p  style="margin: 10px 20px 10px 20px;"><b>Thông tin của tôi</b></p>
    <p style="margin: 10px 20px 10px 20px;">Họ tên: '.$user['HoTen'].'</p>
    <p style="margin: 10px 20px 10px 20px;">Địa chỉ: '.$user['DiaChi'].'</p>
    <p style="margin: 10px 20px 10px 20px;">Điện thoại: '.$user['DienThoai'].'</p>
    <p style="margin: 10px 20px 10px 20px;">Email: '.$user['Email'].'</p>
    <p style="margin: 10px 20px 10px 20px;">Ngày sinh: '.$user['NgaySinh'].'</p>
    <p style="margin: 10px 20px 10px 20px;"><a href="../taikhoan/index.php?mod=capnhat&id='.$user['MaTaiKhoan'].'" class="submit3">Cập nhật thông tin</a></p>
    </div></div>';

} 
?>