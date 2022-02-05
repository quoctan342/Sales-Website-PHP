<div id="vien"><div class="center"><div id="ban">
<a id="ba" href="/index.php">Trang chủ</a> > <a id="ba" href="/adminpanel">Admin Panel</a> > 
<font color="#008744">Quản lý người dùng</font></div></div></div>
<?php
// 2. Tạo câu truy vấn (Query): SELECT, INSERT, DELETE, UPDATE
    $sql = "SELECT * FROM taikhoan ORDER BY MaTaiKhoan DESC";

    // 3. Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);

    // 4. Xử lý kết quả của câu truy vấn (SELECT)
    while($row = mysqli_fetch_array($result))
    {
    if($row['Xoa'] == 1) {
        echo'<div class="listdel">';
    } else {
    echo'<div class="list">';
    }
    echo'ID: '.$row['MaTaiKhoan'].' - Tài khoản: '.$row['TenDangNhap'].' - Chức vụ: ';
    if($row['Quyen'] == 1) {
        echo' <font color="red">Admin</font>';
    } else {
        echo 'User';
    }
    echo'<br/>';
    echo'Họ tên: '.$row['HoTen'].' - SDT: '.$row['DienThoai'].' - Ngày sinh: '.$row['NgaySinh'].' - Email: '.$row['Email'].' <Br/>Địa chỉ: '.$row['DiaChi'].'        ';
    echo '<div class="tool"><a href="/qlyTaiKhoan/index.php?mod=sua&id='.$row['MaTaiKhoan'].'"><i class="far fa-edit"></i></a>  ';
    if($row['Xoa'] == 1) {
        echo '<a href="/qlyTaiKhoan/index.php?mod=khoiphuc&id='.$row['MaTaiKhoan'].'"><i class="fas fa-trash-restore-alt"></i></a>';
    } else {
        echo '<a href="/qlyTaiKhoan/index.php?mod=xoa&id='.$row['MaTaiKhoan'].'"><i class="far fa-trash-alt"></i></a>';
    }
    echo '</div></div>';
}
?>
