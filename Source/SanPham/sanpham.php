<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sessionKey = 'post_' . $id;
    if(isset($_SESSION[$sessionKey])) {
    } else {
        $_SESSION[$sessionKey] = 1; //set giá trị cho session
        $s = "UPDATE sanpham SET SoLuotXem = SoLuotXem + 1 WHERE id = '$id'";
        $ss = mysqli_query($connection, $s);
    }

    
    $sql = "SELECT * FROM sanpham WHERE MaSanPham='$id'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query);

    $th = "SELECT * FROM hangsanxuat WHERE MaHangSanXuat = '".$row['MaHangSanXuat']."'";
    $th2 = mysqli_query($connection, $th);
    $thuonghieu = mysqli_fetch_array($th2);

    $lsp = "SELECT * FROM loaisanpham WHERE MaLoaiSanPham = '".$row['MaLoaiSanPham']."'";
    $lsp2 = mysqli_query($connection, $lsp);
    $loaisp = mysqli_fetch_array($lsp2);

    echo'<div id="vien"><div class="center"><div id="ban"><font color="#008744">'.$row['TenSanPham'].'</font></div></div></div>';
    echo'<div class="list">';
    echo'<table><tr><td class="ShowAnh">';
    echo'<img src="../images/'.$row['HinhURL'].'"></td><td style="float: right;">';
    echo'<h2>'.$row['TenSanPham'].'</h2>';
    echo'Thương hiệu: <font color="#008744">'.$thuonghieu['TenHangSanXuat'].'</font> | ';
    if ($row['SoLuong'] > 0) {
        echo'Tình trạng: <font color="#008744">Còn hàng </font>';
    } else {
        echo'Tình trạng: <font color="red">Hết hàng</font>';
    }
    
    echo'<p style="font-size: 30px;line-height: 30px;color: #008744;font-weight: bold;margin-top: 20px;margin-bottom: 20px;">';
    echo number_format($row['GiaSanPham'], 0).'₫<br>';
    echo'</p>';
    echo'<p>- Loại sản phẩm: '.$loaisp['TenLoaiSanPham'].'<br/>'.$row['MoTa'].'
    - Bảo hành: '.$row['BaoHanh'].' năm';
    echo '<br/>- Số lượt xem: '.$row['SoLuotXem'].'';
    echo '<br/><br/><br/><a class="submit3" href="../giohang/index.php?mod=them&item='.$row['MaSanPham'].'">Mua hàng</a>';
    echo'</p>';
    echo'</td></tr></table>';
    echo'</div>';

    echo '<div class="mainmenu">
    <div class="vienxanh"><div class="tit">SẢN PHẨM CÙNG LOẠI</div></div>';
    $spcl = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaLoaiSanPham = '".$row['MaLoaiSanPham']."' AND MaSanPham != '".$row['MaSanPham']."' ORDER BY SoLuongDaBan ASC LIMIT 5";
    $tvspcl = mysqli_query($connection, $spcl);
    while($show = mysqli_fetch_array($tvspcl))
    {
        $id = $show['MaSanPham'];
        $name = $show['TenSanPham'];
        $price = $show['GiaSanPham'];
        $hinh = $show['HinhURL'];
        echo'<div class="list2"><a href="/SanPham/index.php?mod=sanpham&id='.$id.'">
        <img src="/images/'.$hinh.'" width="215px" height="200px"></a>';
        echo '<a id="tensp" href="/SanPham/index.php?mod=sanpham&id='.$id.'"><p>'.$name.'</p></a>';

        echo'<span>';
        echo number_format($price, 0).' đ<br>';
        echo '</span></div>';
    }
    echo '</div></div>';
}
?>
