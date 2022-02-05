<div id="vien"><div class="center"><div id="ban">
<a id="ba" href="/index.php">Trang chủ</a> > <a id="ba" href="/">Admin Panel</a> > 
<font color="#008744">Quản lý loại sản phẩm</font></div></div></div>
<div class="list"><a href="/qlyLoaiSP/index.php?mod=add"><button class="button">Thêm loại sản phẩm</button></a></div>
<?php
// 2. Tạo câu truy vấn (Query): SELECT, INSERT, DELETE, UPDATE
    $sql = "SELECT * FROM loaisanpham";

    // 3. Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);

    // 4. Xử lý kết quả của câu truy vấn (SELECT)
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['MaLoaiSanPham'];
        $name = $row['TenLoaiSanPham'];
        $xoa = $row['BiXoa'];
        if($row['BiXoa'] == 1) {
            echo'<div class="listdel">';
        } else {
            echo '<div class="list">';
        }
        echo''.$id.'. '.$name.'';
        echo '<div class="tool"><a href="/qlyLoaiSP/index.php?mod=update&id='.$id.'"><i class="far fa-edit"></i></a>  ';
        if($xoa == 1) {
            echo '<a href="/qlyLoaiSP/index.php?mod=restore&id='.$id.'"><i class="fas fa-trash-restore-alt"></i></a>';
        } else {
            echo '<a href="/qlyLoaiSP/index.php?mod=del&id='.$id.'"><i class="far fa-trash-alt"></i></a>';
        }
        echo '</div></div>';
    }
?>
