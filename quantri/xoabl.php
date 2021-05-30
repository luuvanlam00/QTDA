<?php
include_once './connect.php';
$ma=$_GET['id_bl'];
$sql="delete from binhluan where id_bl='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=binhluan"</script>';
?>