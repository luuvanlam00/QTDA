<?php
include_once './connect.php';
$ma=$_GET['maloai'];
$sql="delete from loaisp where maloai='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=dmsp"</script>';
?>