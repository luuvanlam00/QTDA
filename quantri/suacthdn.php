<?php
include_once './connect.php';
$mahd = $_GET['id_cthd'];
$ma = $_GET['id_hd'];
$sql = "select * from cthdn where id_cthd='$mahd'";
$result = mysqli_query($link, $sql);
$sqlncc = "select * from sanpham ";
$resultncc = mysqli_query($link, $sqlncc);

if (isset($_POST['sua'])) {

    $ma= $_POST['ma'];
    $sp = $_POST['sp'];
    $sl = $_POST['sl'];
    $dg = $_POST['dg'];
    $sql = "update cthdn set id_hd='$ma',masp='$sp',soluong='$sl',dongia='$dg' where id_cthd=$mahd";
    mysqli_query($link, $sql);
    echo '<script>window.location="quantri.php?page_layout=cthdn&id_hd='.$ma.'"</script>';
}

?>


<div class="ibox-content">
    <h1>Sửa hóa đơn </h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-group"><label class="col-sm-2 control-label">Mã hóa đơn nhập</label>

                <div class="col-sm-10"><input type="text" class="form-control" name="ma" value="<?php echo $ma ?>" readonly /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Sản phẩm</label>
                    <div class="col-sm-10"><select class="form-control m-b" name="sp">
                            <?php

                            while ($rowncc = mysqli_fetch_array($resultncc)) {
                            ?>
                                <option <?php
                                        if ($row['masp'] == $rowncc['masp']) {
                                            echo 'selected="selected"';
                                        } ?> value="<?php echo $rowncc['masp'] ?>"><?php echo $rowncc['tensp'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Số lượng</label>

                <div class="col-sm-10"><input type="text" class="form-control" name="sl" value="<?php echo $row['soluong'] ?>" /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Đơn giá</label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="dg" value="<?php echo $row['dongia'] ?>" /></div>
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