<?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
    ?>
    <div id="vien"><div class="center"><div id="ban">
    <a id="ba" href="/index.php">Trang chủ</a> > 
    <font color="#008744">Admin Panel</font></div></div></div>  
    <div class="list"><a id="ba" href="/qlySanPham">> Quản lý sản phẩm</a></div>
    <div class="list"><a id="ba" href="/qlyLoaiSP">> Quản lý loại sản phẩm</a></div>
    <div class="list"><a id="ba" href="/qlyHangSX">> Quản lý thương hiệu</a></div>
    <div class="list"><a id="ba" href="/qlyDonhang">> Quản lý đơn đặt hàng</a></div>
    <div class="list"><a id="ba" href="/qlyTaiKhoan">> Quản lý người dùng</a></div>

<?php

} else {
    header("Location: http://localhost:81/dangnhap.php");    
}
?>