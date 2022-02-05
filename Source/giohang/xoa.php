<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    unset($_SESSION['cart'][$id]); 
    ChangeURL("../giohang");
}
?>