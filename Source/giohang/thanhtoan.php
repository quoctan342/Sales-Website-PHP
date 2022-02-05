<?php
if (isset($_POST['ThanhToan'])) {
    
    $user = $_SESSION['username'];
    $nguoidung = "SELECT * FROM taikhoan WHERE TenDangNhap = '$user'";
    $ngdung = mysqli_query($connection, $nguoidung);
    $ngd = mysqli_fetch_array($ngdung);
    $users = $ngd['MaTaiKhoan'];

    $sql="SELECT * FROM sanpham WHERE MaSanPham IN ("; 
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.","; 
    } 
    $sql=substr($sql, 0, -1).") ORDER BY MaSanPham ASC"; 
    $query = mysqli_query($connection, $sql);
    $tongtien = 0.0;
    while ($row = mysqli_fetch_array($query)) {
    $soluong = $_SESSION['cart'][$row['MaSanPham']]['soluong'];
    $thanhtien = $soluong * $row['GiaSanPham'];
    $tongtien = $tongtien + $thanhtien;
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngaylap = date("Y-m-d H:i:s");
    // tao don hang
    $them = "INSERT INTO dondathang (NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) VALUES ('$ngaylap','$tongtien','$users', 1)";
    $them2 = mysqli_query($connection, $them);

    // chi tiet don hang
    $ddh = "SELECT * FROM dondathang ORDER BY MaDonDatHang DESC LIMIT 1";
    $tvddh = mysqli_query($connection, $ddh);
    $dondathang = mysqli_fetch_array($tvddh);
    $maddh = $dondathang['MaDonDatHang'];
    $tvsp="SELECT * FROM sanpham WHERE MaSanPham IN ("; 
    foreach($_SESSION['cart'] as $id => $value) { 
        $tvsp.=$id.","; 
    } 
    $tvsp=substr($tvsp, 0, -1).") ORDER BY MaSanPham ASC"; 
    $sp = mysqli_query($connection, $tvsp);
    while ($r = mysqli_fetch_array($sp)) {
        $sl = $_SESSION['cart'][$r['MaSanPham']]['soluong'];
        $giasp = $r['GiaSanPham'];
        $masp = $r['MaSanPham'];
        $add = "INSERT INTO chitietdondathang (
            SoLuong,
            GiaBan,
            MaDonDatHang,
            MaSanPham
            ) VALUES (
            '$sl',
            '$giasp',
            '$maddh',
            '$masp'
            )";
        $themct = mysqli_query($connection, $add);
    }
    
    
    if($them2) {
        echo'<div class="list">Đã đặt hàng thành công cmnr. <a href="/donhang/index.php?mod=chitiet&id='.$maddh.'">Đến chi tiết đơn hàng </a></div>';
        unset($_SESSION['cart']); 
    }
}

    

?>