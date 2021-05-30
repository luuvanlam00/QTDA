<?php
session_start();
if(isset($_GET['masp']))
{
    $ma=$_GET['masp'];
    unset($_SESSION['giohang'][$ma]);
   
}
header('location: ../index.php?page_layout=cart');

?>