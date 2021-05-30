<?php
include_once './connect.php';
$ma = $_GET['id_kh'];
if (isset($_POST['sua'])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    if (isset($ten)) {
        $sql = "update khachhang set tenkh='$ten',email='$email',sdt='$sdt' where id_kh='$ma'";
        mysqli_query($link, $sql);
        echo '<script>window.location="quantri.php?page_layout=khachhang"</script>';
    }
}

?>
<div class="ibox-content">
    <h1>Sửa khách hàng</h1>
    <form method="post" class="form-horizontal">
        <?php
        $sql = "select * from khachhang where id_kh='$ma'";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="form-group"><label class="col-sm-2 control-label">Tên khách hàng</label>

                <div class="col-sm-10"><input type="text" class="form-control" name="ten" value="<?php echo $row['tenkh'] ?>" /></div>


            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Email</label>


                <div class="col-sm-10"><input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" /></div>


            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>


                <div class="col-sm-10"><input type="text" class="form-control" name="sdt" value="<?php echo $row['sdt'] ?>" /></div>

            </div>
            <div class="hr-line-dashed"></div>


            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit" name="sua">Sửa</button>


                </div>
            </div>
        <?php
        } ?>
    </form>
</div>