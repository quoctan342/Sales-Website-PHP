<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"]; 
    //update sql 
    if (isset($_POST['edithangsx'])) {
        if(isset($_POST["TenHangSX"])) { $TenHangSX = $_POST['TenHangSX']; }

    $sql = "UPDATE hangsanxuat SET TenHangSanXuat  = '$TenHangSX' WHERE MaHangSanXuat = '$id'";

    if (mysqli_query($connection, $sql)) {
        echo "<div class='list'>Sửa tên thương hiệu thành công. <a href='/qlyHangSX/index.php?mod=panel'>Quay lại</a></div>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        exit;
    }
}

    ////////////////////////
    $sql = "SELECT * FROM hangsanxuat WHERE MaHangSanXuat='$id'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query);
?>

<div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <a id="ba" href="/">Admin Panel</a> > 
            <a id="ba" href="/qlyHangSX/index.php?mod=panel">Quản lý thương hiệu</a> > 
            <font color="#008744">Sửa thương hiệu</font>
        </div>
    </div>
</div>
<div class="list">
<?php
echo '<form action="/qlyHangSX/index.php?mod=update&id='.$id.'" method="POST" >';
?>
    <p>Tên thương hiệu</p>
    <?php
    echo'<p><input id="TenHangSX" type="text" size="50" name="TenHangSX" value="'.$row['TenHangSanXuat'].'"/></p>';
    ?>
                
            <p><input type='submit' name="edithangsx" value='Sửa tên thương hiệu' onclick=" return Check()" />
            <a href='/qlyHangSX/index.php?mod=panel'>Quay lại</a></p>
    </form>
</div>
<?php

}
?>