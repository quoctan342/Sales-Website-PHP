<?php
if (isset($_POST['themloaisp'])) {
    if(isset($_POST["LoaiSanPham"])) { $LoaiSanPham = $_POST['LoaiSanPham']; }


    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO loaisanpham (TenLoaiSanPham) VALUES ('$LoaiSanPham')";


    if (mysqli_query($connection, $sql)) {
        echo "<div class='list'>Thêm loại sản phẩm thành công. <a href='/qlyLoaiSP/index.php?mod=panel'>Quay lại</a></div>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        echo'<a href="/qlyLoaiSP/index.php?mod=panel">Quay lại</a>';
        exit;
    }
}

?>

<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <a id="ba" href="/">Admin Panel</a> > 
            <a id="ba" href="/qlyLoaiSP/index.php?mod=panel">Quản lý loại sản phẩm</a> > 
            <font color="#008744">Thêm loại sản phẩm</font>
        </div>
    </div>
</div>
<div class="list">
    <form action='/qlyLoaiSP/index.php?mod=add' method='POST' enctype="multipart/form-data">
        <p>Nhập loại sản phẩm </p>
        <p><input id="LoaiSanPham" type='text' size="50" name='LoaiSanPham' /></p>
        <p><input type='submit' name="themloaisp" value='Thêm loại sản phẩm' onclick=" return Check()" />
        <a href='/qlyLoaiSP/index.php?mod=panel'>Quay lại</a></p>
    </form>
</div>