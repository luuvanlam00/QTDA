<?php
include_once './connect.php';
$ma=$_GET['id_cthd'];
$mahd=$_GET['id_hd'];

$sql="delete from cthdn where id_cthd='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=cthdn&id_hd='.$mahd.'"</script>';
?>