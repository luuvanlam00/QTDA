<?php
include_once './connect.php';
$ma=$_GET['id_hd'];
$sql="delete from hdn where id_hd='$ma'";
mysqli_query($link,$sql);
echo '<script>window.location="quantri.php?page_layout=hdn"</script>';
?>