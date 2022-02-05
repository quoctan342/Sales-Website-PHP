<?php
$ok=1;
 if(isset($_SESSION['cart']))
 {
  foreach($_SESSION['cart'] as $k=>$v)
  {
   if(isset($v))
   {
   $ok=2;
   }
  }
 }

 ?>
 <div id="vien">
    <div class="center">
        <div id="ban">
            <a id="ba" href="/index.php">Trang chủ</a> > 
            <font color="#008744">Giỏ hàng</font>
        </div>
    </div>
</div>
<div class="list"><div class="ban"><h2><b>GIỎ HÀNG</b></h2></div></div>
<div class="mainmenu"> 

<?php
 if ($ok != 2)
  {
  echo '<div class="list">Không có sản phẩm nào. <a href="/index.php">Quay lại cửa hàng</a> để tiếp tục mua sắm.</div></div>';

 } else {

  $items = $_SESSION['cart'];
  $tongtien = 0;
  $tongtien = (double)$tongtien;
  $sql="SELECT * FROM sanpham WHERE MaSanPham IN ("; 
  foreach($_SESSION['cart'] as $id => $value) { 
      $sql.=$id.","; 
  } 
  $sql=substr($sql, 0, -1).") ORDER BY MaSanPham ASC"; 
  $query = mysqli_query($connection, $sql);

  echo '<table width="100%" style="border:1px solid #ebebeb;border-collapse:collapse;">';
  echo'<tr>
  <th colspan="1" style="border:1px solid #ebebeb; text-align: center;">Ảnh sản phẩm</th>
  <th colspan="1" style="border:1px solid #ebebeb; text-align: center;">Tên sản phẩm</th>
  <th colspan="1" style="border:1px solid #ebebeb; text-align: center;">Đơn giá</th>
  <th colspan="1" style="border:1px solid #ebebeb; text-align: center;">Số lượng</th>
  <th colspan="1" style="border:1px solid #ebebeb; text-align: center;" >Thành tiền</th>
  <th colspan="1" style="border:1px solid #ebebeb; text-align: center;">Xóa</th>
  </tr>';

  while ($row = mysqli_fetch_array($query)) {
    $soluong = $_SESSION['cart'][$row['MaSanPham']]['soluong'];
    echo'<tr><td width="20%" style="border:1px solid #ebebeb; text-align: center;"><img src="../images/'.$row['HinhURL'].'" width="100" height="100"></td>';
    echo'<td width="40%" style="border:1px solid #ebebeb;">'.$row['TenSanPham'].'</td>';
    echo'<td width="10%" style="border:1px solid #ebebeb; text-align: center;"><font color="##008744"><b>';
    echo number_format($row['GiaSanPham'], 0).' đ</b></font></td>';
    echo '<td width="10%" style="border:1px solid #ebebeb; text-align: center;">';
    echo'<form action="../giohang/index.php?mod=update&id='.$row['MaSanPham'].'" method="POST">';
?>

    <input type="number" style="width: 40px;" name="soluong" size="5" value="<?php echo $_SESSION['cart'][$row['MaSanPham']]['soluong'] ?>" /> 

   
    <?php
    echo'<input type="submit" name="update" value="Cập nhật sản phẩm">';
    echo '</form></td>';
    $thanhtien = $soluong * $row['GiaSanPham'];
    $tongtien = $tongtien + $thanhtien;
    echo '<td width="10%"style="border:1px solid #ebebeb; text-align: center;"><font color="##008744"><b>';
    echo number_format($thanhtien, 0).' đ</b></font></td>';
    echo '<td width="5%"style="border:1px solid #ebebeb; text-align: center;"><a href="../giohang/index.php?mod=xoa&id='.$row['MaSanPham'].'"><i class="far fa-trash-alt" aria-hidden="true" style="
    font-size: 25px;
    text-decoration: none;
    color: #444;
"></i></a></td>';
    
    echo'</tr>';
  }
  echo'</table>';
  echo'<div class="tongtien"> Tổng tiền: <font color="##008744"><b>';
  echo number_format($tongtien, 0).' đ</b></font></td>';


  echo'</div>';
  echo '<div class="canhphai">';
  echo '<form action="../giohang/index.php?mod=thanhtoan" method="POST">';

  echo'<a class="submit" href="/index.php">Tiếp tục mua sắm</a>';

  echo'<input type="submit" name="ThanhToan" value="Thực hiện thanh toán"></div></form>';

}
?>
</div>
</div>