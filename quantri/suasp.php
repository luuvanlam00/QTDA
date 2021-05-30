<?php
include_once './connect.php';
$ma = $_GET['masp'];
$sql = "select * from sanpham where masp='$ma'";
$result = mysqli_query($link, $sql);
$sqllsp = "select * from loaisp ";
$resultlsp = mysqli_query($link, $sqllsp);
$sqlncc = "select * from ncc ";
$resultncc = mysqli_query($link, $sqlncc);

if (isset($_POST['sua'])) {
    $ten = $_POST['ten'];
    $mota = $_POST['mota'];
    $ct = $_POST['ct'];
    $gb = $_POST['gb'];
    $gkm = $_POST['gkm'];
    $lsp = $_POST['lsp'];
    $ncc = $_POST['ncc'];

    if ($_FILES['anh_sp']['name'] == '') {
        $error_anh_sp = '<span style="color: red;">(*)</span>';
    } else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp_name = $_FILES['anh_sp']['tmp_name'];
    }
   


    if (isset($ten) && isset($anh_sp) && isset($mota) && isset($ct) && isset($gb) && isset($gkm) && isset($lsp) && isset($ncc)) {
        move_uploaded_file($tmp_name, 'anh/' . $anh_sp);
        $sql = "update sanpham set tensp='$ten',anh='$anh_sp',mota='$mota',chitiet='$ct',giaban='$gb',giakm='$gkm',maloai='$lsp',mancc='$ncc' where masp='$ma'";
        mysqli_query($link, $sql);
        echo '<script>window.location="quantri.php?page_layout=sanpham"</script>';
    }
}

?>


<div class="ibox-content">
    <h1>Sửa sản phẩm</h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-group"><label class="col-sm-2 control-label">Tên sản phẩm</label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="ten" value="<?php echo $row['tensp'] ?>" /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Ảnh sản phẩm</label>

                <div class="col-sm-10"><input type="file" class="form-control" name="anh_sp" value='<?php echo $row['anh']?>'  /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>

                <div class="col-sm-10"><textarea require="" class="form-control" name="mota"><?php echo $row['mota'] ?></textarea></div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group"><label class="col-sm-2 control-label">Chi tiết</label>

                <div class="col-sm-10"><textarea required="" class="form-control" name="ct"><?php echo $row['chitiet'] ?></textarea></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Giá bán </label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="gb" value="<?php echo $row['giaban'] ?>" /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Giá khuyến mại</label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="gkm" value="<?php echo $row['giakm'] ?>" /></div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group"><label class="col-sm-2 control-label">Loại sản phẩm</label>
                <div class="col-sm-10"><select class="form-control m-b" name="lsp">
                        <?php

                        while ($rowlsp = mysqli_fetch_array($resultlsp)) {
                        ?>
                            <option <?php
                                    if ($row['maloai'] == $rowlsp['maloai']) {
                                        echo 'selected="selected"';
                                    } ?> value="<?php echo $rowlsp['maloai'] ?>"><?php echo $rowlsp['tenloai'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Nhà cung cấp</label>
                <div class="col-sm-10"><select class="form-control m-b" name="ncc">
                        <?php

                        while ($rowncc = mysqli_fetch_array($resultncc)) {
                        ?>
                            <option <?php
                                    if ($row['mancc'] == $rowncc['mancc']) {
                                        echo 'selected="selected"';
                                    } ?> value="<?php echo $rowncc['mancc'] ?>"><?php echo $rowncc['tenncc'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
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