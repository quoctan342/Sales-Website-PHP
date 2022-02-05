<?php
include("header.php");
if (isset($_SESSION['username']) && $_SESSION['username']){
    echo'Bạn đã đăng nhập rồi.';
    echo'<a href="/index.php">Click để quay về trang chủ</a>';
} else {
?>
<div class="center">
    <div id="ban">
        <h2>ĐĂNG KÍ TÀI KHOẢN </h2>
        <p>Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
    </div>
    <form action="xulydangky.php" method="POST">
        <table>
            <tr><td><p>Tên đăng nhập* <br/>
            <input id="TenDangNhap" type="text" name="TenDangNhap" size="50" /></p></td>
            <td>
            <p>Mật khẩu* <br/>
            <input id="password" type="password" name="MatKhau" size="50" /></p></td></tr>
            <tr><td>
            <p>Họ và tên <br/>
            <input id="hoten" type="text" name="HoTen" size="50" /></p></td>
            <td><p>Địa chỉ <br/>
            <input id="diachi" type="text" name="DiaChi" size="50" /></p></td></tr>
            <tr><td>
            <p>Số điện thoại<br/>
            <input id="sodienthoai" type="text" name="DienThoai" size="50" /></p></td>
            <td><p>Email <br/>
            <input id="email" type="email" name="Email" size="50" /></p></td></tr>
            <tr><td>
            <p>Ngày sinh <br/>
            <input id="ngaysinh" type="date" name="NgaySinh" size="50" /></p></td></tr>
            <tr><td>
            <input type="submit" name="dangky" value="Đăng ký" onclick=" return KiemTra()" />
            <a href="/dangnhap.php"> Đăng nhập </a>
            </td></tr>
        </table>
    </form>
</div>

<script type="text/javascript">
    function KiemTra() {
        var tendangnhap = $('#TenDangNhap').val();
        var matkhau = $('#password').val();
        var hoten = $('#hoten').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sodienthoai').val();
        var email = $('#email').val();
        var ngaysinh = $('#ngaysinh').val();

        if (tendangnhap == "" || matkhau == "" || hoten == "" || diachi == "" || sdt == "" || email == "" || ngaysinh == "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }
        if (tendangnhap.length < 5) {
            alert("Tên đăng nhập phải nhiều hơn 4 ký tự.");
            return false;
        }
        if (matkhau.length < 6) {
            alert("Mật khẩu phải nhiều hơn 6 ký tự.");
            return false;
        }

        return true;
    }
</script>
<?php
}
?>