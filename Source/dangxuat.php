<?php 
include('header.php');
if(isset($_SESSION['username']) && $_SESSION['username']) {
    unset($_SESSION['username']);   
    unset($_SESSION['cart']);   
}
ChangeURL("../index.php");
?>
