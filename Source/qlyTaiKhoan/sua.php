<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_array($query);
    if (isset($_POST['capnhatthongtin'])) {
        if(isset($_POST["HoTen"])) { $HoTen = $_POST['HoTen']; }
        if(isset($_POST["DiaChi"])) { $DiaChi = $_POST['DiaChi']; }
        if(isset($_POST["DienThoai"])) { $DienThoai = $_POST['DienThoai']; }
        if(isset($_POST["Email"])) { $Email = $_POST['Email']; }
        if(isset($_POST["NgaySinh"])) { $NgaySinh = $_POST['NgaySinh']; }
        if(isset($_POST["Quyen"])) { $Quyen = $_POST['Quyen']; }

        $sql = "UPDATE taikhoan
        SET HoTen  = '$HoTen',
        DiaChi  = '$DiaChi',
        DienThoai    = '$DienThoai',
        Email     = '$Email',
        NgaySinh  = '$NgaySinh',
        Quyen  = '$Quyen'
        WHERE 
            MaTaiKhoan = '$id'";

        if (mysqli_query($connection, $sql)) {
            echo '<div class="list">Cập nhật thông tin cá nhân thành công. <a href="/qlyTaiKhoan/index.php?&id='.$id.'">Quay lại</a></div>';
            exit;
        } else {
            echo '<div class="list">Đã có lỗi xảy ra. <a href="/qlyTaiKhoan/index.php?&id='.$id.'">Quay lại</a></div>';
            exit;
    }
    }

    echo '<div class="vien"><div class="center">';
    echo '<form action="../qlyTaiKhoan/index.php?mod=sua&id='.$id.'" method="POST">';
    echo'<p><input id="HoTen" type="text" size="50" name="HoTen" value="'.$result['HoTen'].'"/></p>';
    echo'<p><input id="DiaChi" type="text" size="50" name="DiaChi" value="'.$result['DiaChi'].'"/></p>';
    echo'<p><input id="DienThoai" type="number" size="50" name="DienThoai" value="'.$result['DienThoai'].'"/></p>';
    echo'<p><input id="Email" type="email" size="50" name="Email" value="'.$result['Email'].'"/></p>';
    echo'<p><input id="NgaySinh" type="date" size="50" name="NgaySinh" value="'.$result['NgaySinh'].'"/></p>';
    echo'<p><select name="Quyen"><option value="0">Thành viên</option><option value="1">Admin</option></select></p>';
    echo'<p><input type="submit" name="capnhatthongtin" value="Cập nhật" onclick=" return Check()" /></p>';
    echo'</form>';
    echo'</div></div>';
    
}
?>