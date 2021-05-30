<?php
include_once './connect.php';
$ma=$_GET['masp'];
$sql="delete from sanpham where masp='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=sanpham"</script>';
?>