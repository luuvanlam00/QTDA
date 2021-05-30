<?php
include_once './connect.php';
$ma = $_GET['id_hd'];
if (isset($_POST['them'])) {
    $ma= $_POST['ma'];
    $sp = $_POST['sp'];
    $sl = $_POST['sl'];
    $dg = $_POST['dg'];
    $sql = "insert into cthdn(id_hd,masp,soluong,dongia) values('$ma','$sp','$sl','$dg')";
    mysqli_query($link, $sql);
    echo '<script>window.location="quantri.php?page_layout=cthdn&id_hd='.$ma.'"</script>';
}
if (isset($_POST['lm'])) {
    
    $sl = "";
    $dg= "";
}


?>
<div class="ibox-content">
    <h1>Thêm mới </h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group"><label class="col-sm-2 control-label">Mã hóa đơn nhập</label>

            <div class="col-sm-10"><input type="text" class="form-control" name="ma"  value="<?php echo $ma ?>" readonly/></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Sản phẩm</label>
            <div class="col-sm-10"><select class="form-control m-b" name="sp">
                    <?php
                    $sql = "select * from sanpham";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $row['masp'] ?>"><?php echo $row['tensp'] ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Số lượng</label>

            <div class="col-sm-10"><input type="text" required="" class="form-control" name="sl" /></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Đơn giá </label>

        <div class="col-sm-10"><input type="text" required="" class="form-control" name="dg" /></div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit" name="them">Thêm mới</button>
                <button class="btn btn-primary" type="submit" name="lm">Làm mới</button>

            </div>
        </div>
    </form>
</div>