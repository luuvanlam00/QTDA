<?php
include_once './connect.php';
$ma=$_GET['taikhoan'];
$sql="delete from nguoidung where taikhoan='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=dstk"</script>';
?>