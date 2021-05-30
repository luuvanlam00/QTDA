<?php
include_once './connect.php';
$ma = $_GET['id_hd'];
$sql = "select * from hoadon where id_hd='$ma'";
$result = mysqli_query($link, $sql);

if (isset($_POST['sua'])) {

    $ten = $_POST['ten'];
    $dc= $_POST['dc'];
    $ngay = $_POST['ngay'];
    $tt = $_POST['tt'];
    $sql = "update hoadon set thoigian='$ngay',tenkh='$ten',diachi='$dc',trangthai='$tt' where id_hd=$ma";
    mysqli_query($link, $sql);
    echo '<script>window.location="quantri.php?page_layout=hd"</script>';
}

?>


<div class="ibox-content">
    <h1>Sửa hóa đơn </h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-group"><label class="col-sm-2 control-label">Ngày bán </label>

                <div class="col-sm-10"><input type="date" class="form-control" name="ngay" value="<?php echo $row['thoigian'] ?>" /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Tên khách hàng </label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="ten" value="<?php echo $row['tenkh'] ?>" /></div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>

                <div class="col-sm-10"><textarea require="" class="form-control" name="dc"> <?php echo $row['diachi'] ?></textarea></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Trạng thái</label>

                <div class="col-sm-10"><textarea require="" class="form-control" name="tt"> <?php echo $row['trangthai'] ?></textarea></div>
            </div>
        <?php
        }
        ?>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit" name="sua">Sửa</button>

            </div>
        </div>
    </form>
</div>