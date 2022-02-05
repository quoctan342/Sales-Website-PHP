<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"]; 
    //update sql 
    if (isset($_POST['editloaisp'])) {
        if(isset($_POST["TenLoaiSanPham"])) { $TenLoaiSanPham = $_POST['TenLoaiSanPham']; }

    $sql = "UPDATE loaisanpham SET TenLoaiSanPham  = '$TenLoaiSanPham' WHERE MaLoaiSanPham = '$id'";

    if (mysqli_query($connection, $sql)) {
        echo "<div class='list'>Sửa tên loại sản phẩm thành công. <a href='/qlyLoaiSP/index.php?mod=panel'>Quay lại</a></div>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        exit;
    }
}
    

    ////////////////////////
    $sql = "SELECT * FROM loaisanpham WHERE MaLoaiSanPham='$id'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query);
?>

<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <a id="ba" href="/">Admin Panel</a> > 
            <a id="ba" href="/qlySanPham/index.php?mod=panel">Quản lý loại sản phẩm</a> > 
            <font color="#008744">Sửa loại sản phẩm</font>
        </div>
    </div>
</div>
<div class="list">
<?php
echo '<form action="/qlyLoaiSP/index.php?mod=update&id='.$id.'" method="POST" >';
?>
    <p>Tên loại sản phẩm </p>
    <?php
    echo'<p><input id="TenLoaiSanPham" type="text" size="50" name="TenLoaiSanPham" value="'.$row['TenLoaiSanPham'].'"/></p>';
    ?>
                
            <p><input type='submit' name="editloaisp" value='Thêm sản phẩm' onclick=" return Check()" />
            <a href='/qlyLoaiSP/index.php?mod=panel'>Quay lại</a></p>
    </form>
</div>
<?php

}
?>