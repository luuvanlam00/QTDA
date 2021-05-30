<?php
include_once './connect.php';
$ma=$_GET['id_kh'];
$sql="delete from khachhang where id_kh='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=khachhang"</script>';
?>