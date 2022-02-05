<?php
include("header.php");
if(isset($_POST['dangky'])) {
    if(isset($_POST["TenDangNhap"])) { $tendangnhap = $_POST['TenDangNhap']; }
    if(isset($_POST["MatKhau"])) { $matkhau = $_POST['MatKhau']; }
    if(isset($_POST["HoTen"])) { $hoten = $_POST['HoTen']; }
    if(isset($_POST["DiaChi"])) { $diachi = $_POST['DiaChi']; }
    if(isset($_POST["DienThoai"])) { $sodt = $_POST['DienThoai']; }
    if(isset($_POST["Email"])) { $email = $_POST['Email']; }
    if(isset($_POST["NgaySinh"])) { $ngaysinh = $_POST['NgaySinh']; }

    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$tendangnhap'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username  đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Tên đăng nhập đã tồn tại"); window.location="dangky.php";</script>';
          
        // Dừng chương trình
        die ();
    }

    $sql = "SELECT * FROM taikhoan WHERE Email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Email đã tồn tại"); window.location="dangky.php";</script>';
          
        // Dừng chương trình
        die ();
    }

    $sql = "SELECT * FROM taikhoan WHERE DienThoai = '$sodt'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là sdt đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Số điện thoại đã tồn tại"); window.location="dangky.php";</script>';
          
        // Dừng chương trình
        die ();
    }

//Kiểm tra đã nhập đầy đủ chưa
$sql = "INSERT INTO taikhoan (TenDangNhap, MatKhau, HoTen, DiaChi, DienThoai, Email, NgaySinh)
VALUES ('$tendangnhap', '$matkhau', '$hoten', '$diachi', '$sodt', '$email', '$ngaysinh')";

$result = mysqli_query($connection, $sql);

if($result) {
    $_SESSION['username'] = $tendangnhap;
    echo '
        <div id="vien"><div class="center"><div id="ban">
            <h2>ĐĂNG KÍ TÀI KHOẢN </h2>
            <p>Đăng ký thành công. Thông tin tài khoản của bạn: </p>
        </div></div></div>
        <div id="vien"><div class="center"><div id="ban">
            <p>Tên đăng nhập: <b>'.$tendangnhap.'</b></p>
            <p>Mật khẩu: <b>'.$matkhau.'</b></p>
            <p>Họ tên: <b>'.$hoten.'</b></p>
            <p>Địa chỉ: <b>'.$diachi.'</b></p>
            <p>Số điện thoại: <b>'.$sodt.'</b></p>
            <p>Email: <b>'.$email.'</b></p>
            <p>Ngày sinh: <b>'.$ngaysinh.'</b></p>';
    echo '<a href="/index.php"><button class="button">Về trang chủ</button></a></div></div></div>';

}
} else {
    echo' co loi xay ra ';
}
?>