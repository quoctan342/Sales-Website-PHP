<?php
if (isset($_POST['themsp'])) {
    if(isset($_POST["TenSanPham"])) { $TenSanPham = $_POST['TenSanPham']; }
    if(isset($_POST["GiaSanPham"])) { $GiaSanPham = $_POST['GiaSanPham']; }
    if(isset($_POST["NgayNhap"])) { $NgayNhap = $_POST['NgayNhap']; }
    if(isset($_POST["Soluong"])) { $Soluong = $_POST['Soluong']; }
    if(isset($_POST["BaoHanh"])) { $BaoHanh = $_POST['BaoHanh']; }
    if(isset($_POST["Mota"])) { $Mota = $_POST['Mota']; }
    if(isset($_POST["LoaiSanPham"])) { $LoaiSanPham = $_POST['LoaiSanPham']; }
    if(isset($_POST["HangSX"])) { $HangSanXuat = $_POST['HangSX']; }
    if(isset($_FILES['Hinhsp'])) { $Hinhsp = $_FILES['Hinhsp']['name']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO sanpham (
        TenSanPham,
        HinhURL,
        GiaSanPham, 
        NgayNhap, 
        SoLuong, 
        MoTa, 
        MaLoaiSanPham, 
        MaHangSanXuat, 
        BaoHanh
    ) VALUES (
        '$TenSanPham',
        '$Hinhsp',
        '$GiaSanPham', 
        '$NgayNhap', 
        '$Soluong', 
        '$Mota', 
        '$LoaiSanPham', 
        '$HangSanXuat', 
        '$BaoHanh')";

if (isset($_POST['themsp'])) {
    // Kiểm tra quá trình upload file có bị lỗi gì không ?
    if (isset($_FILES['Hinhsp']) && $_FILES['Hinhsp']['error'] == 0) {
        // Kiểm tra quá trình upload file có bị lỗi gì không ?
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        // Lấy thông tin file bao gồm tên file, loại file, kích cỡ file
        $filename = $_FILES["Hinhsp"]["name"];
        $filetype = $_FILES["Hinhsp"]["type"];
        $filesize = $_FILES["Hinhsp"]["size"];
        // Kiểm tra định dạng file .jpg, png,...
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // Nếu không đúng định dạng file thì báo lỗi
        if(!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");
        // Cho phép kích thước tối đa của file là 5MB
        $maxsize = 5 * 1024 * 1024;
        // Nếu kích thước lớn hơn 5MB thì báo lỗi
        if($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");
        // Kiểm tra file ok hết chưa
        if(in_array($filetype, $allowed)){
        // Kiểm tra xem file đã tồn tại chưa, nếu rồi thì báo lỗi, không thì tiến hành upload
        if(file_exists("../images/" . $_FILES["Hinhsp"]["name"])){
        echo $_FILES["Hinhsp"]["name"] . " đã tồn tại";
        exit;
        } else{
        // Hàm move_uploaded_file sẽ tiến hành upload file lên thư mục upload
        move_uploaded_file($_FILES["Hinhsp"]["tmp_name"], "../images/" . $_FILES["Hinhsp"]["name"]);
        // Thông báo thành công
        } 
        } else{
        echo "Lỗi : Có vấn đề xảy ra khi upload file"; 
        exit;
        }
        } else{
        echo "Lỗi: " . $_FILES["Hinhsp"]["error"];
        exit;
        }
        }
   

    if (mysqli_query($connection, $sql)) {
        echo "<div class='list'>Thêm sản phẩm thành công. <a href='/qlySanPham'>Quay lại</a></div>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        exit;
    }
}

?>

<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <a id="ba" href="/">Admin Panel</a> > 
            <a id="ba" href="/qlySanPham/index.php?mod=panel">Quản lý sản phẩm</a> > 
            <font color="#008744">Thêm sản phẩm</font>
        </div>
    </div>
</div>
<div class="list">
    <form action='/qlySanPham/index.php?mod=add' method='POST' enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <p>Tên sản phẩm </p>
                    <p><input id="TenSanPham" type='text' size="50" name='TenSanPham' /></p>
                </td><td>
                    <p>Giá sản phẩm </p>
                    <p><input id="GiaSanPham" type='number' size="50" name='GiaSanPham' /></p>
                </td></tr>
                <tr><td>
                    <p>Ngày nhập hàng </p>
                    <p><input id="NgayNhap" type='date' size="50" name='NgayNhap' /></p>
                </td><td>
                    <p>Số lượng </p>
                    <p><input id="Soluong" type='number' size="50" name='Soluong' /></p>
                </td></tr>
                <tr><td>
                    <p>Bảo hành: </p>
                    <p><input id="BaoHanh" type='number' size="50" name='BaoHanh' /></p>
                </td><td>
                    <p>Loại sản phẩm </p>
                    <p><select name="LoaiSanPham">
                        <?php
                        $loai = "SELECT * FROM loaisanpham WHERE BiXoa = 0";
                        $loaisp = mysqli_query($connection, $loai);
                        while($row = mysqli_fetch_array($loaisp)) {
                            echo'<option value="'.$row["MaLoaiSanPham"].'">'.$row['TenLoaiSanPham'].'</option>';
                        }
                        ?>
                        </select></p>
                </td></tr></table>
        <p>Hãng sản xuất </p>
        <p><select name="HangSX">
                        <?php
                        $th = "SELECT * FROM hangsanxuat WHERE BiXoa = 0";
                        $thuonghieu = mysqli_query($connection, $th);
                        while($row1 = mysqli_fetch_array($thuonghieu)) {
                            echo'<option value="'.$row1["MaHangSanXuat"].'">'.$row1['TenHangSanXuat'].'</option>';
                        }
                        ?>
                        </select></p>
        <p>Mô tả </p>
        <p><textarea name="Mota" id="Mota" rows="10" cols="50"></textarea></p>
        <p>Hình sản phẩm:</p>
        <p><input id="hinh" type='file' name='Hinhsp' /></p>
        <p><input type='submit' name="themsp" value='Thêm sản phẩm' onclick=" return Check()" />
        <a href='/qlySanPham/index.php?mod=panel'>Quay lại</a></p>
    </form>
</div>