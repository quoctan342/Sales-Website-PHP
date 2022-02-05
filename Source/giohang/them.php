<?php
$id=$_GET['item'];
if(isset($_SESSION['cart'][$id])){ 
              
        $_SESSION['cart'][$id]['soluong']++; 
          
}else{ 
        
        $sql_s="SELECT * FROM sanpham WHERE MaSanPham='$id'"; 
        $query_s=mysqli_query($connection, $sql_s); 
        if($query_s != NULL){ 
            $row_s=mysqli_fetch_array($query_s); 
            $gia = $row_s['GiaSanPham'];
            $_SESSION['cart'][$row_s['MaSanPham']]=array(
                    "soluong" => 1           ); 
              

              
        }else{ 
              
            echo'San pham khong ton tai';
            
        } 
          
    }
    ChangeURL("../giohang/index.php");
    exit();

?>