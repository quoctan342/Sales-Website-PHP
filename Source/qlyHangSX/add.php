<?php
if (isset($_POST['themHSX'])) {
    if(isset($_POST["HangSX"])) { $HangSX = $_POST['HangSX']; }


    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO hangsanxuat (TenHangSanXuat) VALUES ('$HangSX')";


    if (mysqli_query($connection, $sql)) {
        echo "<div class='list'>Thêm thương hiệu thành công. <a href='/qlyHangSX/index.php?mod=panel'>Quay lại</a></div>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        echo'<a href="/qlyHangSX/index.php?mod=panel">Quay lại</a>';
        exit;
    }
}

?>

<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <a id="ba" href="/">Admin Panel</a> > 
            <a id="ba" href="/qlyHangSX/index.php?mod=panel">Quản lý thương hiệu</a> > 
            <font color="#008744">Thêm thương hiệu</font>
        </div>
    </div>
</div>
<div class="list">
    <form action='/qlyHangSX/index.php?mod=add' method='POST' enctype="multipart/form-data">
        <p>Nhập tên thương hiệu </p>
        <p><input id="HangSX" type='text' size="50" name='HangSX' /></p>
        <p><input type='submit' name="themHSX" value='Thêm thương hiệu' onclick=" return Check()" />
        <a href='/qlyHangSX/index.php?mod=panel'>Quay lại</a></p>
    </form>
</div>